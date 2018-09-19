$(document).ready(function()
{
    $(document).on('click', '.cancel', function()
    {
        if(confirm(v.confirmCancel))
        {
            $.getJSON($(this).attr('href'), function(data) 
            {
                if(data.result == 'success')
                {
                    return location.reload();
                }
                else
                {
                    alert(data.message);
                    return location.reload();
                }
            });
        }
        return false;
    });

    $('.major').click(function()
    {
        $.getJSON($(this).attr('href'), function(response)
        {
            if(response.result == 'success')
            {
                return location.reload();
            }
            else
            {
                alert(response.message);
                return location.reload();
            }
        })
        return false;
    })
})
