jQuery(document).ready(function($) {

    $( '.wp-travel-sticky-content').theiaStickySidebar({
        additionalMarginTop: 30
    });

	$('#wptravel-block-video-button').magnificPopup({
		type: 'iframe',
		mainClass: 'mfp-fade',
		preloader: true,
	});
	

    $('.open-all-itinerary-link').click(function (e) {
		e.preventDefault();
		var parent = '#wptravel-block-trip-outline';
		$(parent + ' .panel-title a').removeClass('collapsed').attr({ 'aria-expanded': 'true' });
		$(parent + ' .panel-collapse').addClass('collapse in').css('height', 'auto');
		$(this).hide();
		$(parent + ' .close-all-itinerary-link').show();
		$(parent + ' #tab-accordion .panel-collapse').css('height', 'auto');
	});

	// Close All accordion.
	$('.close-all-itinerary-link').click(function (e) {
		var parent = '#wptravel-block-trip-outline';
		e.preventDefault();
		$(parent + ' .panel-title a').addClass('collapsed').attr({ 'aria-expanded': 'false' });
		$(parent + ' .panel-collapse').removeClass('in').addClass('collapse');
		$(this).hide();
		$(parent + ' .open-all-itinerary-link').show();
	});

    $('.open-all-faq-link').click(function (e) {
		e.preventDefault();
		var parent = '#faq.faq';
		$(parent + ' .panel-title a').removeClass('collapsed').attr({ 'aria-expanded': 'true' });
		$(parent + ' .panel-collapse').addClass('collapse in').css('height', 'auto');
		$(this).hide();
		$(parent + ' .close-all-faq-link').show();
		$(parent + ' #tab-accordion .panel-collapse').css('height', 'auto');
	});

	// Close All accordion.
	$('.close-all-faq-link').click(function (e) {
		var parent = '#faq.faq';
		e.preventDefault();
		$(parent + ' .panel-title a').addClass('collapsed').attr({ 'aria-expanded': 'false' });
		$(parent + ' .panel-collapse').removeClass('in').addClass('collapse');
		$(this).hide();
		$(parent + ' .open-all-faq-link').show();
	});


            
	var element = document.querySelector(".wptravel-book-your-trips.wp-travel-booknow-btns");
	
	if( element !== null ){
		element.classList.add("wp-block-button__link");
	}
	



});