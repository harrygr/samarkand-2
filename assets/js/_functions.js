function isMobile()
{
    var isMob = window.matchMedia("only screen and (max-width: 760px)");
    return isMob.matches;
}

function addBootstrapClassToPagination()
{
    $('ul.page-numbers .current').parent().addClass('active');
}

function enableParallax()
{
    $(function(){

        // Parallax Effect
        var parallaxSettings = {
            enabled: true,
            // Parallax factor (lower = more intense, higher = less intense).
            scrollFactor: 10
        };

        if (!isMobile())
        {
            var $header = $('#header');
            var $window = $(window);
            $window.scroll(function () {
                $header.css('background-position', 'left ' + (-1 * (parseInt($window.scrollTop()) / parallaxSettings.scrollFactor)) + 'px');
            });
        }
    });
}