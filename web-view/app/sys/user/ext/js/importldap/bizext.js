$(function()
{
    $('.add').change(function()
    {
        $(this).parents('tr').find('.text-error').remove();
        $(this).parents('tr').find('input').css('border-color', '');
    });

    $('[name^=createAccount]').change(function()
    {
        var $tr = $(this).parents('tr');
        if($(this).prop('checked'))
        {
            $tr.find('.newAccount').show();
            $tr.find('.chosen-container[id^=account]').hide();
            $tr.find('.chosen-container').not('[id^=account]').show();
            $tr.find('.chosen').not('[id^=account]').removeAttr('disabled').hide();
            $tr.find('[name^=realname],[name^=gender],[name^=email]').removeAttr('disabled');
        }
        else
        {
            $tr.find('.newAccount').hide();
            $tr.find('.chosen-container[id^=account]').show();
            $tr.find('.chosen-container').not('[id^=account]').hide();
            $tr.find('.chosen').not('[id^=account]').attr('disabled', 'disabled').show();
            $tr.find('[name^=realname],[name^=gender],[name^=email]').attr('disabled', 'disabled');
        }
        $tr.find('.text-error').remove();
        $tr.find('input').css('border-color', '');
    });

    $('.asLDAP').click(function()
    {
        $(this).parents('tr').find('[name^=newAccount]').val($(this).parents('tr').find('[name^=ldapAccount]').val().replace(' ', ''));
    });

    $('#allCheck').click(function()
    {
        $('.add').prop('checked', true);
    });

    $('#reverseCheck').click(function()
    {
        $('.add').each(function()
        {
            $(this).prop('checked', !$(this).prop('checked'));
        });
    });

    $('[name^=createAccount]').change();
})
