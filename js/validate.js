// function for validation
function ValidateForm( event ) 
{	
	event.preventDefault();

// validation for employee name
	if (document.EmployeeRegistration.Empname.value == " ") 
	{ 
		alert('Enter the Employee Name.'); 
		document.EmployeeRegistration.Empname.focus(); 
		return false; 
	}
		
	// validation for employee Id
	if (document.EmployeeRegistration.Empid.value == " ") 
	{ 
		alert('Enter the Employee ID.'); 
		document.EmployeeRegistration.Empid.focus(); 
		return false; 
	}
	
	// validation for validation for district
	if (document.EmployeeRegistration.District.value == -1) 
	{ 
		alert('Select District.'); 
		document.EmployeeRegistration.District.focus(); 
		return false; 
	}
		
	// validation for state
	if (document.EmployeeRegistration.State.value == -1) 
	{ 
		alert('Select State.'); 
		document.EmployeeRegistration.State.focus(); 
		return false; 
	}
		
	// validation for Pincode
	if (document.EmployeeRegistration.Pincode.value == " ")
	{
		alert('Enter Pincode.');
		document.EmployeeRegistration.Pincode.focus();
		return false;
	}
	if ((isNaN(document.EmployeeRegistration.Pincode.value)) || (document.EmployeeRegistration.Pincode.value.length != 6))
	{
		alert('Enter Correct Pincode.');
		document.EmployeeRegistration.Pincode.focus();
		return false;			
	}	
		
	// validation for gender
	if (( EmployeeRegistration.sex[0].checked == false) && (EmployeeRegistration.sex[1].checked == false))
	{
		alert('Select Gender(Male or Female)');
		return false;
	}
	
	// validation for emailId
	if (EmployeeRegistration.emailid.value == "") 
	{ 
	alert('Email address is required.'); 
	EmployeeRegistration.emailid.focus(); 
	return false; 
	}
	if (EmployeeRegistration.emailid.value.indexOf("@") < 1 || EmployeeRegistration.emailid.value.indexOf(".") < 1) 
	{ 	
	alert('Please enter a valid email address.'); 
	EmployeeRegistration.emailid.focus(); 
	return false; 
	}
	
	// validation for Mobile number
	if (document.EmployeeRegistration.mobileno.value == " ")
	{
		alert('Enter Mobile Number.');
		document.EmployeeRegistration.mobileno.focus();
		return false;
	}
	if ((isNaN(document.EmployeeRegistration.mobileno.value)) || (document.EmployeeRegistration.mobileno.value.length != 10))
	{
		alert('Enter Correct Mobile Number(do not add +91/0).');
		document.EmployeeRegistration.mobileno.focus();
		return false;			
	}	
	
	// validation for Department
	if (document.EmployeeRegistration.department.value == -1) 
	{ 
		alert('Select Department.'); 
		document.EmployeeRegistration.department.focus(); 
		return false; 
	}
	
	// validation for district
	if (document.EmployeeRegistration.position.value == -1) 
	{ 
		alert('Select Position.'); 
		document.EmployeeRegistration.position.focus(); 
		return false; 
	}
	
	GenerateTable();
	return true; 
}

