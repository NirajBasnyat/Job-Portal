$(document).ready(function() {

	//Responsive Navbar
	$('.handle').click(function(){
		$('nav ul').toggleClass('show');
	});

	$('.handle').click(function() {
		/* Act on the event */
		$('.hero h2').toggle();
		$('.hero h3').toggle();
		//$('.hero .btn').toggle();
	});

	//smooth scrolling
	$('.scroll').click(function(e){
		e.preventDefault();
		$('body,html').animate({
			scrollTop:$(this.hash).offset().top
		},1000);
		});
	});

	//change of active class
	$(window).scroll(function(){

		var scrollBarLocation= $(this).scrollTop();
		$('.scroll').each(function(){
			var sectionOffset= $(this.hash).offset().top -10;
			if(sectionOffset<=scrollBarLocation)
			{
				$(this).parent().addClass('active');
				$(this).parent().siblings().removeClass('active');
			}
		});

		$('.carousel').carousel()
});