function parallax(){
	var windowScroll=$(window).scrollTop();
	$('.parallax01').css('background-position', 'center '+(windowScroll)*0.2+'px');
	$('.parallax02').css('background-position', 'center '+(windowScroll)*0.4+'px');
};


$(document).ready(function(){

	$(window).scroll(function(){
		parallax();
	});


 	$('.episodios-slides').slick({
		infinite : true,
  	slidesToShow : 1,
 		slidesToScroll : 1,
  	mobileFirst : true,
  		autoplay : false,
  	focusOnSelect : true,
  	pauseOnFocus : true,
  	touchMove : true,
  	responsive:[
  		{
  			breakpoint : 766,
  			settings : {
  		  	slidesToShow : 3,
  				slidesToScroll : 1,
    			autoplay : false
  			}
			}
		]  
	});


	$('.episodios-slides').slickLightbox({
  	itemSelector        : 'a',
  	navigateByKeyboard  : true
	});

	$('.episodios-slides').each(function(){
    $(this).slickLightbox();
  });

}); 



