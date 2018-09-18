$(function()
{
    $('#type').css('width', $('#sn').css('width'));

    $('#type').change(function()
    {
        $('#phone, #bankName').parents('tr').toggle($(this).val() == 'companySpecial');
    });

    $('#invoiceType').change(function()
    {
        $('.paper').toggle($(this).val() == 'paper');
        $('.digital').toggle($(this).val() == 'digital');
    });

    $('#status').change(function()
    {
        if($(this).val() == 'wait')
        {
            $('#invoiceType, #contact, #express, #waybill, #address, #sendway, #sendAccount').prev('.required').remove();
        }
        else
        {
            $('#invoiceType, #contact, #express, #waybill, #address, #sendway, #sendAccount').before("<div class='required required-wrapper'></div>");
        }
        $('#sn, #contact, #express, #waybill, #address, #sendway, #sendAccount').css('border-color', '').parents('td').find('.text-error').remove();
    });

    $('#type').change();
    $('#invoiceType').change();
    $('#status').change();
})
