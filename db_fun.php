<!DOCTYPE html>
<html>
<body>
<?php
$servername = "localhost";
$username = "root";
$password="usbw";
$dbname="lassa virus";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error){
  die("Connection failed: ".$conn->connect_error);
}



if (isset($_POST['submit1'])){
  $output=Insert($conn);
  }
elseif (isset($_POST['submit2'])){
  $output1=Select($conn);
  $url1= "Result.php?result=".urlencode($output1);
  header("Location: $url1");
  exit();
  }
elseif (isset($_POST['submit3'])){
  $output=Update($conn);
}
elseif(isset($_POST['submit4'])){
  $output=Delete1($conn);
  }
$url = "db.php?result=".urlencode($output);
header("Location: $url");
exit();


$conn->close();

//if (!empty($_POST['update_new_gene_id'])){


function Update($conn){
  $flag=0;
  $text="";
  $option=$_POST['select_option1'];
  $value= $_POST["select_value1"];
  $sql1 = "SELECT * FROM user where Gene_ID='$value'";
  $sql2=  "SELECT * FROM user where 1";
  $result1 =$conn->query($sql2);
  $result =$conn->query($sql1);
  if ($result->num_rows > 0)
  {
    if (!empty($_POST['update_new_gene_id'])){
      $flag++;
      $id=$_POST['update_new_gene_id'];
      $sql = "UPDATE user SET `Gene_ID`=$id WHERE  Gene_ID='$value'";
      while ($row=$result1->fetch_assoc()) {
        if($id===$row["Gene_ID"]){
          $text="Gene ID already exists in the database.";

          return $text;
        }
      }
      if ($conn->query($sql) !== FALSE) {

        $text .= "Gene ID has been updated." ; }
      else {
        $text .= "Error: ". $sql . "<br>" . $conn->error;
      }
  }  if (!empty($_POST['update_gene_name'])){
      $name=$_POST['update_gene_name'];
      $sql = "UPDATE user SET `GName`='$name' WHERE  Gene_ID='$value'";
      if ($conn->query($sql) !== FALSE) {
        $text .= "Gene Name has been updated." ; }
      else {
        $text .= "Error: ". $sql . "<br>" . $conn->error;
      }
  }  if (!empty($_POST['update_sequence'])){
      $Seq=$_POST['update_sequence'];
      $sql = "UPDATE user SET `Sequence`='$Seq' WHERE Gene_ID='$value'";
    if ($conn->query($sql) !== FALSE) {
      $text .= "Sequence has been updated "; }
    else {
      $text .= "Error: ". $sql . "<br>" . $conn->error;
    }
  }
    }
  else {
    $text = "No records found to be updated.";
  }


return $text;
}

function Delete1($conn){
    $value= $_POST["select_value2"];
    $sql2=  "SELECT * FROM user where 1";
    $sql="DELETE FROM `user` WHERE Gene_ID='$value'";
    $result1 =$conn->query($sql2);
    if ($result1->num_rows > 0){
    while ($row=$result1->fetch_assoc()) {
      if($value===$row["Gene_ID"]){
        if ($conn->query($sql) !== FALSE) {
          $text= "Record has been deleted successfully";
          return $text;}
        else {
            $text .= "Error: ". $sql . "<br>" . $conn->error;
          }
      }

    } $text="Gene ID does not exist in database";
      return $text;
    }
  }






function Select($conn){
  $option=$_POST['select_option'];
  $value= $_POST["select_value"];
  $echo ="";
  if($_POST["table"]=="user"){
    if ($_POST["submit2"]==="Select"){
      $sql = "SELECT * FROM user where $option='$value'";}
    else{
      $sql = "SELECT * FROM user where 1";}
  }else{
    if ($_POST["submit2"]==="Select"){
      $sql = "SELECT * FROM genome where $option='$value'";}
    else{
      $sql = "SELECT * FROM genome where 1";}
  }
  $result =$conn->query($sql);
  if ($result->num_rows > 0)
  {
    $echo .= "<table>";
    $echo .= "<tr><th>Gene ID</th><th>Gene Name</th><th>Fasta</th></tr>";
    while ($row = $result->fetch_assoc()) {
    $echo .= "<tr>";
     $echo .= "<td>" . $row["Gene_ID"] . "</td>";
     $echo .= "<td>" . $row["GName"] . "</td>";
     $echo .= "<td>" . $row["Sequence"] . "</td>";
     $echo .= "</tr>";
   }
    $echo .= "</table>";
  }else {
    $echo .= "<p>No records found.</p>";
  }
  return $echo;
}

function Insert($conn)
{
$text="";
$GID = $_POST["gene_id"];
$GName =$_POST["gene_name"];
$GSeq = $_POST['sequence'];

if (empty($GID) || empty($GName) || empty($GSeq)) {
        $text .= "One or more input fields are empty.";
        return $text;
    }
$sql1 = "SELECT * FROM user where 1";
$result =$conn->query($sql1);
if ($result->num_rows > 0)
{
  while ($row=$result->fetch_assoc()) {

  $text = $row["Gene_ID"];
  if($GID===$text){
    $text="Gene_ID already exists in the database.";
    return $text;
  }
  $text='';
  }
}
$sql = "INSERT INTO user (Gene_ID, GName,Sequence) VALUES ('$GID',
'$GName','$GSeq')";
if ($conn->query($sql) !== FALSE) {

$text .= "New record from input form created successfully"; }
else {
$text .= "Error: ". $sql . "<br>" . $conn->error;
}
return $text;
}
?>
</body>
</html>
