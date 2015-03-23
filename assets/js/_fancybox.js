var fancyboxTemplates = {
    wrap     : '<div class="fancybox-wrap" tabIndex="-1"><div class="fancybox-skin"><div class="fancybox-outer"><div class="fancybox-inner"></div></div></div></div>',
        image    : '<img class="fancybox-image" src="{href}" alt="" />',
        iframe   : '<iframe id="fancybox-frame{rnd}" name="fancybox-frame{rnd}" class="fancybox-iframe" frameborder="0" vspace="0" hspace="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>',
        error    : '<p class="fancybox-error">The requested content cannot be loaded.<br/>Please try again later.</p>',
        closeBtn : '<a title="Close" class="fancybox-item fancybox-close" href="javascript:;"><span  class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-times fa-stack-1x fa-inverse"></i></span></a>',
        next     : '<a title="Next" class="fancybox-nav fancybox-next" href="javascript:;"><span  class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-chevron-right fa-stack-1x fa-inverse"></span></a>',
        prev     : '<a title="Previous" class="fancybox-nav fancybox-prev" href="javascript:;"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-chevron-left fa-stack-1x fa-inverse"></span></a>'
}

function enableFancybox()
{
    //Add the 'zoom' class to image links
    $('a[href*=".png"], a[href*=".gif"], a[href*=".jpeg"], a[href*=".jpg"]').each(function() {
        // Prevent adding zoom class to query-string image links
        if (this.href.indexOf('?') < 0 && !$(this).hasClass("thumbReplace")) {
            $(this).addClass('zoom');
        }
    });

    // enable the lightbox
    $('a.zoom').fancybox({
        padding : 0,
        openEffect  : 'elastic',
        helpers:  {
            title:  null
        },
        tpl: fancyboxTemplates
    });
}