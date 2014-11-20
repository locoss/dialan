function prise () {
var sms = document.getElementById('sms1')
insurance = document.getElementById('insurance1')
dr_web = document.getElementById('dr_web1')
social = document.getElementById('social1')
social_r = document.getElementById('social_r1')
child = document.getElementById('child1')
ssum = document.getElementById("sum")
	 if ((document.getElementById('radio1').checked == true) && (document.getElementById('radio2').checked == false))
          {
           sms.checked = true;
		   sms.disabled = true;
		   insurance.checked = true;
		   insurance.disabled = true;
		   dr_web.checked = false;
		   dr_web.disabled = false;
		    social.checked = false;
		   social.disabled = false;
		   social_r.checked = false;
		   social_r.disabled = false;
		   child.checked = false;
		   child.disabled = false;
		   ssum.innerHTML = 99;
          }
        
	  if ((document.getElementById('radio1').checked == false) && (document.getElementById('radio2').checked == true))
          {
           sms.checked = true;
		   sms.disabled = true;
		   insurance.checked = true;
		   insurance.disabled = true;
		   dr_web.checked = true;
		   dr_web.disabled = true;
		    social.checked = true;
		   social.disabled = true;
		   social_r.checked = true;
		   social_r.disabled = true;
		   child.checked = true;
		   child.disabled = true;
		   ssum.innerHTML = 159;
		   
		  }
}

function sumt () {
 sumn=0
 
 var m=0
  if  ( document.getElementById('radio1').checked == true) 
{
	m=document.getElementById('radio1')
}
 else
 {
	m=document.getElementById('radio2') 
 }
 
ssum=sumn+parseInt(m.value)
 
	var cbx = document.form1.getElementsByTagName("input");
for (i=0; i < cbx.length; i++) {

	
if (cbx[i].type == "checkbox" && cbx[i].checked && cbx[i].disabled == false ) {
	       ssum=ssum+parseInt(cbx[i].value);

}
document.getElementById("sum").innerHTML =ssum;
}

}

function prise2 () {
var sms = document.getElementById('sms2')
insurance = document.getElementById('insurance2')
dr_web = document.getElementById('dr_web2')
social = document.getElementById('social2')
child = document.getElementById('child2')
ssum = document.getElementById("sum2")
	 if ((document.getElementById('radio3').checked == true) && (document.getElementById('radio4').checked == false) && (document.getElementById('radio5').checked == false))
          {
           sms.checked = false;
		   sms.disabled = false;
		   insurance.checked = false;
		   insurance.disabled = false;
		   dr_web.checked = false;
		   dr_web.disabled = false;
		    social.checked = false;
		   social.disabled = false;
		   child.checked = false;
		   child.disabled = false;
		   ssum.innerHTML = 39;
          }
        
	  if ((document.getElementById('radio3').checked == false) && (document.getElementById('radio4').checked == true)&& (document.getElementById('radio5').checked == false))
          {
           sms.checked = true;
		   sms.disabled = true;
		   insurance.checked = false;
		   insurance.disabled = false;
		   dr_web.checked = false;
		   dr_web.disabled = false;
		    social.checked = false;
		   social.disabled = false;
		   child.checked = false;
		   child.disabled = false;
		   ssum.innerHTML = 69;
		   
		  }
		   if ((document.getElementById('radio3').checked == false) && (document.getElementById('radio4').checked == false)&& (document.getElementById('radio5').checked == true))
          {
           sms.checked = true;
		   sms.disabled = true;
		   insurance.checked = true;
		   insurance.disabled = true;
		   dr_web.checked = false;
		   dr_web.disabled = false;
		    social.checked = false;
		   social.disabled = false;
		   child.checked = false;
		   child.disabled = false;
		   ssum.innerHTML = 89;
		   
		  }
}



function sumt2 () {
 sumn=0
 
 var m=0
  if  (( document.getElementById('radio3').checked == true) && ( document.getElementById('radio4').checked == false) && ( document.getElementById('radio5').checked == false))
{
	m=document.getElementById('radio3');
}
 
	if  (( document.getElementById('radio3').checked == false) && ( document.getElementById('radio4').checked == true) && ( document.getElementById('radio5').checked == false)) 
 {
	m=document.getElementById('radio4');
}
 
 if  (( document.getElementById('radio3').checked == false) && ( document.getElementById('radio4').checked == false) && ( document.getElementById('radio5').checked == true)) 
 {
	m=document.getElementById('radio5');
}
 
ssum=sumn+parseInt(m.value)
 
	var cbx = document.form2.getElementsByTagName("input");
for (i=0; i < cbx.length; i++) {

	
if (cbx[i].type == "checkbox" && cbx[i].checked && cbx[i].disabled == false ) {
	       ssum=ssum+parseInt(cbx[i].value);

}
document.getElementById("sum2").innerHTML =ssum;
}

}

function prise3 () {
var sms = document.getElementById('sms3')
insurance = document.getElementById('insurance3')
ssum = document.getElementById("sum3")
	 if ((document.getElementById('radio6').checked == true) && (document.getElementById('radio7').checked == false))
          {
           sms.checked = false;
		   sms.disabled = false;
		   insurance.checked = false;
		   insurance.disabled = false;
		   ssum.innerHTML = 15;
          }
        
	  if ((document.getElementById('radio6').checked == false) && (document.getElementById('radio7').checked == true))
          {
           sms.checked = true;
		   sms.disabled = true;
		   insurance.checked = false;
		   insurance.disabled = false;
		   ssum.innerHTML = 36;
		   
		  }
}

function sumt3 () {
 sumn=0
 
 var m=0
  if  ( document.getElementById('radio6').checked == true) 
{
	m=document.getElementById('radio6')
}
 else
 {
	m=document.getElementById('radio7') 
 }
 
ssum=sumn+parseInt(m.value)
 
	var cbx = document.form3.getElementsByTagName("input");
for (i=0; i < cbx.length; i++) {

	
if (cbx[i].type == "checkbox" && cbx[i].checked && cbx[i].disabled == false ) {
	       ssum=ssum+parseInt(cbx[i].value);

}
document.getElementById("sum3").innerHTML =ssum;
}

}
