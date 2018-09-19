$(function()
{
    if(config.requestType == 'GET') $('.treeview li a[href$="=' + v.action + '"]').parent('li').addClass('active');
    if(config.requestType == 'PATH_INFO') $('.treeview li a[href$="-' + v.action + '.html"]').parent('li').addClass('active');

    var $cols = $('.col');
    $cols.filter('.fixed-enabled').appendTo('#colsFixedEnabled');
    $cols.filter('.fixed-required').appendTo('#colsFixedRequired');
    $('.cols-list-origin').remove();

    $requireCols = $('#colsFixedRequired .col');
    $enableCols  = $('#colsFixedEnabled .col');
    if(!$requireCols.length) $('#colsFixedRequired').hide();

    if($enableCols.length < 2)
    {
        $('#colsFixedEnabled').addClass('sort-disabled');
        $enableCols.find('input[name*=width]').val('auto').attr('disabled', 'disabled');
    }
    else
    {
        $('#colsFixedEnabled').sortable({trigger: '.title',selector: '.col'});
    }

    $(document).on('click', '.check-inverse, #reversechecker', function()
    {
        $('#colsFixedEnabled').find('.col').addClass('disabled').find('input[name*=show]').val('0');
    });

    $(document).on('click', '.check-all, #allchecker', function()
    {
        $('#colsFixedEnabled').find('.col').removeClass('disabled').find('input[name*=show]').val('1');
    });

    $('.cols-list').on('click', '.col:not(.required) .show-hide, .col:not(.required) .title', function()
    {
        $(this).closest('.col').toggleClass('disabled');
        if($(this).closest('.col').hasClass('disabled'))  $(this).closest('.col').find('input[name*=show]').val('0');
        if(!$(this).closest('.col').hasClass('disabled')) $(this).closest('.col').find('input[name*=show]').val('1');

        if($(this).closest('.col').data('child') != 'undefined')
        {
            var child = '.child-' + $(this).closest('.col').data('child');
            $(child).toggleClass('disabled', $(this).closest('.col').hasClass('disabled'));

            if($(child).hasClass('disabled'))  $(child).find('.col').hide().find('input[name*=show]').val('0');
            if(!$(child).hasClass('disabled')) $(child).find('.col').show().find('input[name*=show]').val('1');
        }
    });

    $('.child').each(function()
    {
        var module = '.module-' + $(this).data('module');
        $(this).toggleClass('disabled', $(module).hasClass('disabled'));
    })

    $('input[name*=custom]').change(function()
    {
        if($(this).prop('checked'))
        {
            $(this).parent('span').find(('select[name*=defaultValue]')).attr('disabled', true).hide();
            $(this).parent('span').find('[id^=defaultValue][id$=chosen]').hide();
            $(this).parent('span').find(('input[name*=defaultValue]')).attr('disabled', false).show();
        }
        else
        {
            $(this).parent('span').find(('select[name*=defaultValue]')).attr('disabled', false);
            $(this).parent('span').find('[id^=defaultValue][id$=chosen]').show().width('200px');
            $(this).parent('span').find(('input[name*=defaultValue]')).attr('disabled', true).hide();
        }
    })

    $('input[name*=custom]').change();
    $('.fixed-required').find('input:not([name*=width], [name*=show]), select').attr('disabled', true);
    $('[id*=layoutRules]').width('200px');

    $('.child').sortable({trigger: '.title', selector: '.col'});

    $('.child').on('click', '.panel-heading', function()
    {
        $(this).toggleClass('disabled');

        if($(this).hasClass('disabled'))  $(this).parent().find('.col').hide().find('input[name*=show]').val('0');
        if(!$(this).hasClass('disabled')) $(this).parent().find('.col').show().find('input[name*=show]').val('1');
    });
});
