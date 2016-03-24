		// global declarations

var mobileCSS = jQuery('#responsive-stylesheet').attr('href');




		// functions


// simply show any distributor
function showDistributors() {
	jQuery('.distributor').each(function() {
		jQuery(this).show();
	});
}


function adjustSlideControls() {
	if(badIE != true && IE8 != true) {
	var newPos;
	jQuery('#homepage-slideshow img:visible, #block-views-front-page-slide-show-block img:visible').each(function() {
		// we're cycling through each image, because jquery says the height of hidden/display:none elements
		// is zero, which breaks our height adjustments

			newPos = jQuery(this).height();


	});
	// while a slide is transitioning, sometimes an image size can be 0
	if(newPos == 0) {
		// do nothing. keep the same size; we've encountered a resizing or throttle error.
	} else {
		jQuery('.views-slideshow-controls-bottom').css('top',newPos + 'px');
		jQuery('#homepage-slideshow, #block-views-front-page-slide-show-block').css('height', newPos + 'px');
	}
}
}


//



// change between desktop and mobile
function toggleVersion(el) {
	if(el == 'd') {
		jQuery('#responsive-stylesheet').remove();
		jQuery('body').addClass('forced');  // the user has clicked desktop; force to 960 width.
	} else {
		jQuery('body').removeClass('forced');
		jQuery('head').append('<link type="text/css" id="responsive-stylesheet" rel="stylesheet" href="' + mobileCSS + '"/>');

	}

	jQuery('#block-block-5 .desktop, #block-block-5 .mobile').toggleClass('active');
	adjustSlideControls(); // the document size changed, resize the slide show.
	jQuery('#block-block-5').show(); // by default, we hide the mobile|desktop switch.  If the user has clicked on the mobile|desktop switch, they're on mobile, so we show it so users can navigate back.
}


// convert anything with a class of convert.  el is either "us" or "metric"
function convertValues(el) {
	var targetSystem = el;

	if(targetSystem == 'us') {
		jQuery('.convert').each(function() {
			if(jQuery(this).hasClass('metric')) {
				jQuery(this).hide();
			}
			else if(jQuery(this).hasClass('us')) {
				jQuery(this).show();
			}
		});
	} else if(targetSystem == 'metric') {
		jQuery('.convert').each(function() {
			if(jQuery(this).hasClass('us')) {
				jQuery(this).hide();
			} else if(jQuery(this).hasClass('metric')) {
				jQuery(this).show();
			}
		});
	}
}


// bring the CAD and Spec Sheet files into the product comparison table
function condenseTable(el) {
	var str = el.attr('href');
	var n = str.lastIndexOf('/');
	var thisHref = str.substring(n+1);

	var appendTo = el.attr('class');

	jQuery('.views-field-field-product-group a').each(function() {
		var str2 = jQuery(this).attr('href');
		var x = str2.lastIndexOf('/');
		var testAgainst = str2.substring(x+1);
		if(testAgainst == thisHref) {
			el.appendTo(jQuery(this).parents('tr').find('td span.' + appendTo + ''));
		}
	});

}

function styleIndustries() {
	var n = 0;
	jQuery('.industry-landing-item').each(function() {
		if(n < 3) {
			jQuery(this).addClass('first-row');
		}
		if(n % 3 == 0) {
			jQuery(this).addClass('first');
		}
		if((n + 1) % 3 == 0) {
			jQuery(this).addClass('last');
		}
		n++;
	});

}


		// execution


