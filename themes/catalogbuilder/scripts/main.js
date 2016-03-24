var UI = {
    init: function(){
        UI.setDropdown();

        //list modal elements
        var targetElement = $("[data-modal]");
        //show the modal
        targetElement.on('click', $.proxy(function(e){
            UI.showModal(e.target);
        }, UI));

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

    }
}

$(document).ready(UI.init);
