$(document).ready(function()
{
    $.setAjaxForm('#invoiceForm', function(data)
    {   
        if(data.result == 'success') $.reloadAjaxModal(1500);
    });
})
