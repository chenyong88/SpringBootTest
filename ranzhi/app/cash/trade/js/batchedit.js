$(function()
{
    $('[name^=categoryDitto]').click(function()
    {
        if($(this).prop('checked'))
        {
            var category = $(this).parents('tr').prev().find('select[name^=category]').val();
            $(this).parents('td').find('select[name^=category]').val(category).trigger('chosen:updated');
        }
    });

    $('[name^=deptDitto]').click(function()
    {
        if($(this).prop('checked'))
        {
            var dept = $(this).parents('tr').prev().find('select[name^=dept]').val();
            $(this).parents('td').find('select[name^=dept]').val(dept).trigger('chosen:updated');
        }
    });
});
