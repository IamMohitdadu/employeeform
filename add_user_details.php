<!Doctype html>
<!-- Employee Registration Form -->
<html>
	<head>
		<title> Registration form</title>
		<link rel="stylesheet" href="asset/vendors/css/bootstrap.min.css">
	</head>
	
	<body style="background-color:lightblue">
		<div class="page-header">
			<nav class="navbar navbar-inverse">
			<h1 class="navbar-text ">Employee Registration Form</h1>
			</nav>
		</div>
		<form class="form-horizontal container" class="form" action="#" name="EmployeeRegistration" method="post" id="form_error">
			<div class="form-group">
				<label class="control-label col-sm-4">Employee ID*</label>
				<div class="col-sm-6"> 
					<input type="number" class="form-control" name="id" id="id"><p id="id_error"></p>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-4">Employee Name*</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="name" id="name"><p id="name_error"></p>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-4">Father's Name:</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="fatherName" id="father-name">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-4">Present Address</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="address" id="address">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-4">State*</label>
				<div class="col-sm-6">
					<select Name="state" id="state" >
					<option value="-1" selected> select.. </option>
					<option value="New Delhi"> NEW DELHI </option>
					<option value="Mumbai"> MUMBAI </option>
					<option value="Goa"> GOA </option>
					<option value="Bihar"> BIHAR </option>
					</select>
					<p id="state_error"></p>
				</div>
			</div>	
			<div class="form-group">
				<label class="control-label col-sm-4"> Sex* </label>
				<div class="col-sm-6">
					<select name="gender" id="gender" >
					<option value="-1" selected> select.. </option>
					<option value="male"> MALE </option>
					<option value="female"> FEMALE </option>
					<option value="others"> OTHERS </option>
					</select>
					<p id="gender_error"></p>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-4">EmailId*</label>
				<div class="col-sm-6">
					<input type="email" class="form-control" name="email" id="email">
					<p id="emailid_error"></p>
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-4">Date Of Birth</label>
				<div class="col-sm-6">
					<input type="date" class="form-control" name="dob" id="dob">
				</div>
			</div>
			<div class="form-group">
				<label class="control-label col-sm-4">Mobile Number*:</label>
				<div class="col-sm-6">
					<input type="number" class="form-control" name="mobile" id="mobile">
					<p id="mobileno_error"></p>
				</div>
			</div>			
			<br><br>
			<center>
			<div class="container">			
			<input type="submit" value="Submit Form" name="submit" id="submit" class="btn btn-primary control-label col-sm">
			<input type="reset" id="reset" class="btn btn-danger control-label col-sm">
			<input type="button" value="Update" name="update" id="update" class="btn btn-primary control-label" style="display:none">
			
			</div>
			</center>
		</form>
		<hr>  
		<div class="control-label col-sm-2">
			<table border="1" id="tabledata" class="table table-responsive" >
				<thead>
				<tr>
					<th> Emp Name </th>
					<th> Emp Id </th>
					<th> Father Name </th>
					<th> Address </th>
					<th> City </th>
					<th> District </th>
					<th> State </th>
					<th> Pincode </th>
					<th> Sex </th>
					<th> Qualification </th>
					<th> Email Id </th>
					<th> DOB </th>
					<th> Mobile No. </th>
					<th> Department </th>
					<th> Position </th>
				</tr>
				</thread>
				<tbody id="tdata">
				</tbody>
			</table ></div>
		<hr>
		<marquee> Thanku for filling registration form </marquee>
	<script type="text/javascript" src="asset/vendors/js/jquery.js"></script>
	<script type="text/javascript" src="asset/js/jqvalidate.js"></script>
	
	<!-- <script type="text/javascript" src="asset/js/validate.js"></script> -->
	</body>
</html>