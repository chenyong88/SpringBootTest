$(document).ready(function()
{
    $('.btn-wechat').click(function()
    {
        $.getJSON($(this).data('url'), function(response)
        {   
            new $.zui.Messager(response.message,{icon: 'bell', type: 'success'}).show();
        }); 
    })
})
