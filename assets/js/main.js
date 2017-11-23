$(function() {
    var catalog = {};

    $('.filters [aria-controls] a[data-filter]').each(function() {

        var filter = $(this).data('filter');
        var list = $('#' + $(this).closest('[aria-controls]').attr('aria-controls'));
        var elements = list.find('> ' + filter);

        if(undefined === catalog[filter]) catalog[filter] = [];

        catalog[filter] = elements;

    });

    $('.filters [aria-controls] a[data-filter]').click(function(e) {

        var filter = $(this).data('filter');
        var list = $('#' + $(this).closest('[aria-controls]').attr('aria-controls'));
        list.children().detach();
        list.append(catalog[filter]);
    });

    $('a.screenreader-only').click(function() {
        $(this.hash).focus();
    });

    $('a.menu-button').click(function(e) {
        e.preventDefault();
        if($(this).attr('aria-expanded') === 'true') {
          $(this).attr('aria-expanded', false);
        } else {
          $(this).attr('aria-expanded', true);
          $('.site-nav').first().focus();
        }
    })

});

