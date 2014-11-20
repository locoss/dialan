function validate_form ( )
{
	valid = true;

        if ( document.form1.name.value != document.form1.name.value.match(/[а-я\. .,ієЄІА-Я\.]{3,}/))
        {
                document.getElementById('name1').style.border = '1px solid red';//выделение формы красной рамкой по id
				document.getElementById('name11').style.display = "inline";
                valid = false;
				scroll(0,0);
				
				
        }
		if (document.form1.phone.value != document.form1.phone.value.match(/[0-9\.+-]{5,}/))
        {
                document.getElementById('phone1').style.border = '1px solid red';//выделение формы красной рамкой по id
				document.getElementById('phone11').style.display = "inline";
                valid = false;
				scroll(0,0);
        }



        return valid;
}

function validate_form2 ( )
{
	valid = true;

        if ( document.form2.name2.value != document.form2.name2.value.match(/[а-я\. .,ієЄІА-Я\.]{3,}/))
        {
                document.getElementById('name2').style.border = '1px solid red';//выделение формы красной рамкой по id
				document.getElementById('name22').style.display = "inline";
                valid = false;
				scroll(0,0);
        }
		if (document.form2.phone2.value != document.form2.phone2.value.match(/[0-9\.+-]{5,}/))
        {
                document.getElementById('phone2').style.border = '1px solid red';//выделение формы красной рамкой по id
				document.getElementById('phone22').style.display = "inline";
                valid = false;
				scroll(0,0);
        }



        return valid;
}

function validate_form3 ( )
{
	valid = true;

        if ( document.form3.name3.value != document.form3.name3.value.match(/[а-я\. .,ієЄІА-Я\.]{3,}/)) 
        {
                document.getElementById('name3').style.border = '1px solid red';//выделение формы красной рамкой по id
				document.getElementById('name33').style.display = "inline";
                valid = false;
				scroll(0,0);
        }
		if (document.form3.phone3.value != document.form3.phone3.value.match(/[0-9\.+-]{5,}/))
        {
                document.getElementById('phone3').style.border = '1px solid red';//выделение формы красной рамкой по id
				document.getElementById('phone33').style.display = "inline";
                valid = false;
				scroll(0,0);
        }



        return valid;
}

function validate_form4 ( )
{
	valid = true;

        if ( document.form4.name.value != document.form4.name.value.match(/[а-я\. .,ієЄІА-Я\.]{3,}/))
        {
                document.getElementById('name1').style.border = '1px solid red';//выделение формы красной рамкой по id
				document.getElementById('name11').style.display = "inline";
                valid = false;
				
				
				
        }
		if (document.form4.phone.value != document.form4.phone.value.match(/[0-9\.+-]{5,}/))
        {
                document.getElementById('phone1').style.border = '1px solid red';//выделение формы красной рамкой по id
				document.getElementById('phone11').style.display = "inline";
                valid = false;
				
        }



        return valid;
}