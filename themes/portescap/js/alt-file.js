if(badIE == true) {
	// if IE7, give EVERYTHING z-index, as suggested here: http://www.vancelucas.com/blog/fixing-ie7-z-index-issues-with-jquery/
	// badIE is set in html.tpl.php
	// resolves menus not correctly overlapping underlying body elements
	jQuery(function() {
		var zIndexNumber = 1000;
		jQuery('#header div, #header_upper div').each(function() {
			jQuery(this).css('zIndex', zIndexNumber);
			zIndexNumber -= 10;
		});		
});

}
jQuery(document).ready(function() {
	jQuery('.custom-menu').css('width','142px');
	//jQuery('.custom-menu').css('height','300px');
	if(badIE == true){
		//jQuery('#header_upper #block-block-10').mouseover(function() {
			//jQuery('#block-block-10 .custom-menu').show();
		//});
		//jQuery(document).click(function() {
			//jQuery('#block-block-10 .custom-menu').hide();
		//});
	}
});

// function to fix an IE8/chrome ajax submission in views
// issue was that hitting <return> takes the user to the home page.
// script found at: https://drupal.org/node/1543752

(function ($) {
  Drupal.behaviors.ViewsExposedFormFix = {
    attach: function() {
      if (Drupal.settings && Drupal.settings.views && Drupal.settings.views.ajaxViews) {
        $.each(Drupal.settings.views.ajaxViews, function(i, settings) {
          // This matches the logic in Drupal.views.ajaxView.prototype.attachExposedFormAjax.
          var exposed_form = $('form#views-exposed-form-'+ settings.view_name.replace(/_/g, '-') + '-' + settings.view_display_id.replace(/_/g, '-'));
          exposed_form.once('views-exposed-form-fix', function() {
            var button = $('input[type=submit], button[type=submit], input[type=image]', exposed_form);
            button = button[0];
            // This will catch browsers that don't activate the submit button when pressing enter in the form.
            exposed_form.submit(function (event) {
              button.click();
              event.preventDefault();
              return false;
            });
          })
        });
      }
    }
  };
})(jQuery);




		// functions

function controlFaq(el) {
	el.siblings('.answer').toggleClass('inactive');
	el.find('.control').toggleClass('expand');
}



// split the label (in parenthesis) and move it into a new column.
function addNewColumn(el) {
	var theElem = el.children('th:nth-child(1)');
	var theOldString = theElem.html();
	var splitOldString = theOldString.split('{%|%}');

	//var splitOldString = theOldString.split('(');
	var theNewString = '(' + splitOldString[1];
	if(theNewString == '(undefined') {
		theNewString = '';
	}
	theNewString = theNewString.replace('(','');
	theNewString = theNewString.replace(')','');
	if(theElem.hasClass('convert') && theElem.hasClass('us')) {
		theElem.after('<th class="convert us unit new-col">' + theNewString + '</th>');
		theElem.html(splitOldString[0]);
	} else if(theElem.hasClass('convert') && theElem.hasClass('metric')) {
		theElem.after('<th class="convert metric unit new-col">' + theNewString + '</th>');
		theElem.html(splitOldString[0]);
	} else {
		theElem.after('<th class="unit" new-col>' + theNewString + '</th>');
		theElem.html(splitOldString[0]);
	}
}


// search through product tables and remove any lines which are blank
// this is a fall back solution - views should be eliminating empty results.
function scrubTable() {
	var scrubMe = 0;
	var cellNum = 0;
	jQuery('.region-product-page-specs .view-brush-dc-product-comparison table tr').each(function() {

// does not work in IE8 or 7
//		jQuery(this).children('td').each(function() {
//			cellNum++;
//			if(!(jQuery(this).text().trim().length )) {
//				scrubMe++;
//			}
//
//		});
		jQuery(this).children('td').each(function() {
			cellNum++;
			if(jQuery.trim(jQuery(this).text()) == ''){
				scrubMe++;
			}

		});
		if(scrubMe >= cellNum && scrubMe != 0) {
			jQuery(this).hide();
		}
		cellNum = 0;
		scrubMe = 0;
		addNewColumn(jQuery(this));
	});
}

		// exeuction









// applicable drop-downs:
// #edit-field-region-value (main region, always visible)
// #edit-field-sub-region-asia-value (asia sub region)
// #edit-field-sub-region-canada-value (canadian provinces)
// #edit-field-sub-region-europe-value (european countries)
// #edit-field-sub-region-usa-value (usa states/terr.)

