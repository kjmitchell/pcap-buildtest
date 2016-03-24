(function ($) {
  var UI = {
    init: function(){
      UI.setDropdown();
      UI.initPrint();

      //list modal elements
      var targetElement = $("[data-modal]"),
          catalogProducts = $('.overlay .form-item-field-products-and-specs-und > input'),
          $catalogCovers = $('.catalog-covers'),
          $techCovers = $('.technology-covers');

      //Redirect when checkbox value change
      $catalogCovers.on('change', redirectCoverCatalog);
      $techCovers.on('change', redirectTechCatalog);

      //show the modal
      targetElement.on('click', $.proxy(function(e){
        UI.showModal(e.target);
      }, UI));

      //Processing to show show selected product specs
      catalogProducts.on('change', UI.showRelatedSpecs);

    },

    setDropdown: function(){
      $('.dropdown-toggle').on('click', function(e){
        e.stopPropagation();
        var $this = $(this),
            menu = $this.closest('.dropdown').find('.dropdown-menu');
        menu.toggleClass('active').toggle();
      });

      $('body').on('click', function(){
        $('.dropdown-menu').hide();
      });
    },

    showModal: function(e){
      var $this     = $(e);

      this.theModal = $($this.data('target'));

      var $close    = this.theModal.find('.close-modal');

      this.theModal.removeClass('hide');

      this.resizeModal();

      $(window).on('resize', $.proxy(UI.resizeModal, UI));

      $close.on('click', $.proxy(function(e){
        this.theModal.addClass('hide');
        return false;
      }, UI));

    },

    resizeModal: function() {
      // Resize modal based on browser viewport area
      winH = $(window).height();
      this.theModal.height(winH);
      var modalContent = this.theModal.find('.modal_content'),
          mcH = modalContent.height(),
          marginTop = (winH / 2) - (mcH / 2),
          newTop = $(document).scrollTop();

      modalContent.css({ 'margin-top': marginTop });

    },

    initPrint: function () {
      var prints = $('[data-print-pdf]');
      prints.each(function (i, o) {
        $(o).on('click', function (e) {
          var pdfUrl = $(e.currentTarget).attr('data-print-pdf');
          printPDF(pdfUrl);
        });
      });
    }
  }

  function redirectTechCatalog (e) {
    var params = '',
        $input = $(e.currentTarget),
        params = $input.is(':checked') ? '&technology=1' : '&technology=0',
        url = $input.attr('data-service');
    window.location = url + params;
  }

  function redirectCoverCatalog (e) {
    var params = '',
        url = $(e.currentTarget).attr('data-service');
    $('.catalog-covers').each(function (i, o) {
      var cb = $(o);
      params += '&' + cb.val() + '=' + (cb.is(':checked') ? '1' : '0');
      console.log(cb);
    })
    window.location = url + params; 
    //$(o).attr('checked','');
    console.log('url: '+ url + ' params: ' + params);
  }

  function printPDF (url) {
    var newWin = window.open(url, '_blank', 'width=1250,height=650');
    newWin.print();
  }
  
  $(document).ready(UI.init);

})(jq14);


jQuery(document).ready(function() {
  jQuery('.catalog-section img').attr('src',function(i,e){
      return jQuery(this).attr('src').replace("athlonix-motor.png","athlonix-motor-no-logo.png");
  });
});


