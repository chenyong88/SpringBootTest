$(function()
{
    $(document).on('change', '#amebaAccount', function()
    {
        $('#category').load(createLink('budget', 'ajaxGetCategory', 'amebaAccount=' + $(this).val()), function()
        {
            $('#category').trigger('chosen:updated');
        })
    });
})
