/**
 * Main Javascript.
 * This file is for who want to make this theme as a new parent theme and you are ready to code your js here.
 */

// Initialize Popover
jQuery(document).ready(function($){
    $('[data-toggle="popover"]').popover()
})

// Popover on page load

jQuery(function($) {
    $("#pload-pop").popover('show');
    $("#pload-pop").on('click', function () {
        $('#pload-pop').popover('destroy');
    });
});