function removeSelections(el) {
	el.find('option').each(function() {
		if(jQuery(this).attr('value') == 'All') {
			jQuery(this).attr('selected','selected');
		} else {
			jQuery(this).removeAttr('selected');
		}
	});
}

function runFiltering() {
	if(jQuery('#edit-field-region-value option[selected="selected"]').val() == 'Americas') {
		removeSelections(jQuery('#edit-field-sub-region-europe-value-wrapper, #edit-field-sub-region-canada-value-wrapper, #edit-field-sub-region-asia-value-wrapper'));
		jQuery('#edit-field-sub-region-usa-value-wrapper, #edit-field-sub-region-europe-value-wrapper, #edit-field-sub-region-canada-value-wrapper, #edit-field-sub-region-asia-value-wrapper').hide();
		jQuery('#edit-field-sub-region-usa-value-wrapper').show();
	}
	if(jQuery('#edit-field-region-value option[selected="selected"]').val() == 'Canada') {
		removeSelections(jQuery('#edit-field-sub-region-usa-value-wrapper, #edit-field-sub-region-europe-value-wrapper, #edit-field-sub-region-asia-value-wrapper'));
		jQuery('#edit-field-sub-region-usa-value-wrapper, #edit-field-sub-region-europe-value-wrapper, #edit-field-sub-region-canada-value-wrapper, #edit-field-sub-region-asia-value-wrapper').hide();
		jQuery('#edit-field-sub-region-canada-value-wrapper').show();
	}
	if(jQuery('#edit-field-region-value option[selected="selected"]').val() == 'SouthAm') {
		removeSelections(jQuery('#edit-field-sub-region-usa-value-wrapper, #edit-field-sub-region-europe-value-wrapper, #edit-field-sub-region-canada-value-wrapper, #edit-field-sub-region-asia-value-wrapper'));
		jQuery('#edit-field-sub-region-usa-value-wrapper, #edit-field-sub-region-europe-value-wrapper, #edit-field-sub-region-canada-value-wrapper, #edit-field-sub-region-asia-value-wrapper').hide();
	}
	if(jQuery('#edit-field-region-value option[selected="selected"]').val() == 'Europe') {
		removeSelections(jQuery('#edit-field-sub-region-usa-value-wrapper, #edit-field-sub-region-canada-value-wrapper, #edit-field-sub-region-asia-value-wrapper'));
		jQuery('#edit-field-sub-region-usa-value-wrapper, #edit-field-sub-region-europe-value-wrapper, #edit-field-sub-region-canada-value-wrapper, #edit-field-sub-region-asia-value-wrapper').hide();
		jQuery('#edit-field-sub-region-europe-value-wrapper').show();
	}
	if(jQuery('#edit-field-region-value option[selected="selected"]').val() == 'Asia') {
		removeSelections(jQuery('#edit-field-sub-region-usa-value-wrapper, #edit-field-sub-region-europe-value-wrapper, #edit-field-sub-region-canada-value-wrapper'));
		jQuery('#edit-field-sub-region-usa-value-wrapper, #edit-field-sub-region-europe-value-wrapper, #edit-field-sub-region-canada-value-wrapper, #edit-field-sub-region-asia-value-wrapper').hide();
		jQuery('#edit-field-sub-region-asia-value-wrapper').show();
	}
	if(jQuery('#edit-field-region-value option[selected="selected"]').val() == 'All') {
		removeSelections(jQuery('#edit-field-sub-region-usa-value-wrapper, #edit-field-sub-region-europe-value-wrapper, #edit-field-sub-region-canada-value-wrapper, #edit-field-sub-region-asia-value-wrapper'));
		//jQuery('#edit-field-sub-region-usa-value-wrapper, #edit-field-sub-region-europe-value-wrapper, #edit-field-sub-region-canada-value-wrapper, #edit-field-sub-region-asia-value-wrapper').hide();
	}

}


//jQuery(document).ready(function() {
//	if(jQuery('.view-distributor-locator').length >= -1) {
//		jQuery('#edit-field-sub-region-usa-value-wrapper, #edit-field-sub-region-europe-value-wrapper, #edit-field-sub-region-canada-value-wrapper, #edit-field-sub-region-asia-value-wrapper').hide();
//		jQuery(document).ajaxStart(function() {
//			runFiltering();
//		});
//	}
//
//});


jQuery(document).ready(function() {

	if(jQuery('body').hasClass('node-type-individual-product')) {
		scrubTable();
	}

	jQuery('.question').click(function() {
		var theQuestion = jQuery(this);
		controlFaq(theQuestion);
	});


});