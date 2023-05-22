function Insert_RequiredFields() {
    var x = document.forms["myForm"]["gene_id"].value;
    var y = document.forms["myForm"]["gene_name"].value;
    var z = document.forms["myForm"]["sequence"].value;
    var regex = /^[AGCTagct]+$/;

    if (x == "") {
      alert("Gene_ID must be filled out");
      return false;
    }else if (y==""){
      alert("Gene_Name must be filled out");
      return false;
    }else if (z==""){
      alert("Sequence must be filled out");
      return false;
    }if(!(regex.test(z))){
      alert("Enter valid DNA sequence format");
      return false;
    }

    }

function Update_RequiredFields() {
    var y = document.forms["update_form"]["select_value1"].value;
    var z = document.forms["update_form"]["update_new_gene_id"].value;
    var a = document.forms["update_form"]["update_gene_name"].value;
    var b = document.forms["update_form"]["update_sequence"].value;
    var regex1 = /^\d+$/;
    var regex = /^[AGCTagct]+$/;
    if (y ==""){
      alert("you should enter Gene ID you want to UPDATE");
      return false;
    }
    if(z == "" && b =="" && a ==""){
      alert("Please, Enter the new value to be Updated ")
      return false;
    }
    if(!(regex.test(b))&& !(b=="")){
      alert("Enter valid DNA sequence format to update");
      return false;
    }

    }

function Select_RequiredFields() {
   var x = document.forms["select_form"]["select_option"].value;
   var y = document.forms["select_form"]["select_value"].value;
   var s= event.submitter.value;
   if (s=="Select"){
     var regex1 = /^\d+$/;
     var regex = /^[AGCTagct]+$/;
     if(x==""){
      alert("Please, Select an Option!");
      return false;
     }
     if(y==""){
      alert("Please, Type what you want to SELECT!");
      return false;
     }
     if(x=="Gene_ID"&& !(regex1.test(y))){
       alert("Please, Enter ONLY numbers in Gene ID");
       return false;
     }if(!(regex.test(y))&& x=="Sequence"){
       alert("Enter valid DNA sequence format to select");
       return false;
     }}
}

function Delete_RequiredFields() {
  var y = document.forms["delete_form"]["select_value2"].value;
  var regex = /^[AGCTagct]+$/;
  var regex1 = /^\d+$/;
  if(y==""){
   alert("Please, Type what you want to DELETE !");
   return false;
  }
}
