$(document).ready(function()
{
    /* Add a row of product. */
    $(document).on('click', '.btn-plus', function()
    {
        /* Add a row. */
        $(this).parents('tr').after('<tr>' + $(this).parents('tr').html() + '</tr>');

        /* Set properties of new row elements. */
        var newRow = $(this).parents('tr').next('tr');
        newRow.find('.chosen').next('div').remove();
        newRow.find('.chosen').chosen(window.chosenDefaultOptions);
        newRow.find('.chosen').next('div').attr('id', 'category' + v.key + '_chosen');
        newRow.find('.newRows').each(function()
        {
            var inputName = $(this).attr('name');
            var end = inputName.indexOf('[')
            if(end >= 0)
            {
                var preName = inputName.substring(0, end);
                if(preName == 'category')
                {
                    $(this).attr('name', preName + '[' + v.key + ']');
                }
                else
                {
                    $(this).attr('name', preName + '[' + v.key + ']');
                }
                $(this).attr('id', preName + v.key);
            }
        })

        v.key ++;
    });

    $(document).on('click', '.btn-remove', function()
    {
        if($('.btn-remove').length == 1) 
        {
            $(this).parents('tr').find('input').not('input[type=hidden]').val('');
            return false;
        }
        $(this).parents('tr').remove();
    });
});
