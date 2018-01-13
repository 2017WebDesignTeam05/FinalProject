function signupCheck()
{
	with(document.all)
	{
		if(name01.value!="" && pass01.value!="" && pass02.value!="")
		{
			if(pass01.value!=pass02.value)
			{
				alert("Password error!");
				pass1.value = "";
				pass2.value = "";
			}
			else 
			{
				document.forms["SignupForm"].submit();
			}
		}
		else
		{
			alert("Fill in all boxes.");
		}
	}
}

function loginCheck()
{
	with(document.all)
	{
		if(name11.value!="" && pass11.value!="")
		{
			document.forms["LoginForm"].submit();
		}
		else
		{
			alert("Fill in all boxes");
		}
	}
}