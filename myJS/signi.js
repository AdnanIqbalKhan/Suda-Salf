function StrengthCheckers()
		{
			var password= document.getElementById("password2").value;
			var value = document.getElementById("checkie");
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