// Function to generate Dynamic Table
function GenerateTable() {
    
	// Initializing table data into variables
	var Name = document.getElementById("empname");
	var Id = document.getElementById("empid");
	var FatherName = document.getElementById("fathername");
	var Address = document.getElementById("address");
	var City = document.getElementById("city");
	var District = document.getElementById("district");
	var State = document.getElementById("state");
	var Pincode =document.getElementById("pincode");
	var Sex = document.getElementById("sex");
	var Qualification = document.getElementById("qualification");
	var Emailid =document.getElementById("emailid");
	var Dob = document.getElementById("dob");
	var MobileNo = document.getElementById("mobileno");
	var Department = document.getElementById("department");
	var Position = document.getElementById("position");
	
	var table = document.getElementById("tabledata");
	var rowCount = table.rows.length;
	var row = table.insertRow(rowCount);
	
	//insert data into table
	row.insertCell(0).innerHTML = Name.value;
	row.insertCell(1).innerHTML = Id.value;
	row.insertCell(2).innerHTML = FatherName.value;
	row.insertCell(3).innerHTML = Address.value;
	row.insertCell(4).innerHTML = City.value;
	row.insertCell(5).innerHTML = District.value;
	row.insertCell(6).innerHTML = State.value;
	row.insertCell(7).innerHTML = Pincode.value;
	row.insertCell(8).innerHTML = Sex.value;
	row.insertCell(9).innerHTML = Qualification.value;
	row.insertCell(10).innerHTML = Emailid.value;
	row.insertCell(11).innerHTML = Dob.value;
	row.insertCell(12).innerHTML = MobileNo.value;
	row.insertCell(13).innerHTML = Department.value;
	row.insertCell(14).innerHTML = Position.value;	
	
	//Editing and Deleting Data using Buttons
	row.insertCell(15).innerHTML = '<input type="button" class="btn btn-success" id="Edit" value="Edit" onclick="editRow(this)" /><br/>';
	row.insertCell(16).innerHTML = '<input type="button" class="btn btn-danger" id="Delete" value="Delete" onclick="deleteRow(this)" />';

}

// Function to Delete Row
function deleteRow(row){
	var del=row.parentNode.parentNode.rowIndex;
	document.getElementById("tabledata").deleteRow(del);
}

function editRow(r){
	var x=r.parentNode.parentNode.childNodes;
	r1 = x[0].innerHTML;
	r2 = x[1].innerHTML;
	r3 = x[2].innerHTML;
	r4 = x[3].innerHTML;
	r5 = x[4].innerHTML;
	r6 = x[5].innerHTML;
	r7 = x[6].innerHTML;
	r8 = x[7].innerHTML;
	r9 = x[8].innerHTML;
	r10 = x[9].innerHTML;
	r11 = x[10].innerHTML;
	r12 = x[11].innerHTML;
	r13 = x[12].innerHTML;
	r14 = x[13].innerHTML;
	r15 = x[14].innerHTML;
	
	x[0].innerHTML = '<input type = "text" id="disable" size=10 value="'+r1+'" />';
	x[1].innerHTML = '<input type = "text" id="disable" size=10 value= "'+r2+'" />';
	x[2].innerHTML = '<input type = "text" id="disable" size=10 value= "'+r3+'" />';
	x[3].innerHTML = '<input type = "text" id="disable" size=10 value= "'+r4+'" />';
	x[4].innerHTML = '<input type = "text" id="disable" size=10 value= "'+r5+'" />';
	x[5].innerHTML = '<input type = "text" id="disable" size=10 value= "'+r6+'" />';
	x[6].innerHTML = '<input type = "text" id="disable" size=10 value= "'+r7+'" />';
	x[7].innerHTML = '<input type = "text" id="disable" size=10 value= "'+r8+'" />';
	x[8].innerHTML = '<input type = "text" size=10 id="disable" value= "'+r9+'" />';
	x[9].innerHTML = '<input type = "text" size=10 id="disable" value= "'+r10+'" />';
	x[10].innerHTML = '<input type = "text" size=10 id="disable" value= "'+r11+'" />';
	x[11].innerHTML = '<input type = "text" size=10 id="disable" value= "'+r12+'" />';
	x[12].innerHTML = '<input type = "text" size=10 id="disable" value= "'+r13+'" />';
	x[13].innerHTML = '<input type = "text" size=10 id="disable" value= "'+r14+'" />';
	x[14].innerHTML = '<input type = "text" size=10 id="disable" value= "'+r15+'" />';
	document.getElementById('disable').onblur = function() {
    tmp = document.getElementById('disable').value;
    x[0].innerHTML = tmp;
  };
}