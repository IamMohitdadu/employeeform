$(function(){
            
    // name validation
    $("#name_error").hide();
    $("#empname").focusout(function(){
        chk_name();
    });
    
    // Id Validation
    $("#id_error").hide();
    $("#empid").focusout(function(){
        chk_id();
    });
    
    // District Validation
    $("#district_error").hide();
    $("#district").focusout(function(){
        chk_district();
    });
    
    // State Validation
    $("#state_error").hide();
    $("#state").focusout(function(){
        chk_state();
    });
    
    // Pin Code Validation
    $("#pincode_error").hide();
    $("#pincode").focusout(function(){
        chk_pincode();
    });
    
    // Gender validation
    //$("#gender_error").hide();
    
   
    //Qualification validation
    $("#qualification_error").hide();
    $("#qualification").focusout(function(){
        chk_qualification();
    });
    
    // Email Id validation
    $("#emailid_error").hide();
    $("#emailid").focusout(function(){
        chk_emailid();
    });
    
    // Mobile Number Validation
    $("#mobileno_error").hide();
    $("#mobileno").focusout(function(){
        chk_mobileno();
    });
    
    // Department Validation
    $("#department_error").hide();
    $("#department").focusout(function(){
        chk_department();
    });
    
    // Position Validation
    $("#position_error").hide();
    $("#position").focusout(function(){
        chk_position();
    });
    
    function chk_name(){
        var name_length = $("#empname").val().length;
        if(name_length < 3 || name_length > 20){
            $("#name_error").html("should be between 3-20 charecters");
            $("#name_error").show();
        }
        else{
            $("#name_error").hide();
        }
    }
    
    function chk_id(){
        var id_length = $("#empid").val().length;
        if(id_length < 3 || id_length > 20){
            $("#id_error").html("should be between 3-20 charecters");
            $("#id_error").show();
        }
        else{
            $("#name_error").hide();
        }
    }
        
    function chk_district(){
        var district = $("#district").val();
        if(district == -1){
            $("#district_error").html("Select District");
            $("#district_error").show();
            $("#district").focus();
        }
        else{
            $("#district_error").hide();
        }
    }
        
    function chk_state(){
        var state = $("#state").val();
        if(state == -1){        
            $("#state_error").html("Select state");
            $("#state_error").show();
            $("#state").focus();
        }
        else{
            $("#state_error").hide();
        }
    }
        
    function chk_pincode(){
        var pincode_length = $("#pincode").val().length;
        if(pincode_length != 6){ 
            $("#pincode_error").html("Pincode should be 6-digit");
            $("#pincode_error").show();
            $("#pincode").focus();
        }
        else{
            $("#pincode_error").hide();
        }
    }
    
    function chk_qualification(){
        var qualification = $("#qualification").val();
        if(qualification == -1){
            $("#qualification_error").html("Select qualification");
            $("#qualification_error").show();
            $("#qualification").focus();
        }
        else{
            $("#qualification_error").hide();
        }
    }
    
    function chk_emailid(){
        var emailid = $("#emailid").val().length;
        if(emailid <5){
            $("#emailid_error").html("Enter valid Email Address");
            $("#emailid_error").show();
            $("#emailid").focus();
        }
        else{
            $("#emailid_error").hide();
        }
    }
    
    function chk_mobileno(){
        var mobileno_length = $("#mobileno").val().length;
        if(mobileno_length != 10){
            $("#mobileno_error").html("Mobile Number should be 10-digit[don't add(+91/0)]");
            $("#mobileno_error").show();
            $("#mobileno").focus();
        }
        else{
            $("#mobileno_error").hide();
        }
    }

    function chk_department(){
        var department = $("#department").val();
        if(department == -1){
            $("#department_error").html("Select department");
            $("#department_error").show();
            $("#department").focus();
        }
        else{
            $("#department_error").hide();
        }
    }    
    function chk_position(){
        var position = $("#position").val();
        if(position == -1){
            $("#position_error").html("Select position");
            $("#position_error").show();
            $("#position").focus();
        }
        else{
            $("#position_error").hide();
        }
    }
    
    $("#form_error").on('submit', function(event){
        event.preventDefault();
        
        name=false;
        id=false;
        district=false;
        state=false;
        pincode=false;  
        qualification=false;
        emailid=false;
        mobileno=false;
        department=false;
        position=false;
        
        chk_name();
        chk_id();
        chk_district();
        chk_state();
        chk_pincode();
        chk_qualification();
        chk_emailid();
        chk_mobileno();
        chk_department();
        chk_position();
        
        var n="<td>mohit</td>";
        $('#tbody').append(n);
    });
});    