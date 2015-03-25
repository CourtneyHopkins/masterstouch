function getViewportDimensions() {
    var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
    return { width:x,height:y }
}

function size() {
    var viewport = getViewportDimensions();
    if( viewport.width >= 768 ) {
        $("#gridalicious").gridalicious({
            width: 400,
            gutter: 40
        });
    }
}
    

jQuery(document).ready(function($) {

    jQuery.fn.exists = function(){return this.length>0;}

    var viewport = getViewportDimensions();

	$('.homepage-slider').flexslider({
		controlNav: false,
        directionNav: false,
        slideshow: true,
        slideshowSpeed: 4000
	});

	$('.employee-slider').flexslider({
		controlNav: true,
        directionNav: false,
        slideshow: false,
        animation: 'slide',
        controlsContainer: '.employee-slider',
        manualControls: ".employee-slider .control-nav a",
	});

	$('.gallery-slideshow').flexslider({
		controlNav: false,
        directionNav: true,
        slideshow: false,
        slideshowSpeed: 4000
	});

    $('.mobile-nav-button').click(function() {
    	$('.mobile-nav-container').toggle('fast');
    	$('.mobile-nav-button').toggleClass('background-green');
    });

    size();
    $(window).resize( function() {
        size();
    });

}); /* end of as page load scripts */
