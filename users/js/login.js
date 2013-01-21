var errors = "";

function valid_email(email)
{
	if (email == '') {
		errors+= COMPLETE_EMAIL + '<br/>';
	}
	else
	{
		var valid_email = /\w+([-+.\']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/.exec(email);
		if (valid_email == null) {
			errors+= INVALID_EMAIL + '<br/>';
		}
	}
}

function valid_password(password)
{
	if (password == '') {
		errors+= COMPLETE_PASSWORD + '<br/>';
	}
}

function valid_login(sender)
{
	errors = "";
	var display = document.getElementById('errors');	
	valid_email(sender.email.value);
	valid_password(sender.password.value);
	display.innerHTML = errors;	
	return (errors == '');
}