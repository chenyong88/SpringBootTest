$(function()
{
    var screenHeight = $(window).height();
    var top          = $('#companyTreemap').offset().top;
    $('#companyTreemap').css('height', screenHeight - top);

    $('.manageDept').click(function()
    {
        var href = $(this).prop('href');
        var app  = '';
        if(href.indexOf('/sys/') != -1) app = 'superadmin';

        if(app != '' && $(this).data('toggle') == undefined)
        {
            $.openEntry(app, href);
            return false;
        }
    });

    initTreemap();
})

function initTreemap()
{
    /* Initial treemap and get instance. */
    var treemap = $('#companyTreemap').treemap(
    {
        afterRender: function()
        {
            this.delayDrawLines(1000);
        }
    }).data('zui.treemap');

    /* Get max level of treemap. */
    var maxLevel = treemap.maxLevel;

    /* Get level menu. */
    var $toggleMenu = $('#treemapLevelMenu');

    /* Append options to level menu. */
    for (var i = 1; i <= maxLevel; ++i) 
    {
        $toggleMenu.append('<li><a href="###" data-level="' + i + '">' + v.levelFormat.replace('%level%', i) + '</a></li>');
    }

    /* Bind click event to level menu. */
    $toggleMenu.on('click', 'a', function () 
    {
        /* Get level of clicked option. */
        var clickLevel = $(this).data('level');

        /* Toggle level by showLevel(level) method of treemap. */
        treemap.showLevel(clickLevel);
    });
}
