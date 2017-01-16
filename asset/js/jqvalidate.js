$(function(){
    
    // function for validation
    function validate(){
	    $("#name_error").hide();
	    $("#id_error").hide();
	    $("#district_error").hide();
	    $("#state_error").hide();
	    $("#pincode_error").hide();
	    $("#gender_error").hide();
	    $("#qualification_error").hide();
	    $("#emailid_error").hide();
	    $("#mobileno_error").hide();
	    $("#department_error").hide();
	    $("#position_error").hide();

	    var name_length = $("#empname").val().length;
	    var id_length = $("#empid").val().length;
	    var district = $("#district").val();
	    var state = $("#state").val();
	    var pincode_length = $("#pincode").val().length;
	    var qualification = $("#qualification").val();
	    var gender = $("#gender").val();
	    var emailid = $("#emailid").val().length;
	    var mobileno_length = $("#mobileno").val().length;
	    var department = $("#department").val();
	    var position = $("#position").val();

        if(name_length < 3 || name_length > 20){
            $("#name_error").html("should be between 3-20 charecters");
            $("#name_error").show();
            $("#empname").focus();
            return false;
        }
        else{
            $("#name_error").hide();
        }
        if(id_length < 3 || id_length > 20){
            $("#id_error").html("should be between 3-20 charecters");
            $("#id_error").show();
            $("#empid").focus();
            return false;
        }
        else{
            $("#id_error").hide();
        }
        if(district == -1){
            $("#district_error").html("Select District");
            $("#district_error").show();
            $("#district").focus();
            return false;
        }
        else{
            $("#district_error").hide();
        }
        if(state == -1){        
            $("#state_error").html("Select state");
            $("#state_error").show();
            $("#state").focus();
            return false;
        }
        else{
            $("#state_error").hide();
        }
        if(pincode_length != 6){ 
            $("#pincode_error").html("Pincode should be 6-digit");
            $("#pincode_error").show();
            $("#pincode").focus();
            return false;
        }
        else{
            $("#pincode_error").hide();
        }
        if(qualification == -1){
            $("#qualification_error").html("Select qualification");
            $("#qualification_error").show();
            $("#qualification").focus();
            return false;
        }
        else{
            $("#qualification_error").hide();
        }
        if(gender == -1){
            $("#gender_error").html("Select gender");
            $("#gender_error").show();
            $("#gender").focus();
            return false;
        }
        else{
            $("#gender_error").hide();
        }
        if(emailid <5){
            $("#emailid_error").html("Enter valid Email Address");
            $("#emailid_error").show();
            $("#emailid").focus();
            return false;
        }
        else{
            $("#emailid_error").hide();
        }
        if(mobileno_length != 10){
            $("#mobileno_error").html("Mobile Number should be 10-digit[don't add(+91/0)]");
            $("#mobileno_error").show();
            $("#mobileno").focus();
            return false;
        }
        else{
            $("#mobileno_error").hide();
        }
        if(department == -1){
            $("#department_error").html("Select department");
            $("#department_error").show();
            $("#department").focus();
            return false;
        }
        else{
            $("#department_error").hide();
        }
        if(position == -1){
            $("#position_error").html("Select position");
            $("#position_error").show();
            $("#position").focus();
            return false;
        }
        else{
            $("#position_error").hide();
        }
        return true;
    }
    
    // submit form 
    $("#form_error").on('submit', function(event){
        event.preventDefault();
        // function call for validation
        var chkr=validate();
     	if (chkr){
	        var name = $("#empname").val();
	        var id = $("#empid").val();
	        var fathername= $("#fathername").val();
	        var address= $("#address").val();
	        var city= $("#city").val();
	        var district = $("#district").val();
	        var state = $("#state").val();
	        var pincode = $("#pincode").val();
	        var gender= $("#gender").val();
	        var qualification = $("#qualification").val();
	        var emailid = $("#emailid").val();
	        var dob= $("#dob").val();
	        var mobileno = $("#mobileno").val();
	        var department = $("#department").val();
	        var position = $("#position").val();
	       
	        var markup= "<tr class='employeeDetials'><td>"+name+"</td><td>"+ id +"</td><td>"+ fathername +"</td><td>"+ address +"</td><td>"+ city +"</td><td>"+ district +"</td><td>"+ state +"</td><td>"+ pincode +"</td><td>"+ gender +"</td><td>"+ qualification +"</td><td>"+ emailid +"</td><td>"+ dob +"</td><td>"+ mobileno + "</td><td>" + department + "</td><td>" + position + "</td><td><input type='button' value='edit' id='edit' class='btn btn-success btn-edit'></td><td><input type='button' value='delete' class='btn btn-danger btn-delete' id='delete'></td></tr>";
	        $('tbody').append(markup);
		}
        //$(".form").get().reset();
        $('.form').trigger("reset");
    });

    var _tr=null;
    
    // Edit button option
    $(document).on('click', '.btn-edit', function(){    
        _tr =$(this).closest('tr');
		$(".employeeDetials").removeClass("selectedRow");
		$(this).closest('tr').addClass("selectedRow");
       // alert(_tr);
        //console.log($(this).closest('tr'));
        
        var name = $(_tr).find('td:eq(0)').text();
        var id = $(_tr).find('td:eq(1)').text();
        var fathername = $(_tr).find('td:eq(2)').text();
        var address = $(_tr).find('td:eq(3)').text();
        var city = $(_tr).find('td:eq(4)').text();
        var district = $(_tr).find('td:eq(5)').text();
        var state = $(_tr).find('td:eq(6)').text();
        var pincode = $(_tr).find('td:eq(7)').text();
        var gender = $(_tr).find('td:eq(8)').text();
        var qualification = $(_tr).find('td:eq(9)').text();
        var emailid = $(_tr).find('td:eq(10)').text();
        var dob = $(_tr).find('td:eq(11)').text();
        var mobileno = $(_tr).find('td:eq(12)').text();
        var department = $(_tr).find('td:eq(13)').text();
        var position = $(_tr).find('td:eq(14)').text();
        
		alert(name);
		$("#reset").hide();
		$("#submit").hide();
		$("#update").css("display","block");
        $('input[name="Empname"]').val(name);
        $('input[name="Empid"]').val(id);
        $('input[name="Fathername"]').val(fathername);
        $('input[name="Address"]').val(address);
        $('input[name="City"]').val(city);
        $('input[name="District"]').val(district);
        $('input[name="State"]').val(state);
        $('input[name="Pincode"]').val(pincode);
        $('input[name="Gender"]').val(gender);
        $('input[name="Qualification"]').val(qualification);
        $('input[name="Emailid"]').val(emailid);
        $('input[name="Dob"]').val(dob);
        $('input[name="Mobileno"]').val(mobileno);
        $('input[name="Department"]').val(department);
        $('input[name="Position"]').val(position);      
    });
    
    $(document).on('click', '.btn-delete', function(){
        $(this).closest('tr').remove();
    });
    
	$('#update').click(function(){
        var chkr=validate();
        if(chkr){
            var _tr = $(".employeeDetials.selectedRow"); 
            $('.form').trigger("reset");
            $("#reset").show();
            $("#submit").show();
            $("#update").css("display","none");
            if(_tr){
                alert("inside tr");
                var name = $('input[name="Empname"]').val();
                var id = $('input[name="Empid"]').val();
                var fathername = $('input[name="Fathername"]').val();
                var address = $('input[name="Address"]').val();
                var city = $('input[name="City"]').val();
                var district = $('input[name="District"]').val();
                var state = $('input[name="State"]').val();
                var pincode = $('input[name="Pincode"]').val();
                var gender = $('input[name="Gender"]').val();
                var qualification = $('input[name="Qualification"]').val();
                var emailid = $('input[name="Emailid"]').val();
                var dob = $('input[name="Dob"]').val();
                var mobileno = $('input[name="Mobileno"]').val();
                var department = $('input[name="Department"]').val();
                var position = $('input[name="Position"]').val();
                
                $(_tr).find('td:eq(0)').text(name);
                $(_tr).find('td:eq(1)').text(id);
                $(_tr).find('td:eq(2)').text(fathername);
                $(_tr).find('td:eq(3)').text(address);
                $(_tr).find('td:eq(4)').text(city);
                $(_tr).find('td:eq(5)').text(district);
                $(_tr).find('td:eq(6)').text(state);
                $(_tr).find('td:eq(7)').text(pincode);
                $(_tr).find('td:eq(8)').text(gender);
                $(_tr).find('td:eq(9)').text(qualification);
                $(_tr).find('td:eq(10)').text(emailid);
                $(_tr).find('td:eq(11)').text(dob);
                $(_tr).find('td:eq(12)').text(mobileno);
                $(_tr).find('td:eq(13)').text(department);
                $(_tr).find('td:eq(14)').text(position);
                alert("record updated successfully");
                _tr=null;
            }
        }
    });
});