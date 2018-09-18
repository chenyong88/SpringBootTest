$(document).ready(function()
{
    /* Create product. */
    $('#createProduct').change(function()
    {
        if($(this).prop('checked')) 
        {
            $(this).parents('.input-group').find('select').hide();
            $('#product_chosen').hide();
            $(this).parents('.input-group').find('input[type=text][id=name]').show().focus();
            $('.productInfo').show();
        }
        else
        {
            $('#product_chosen').show();
            $(this).parents('.input-group').find('input[type=text][id=name]').hide();
            $('.productInfo').hide();
        }
    })

    $('#createProduct').change();
})
