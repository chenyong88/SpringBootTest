$(function()
{
    $('[name*=turnon]').click(function()
    {
        $('.multiReviewer').parents('tr').toggle($(this).val() == 1);
        $('.singleReviewer').parents('tr').toggle($(this).val() == 0);
    });

    $('#turnon' + v.turnon).click();

    $(document).on('click', '.addItem', function()
    {
        $(this).parents('tr').after('<tr>' + $(this).parents('tr').html() + '</tr>');
        $(this).parents('tr').next().find('.chosen-container').remove();
        $(this).parents('tr').next().find('.chosen').val('').chosen(window.chosenDefaultOptions);

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
        $(this).parents('tr').find('th').html(index++);
    });
}
