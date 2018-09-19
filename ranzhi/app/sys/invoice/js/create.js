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
        var key  = $('#customer_chosen .chosen-results > li.no-results > span').text();
        var link = createLink('customer', 'ajaxSearchCustomer', 'key=' + key);
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
        $customer.val(key).trigger("chosen:updated");
        $selectedItem = null;

        $('#customer').change();
    });

    $('#customer').change(function()
    {
        var customerID = $(this).val();

        $('#money').val('');
        $('#invoiceTitle').val('');
        $('#taxNumber').val('');
        $('#registedAddress').val('');
        $('#phone').val('');
        $('#bankName').val('');
        $('#bankAccount').val('');

        getContracts(customerID);
        getCustomerInvoices(customerID);
    })

    $('#contract').change(function()
    {
        if(!$.isNumeric($(this).val())) return false;

        $('#money').val('');

        $('#detailBox').load(createLink('invoice', 'ajaxGetInvoiceDetails', 'contractID=' + $(this).val()), function()
        {
            $('[name^=priceList]').change();
        });

        $.get(createLink('invoice', 'ajaxGetDrawnMoney', "contractID=" + $(this).val()), function(drawnMoney)
        {
            if(drawnMoney == '') drawnMoney = 0;
            if(!$.isNumeric(drawnMoney)) return false;

            drawnMoney = Math.round(drawnMoney * 100) / 100;
            if(drawnMoney == 0) drawnMoney = '';
            $('#drawnMoney').val(drawnMoney);
        });
    });

    $('#type').change(function()
    {
        $('#phone, #bankName').parents('tr').toggle($(this).val() == 'companySpecial');
    });

    $('#customerInvoice').change(function()
    {
        getCustomerInvoice($(this).val());
    });

    $('#type').change();
    $('#customer').change();
})

function getContracts(customerID)
{
    if(!customerID) return false;

    $('.contractTD select').empty().load(createLink('crm.contract', 'getOptionMenu', 'customerID=' + customerID + '&current=' + v.contractID), function()
    {
        if(v.contractID) $('#contract').val(v.contractID).change();
    });
}

function getCustomerInvoices(customerID)
{
    if(!customerID) return false;

    $.getJSON(createLink('customer', 'ajaxGetCustomerInvoices', 'id=' + customerID), function(customerInvoices)
    {
        $('#customerInvoice').empty();
        var index = 0;
        for(var i in customerInvoices)
        {
            var customerInvoice = customerInvoices[i];
            var selected        = '';

            if(index == 0) 
            {
                updateInvoiceInfo(customerInvoice);
                selected = 'selected';
            }

            $('#customerInvoice').append("<option value='" + customerInvoice.id + "'" + selected + '>' + customerInvoice.invoiceTitle + '</option>');

            index++;
        }
    });
}

function getCustomerInvoice(customerInvoiceID)
{
    if(!customerInvoiceID) return false;
    
    $.getJSON(createLink('customer', 'ajaxGetCustomerInvoices', 'id=' + $('#customer').val() + '&customerInvoiceID=' + customerInvoiceID), function(customerInvoice)
    {
        if(typeof customerInvoice == 'object')
        {
            updateInvoiceInfo(customerInvoice);
        }
    });
}

function updateInvoiceInfo(customerInvoice)
{
    $('#invoiceTitle').val(customerInvoice.invoiceTitle);
    $('#taxNumber').val(customerInvoice.taxNumber);
    $('#registedAddress').val(customerInvoice.registedAddress);
    $('#phone').val(customerInvoice.phone);
    $('#bankName').val(customerInvoice.bankName);
    $('#bankAccount').val(customerInvoice.bankAccount);
}
