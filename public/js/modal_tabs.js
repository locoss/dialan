$(document).ready(function() {
	//select all the a tag with name equal to modal
	$('a[name=modal]').click(function(e) {
		//Cancel the link behavior
		e.preventDefault();
		//Get the A tag
		var id = $(this).attr('href');
		//Get the screen height and width
		var maskHeight = $(document).height();
		var maskWidth = $(window).width();
		//Set heigth and width to mask to fill up the whole screen
		$('#mask').css({'width':maskWidth,'height':maskHeight});
		//transition effect
		$('#mask').fadeIn(1000);
		$('#mask').fadeTo("slow",0.8);
		//Get the window height and width
		
		var winW = $(window).width();
	
		//Set the popup window to center
		
		$(id).css('left', winW/2-$(id).width()/2);
		//transition effect
		$(id).fadeIn(2000);
	});
	//if close button is clicked
	$('.window .close').click(function (e) {
		//Cancel the link behavior
		e.preventDefault();
		$('#mask, .window').hide();
	});
	// if mask is clicked
	$('#mask, #info').click(function () {
		$('.info, #info').hide();
	});

	


$('ul.tabs li').css('cursor', 'pointer');

$('ul.tabs.tabs1 li').click(function(){
  var thisClass = this.className.slice(0,2);
  $('div.t1').hide();
  $('div.t2').hide();
  $('div.t3').hide();
  $('div.' + thisClass).show();
  $('ul.tabs.tabs1 li').removeClass('tab-current');
  $(this).addClass('tab-current');
  
  });
});




