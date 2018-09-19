var $selectedItem;
var selectItem = function(item)
{
    $selectedItem = $(item).first();
    $('#triggerModal').modal('hide');
};

$(document).ready(function()
{
    var showSearchModal = function(e)
    {
        $('.selected').removeClass('selected');
        if(e.hasClass('no-results')) 
        { 
            var key = e.parents('.chosen-container').find('.chosen-results > li.no-results > span').text();
            e.parents('.chosen-container').prev('select').addClass('selected');
        }
        else
        {
            var key = e.next('.chosen-container').find('.chosen-results > li.no-results > span').text();
            e.addClass('selected');
        }
        var relation = e.parents('tr').find('[name^=type]').val() == 'in' ? 'client' : 'provider';
        var link     = createLink('customer', 'ajaxSearchCustomer', 'key=' + key + '&relation=' + relation);
        $.zui.modalTrigger.show({url: link, backdrop: 'static'});
    };

    $(document).on('change', 'select[name^=trader]', function()
    {
        if($(this).val() === 'showmore')
        {
             showSearchModal($(this));
        }
    });

    $(document).on('click', '.chosen-container[id^=trader] .chosen-results > li.no-results', function(){showSearchModal($(this));});

    $(document).on('hide.zui.modal', '#triggerModal', function()
    {
        var key     = '';
        var $trader = $('.selected'); 
        var type    = $trader.parents('tr').find('[name*=type]').val();
        if($selectedItem && $selectedItem.length)
        {
            key = $selectedItem.data('key');
            $('select[name^=trader]').each(function()
            {
                if(!$(this).children('option[value="' + key + '"]').length)
                {
                    $(this).prepend('<option value="' + key + '">' + $selectedItem.text() + '</option>');
                }
                $(this).trigger('chosen:updated');
            });
        }
        $trader.val(key).trigger('chosen:updated');
        $selectedItem = null;
    });

    $(document).ready(removeDitto());//Remove 'ditto' in first row.

    $(document).on('change', '.type', function()
    {
        var type = $(this).val();
        if(type == 'fee') type = $(this).next('input:hidden').val();
        $(this).parents('tr').find('.in, .out').hide().attr('disabled', true).find('*').attr('disabled', true);
        $(this).parents('tr').find('.' + type).show().attr('disabled', false).find('*').attr('disabled', false);
    })
    $('.type').change();

    $('[name*=createTrader]').each(function()
    {
        if($(this).prop('checked')) $(this).parents('.out').find('[id*=trader][id*=_chosen]').hide();
    })

    $('[name*=createCustomer]').each(function()
    {
        if($(this).prop('checked')) $(this).parents('.in').find('[id*=trader][id*=_chosen]').hide();
    })

    $('[name*=createCustomer]').change(function()
    {
        if($(this).prop('checked')) 
        {
            $(this).parents('.input-group').find('select').hide();
            $(this).parents('.input-group').find('[id*=trader][id*=_chosen]').hide();
            $(this).parents('.input-group').find('input[type=text][id*=customerName]').show().focus();
            $(this).parents('.input-group-addon').find('.icon-question').hide();
        }
        else
        {
            $(this).parents('.input-group').find('[id*=trader][id*=_chosen]').show();
            $(this).parents('.input-group').find('input[type=text][id*=customerName]').hide();
        }
    })
});
