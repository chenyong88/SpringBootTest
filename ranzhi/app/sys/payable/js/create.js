var $selectedItem;
var selectItem = function(item)
{
    $selectedItem = $(item).first();
    var modal = $('#ajaxModal');
    var link  = createLink('payable', 'create', 'traderID=' + $selectedItem.data('key'));
    modal.load(link, function(){$(this).find('.modal-dialog').css('width', $(this).data('width')); $.zui.ajustModalPosition()})
};

$(document).ready(function()
{
    var showSearchModal = function()
    {
        var key      = $('#trader_chosen .chosen-results > li.no-results > span').text();
        var relation = 'provider';
        var link     = createLink('customer', 'ajaxSearchCustomer', 'key=' + key + '&relation=' + relation);
        $('#ajaxModal').load(link);
    };

    $(document).on('change', '#trader', function()
    {
        if($(this).val() === 'showmore')
        {
             showSearchModal();
        }
    });

    $(document).on('click', '#trader_chosen .chosen-results > li.no-results', showSearchModal);

    $(document).on('hide.zui.modal', '#triggerModal', function()
    {
        var key     = '';
        var $trader = $('#trader');
        if($selectedItem && $selectedItem.length)
        {
            key = $selectedItem.data('key');
            if(!$trader.children('option[value="' + key + '"]').length)
            {
                $trader.prepend('<option value="' + key + '">' + $selectedItem.text() + '</option>');
            }
        }
        $trader.val(key).trigger("chosen:updated");
        $selectedItem = null;
    });
})
