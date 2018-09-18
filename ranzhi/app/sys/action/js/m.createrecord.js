$(function()
{
    $('#createRecordForm').modalForm(
    {
        onSubmit: function(data)
        {
            if(data.date) data.date = data.date.replace('T', ' ') + ':00';
            return data;
        }
    }).listenScroll({container: 'parent'});

    var now = new Date().getTime(),
        $dateCell = $('#dateCell'),
        $nextDate = $('#nextDate');
    $('#delta').on('change', function()
    {
        var delta = parseInt($(this).val());
        $dateCell.toggleClass('hidden', delta > 0);
        if(delta === 365000) $nextDate.val('');
        else if(delta > 0) $nextDate.val($.format(new Date(now + delta * 24 * 3600 * 1000), 'yyyy-MM-dd'));
    }).children('option').each(function()
    {
        var $option = $(this),
            delta = parseInt($option.val());
        if(delta < 365000 && delta > 0)
        {
            $option.text($option.text() + $.format(new Date(now + delta * 24 * 3600 * 1000), ' (yyyy-MM-dd)'));
        }
    });

    $('#contact').on('change', function()
    {
        var select  = $(this)[0],
            data    = $(select.options[select.selectedIndex]).data(),
            $info   = $('#contractInfo'),
            qq      = $.trim(data.qq),
            email   = $.trim(data.email),
            phone   = $.trim(data.phone);
        if(qq || email || phone)
        {
            $info.removeClass('hidden');
            $info.find('.info-qq').toggleClass('hidden', !qq).find('.text').text(qq);
            $info.find('.info-email').toggleClass('hidden', !email).find('.text').text(email);
            $info.find('.info-phone').toggleClass('hidden', !phone).find('.text').html('<a href="tel:' + phone + '">' + phone + '</a>');
        }
        else $info.addClass('hidden');
    });

    $('#objectType1').on('change', function()
    {
        var checked = $(this).is(':checked');
        $('#order').parent().toggleClass('hidden', !checked);
        if(checked) $('#objectType2').prop('checked', false).change();
    });

    $('#objectType2').on('change', function()
    {
        var checked = $(this).is(':checked');
        $('#contract').parent().toggleClass('hidden', !checked);
        if(checked) $('#objectType1').prop('checked', false).change();
    });

    $('#createContact').on('change', function()
    {
        var checked = $(this).is(':checked');
        $('#realname').toggleClass('hidden', !checked);
        $('#contact').parent().toggleClass('hidden', checked);
    });
});
