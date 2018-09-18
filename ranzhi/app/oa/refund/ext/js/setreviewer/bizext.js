$(function()
{
    $('[name*=turnon]').click(function()
    {
        $('.multiReviewer').parents('tr').toggle($(this).val() == 1);
        $('.singleReviewer').parents('tr').toggle($(this).val() == 0);
        computeIndex();
    });

    $('#turnon' + v.turnon).click();

    $(document).on('click', '.addItem', function()
    {
        $(this).parents('tr').after('<tr>' + $(this).parents('tr').html() + '</tr>');
        $(this).parents('tr').next().find('.chosen-container').remove();
        $(this).parents('tr').next().find('.chosen').val('').chosen(window.chosenDefaultOptions);
        $(this).parents('tr').next().find('input').removeAttr('readonly');
        computeIndex();
    });

    $(document).on('click', '.delItem', function()
    {
        if($('.delItem').size() == 1) return;
        $(this).parents('tr').remove();
        computeIndex();
    });
});

function computeIndex()
{
    var index = 1;
    $('.addItem').each(function()
    {
        if(index == 1) $(this).parents('tr').find('input').val('').attr('readonly', 'readonly');
        $(this).parents('tr').find('th').html(index++);
    });
}
