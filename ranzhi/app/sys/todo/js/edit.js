$('#switchDate').click(function()
{
    if(!$(this).prop('checked'))
    {
        $(this).parents('tr').find('input[type=text]').prop('disabled', false);
    }
    else
    {
        $(this).parents('tr').find('input[type=text]').prop('disabled', true);
    }
});
