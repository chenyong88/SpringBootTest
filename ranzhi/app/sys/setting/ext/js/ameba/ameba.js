$(function()
{
    $.setAjaxForm('#amebaForm', function(response)
    {
        if(response.result == 'success')
        {
            if(response.entries) 
            {
                v.entries = JSON.parse(response.entries);
                $.refreshDesktop(v.entries, true);
            }
            location.href = response.locate;
        }
    });
})
