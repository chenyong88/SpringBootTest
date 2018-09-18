$(function()
{
    $('#bottomRightBar .searchBtn').click(function()
    {
        var words = $('#bottomRightBar #words').val();
        if(!$.trim(words)) return false;

        var link = createLink('sys.my', 'search') + (config.requestType == 'GET' ? '&' : '?') + 'words=' + words;
        $('#searchModal').show().animate({width: '30%'}).load(link, function(){fixSearchPanel();});
        return false;
    });

    $('#bottomRightBar #words').focus(function()
    {
        $(this).val('');
    });
})

/**
 * Fix search panel's height. 
 * 
 * @access public
 * @return void
 */
function fixSearchPanel()
{
    var navHeight    = 40;
    var actionHeight = 34;
    var panel  = $('#searchModal .panel');
    var height = $('#home').outerHeight() - navHeight - panel.find('.panel-heading').outerHeight() - actionHeight;
    $('#searchModal').css('height', $('#home').outerHeight() - navHeight);
    panel.find('.panel-body').css('max-height', height - parseInt(panel.css('borderTopWidth')) - parseInt(panel.css('borderBottomWidth')));
    panel.find('.panel-body .list').css('min-height' , height);
}
