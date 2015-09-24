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
                    var $bookMarkIcon = $('<span>')
                            .addClass('fa fa-bookmark-o'),
                        $dropdownItem = $('<a>')
                            .attr('href', '#' + $heading.attr('id'))
                            .prepend($bookMarkIcon),
                        $headingLink = $dropdownItem
                            .clone()
                            .addClass('heading-link');
                    $dropdownItem
                        .addClass('dropdown-item')
                        .attr('data-counter', tagName + '-counter')
                        .text($heading.text());
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
    }
})();


