function StrengthChecker()
		{
			var password= document.getElementById("password").value;
			var value = document.getElementById("check");
			value.innerHTML=password;
			var smallreg=new RegExp("[a-z]");
			var smallregTest = smallreg.test(password);
			var capital =new RegExp("[A_Z]");
			var capitalTest= capital.test(password);
			var Special= new RegExp("[^A_Za-z0-9]");
			var SpecialTest=Special.test(password);
			var digits = new RegExp("[0-9]");
			var digitsTest= digits.test(password);
			var lengthy = password.length;
			console.log(value.innerHTML);
			 
	
		if(!smallregTest&&!capitalTest&&!SpecialTest&&lengthy<=7&&!digitsTest)
		{
		   value.innerHTML="verybad";
		}
		if((smallregTest&&!capitalTest&&!SpecialTest&&lengthy<=7&&!digitsTest)||(!smallregTest&&capitalTest&&!SpecialTest&&lengthy<=7&&!digitsTest)
		||(!smallregTest&&!capitalTest&&SpecialTest&&lengthy<=7&&!digitsTest)||(!smallregTest&&!capitalTest&&!SpecialTest&&lengthy>7&&!digitsTest)
		||(!smallregTest&&!capitalTest&&!SpecialTest&&lengthy<=7&&digitsTest))
		{
		   value.innerHTML="poor";
		}
	  
		if((smallregTest&&capitalTest&&!SpecialTest&&lengthy<=7&&!digitsTest)||(smallregTest&&!capitalTest&&SpecialTest&&lengthy<=7&&!digitsTest)
		||(smallregTest&&!capitalTest&&!SpecialTest&&lengthy>7&&!digitsTest)||(smallregTest&&!capitalTest&&!SpecialTest&&lengthy<=7&&digitsTest)
		||(!smallregTest&&capitalTest&&SpecialTest&&lengthy<=7&&!digitsTest)
		||(!smallregTest&&capitalTest&&!SpecialTest&&lengthy>7&&!digitsTest)
		||(!smallregTest&&capitalTest&&!SpecialTest&&lengthy<=7&&digitsTest)
		||(!smallregTest&&!capitalTest&&SpecialTest&&lengthy>7&&!digitsTest)
		||(!smallregTest&&!capitalTest&&SpecialTest&&lengthy<=7&&digitsTest)
		||(!smallregTest&&!capitalTest&&!SpecialTest&&lengthy>7&&digitsTest)
		)
		{
		   value.innerHTML="average";
		}
	
	
		if((smallregTest&&capitalTest&&SpecialTest&&lengthy<=7&&!digitsTest)
		||(smallregTest&&capitalTest&&!SpecialTest&&lengthy>7&&!digitsTest)
		||(smallregTest&&capitalTest&&!SpecialTest&&lengthy<=7&&digitsTest)
	
		||(smallregTest&&!capitalTest&&SpecialTest&&lengthy>7&&!digitsTest)
		||(smallregTest&&!capitalTest&&SpecialTest&&lengthy<=7&&digitsTest)
		||(smallregTest&&!capitalTest&&!SpecialTest&&lengthy>7&&digitsTest)
	
		||(!smallregTest&&capitalTest&&SpecialTest&&lengthy>7&&!digitsTest)
		||(!smallregTest&&capitalTest&&SpecialTest&&lengthy<=7&&digitsTest)
		||(!smallregTest&&capitalTest&&!SpecialTest&&lengthy>7&&digitsTest)
		 ||(!smallregTest&&!capitalTest&&SpecialTest&&lengthy>7&&digitsTest)
		)
		{
			value.innerHTML="good";
	
		}
	
		 if ((smallregTest&&capitalTest&&SpecialTest&&lengthy>7&&!digitsTest)||
		 (smallregTest&&capitalTest&&SpecialTest&&lengthy<=7&&digitsTest)||
		 (smallregTest&&capitalTest&&!SpecialTest&&lengthy>7&&digitsTest)||
		 (smallregTest&&!capitalTest&&SpecialTest&&lengthy>7&&digitsTest)||
		 (!smallregTest&&capitalTest&&SpecialTest&&lengthy>7&&digitsTest)
		 )
		 {
			value.innerHTML="very-good";
	
		 }
		 if (smallregTest&&capitalTest&&SpecialTest&&lengthy>7&&digitsTest)
	
		 {
			value.innerHTML="Strong";
			
	
		 }
	
	
	
		}
	

		function checkPasswordMatch() {
			var password = $("#password").val();
			var confirmPassword = $("#password2").val();
		
			if (password != confirmPassword)
				$("#divCheckPasswordMatch").html("Passwords do not match!");
			else
				$("#divCheckPasswordMatch").html("Passwords match.");
		}
		
		$(document).ready(function () {
			
			
		   $("#password2").keyup(checkPasswordMatch);
			
		});
		