$(document).ready(function()
{
    $('#mainNavbar .nav li').removeClass('active');
    if(config.requestType == 'GET')
    {
        $('#mainNavbar .nav li a[href*=displayLayout][href*=module\\=' + v.module.replace('.', '\\.') + '\\&method]').parent('li').addClass('active');
    }
    else
    {
        $('#mainNavbar .nav li a[href*=displayLayout-' + v.module.replace('.', '\\.') + '-]').parent('li').addClass('active');
    }

    if(v.moduleMenuID)
    {
        $('#menu .nav li').removeClass('active');

        if(config.requestType == 'GET')
        {
            $("#menu .nav li a[href*=displayLayout][href*='moduleMenuID\=" + v.moduleMenuID + "']").parent('li').addClass('active');
        }
        else
        {
            $("#menu .nav li a[href*=displayLayout][href*='browse-" + v.moduleMenuID + ".html']").parent('li').addClass('active');
        }
    }

    $('#dataID').change(function()
    {
        location.href = createLink('flow', 'displayLayout', 'module=' + v.module + '&method=' + v.method + '&id=' + $(this).val());
    });

    $(document).on('click', 'td.child .addItem', function()
    {  
        var child = $(this).parents('table').data('child');    
        $(this).closest('tr').after($('.table-'+ child +' tbody').html());
        $(this).closest('tr').next().find('.chosen').next('.chosen-container').remove();
        $(this).closest('tr').next().find('.chosen').chosen(window.chosenDefaultOptions);
        $(this).closest('tr').next().find('.form-date, .form-datetime').datetimepicker(
        {
            language:  config.clientLang,
            weekStart: 1,
            todayBtn:  1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 2,
            forceParse: 0,
            format: 'yyyy-mm-dd'
        });        
    });

    $(document).on('click', 'td.child .delItem', function()
    {  
        if($(this).parents('.table-child').find('tr').size() > 1)
        {
            $(this).closest('tr').remove();
        }
        else
        {
            $(this).closest('tr').find('input,select,textarea').val('');
        }
    })
    $('.reloadPage').click(function()
    {
        url = $(this).attr('href');

        $.getJSON(url, function(response)
        {
            if(response.message)
            {
                bootbox.alert(response.message, function()
                {
                    if(response.locate) 
                    {
                        location.href = response.locate;
                        return false;
                    }
                    location.reload();
                });
            }
            else
            {
                if(response.locate) 
                {
                    location.href = response.locate;
                    return false;
                }
                location.reload();
            }
        });
        return false;
    });
})
