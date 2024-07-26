jQuery(document).ready(function($){
    var timeout;
 
    // Open dropdown on mouse enter
    $('.mega-drop').on('mouseenter', function(event){
        event.preventDefault();
        clearTimeout(timeout);
        toggleNav(true);
        $('body').addClass('body-blur');
    });
 
    // Close dropdown on mouse leave
    $('.mega-drop, .cd-dropdown').on('mouseleave', function(event){
        event.preventDefault();
        timeout = setTimeout(function() {
            if (!$('.mega-drop:hover').length && !$('.cd-dropdown:hover').length) {
                toggleNav(false);
                $('body').removeClass('body-blur');
            }
        }, 50); // Delay to prevent flickering
    });
 
    function toggleNav(navIsVisible) {
        $('.cd-dropdown').toggleClass('dropdown-is-active', navIsVisible);
        $('.cd-dropdown').toggleClass('dropdown-is-hidden', !navIsVisible);
        $('.mega-drop').toggleClass('dropdown-is-active', navIsVisible);
         
       
            if (!navIsVisible) {
            $('.cd-dropdown').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
                $('.has-children ul').addClass('is-hidden');
                $('.is-active').removeClass('is-active');
            });
        } else {
            $('#active-tab').addClass('is-active');
            $('.cd-dropdown-content > .has-children:first-child > ul').css('visibility', 'visible').addClass('fade-in').removeClass('is-hidden');
        }
    }
 
    var submenuDirection = !$('.cd-dropdown-wrapper').hasClass('open-to-left') ? 'right' : 'left';
    $('.cd-dropdown-content').menuAim({
        activate: function(row) {
            $(row).children().addClass('is-active').removeClass('fade-out');
            if ($('.cd-dropdown-content .fade-in').length == 0) {
                $(row).children('ul').addClass('fade-in');
            }
        },
        deactivate: function(row) {
            $(row).children().removeClass('is-active');
            if ($('li.has-children:hover').length == 0 || $('li.has-children:hover').is($(row))) {
                $('.cd-dropdown-content').find('.fade-in').removeClass('fade-in');
                $(row).children('ul').addClass('fade-out');
            }
        },
        exitMenu: function() {
            $('.cd-dropdown-content').find('.is-active').removeClass('is-active');
            return true;
        },
        submenuDirection: submenuDirection,
    });
 
    // IE9 placeholder fallback
    // if (!Modernizr.input.placeholder) {
    //     $('[placeholder]').focus(function() {
    //         var input = $(this);
    //         if (input.val() == input.attr('placeholder')) {
    //             input.val('');
    //         }
    //     }).blur(function() {
    //         var input = $(this);
    //         if (input.val() == '' || input.val() == input.attr('placeholder')) {
    //             input.val(input.attr('placeholder'));
    //         }
    //     }).blur();
    //     $('[placeholder]').parents('form').submit(function() {
    //         $(this).find('[placeholder]').each(function() {
    //             var input = $(this);
    //             if (input.val() == input.attr('placeholder')) {
    //                 input.val('');
    //             }
    //         });
    //     });
    // }
});