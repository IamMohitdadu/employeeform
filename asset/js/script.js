/*
  file-name: script.js
  used-for: Employee form creation Assignment for mindfire training session.
  created-by: Mohit Dadu
  description: the following file is for validating and generating table using jquery.
*/


$(function() {
    
  $("#name-error").hide();
  $("#id-error").hide();
  $("#district-error").hide();
  $("#state-error").hide();
  $("#pincode-error").hide();
  $("#gender-error").hide();
  $("#qualification-error").hide();
  $("#emailid-error").hide();
  $("#mobileno-error").hide();
  $("#department-error").hide();
  $("#position-error").hide();
  var row = null;
  
  // submit form 
  $("#form-error").on('submit', function(event) {
    event.preventDefault();
    var chkr = validate();  // function call for form data validation.
    if (chkr) {
      generate_table(chkr);  // function call for generating table.
    }
    $('.form').trigger("reset"); //to reset form.
  });
 
  // Edit button option.
  
  $(document).on('click', '.btn-edit', function() {    
    row = $(this).closest('tr');
    $(".employeeDetials").removeClass("selectedRow");
    $(this).closest('tr').addClass("selectedRow");
    edit_table(row);  
  });
  
  // deleting the row from the table.
  
  $(document).on('click', '.btn-delete', function() {
    $(this).closest('tr').remove();  // remove selected row.
  });

  // updating table data.
  
  $('#update').click(function() {
    var chkr = validate();   // function call for validating the table data.
    if (chkr) {
      update_table();  // updating the table data after editing.
    }
  });
  
});


// function for validation
function validate() {

  var name_length = $("#emp-name").val().length;
  var id_length = $("#emp-id").val().length;
  var district = $("#district").val();
  var state = $("#state").val();
  var pincode_length = $("#pincode").val().length;
  var qualification = $("#qualification").val();
  var gender = $("#gender").val();
  var emailid = $("#email").val().length;
  var mobileno_length = $("#mobile-no").val().length;
  var department = $("#department").val();
  var position = $("#position").val();

  if(name_length < 3 || name_length > 20) { 
    $("#name-error").show();
    return false;
  } else {
    $("#name-error").hide();
  }

  if(id_length < 3 || id_length > 20) {
    $("#id-error").show();
    return false;
  } else {
    $("#id-error").hide();
  }

  if(district == -1) {
    $("#district-error").show();
    return false;
  } else {
    $("#district-error").hide();
  }

  if(state == -1) {        
    $("#state-error").show();
    return false;
  } else {
    $("#state-error").hide();
  }

  if(pincode_length != 6) { 
    $("#pincode-error").show();
    return false;
  } else {
    $("#pincode-error").hide();
  }
  if(qualification == -1) {
    $("#qualification-error").show();
    return false;
  } else { 
    $("#qualification-error").hide();
  }

  if(gender == -1) {
    $("#gender-error").show();
    return false;
  } else {
    $("#gender-error").hide();
  }

  if(emailid < 5) {
    $("#emailid-error").show();
    return false;
  } else {
    $("#emailid-error").hide();
  }

  if(mobileno_length != 10) {
    $("#mobileno-error").show();
    return false;
  } else {
    $("#mobileno-error").hide();
  }

  if(department == -1) {
    $("#department-error").show();
    return false;
  } else {
    $("#department-error").hide(); 
  }

  if(position == -1) {
    $("#position-error").show();
    return false;
  } else {
    $("#position-error").hide();
  }

  return true;
}

// function for generating table using form data

