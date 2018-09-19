/**
 * Get orders of a customer.
 *
 * @param  int $customerID
 * @access public
 * @return void
 */
function getOrder(customerID)
{
    $('#orderTD').empty();

    if(customerID == '') return false;
    if(customerID == 'create') return true;

    $('.contactTD select').load(createLink('contact', 'getOptionMenu', 'customerID=' + customerID));

    $('.orderInfo td').load(createLink('contract', 'getOrder', 'customerID=' + customerID + '&status=normal'));

    $('#orderTD').load(createLink('contract', 'getOrder', 'customerID=' + customerID + '&status=normal'), function()
    {
        $('#orderTR').removeClass('hide');
        if($('.select-order').length > 1) $('.select-order').parents('tr').not('#orderTR, #tmpData, .orderInfo').remove();
        if(v.order) $('#orderTD .select-order:first').val(v.order).change();
    })
}

var $selectedItem;
var selectItem = function(item)
{
    $selectedItem = $(item).first();
    $('#triggerModal').modal('hide');
};

$(document).ready(function()
{
    var showSearchModal = function()
    {
        var key      = $('#customer_chosen .chosen-results > li.no-results > span').text();
        var relation = 'client';
        var link     = createLink('customer', 'ajaxSearchCustomer', 'key=' + key + '&relation=' + relation);
        $.zui.modalTrigger.show({url: link, backdrop: 'static'});
    };

    $(document).on('change', '#customer', function()
    {
        if($(this).val() === 'showmore')
        {
            showSearchModal();
        }
    });

    $(document).on('click', '#customer_chosen .chosen-results > li.no-results', showSearchModal);

    $(document).on('hide.zui.modal', '#triggerModal', function()
    {
        var key       = '';
        var $customer = $('#customer');
        if($selectedItem && $selectedItem.length)
        {
            key = $selectedItem.data('key');
            if(!$customer.children('option[value="' + key + '"]').length)
            {
                $customer.prepend('<option value="' + key + '">' + $selectedItem.text() + '</option>');
            }
        }
        $customer.val(key).change().trigger("chosen:updated");
        $selectedItem = null;
    });

    $(document).on('change', 'select.select-order:first', function()
    {
        $('#name').val($(this).find('option:selected').text());
    });

    $(document).on('focus', '.select-order', function()
    {
        $('#tmpData td').html($('.orderInfo td').html());

        indexValue = $(this).find('option:selected').val();

        $('select.select-order').not('#tmpData select, .orderInfo select').each(function()
        {
            selectedValue = $(this).find('option:selected').val();

            if(selectedValue && selectedValue != indexValue)
            {
                $('#tmpData').find("option[value='" + selectedValue + "']").remove();
            }
        });

        $(this).html($('#tmpData select').html());
        $(this).val(indexValue);
    });

    $(document).on('click', '.plus', function()
    {
        $(this).parents('tr').after("<tr><th></th><td>" + $('#orderTD').html() + "</td></tr>");
    });

    $(document).on('click', '.minus', function()
    {
        if($(this).parents('table').find('.order-real').not('tr.hide .order-real').size() == 1)
        {
            $(this).parents('td').html($('#order td').html());
            $(this).parents('td').find('select').val('').change();
            $('.order-real').change();
            return false;
        }
        $(this).parents('tr').remove();
        $('.order-real').change();
    });

    $('#customer').change(function()
    {
        getOrder($(this).val());
        $('#address').load(createLink('contract', 'ajaxGetAddresses', 'customer=' + $(this).val()), function()
        {
            $('#address').trigger('chosen:updated');
        });
    });

    $('#createAddress').change(function()
    {
        $('#address_chosen').toggle(!$(this).prop('checked'));
        $('#newAddress').toggle($(this).prop('checked'));
    });

    if(v.customer)
    {
       $('#customer').change();
    }

    $('select.select-order:first').change();
    $('#createAddress').change();
});
