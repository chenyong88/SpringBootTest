$(document).ready(function()
{
    /* Add one condition. */
    $(document).on('click', '.icon-plus', function()
    {
        $(this).parents('.input-group').after($('#conditionGroup').html().replace(/key/g, v.key));
        v.key++;
    });

    /* Remove one condition. */
    $(document).on('click', '.icon-remove', function()
    {
        if($(this).parents('td').find('.input-group').size() == 1)
        {   
            $(this).parents('.input-group').find('select').val('');
            $(this).parents('.input-group').find('input').val('');
            return false;
        }   
        $(this).parents('.input-group').remove();
    });

    /* Toggle result value input. */
    $(document).on('change', '#result', function()
    {
        $(this).nextAll('span, :input').toggle($(this).val() == 'userdefined');
        if($(this).val() == 'userdefined') $('#resultValue').focus();
    });
})
