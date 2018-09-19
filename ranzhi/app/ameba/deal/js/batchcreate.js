$(function()
{
    $(document).on('change', '[name*=amebaAccount]', function()
    {
        var link = createLink('deal', 'ajaxGetCategory', 'amebaAccount=' + $(this).val());
        $(this).parents('tr').find('[name*=category]').load(link, function()
        {
            $(this).trigger('chosen:updated');
        });
    });
});
