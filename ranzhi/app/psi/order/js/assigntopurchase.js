$(document).ready(function()
{
    $('.selectAll').click(function()
    {
        v.checked = !v.checked;
        var chks = $('[name*=product]');
        for(i = 0; i < chks.length; i++)
        {
            chks[i].checked = v.checked;
        }
    });
});
