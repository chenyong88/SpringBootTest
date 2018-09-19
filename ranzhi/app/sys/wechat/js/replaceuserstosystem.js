$(document).ready(function()
{
    $('[name*=createUsers]').each(function()
    {
        $(this).change(function()
        {
            if($(this).prop('checked'))
            {
                $(this).parents('tr').find('[id*=systemUsers]').attr('disabled', true);
                $(this).parents('tr').find('[id*=ignoreuser]').attr('disabled', true);
            }
            else
            {
                $(this).parents('tr').find('[id*=systemUsers]').attr('disabled', false);
                $(this).parents('tr').find('[id*=ignoreuser]').attr('disabled', false);
            }
        })
    })

    $('[name*=ignoreUsers]').each(function()
    {
        $(this).change(function()
        {
            if($(this).prop('checked'))
            {
                $(this).parents('tr').find('[id*=systemUsers]').attr('disabled', true);
                $(this).parents('tr').find('[id*=createusers]').attr('disabled', true);
            }
            else
            {
                $(this).parents('tr').find('[id*=systemUsers]').attr('disabled', false);
                $(this).parents('tr').find('[id*=createusers]').attr('disabled', false);
            }
        })
    })

    $('[name*=ignoreUsers]').change();
})
