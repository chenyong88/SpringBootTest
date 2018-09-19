$(document).ready(function()
{
    if(v.dept) $('#category' + v.dept).parent('li').addClass('active');

    $('.setting').click(function()
    {
        $.openEntry('crm', $(this).attr('href'));
        return false;
    });

    /* Add an item. */
    $(document).on('click', '.add', function()
    {
        $(this).parents('tr').after(v.itemRow.replace(/key/g, v.key));
        var chosenDefaultOptions = {no_results_text: v.noResultsMatch, disable_search_threshold: 1, search_contains: true, width: '100%', allow_single_deselect: true};
        $(".chosen").chosen(chosenDefaultOptions);
        v.key++;
    })

    /* Remove an item. */
    $(document).on('click', '.remove', function()
    {
        if($('.remove').size() == 1)
        {
            $(this).parents('tr').find('input,select').val('');
            $(this).parents('tr').find('.chosen').trigger('chosen:updated');
            return;
        }
        $(this).parents('tr').remove();
    })

    $(document).on('change', '[name*=lines]', function()
    {
        $(this).parents('tr').find('#remainRates').load(createLink('commission', 'getRemainRates', 'line=' + $(this).val() + '&account=' + v.account));
    });

    $('[name*=lines]').change();
})
