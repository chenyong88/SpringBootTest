$(function()
{
    $.setAjaxForm('#invoiceForm', function(response)
    {
        if(response.result == 'fail')
        {
            if(response.error && response.error.length)
            {
                $('#duplicateError').html($('.errorMessage').html());
                $('#duplicateError .alert').prepend(response.error);
                $('#duplicateError').show();

                $(document).on('click', '#duplicateError #continueSubmit', function()
                {
                    $('#duplicateError').append("<input value='1' name='continue' class='hide'>");
                    $('#submit').attr('type', 'button');
                })
            }
        }
        else
        {
            setTimeout(function(){location.href = response.locate;}, 1200);
        }
    });

    $('#createContact').change(function()
    {
        $('#contact').toggle(!$(this).prop('checked'));
        $('#contact').css('border-color', '');
        $('#newContact').toggle($(this).prop('checked'));
        $('.contactPhone').toggle($(this).prop('checked'));
        $(this).parents('tr').find('.text-error').remove();
    });

    $('#createAddress').change(function()
    {
        $('#address').toggle(!$(this).prop('checked'));
        $('#address').css('border-color', '');
        $('#newAddress').toggle($(this).prop('checked'));
        $(this).parents('tr').find('.text-error').remove();
    });

    $('#createContact').change();
    $('#createAddress').change();

    if(v.invoiceType == 'digital')
    {
        $('#sendway').change(function()
        {
            if($(this).val() == 'email')
            {
                $('.email').show();
            }
            else
            {
                $('.email').hide();
            }

            $(this).parents('tr').find('.text-error').remove();
            $('.email').find('.text-error').remove();
            $('#sendAccount, #subject,#content').css('border-color', '');
        });

        $('#sendway').change();
    }
});
