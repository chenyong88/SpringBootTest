$(function()
{
    $(document).on('change', '#ajaxForm #type', function()
    {
        $('#ajaxForm #contract').parents('tr').toggle($(this).val() == 'contract');
    });

    $(document).on('change', '#ajaxForm #type, #ajaxForm #contract', function()
    {
        var link  = createLink('deal', 'ajaxGetTrade', 'type=' + $('#ajaxForm #type').val() + '&contract=' + $('#ajaxForm #contract').val());
        var trade = $('#ajaxForm #trade').val();
        $('#ajaxForm #trade').load(link, function()
        {
            $(this).val(trade).trigger('chosen:updated');
        });
    });

    $('a.contract, a.trade').click(function()
    {
        var href = $(this).prop('href');
        var app  = '';
        if(href.indexOf('/crm/')  != -1) app = 'crm';
        if(href.indexOf('/cash/') != -1) app = 'cash';

        if(app != '')
        {
            $.openEntry(app, href);
            return false;
        }
    });
});
