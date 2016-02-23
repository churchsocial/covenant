//= include jquery.js
//= include jquery.fitvids.js

$(function()
{
    // Configure responsive videos
    $('#wysiwyg').fitVids({
        customSelector: "iframe[src*='ustream.tv'], iframe[src*='livestream.com']"
    });

    // Automatically line up menu and content columns
    setInterval(function()
    {
        $('#content').css(
        {
            'min-height': ($('#header').height()) + 'px'
        });

    }, 100);

    // Setup mobile menu
    $('#info .menu').click(function(event)
    {
        // Prevent default browser behavior
        event.preventDefault();

        // Cache menu selector
        var menu = $('#menu');

        // Show/hide menu on click
        if (menu.is(':visible'))
        {
            menu.removeClass('show');
        }
        else
        {
            menu.addClass('show').css(
            {
                height: $('body').height()
            });
        }
    });
});