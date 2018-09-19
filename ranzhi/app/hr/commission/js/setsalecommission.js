$(document).ready(function()
{
    if(v.dept) $('#category' + v.dept).parent('li').addClass('active');

    $(':radio').click(function()
    {
        if($(this).val() == 'multistep')
        {
            $('#stepRuleTR').show();
        }
        else
        {
            $('#stepRuleTR').hide();
        }
    });

    $(':radio').each(function()
    {
        if($(this).val() == v.rule) $(this).click();
    });

    $(document).on('change', '.start', function()
    {
        $(this).parent().parent().prev().find('.end').val($(this).val());
    });

    $(document).on('change', '.end', function()
    {
        $(this).parent().parent().next().find('.start').val($(this).val());
    });

    /* Add an item. */
    $(document).on('click', '.add', function()
    {
        $(this).parent().parent().after(v.itemRow.replace(/key/g, v.key));
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
            return;
        }
        $(this).parent().parent().remove();
    })
})
