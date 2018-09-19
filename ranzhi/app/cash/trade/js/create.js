$(document).ready(function()
{
    $('#depositor').change(function()
    {
        $.get(createLink('trade', 'ajaxGetCurrency', 'depositorID=' + $(this).val()), function(currency)
        {
            if(!currency) return false;

            $('#currency').val(currency);
            $('#currencyLabel').val(currency);
            $('.exchangeRate').toggle(currency != v.mainCurrency);
        });
    });

    $('#order, #contract').change(function()
    {
        $('#money').val($(this).find('option:selected').attr('data-amount'));
        $('#customer').val($(this).find('option:selected').attr('data-customer'));
        $('#customer').trigger('chosen:updated');
    })

    $('#productCategory').change(function()
    {
        $('#productBox').load(createLink('product', 'ajaxGetByCategory', 'status=&category=' + $(this).val()), function()
        {
            $('#product').chosen(chosenDefaultOptions);
        })
    })

    $('.exchangeRate').hide();
})

function ajaxGetCategories()
{
    var link = createLink('trade', 'ajaxGetCategories', "type=" + v.modeType);

    $('#' + v.modeType + 'CategoryBox').load(link, function()
    {
        $('#category').chosen();
    });
}
