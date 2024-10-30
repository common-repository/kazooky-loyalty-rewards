$dk=jQuery.noConflict();
var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
$dk(document).ready(function(){ 
var operatorApi = new Kazooky.API.Operator(); 
 $dk("#signupNow").click(function(){
	 if($dk("#email").val()=="" && $dk("#password").val()=="" && $dk("#verifyPassword").val()==""){
		$dk(".error").html("This is required field !");
	 } 
	 
	 else if($dk("#website").val()==""){
		 
		$dk("#website_error").html("This is required field !");
	 }
	 
	 else if($dk("#email").val()==""){
		$dk("#email_error").html("This is required field !");
	 } 
	 
	 else if( !emailReg.test($dk("#email").val()) ) {
		//$dk("#email_error").html("Invalid Email ID");
		$dk("#email_error").html('');
		alert('Invalid Email ID');
	 }
	  
	 else if($dk("#password").val()==""){
		$dk("#password_error").html("This is required field !");
	 }
	 
	 else if ($dk("#password").val().length<6){
		//$dk("#password_error").html("Password must be at least 6 character");
		$dk("#password_error").html('');
		alert('Password must be at least 6 character');
	 }
	 
	 else if($dk("#verifyPassword").val()==""){
		$dk("#verifyPassword_error").html("This is required field !");
	 }  
	 
	 else if($dk("#verifyPassword").val() != $dk('#password').val()){
		 $dk("#verifyPassword_error").html(''); 
         alert("Password and confirm password fields do not match");
     }

	 else{	
		operatorApi.signupOperator(null, null, $dk("#email").val(), $dk("#password").val(),$dk("#website").val(),function(success,appId,errorMsg){ 
		//alert("success:" + success + "; appId: " + appId + "; errorMsg: " + errorMsg); 
		if(errorMsg != ""){
			alert(errorMsg);
		} 
		else {
		 alert("You have signed up successfully, Please click on 'save changes' button.");
		 $dk("#verifyPassword_error").html(''); 
		 $dk(".regular-text").val(appId);
		 }
		});
	}	

 });

});
