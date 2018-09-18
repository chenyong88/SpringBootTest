$(document).ready(function()
{
    /* Toggle options. */
    $('#control').change(function()
    {
        var checkUrl = createLink('product', 'checkFieldLength', 'fieldID=' + v.fieldID + '&control=' + $(this).val())
        $.get(checkUrl, function(data){if(data) bootbox.alert(data);});

        var control = $(this).val();
        $('#optionTR').toggle(control == 'select' || control == 'radio' || control == 'checkbox');
    });

    $('#control').change();

    /* Add a option. */
    $(document).on('click', '.icon-plus-sign', function()
    {
        $(this).parents('.input-group').after( $('#optionGroup').html());
    });

    /* Delete a option. */
    $(document).on('click', '.icon-minus-sign', function()
    {
        if($(this).parents('td').find('div.input-group').size() == 1)
        {
            $(this).parents('.input-group').find(':input,span').remove();
        }
        else
        {
            $(this).parents('.input-group').remove();
        }
    });
});
