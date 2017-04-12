$(document).ready(function(){
	
	//alert('UserID is ' + sessionStorage.getItem('username'));
	
	$("#login").click(function(){
		
		console.log("Button clicked");
	var email = $("#email").val();
	var password = $("#password").val();
	// Checking for blank fields.
	if( email =='' || password ==''){
		$('input[type="text"],input[type="password"]').css("border","2px solid red");
		$('input[type="text"],input[type="password"]').css("box-shadow","0 0 3px red");
		alert("Please fill all fields...!!!!!!");
	}
	else {
		$.post("login.php",{ email1: email, password1:password},
		function(data) {
		if(data.includes('Invalid Email.......')) {
			$('input[type="text"]').css({"border":"2px solid red","box-shadow":"0 0 3px red"});
			$('input[type="password"]').css({"border":"2px solid #00F5FF","box-shadow":"0 0 5px #00F5FF"});
			alert(data);
		}
		else if(data.includes('Email or Password is wrong')){
			$('input[type="text"],input[type="password"]').css({"border":"2px solid red","box-shadow":"0 0 3px red"});
			alert(data);
			alert('wrong');
		} 
		else if(data.includes('Successfully')){
			$("form")[0].reset();
			$('input[type="text"],input[type="password"]').css({"border":"2px solid #00F5FF","box-shadow":"0 0 5px #00F5FF"});
			//alert(data);
			
			sessionStorage.setItem('username', email);
			window.location.href = "dashboard_advanced.html";
		} 
		else
			{
			alert(data);
			alert('Unknown error');
			
			}
		
		});
	}
	});
	
	$("#signin").click(function(){
		window.location.href = "registration.html";
		
	});
	
	
});