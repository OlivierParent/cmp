(function () { 'use strict';
    jQuery(document).ready(whenReady);
    function whenReady($) {
        // Table of Contents
        var $toc = $('#table-of-contents'),
            $headings = $('.content').children('h2, h3, hr'),
            $dropdownMenu = $toc.children('.dropdown-menu');
        if ($headings.length) {
            $headings.each(function () {
                var $heading = $(this),
                    tagName = $heading.prop('tagName').toLowerCase()
                if (tagName === 'hr') {
                    var $dropdownItem = $('<div>')
                        .addClass('dropdown-divider');
                } else {
                    var $dropdownItem = $('<a>')
                        .attr('href', '#' + $heading.attr('id'));
                    var $headingLink = $dropdownItem.clone().addClass('heading-link fa fa-bookmark-o');
                    $dropdownItem
                        .addClass('dropdown-item')
                        .attr('data-counter', tagName + '-counter')
                        .text($heading.text());
                    if (tagName === 'h2') {
                        $dropdownItem.css('font-weight', 'bold');
                    }
                    $heading.prepend($headingLink);
                }
                $dropdownMenu.append($dropdownItem);
            });
        } else {
            $toc.hide();
        }

        // Sidebar
        var $sideBar = $('aside.list-group'),
            $sideBarItems = $sideBar.children('.list-group-item');
        if ($sideBarItems.length <= 1) {
            $sideBar.hide();
        }

        // Highlighter Language Tag
        var $highlights = $('.highlight > pre > code');
        $highlights.each(function () {
            $(this).parents('.highlight').addClass('language-' + $(this).data('lang'));
        });

        // Timeline
        var $timeline = $('.timeline-content[data-date]');
        $timeline.each(function () {
            moment.lang($('html').attr('lang'));
            var date = moment($(this).data('date')).format('dd D MMM YYYY');
            var element  = $('<div>').addClass('timeline-date').text(date);
            $(this).after(element);
        });
    }
})();