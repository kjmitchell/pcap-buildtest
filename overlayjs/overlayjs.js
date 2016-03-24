(function ($) {
  $(function() {
    var $editSection = $('.node-type-catalog-b-sections'),
        $editCatalog = $('.node-type--add-a-catalog'),
        $products = $('#edit-field-products-and-specs-und .form-item-field-products-and-specs-und'),
        currentProduct = $('#edit-title').val(),
        $specs = $('#edit-field-specs-from-products-und'),
        $specsWrapper = $('#edit-field-specs-from-products'),
        $allSpecs = $specs.find('.form-type-checkbox'),
        $editActions = $('#edit-actions'),
        $selectAll = $('#edit-field-specs-from-products .form-item-field-specs-from-products-und > label .form-required'),
        $visibleSpecs,
        $step2Label = $('#edit-field-specs-from-products .form-item-field-specs-from-products-und > label'),
        hasTechnologyChapter = $('#edit-field-add-technology-chapter-und-1').is(':checked');


    //create technology chapter button
    var $selectcontainer = $('<div>').addClass('select-all'),
        $selectbtn = $('<input>').attr('type', 'checkbox').attr('id', 'select-all'),
        $selectLabel = $('<label>').attr('for', 'select-all').html('Select All');
    var $techContainer = $('<div>').addClass('tech-chapter'),
        $techChapterCb = $('<input>').attr('type', 'checkbox').attr('id', 'tech-chapter'),
        $techChapterLabel = $('<label>').attr('for', 'tech-chapter').html('Technology Chapter');
    if(hasTechnologyChapter) {
      $techChapterCb[0].checked = true;
      $techChapterCb.attr('checked', 'checked');
    }
    $techContainer.append($techChapterCb).append($techChapterLabel);
    $selectcontainer.append($selectbtn).append($selectLabel);
    //Append next to Step 2 label the chapter checkbox
    $techContainer.insertAfter($step2Label);
    $selectcontainer.insertAfter($techContainer);

    $('#tech-chapter').bind('change', function (e) {
      var $el = $(this);
      if($el.is(':checked')) {
        $('#edit-field-add-technology-chapter-und-1').click();
      }
      else {
        $('#edit-field-add-technology-chapter-und-0').click();
      }
    });

    $products.bind('click', function (e) {
      var $clickedProduct = $(this);
      if($clickedProduct.hasClass('disabled')) {
        e.preventDefault();
        return false;
      }
      $products.removeClass('active');
      $products.addClass('disabled');

      //The first element is not a product is the clear selection link
      $products.first().removeClass('disabled');

      $(e.currentTarget).addClass('active');
      $(e.currentTarget).removeClass('disabled');
      showElements($(e.currentTarget));
    });

    $allSpecs.find('input[type="checkbox"]').bind('change', function (e) {
      var $cb = $(this);
      if($cb.is(':checked')) {
        $cb.attr('checked', 'checked');
      }
      else {
        $cb.removeAttr('checked');
      }
    });

    //If we are in the edit section modal
    if($editSection.length) {
      var chosenProduct = getCurrentProductElement($products, currentProduct);
      $products.addClass('disabled');

      //The first element is not a product is the clear selection link
      $products.first().removeClass('disabled');

      chosenProduct.removeClass('disabled');
      chosenProduct.addClass('active');
      showElements(chosenProduct, true);
    }

    //select all functionality
    $('#select-all').bind('click', function () {
      var $el = $(this);
      $visibleSpecs = $allSpecs.filter(':visible');
      $visibleSpecs.find('input[type="checkbox"]').each(function (i, o) {
        if($el.hasClass('deselect')) {
          o.checked = false;
          $(o).removeAttr('checked');
          //technology chapter
          $('#tech-chapter')[0].checked = false;
          $('#tech-chapter').removeAttr('checked');
          $('#edit-field-add-technology-chapter-und-0').click();
        }
        else {
          o.checked = true;
          $(o).attr('checked', 'checked');
          //technology chapter
          $('#tech-chapter')[0].checked = true;
          $('#tech-chapter').attr('checked', 'checked');
          $('#edit-field-add-technology-chapter-und-1').click();
        }
      });
      $el.toggleClass('deselect');
    });

    function getCurrentProductElement (products, currentProduct) {
      var chosenProduct;
      products.each(function (i, o) {
        var product = $(o);
        if(product.find('.views-field-title .field-content').html() == currentProduct) {
          chosenProduct = product;
        }
      });
      return chosenProduct;
    }

    function showRelatedSpecs (productspecs) {
      var productSpecsNames = [];
      //filter product specs
      productspecs.each(function (i, spec) { productSpecsNames.push(spec.innerHTML); });

      //Update select all button
      if(!($('#tech-chapter').is(':checked'))) {
        $('#tech-chapter+label').click();
      }
      
      //change select all button if all specs are checked
      if(productSpecsNames.length == productspecs.length && $('#tech-chapter').is(':checked')) {
        $selectAll.toggleClass('deselect');
      }
      //calculate columns
      var numberOfColumns = 3;
      var specsPerColumns = getSpecsPerColumns(productspecs.length, numberOfColumns);
      var orderPerColumns = getOrderPerColumns(specsPerColumns, productspecs.length, numberOfColumns);


      //iterate over product specs and show the checkboxes
      if(productspecs.length) {
        $allSpecs.each(function (i,spec) {
          var $spec = $(spec),
              specTitle = $spec.find('.views-field-title .field-content').html();
          if(productSpecsNames.indexOf(specTitle) < 0) {
            $spec.hide();
          }
        });
        $specs.css({ 'display': 'flex' });
      }
      else {
        $products.removeClass('disabled');
        $specsWrapper.hide();
        $editActions.hide();
        $specs.css({ 'display': 'none' });
      }

      //Order elements numerically and alphabetically from top to bottom
      var column = 0;
      $specs.find('> .form-type-checkbox').filter(':visible').each(function (i, spec) {
        $(spec).attr('style','order:'+orderPerColumns[column][0]);
        orderPerColumns[column].shift();
        if(!orderPerColumns[column].length) {
          column = column+1;
        }
      });

    }

    function showElements (product, edit) {
      var $productSpecs = product.find('.views-field-field-applicable-products li');
      //change title name with the product name
      if(!edit) {
      //uncheck all specs
        $allSpecs.find('input').each(function(i,o){
          o.checked = false;
          $(o).removeAttr('checked');
        });
        $('#edit-title').val(product.find('label .views-field-title .field-content').html());
      }
      //show specs container
      $specsWrapper.show();
      //show all specs checkboxes
      $allSpecs.show();
      //show button
      $editActions.show();
      //show related product specs
      showRelatedSpecs($productSpecs);
    }

    function getSpecsPerColumns (total, numberOfColumns) {
      var remaining = total%numberOfColumns,
          elementsPerColumn = Math.floor(total/numberOfColumns),
          columns = [];
      for (var i = 0; i <= (numberOfColumns-1); i++) {
        if(remaining) {
          columns[i] = elementsPerColumn+1;
        }else {
          columns[i] = elementsPerColumn;
        }
        remaining = remaining > 0 ? remaining-1 : 0;
      };
      return columns;
    }

    function getOrderPerColumns (specsPerColumns, total, numberOfColumns) {
      var order = [];
      for (var i = 0; i <= (total-1); i++) {
        var position = i+1,
            arrayPosition = (position%numberOfColumns == 0 ? 3 : position%numberOfColumns)-1;
        if(typeof(order[arrayPosition]) == 'undefined') { order[arrayPosition] = [] }
        order[arrayPosition].push(position);
      };
      return order;
    }

  });

})(jQuery);