function generate_table() {
    
  var name = $("#emp-name").val();
  var id = $("#emp-id").val();
  var fatherName = $("#father-name").val();
  var address = $("#address").val();
  var city = $("#city").val();
  var district = $("#district").val();
  var state = $("#state").val();
  var pincode = $("#pincode").val();
  var gender = $("#gender").val();
  var qualification = $("#qualification").val();
  var emailid = $("#email").val();
  var dob = $("#dob").val();
  var mobileNo = $("#mobile-no").val();
  var department = $("#department").val();
  var position = $("#position").val();
  
  var markup = "<tr class='employeeDetials'><td>"+name+"</td><td>"+ id +"</td><td>"+ fatherName +"</td><td>"+ address +
    "</td><td>"+ city +"</td><td>"+ district +"</td><td>"+ state +"</td><td>"+ pincode +"</td><td>"+ gender +"</td><td>"
    + qualification +"</td><td>"+ emailid +"</td><td>"+ dob +"</td><td>"+ mobileNo +"</td><td>"+ department + "</td><td>" + position +
    "</td><td><input type='button' value='edit' id='edit' class='btn btn-success btn-edit'></td><td><input type='button' value='delete' class='btn btn-danger btn-delete' id='delete'></td></tr>";
  $('tbody').append(markup);
}

//function for editing selected row from the table 

function edit_table(row) {
    
  var name = $(row).find('td:eq(0)').text();
  var id = $(row).find('td:eq(1)').text();
  var fatherName = $(row).find('td:eq(2)').text();
  var address = $(row).find('td:eq(3)').text();
  var city = $(row).find('td:eq(4)').text();
  var district = $(row).find('td:eq(5)').text();
  var state = $(row).find('td:eq(6)').text();
  var pincode = $(row).find('td:eq(7)').text();
  var gender = $(row).find('td:eq(8)').text();
  var qualification = $(row).find('td:eq(9)').text();
  var emailid = $(row).find('td:eq(10)').text();
  var dob = $(row).find('td:eq(11)').text();
  var mobileNo = $(row).find('td:eq(12)').text();
  var department = $(row).find('td:eq(13)').text();
  var position = $(row).find('td:eq(14)').text();
    
  $("#reset").hide();
  $("#submit").hide();
  $("#update").css("display","block");
  $('input[name="empName"]').val(name);
  $('input[name="empId"]').val(id);
  $('input[name="fatherName"]').val(fatherName);
  $('input[name="Address"]').val(address);
  $('input[name="City"]').val(city);
  $('input[name="District"]').val(district);
  $('input[name="State"]').val(state);
  $('input[name="Pincode"]').val(pincode);
  $('input[name="Gender"]').val(gender);
  $('input[name="Qualification"]').val(qualification);
  $('input[name="Email"]').val(emailid);
  $('input[name="Dob"]').val(dob);
  $('input[name="mobileNo"]').val(mobileNo);
  $('input[name="Department"]').val(department);
  $('input[name="Position"]').val(position);
}

// function for store the data back to the table after editing.

function update_table() {

  var row = $(".employeeDetials.selectedRow"); 
  $("#reset").show();
  $("#submit").show();
  $("#update").css("display","none");

  if(row) {
    var name = $('input[name="empName"]').val();
    var id = $('input[name="empId"]').val();
    var fatherName = $('input[name="fatherName"]').val();
    var address = $('input[name="Address"]').val();
    var city = $('input[name="City"]').val();
    var district = $('input[name="District"]').val();
    var state = $('input[name="State"]').val();
    var pincode = $('input[name="Pincode"]').val();
    var gender = $('input[name="Gender"]').val();
    var qualification = $('input[name="Qualification"]').val();
    var emailid = $('input[name="Email"]').val();
    var dob = $('input[name="Dob"]').val();
    var mobileNo = $('input[name="mobileNo"]').val();
    var department = $('input[name="Department"]').val();
    var position = $('input[name="Position"]').val();
     
    $(row).find('td:eq(0)').text(name);
    $(row).find('td:eq(1)').text(id);
    $(row).find('td:eq(2)').text(fatherName);
    $(row).find('td:eq(3)').text(address);
    $(row).find('td:eq(4)').text(city);
    $(row).find('td:eq(5)').text(district);
    $(row).find('td:eq(6)').text(state);
    $(row).find('td:eq(7)').text(pincode);
    $(row).find('td:eq(8)').text(gender);
    $(row).find('td:eq(9)').text(qualification);
    $(row).find('td:eq(10)').text(emailid);
    $(row).find('td:eq(11)').text(dob);
    $(row).find('td:eq(12)').text(mobileNo);
    $(row).find('td:eq(13)').text(department);
    $(row).find('td:eq(14)').text(position);
    alert("record updated successfully");
    row = null;
  }
}
