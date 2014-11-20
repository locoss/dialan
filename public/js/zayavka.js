function show_hide(id){
   var re = document.getElementById(id);
   var ar = document.getElementById('info');
   if (re.style.display='none'){
      re.style.display = 'block';
	  ar.style.display = 'block';
   }
 }