jQuery(document).ready(function() {


		jQuery('.view-id-news .description a').each(function() {
			if(jQuery(this).attr('href').indexOf('http') >= -1) {
				jQuery(this).attr('target','_blank');
			}
		});



	// revisit this next week; possibly in PHP
	if(jQuery('body').hasClass('node-type-product-group') || jQuery('body').hasClass('node-type-related-product-group')) {
		jQuery('.line-item .spec-relocate, .line-item .dxf-relocate').each(function() {
			condenseTable(jQuery(this));
		});
}

	// work around for drupal annoyance
	if(jQuery('#content_lower_move').length >= 0) {
			jQuery('#content_lower').appendTo('#content_lower_move');
	}

	jQuery('.button#metric').addClass('active');

	jQuery('.button#us, .button#metric').click(function() {
		var theSystem = jQuery(this).attr('id');
		convertValues(theSystem);
		jQuery('.button#us, .button#metric').removeClass('active');
		jQuery('.button#'+theSystem+'').each(function() {
			jQuery(this).addClass('active');
		});
	});

	jQuery('#header .mobile_menu, .mobile-left .nolink').click(function() {
		jQuery('#mobile_menu .mobile-left .menu').toggleClass('active');
		jQuery('#mobile_menu .mobile-right .menu').removeClass('active');
	});

	jQuery('#header .contact, .mobile-right .nolink').click(function() {
		jQuery('#mobile_menu .mobile-right .menu').toggleClass('active');
		jQuery('#mobile_menu .mobile-left .menu').removeClass('active');
	});


	jQuery('#block-block-5 span').click(function() {
		var theVersion;
		if(jQuery(this).hasClass('mobile')) {
			theVersion = 'm';
			toggleVersion(theVersion);
		} else {
			theVersion = 'd';
			toggleVersion(theVersion);
		}
	});


	// we fire these off because the images in the slideshow need to be absolute positioned but dynamically sized,
	// because of this, the position of the slide controls, which also needs to be absolute, needs to adjust
	// dynamically, which is not easily achieved with css only.

	jQuery(window).resize(function() {
		adjustSlideControls();
	});

	jQuery('#views-exposed-form-search-results-page input.form-submit').val('');


	// some functions to control hiding/showing textfield form labels
	jQuery('.form-item-search-block-form label').each(function() {
		if(jQuery(this).parents('div').children('input').val() != '') {
			jQuery(this).hide();
		}
	});

	jQuery('#block-views-exp-search-results-page label').each(function() {
		if(jQuery(this).parents('div').find('input').val() != '') {
			jQuery(this).hide();
		}
	});

	jQuery('#block-views-exp-search-results-page input, .form-item-search-block-form input').focus(function() {
		jQuery(this).parents('div').children('label').fadeOut(200);
	});

	jQuery('#block-views-exp-search-results-page input, .form-item-search-block-form input').blur(function() {
		if(jQuery(this).val() == '') {
			jQuery(this).parents('div').children('label').fadeIn(200);
		}
	});

	// style up the industry|solution landing buckets
	if(jQuery('.industry-landing-item').length >= -1) {
		styleIndustries();
	}




	// on doc ready, detect if we're on a page with the distributor locator.
	//if(jQuery('.distributor').length >= 0) {
	//	jQuery(document).ajaxComplete(function() {
			// show the distributors the first time ajax fires.
			// in css, distributors are hidden so we initially get no results until something is selected.
	//		showDistributors();
	//		jQuery("#edit-field-region-value option[value='All']").text('- All Distributors -');
	//	});
	//}

	// change drupal's default - Any - to "- All Distributors -"

	// for mobile
	//jQuery("#edit-field-region-value option[value='All']").bind('touch mousedown', function(e) {
	//	showDistributors();
	//});




	jQuery('body.node-type-product-group #content .block-menu-block h2').bind('touch mousedown', function(e) {

		if(jQuery('body.node-type-product-group #content .block-menu-block ul.menu').hasClass('active')) {
			jQuery('body.node-type-product-group #content .block-menu-block ul.menu').removeClass('active');

		} else {
			jQuery('body.node-type-product-group #content .block-menu-block ul.menu').addClass('active');

		}

	});

});

jQuery(window).load(function() {
	adjustSlideControls();
});

jQuery(document).ready(function() {

});













function slideVideo(el) {

	if(el.hasClass('vid-next')) {
		jQuery('.video-thumb.on:nth-child(1)').fadeOut(500);
		setTimeout(function () {
			jQuery('.video-thumb.on:nth-child(1)').appendTo('.video-thumb-layer-inner');
			jQuery('.video-thumb.on:last-child').fadeIn();
		}, 500);


	} else {
		jQuery('.video-thumb.on:last-child').fadeOut(500);
		setTimeout(function () {
			jQuery('.video-thumb.on:last-child').prependTo('.video-thumb-layer-inner');
			jQuery('.video-thumb.on:first-child').fadeIn();
		}, 500);
	}
}




function filterVideo(el) {
	jQuery('.video-filter span.active').removeClass('active');
	el.addClass('active');
	var targetType = el.attr('value');
	jQuery('.video-thumb').each(function() {
		jQuery(this).removeClass('on');
		jQuery(this).attr('style','');
		if(targetType == 'all') {
			jQuery(this).appendTo('.video-thumb-layer-inner');
			jQuery(this).addClass('on');
		} else {
			var thisType = jQuery(this).attr('type');
			//if(thisType == targetType) {
			if(thisType.indexOf(targetType) >= 0) {
				jQuery(this).appendTo('.video-thumb-layer-inner');
				jQuery(this).addClass('on');
			} else {
				jQuery(this).removeClass('on');
				jQuery(this).appendTo('#staging-area');
			}
		}
	});
	jQuery('.video-thumb-layer-inner .yes').prependTo('.video-thumb-layer-inner');
	jQuery('.video-thumb-layer-inner .yes.all').prependTo('.video-thumb-layer-inner');
}

function changeVideo(el) {
	jQuery('.field-name-field-video-embed-code').find('iframe').remove();
	el.clone().appendTo(jQuery('.field-name-field-video-embed-code .field-item.even'));

}

jQuery(document).ready(function() {
	jQuery('.video-filter span').click(function() {
		filterVideo(jQuery(this));
		jQuery('.video-thumb-layer-inner .video-thumb:nth-child(1)').trigger('click');
	});

	jQuery('.vid-control').click(function() {
		slideVideo(jQuery(this));
	});

	jQuery('.video-thumb').click(function() {
		var theVideo = jQuery(this).find('iframe');
		changeVideo(theVideo);
	});

	jQuery('.quick-downloads a').each(function() {
		jQuery(this).attr('target','_blank');
	});




});