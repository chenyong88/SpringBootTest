$(document).ready(function()
{
    $('[name*=createDepts]').each(function()
    {
        $(this).change(function()
        {
            if($(this).prop('checked'))
            {
                $(this).parents('tr').find('[id*=systemDepts]').attr('disabled', true);
            }
            else
            {
                $(this).parents('tr').find('[id*=systemDepts]').attr('disabled', false);
            }
        })
    })
})
