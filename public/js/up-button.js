$(document).ready(function(){
 
$(window).scroll(function(){
if ($(this).scrollTop() > 100) {
$('.scrollup-l').fadeIn();
} else {
$('.scrollup-l').fadeOut();
}
});
 
$('.scrollup-l').click(function(){
$("html, body").animate({ scrollTop: 0 }, 600);
return false;
});
 
});
