<!DOCTYPE html>
<html>
<head>
  <title>Gene Database</title>
  <link rel="stylesheet" href="db.css" >
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <a href="Homepage.html">
    <i class="fas fa-home" style="color: white;"></i>Home</a>
</head>
<body>

  <h1 >Gene Database</h1>

  <!-- Insert Form -->
  <fieldset>
    <legend>Insert Gene</legend>
    <form name="myForm" method="post" action="db_fun.php" onsubmit="return Insert_RequiredFields()">
      <label for="gene_id">Gene ID:</label>
      <br>
      <input type="number" id="gene_id" name="gene_id" required >
      <br>

      <label for="gene_name">Gene Name:</label>
      <br>
      <input type="text" id="gene_name" name="gene_name">
      <br>

      <label for="sequence">Sequence:</label>
      <br>
      <textarea id="sequence" name="sequence" rows="5" cols="50"></textarea>
      <br>

      <input type="submit" name="submit1" value="Insert"></form>
    </form>
  </fieldset>



  <!-- Update Form -->
  <fieldset>
    <legend>Update Gene</legend>
    <form method="post" name="update_form" action="db_fun.php" onsubmit="return Update_RequiredFields()">
      <label for="select_gene_id1">Enter Gene ID</label>
      <br>
      <input  type="number" id="select_value1" name="select_value1"></input>
      <br>
      <label id="dd" for="update_new_gene_id">New Gene ID:</label>
      <br>
      <input type="number" id="update_new_gene_id" name="update_new_gene_id">
      <br>
      <label for="update_gene_name">New Gene Name:</label>
      <br>

      <input type="text" id="update_gene_name" name="update_gene_name">
      <br>

      <label for="update_sequence">New Sequence:</label>
      <br>
      <textarea id="update_sequence" name="update_sequence" rows="5" cols="50"></textarea>
      <br>

      <input type="submit" name="submit3" value="Update"></form>
    </form>
  </fieldset>

    <!-- Select Form -->
    <fieldset>
      <legend>Select Gene</legend>
      <form method="post" name="select_form" action="db_fun.php" onsubmit=" return Select_RequiredFields()">
        <label for="select_option">Search By:</label>
        <br>
        <input type="radio" id="select_gene_id" name="select_option" value="Gene_ID">
        <label for="select_gene_id">Gene ID</label>
        <label for="table2" id="table2">Choose a table:</label>
        <select name="table" id="table1">
          <option value="genome">genome</option>
          <option value="user">user</option>
        </select>
        <br>

        <input type="radio" id="select_gene_name" name="select_option" value="GName">
        <label for="select_gene_name">Gene Name</label>
        <br>

        <input type="radio" id="select_sequence" name="select_option" value="Sequence">
        <label for="select_sequence">Sequence</label>
        <br>
        <div>
          <textarea id="select_value" name="select_value" rows="5" cols="50"></textarea>


        </div>
        <br>
        <div>
          <input type="submit" name="submit2" value="Select"></form>
          <input type="submit" name="submit2" value="Select all"></form>
        </div>
      </form>
    </fieldset>

  <!-- Delete Form -->
  <fieldset>
    <legend>Delete Gene</legend>
    <form method="post" name="delete_form" action="db_fun.php" target="_self" onsubmit="return Delete_RequiredFields()">
      <label for="select_gene_id2">Enter Gene ID</label>
      <br>
      <input type="number" id="select_value2" name="select_value2">
      <br>
      <input type="submit" name="submit4" value="Delete"></form>
    </form>
  </fieldset>
  <script src="db.js"></script>
  <?php
		if(isset($_GET['result'])) {
			$result = $_GET['result'];
      echo "<script>alert('".$result."');</script>";
			}
	?>

</body>
</html>
