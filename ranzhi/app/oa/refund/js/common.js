$(document).ready(function()
{    
    $('.side .leftmenu ul').find('a[href*=' + config.currentMethod + ']').parent().addClass('active');
    $('.switchStatus').click(function()
    {
        url = $(this).attr('href');

        $.getJSON(url, function(response)
        {
            if(response.message)
            {
                bootbox.alert(response.message, function()
                {
                    if(response.locate) 
                    {
                        location.href = response.locate;
                        return false;
                    }
                    location.reload();
                });
            }
            else
            {
                if(response.locate) 
                {
                    location.href = response.locate;
                    return false;
                }
                location.reload();
            }
        });
        return false;
    });
})
