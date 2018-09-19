$(function()
{
    $(document).on('change', '#amebaAccount', function()
    {
        $('#category').load(createLink('budget', 'ajaxGetCategory', 'amebaAccount=' + $(this).val()), function()
        {
            $('#category').trigger('chosen:updated');
        })
    });

    $('.thisYear').mouseover(function()
    {
        $(this).css('padding-right', '40px');
        $(this).find('.actions').show();
    })
    $('.thisYear').mouseout(function()
    {
        $(this).css('padding-right', 0);
        $(this).find('.actions').hide();
    })
})
