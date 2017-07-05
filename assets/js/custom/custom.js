/**
 *	Custom jQuery Scripts
 *	
 *	Developed by: Austin Crane	
 *	Designed by: Austin Crane
 */

jQuery(document).ready(function ($) {
	
	/*
	*
	*	Current Page Active
	*
	------------------------------------*/
	$("[href]").each(function() {
    if (this.href == window.location.href) {
        $(this).addClass("active");
        }
	});
	
	/*
	*
	*	Flexslider
	*
	------------------------------------*/
	$('.flexslider').flexslider({
		animation: "slide",
	}); // end register flexslider
	
	/*
	*
	*	Colorbox
	*
	------------------------------------*/
	$('a.gallery').colorbox({
		rel:'gal',
		width: '80%', 
		height: '80%'
	});
	
	/*
	*
	*	Isotope with Images Loaded
	*
	------------------------------------*/
	var $container = $('#container').imagesLoaded( function() {
  	$container.isotope({
    // options
	 itemSelector: '.item',
		  masonry: {
			gutter: 15
			}
 		 });
	});


	
	
	/*
	*
	*	Equal Heights Divs
	*
	------------------------------------*/
	$('.js-blocks').matchHeight();

	/*
	*
	*	Wow Animation
	*
	------------------------------------*/
	new WOW().init();

	$('#masthead .search').click(function(){
	   var $row_2 = $('#masthead >.row-1 >.col-2 >.row-2');
	   if($row_2.hasClass("toggled-on")){
	       $row_2.removeClass("toggled-on");
       } else {
	       $row_2.addClass("toggled-on");
       }
    });
	
	$('a.popup').colorbox({
		rel: 'gal',
		inline: true,
		width: '90%',
		maxWidth: '960px',
		close: '<i class="fa fa-times"></i>',
		previous: '<i class="fa fa-chevron-left"></i>',
		next: '<i class="fa fa-chevron-right"></i>'
	});
    $(window).on('resize', function () {
        var width = window.innerWidth * 0.9 > 960 ? '960px' : '90%';
        $.colorbox.resize({
            width: width,
        });
    });
});// END #####################################    END