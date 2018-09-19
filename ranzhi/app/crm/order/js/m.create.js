$(function()
{
    var $form = $('#createOrderForm').modalForm().listenScroll({container: 'parent'});

    $('#createCustomer').on('change', function()
    {
        $form.toggleClass('create-customer', $(this).is(':checked'));
    });

    $('#createProduct').on('change', function()
    {
        $form.toggleClass('create-product', $(this).is(':checked'));
    });
});
