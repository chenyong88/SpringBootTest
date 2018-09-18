$(document).ready(function()
{
    var id = '';
    $('document').on('click', '[href*=createFromOrder]', function()
    {
        id = $(this).parents('tr').find('[name*=product]').attr('id');
    });

    $.setAjaxForm('#createForm', function(data)
    {
        if(data.result == 'success') 
        {
            var element = data.element;
            var product = data.product;

            /* Update the dropdown list of all products. */
            $('.select-product').each(function()
            {
                var productID = $(this).val();
                $(this).load(createLink('order', 'ajaxGetProducts'), function()
                {
                    /* Update the product of current row. */
                    if($(this).attr('id') == element)
                    {
                        $(this).val(product);
                        $(this).change();
                    }
                    /* If the product of other rows has been selected retain it. */
                    else if(productID != 0)
                    {
                        $(this).val(productID);
                    }
                    $(this).trigger('chosen:updated');
                });
            });
            $.zui.closeModal();
        }
    })
    
    /* When trader changed remove the error warning. */
    $('#trader').change(function()
    {
        $(this).parents('tr').find('.text-error').remove();
    })

    /* When checkbox of new trader checked switch tags display. */
    $('.createTrader').click(function()
    {
        $('#trader').val('');
        $('#newTrader').toggle();
        $('#newTrader').val('');
        var parentRow = $(this).parents('tr');
        parentRow.find('.chosen-container').toggle();
        parentRow.find('.chosen-container').find('.chosen-single').find('span').html('');
        parentRow.find('.chosen-container').find('.chosen-single').find('abbr').remove();
        /* Remove the batch check labels and css. */
        parentRow.find('.text-error').remove();
        $('#newTrader').css('border-color', '');
    });

    /* Judge if the product has been sent and display different controls. */
    $('[name*=sentAmount]').each(function()
    {
        var sentAmount = $(this).val(); 
        if(parseFloat(sentAmount) > 0) 
        {
            $(this).parents('tr').find('.sentProduct').toggle();
            $(this).parents('tr').find('[name*=product]').next('.chosen-container').hide();
            $(this).parents('tr').find('[name*=unit]').next('.chosen-container').hide();
        }
    })

    /* When checkbox of new product checked switch tags display. */
    $(document).on('change', '.createProduct', function()
    {
        var parentRow = $(this).parents('tr');
        parentRow.find('input').val('');
        parentRow.find('select').val('');
        parentRow.find('.product-newProduct').toggle();
        parentRow.find('div[id*=product]').toggle();
        parentRow.find('.chosen-container').find('.chosen-single').find('span').html('');
        parentRow.find('.chosen-container').find('.chosen-single').find('abbr').remove();
        /* Remove the batch check labels and css. */
        parentRow.find('.text-error').remove(); 
        parentRow.find('input').css('border-color', '');
    });

    /* Add a row of product. */
    $(document).on('click', '.btn-plus', function()
    {
        $(this).parents('tr').after('<tr>' + $(this).parents('tr').html() + '</tr>');
        var rowspan = $('#product_title').attr('rowspan');
        $('#product_title').attr('rowspan', parseInt(rowspan) + 1);
        /* Set properties of new row elements about product. */
        var newRow = $(this).parents('tr').next('tr');
        newRow.find('th').remove();
        newRow.find('input').val('');
        newRow.find('select').val('');
        newRow.find('.product-newProduct').hide();
        newRow.find('.chosen-container').remove();
        newRow.find('.chosen').chosen(window.chosenDefaultOptions);
        newRow.find('.product-batchEdit').each(function()
        {
            var inputName = $(this).attr('name');
            var end = inputName.indexOf('[')
            if(end >= 0)
            {
                var preName = inputName.substring(0, end);
                $(this).attr('name', preName + '[' + v.key + ']');
                $(this).attr('id', preName + v.key);
            }
        })
        v.key ++;
    });
    
    /* Remove a row of product. */
    $(document).on('click', '.btn-remove', function()
    {
        if($('.btn-remove').length == 1)
        {
            $(this).parents('tr').find('input').not('input[type=hidden]').val('');
            return false;
        }
        var rowspan = $('#product_title').attr('rowspan');
        var title   = $('#product_title').html();
        $(this).parents('tr').remove();

        /* Update the order money. */
        var controls = $('.btn-remove');
        $(controls[0]).parents('tr').find('.product-money').change();

        /* Juage if the product_title was removed. */
        if($('#product_title').length > 0)
        {
            $('#product_title').attr('rowspan', parseInt(rowspan) - 1);
        }
        else
        {
            $(controls[0]).parents('tr').find('td:first').before("<th id='product_title' rowspan='" + (rowspan - 1) + "'>" + title + "</th>")       
        }
    });
    
    /* Change product. */
    $(document).on('change', '.select-product', function()
    {
        var unit = $(this).find('option:selected').attr('data-unit');
        if(unit == 0) return false;
        
        $(this).parents('tr').find('[name*=unit]').val(unit);
        $(this).parents('tr').find('[name*=unit]').trigger('chosen:updated');
    });
    
    PRECISION = 100;

    /* Change product amount and compute product money. */
    $(document).on('change', '.product-amount', function()
    {
        var price  = $(this).parents('tr').find('[name*=price]').val();
        var amount = $(this).val();
        if(price == '' || amount == '') return false;
        $(this).parents('tr').find('[name*=moneys]').val(Math.round(price*amount*PRECISION)/PRECISION);
        $(this).parents('tr').find('[name*=moneys]').change();
    });
    
    /* Change product price and compute product money. */
    $(document).on('change', '.product-price', function()
    {
        var amount = $(this).parents('tr').find('[name*=amount]').val();
        var price  = $(this).val();
        if(price == '' || amount == '') return false;
        $(this).parents('tr').find('[name*=moneys]').val(Math.round(price*amount*PRECISION)/PRECISION);
        $(this).parents('tr').find('[name*=moneys]').change();
    });
    
    /* Compute order money. */
    $(document).on('change', '.product-money', function()
    {
        var sum  = 0;
        var moneys = $('.product-money');
        for(i=0; i<moneys.size(); i++)
        {
            if($.isNumeric(moneys[i].value))
            {
                sum += parseFloat(moneys[i].value);
            }
        }
        $('#money').val(Math.round(sum*PRECISION)/PRECISION);
    });
});
