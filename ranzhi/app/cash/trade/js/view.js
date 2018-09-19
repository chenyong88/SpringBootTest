$(function()
{
    $('.panel-history a').click(function()
    {
        var href = $(this).prop('href');
        var app  = '';
        if(href.indexOf('/crm/') != -1) app = 'crm';
        if(href.indexOf('/oa/') != -1)  app = 'oa';

        if(app != '' && $(this).data('toggle') == undefined)
        {
            $.openEntry(app, href);
            return false;
        }
    });

    /* Add a trade detail item. */
    $(document).on('click', '.icon-plus', function()
    {
        if($('#hiddenDetail').length)
        {
            $(this).parents('tr').after($('#hiddenDetail').html().replace(/key/g, v.key));
            $(this).parents('tr').next().find("[name*='handlers']").chosen({no_results_text: '', placeholder_text:' ', disable_search_threshold: 1, search_contains: true, width: '100%'});
            $(this).parents('tr').next().find("[name*='category']").chosen({no_results_text: '', placeholder_text:' ', disable_search_threshold: 1, search_contains: true, width: '100%'});
        }

        v.key ++;
    });

    /* Remove a trade detail item. */
    $(document).on('click', '.icon-remove', function()
    {
        if($('#hiddenDetail').length)
        {
            if($('#detailList > table tbody tr').size() > 1)
            {
                $(this).parents('tr').remove();
            }
            else
            {
                $(this).parents('tr').find('input,select').val('');
            }
        }
    });
})
