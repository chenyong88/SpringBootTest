$(document).ready(function()
{
    $('#type').change(function()
    {
        var type = $(this).val();
        $('.length').toggle(type == 'decimal' || type == 'char' || type == 'varchar');
    });

    $('#type').change();

    /* Toggle options. */
    $('#control').change(function()
    {   
        var control = $(this).val();
        var isOptionControl = control == 'select' || control == 'radio' || control == 'checkbox';

        $('.optionType').toggle(isOptionControl);

        $('#optionType').change(function()
        {
            $('#optionTR').toggle(isOptionControl && $(this).val() == 'custom');
            $('.sqlTR').toggle(isOptionControl && $(this).val() == 'sql');
            $('#varsTR').toggle(isOptionControl && $(this).val() == 'sql' && $.trim($('#varsTD').html()) != '');
        })
        $('#optionType').change();
    }); 

    $('#control').change();

    /* Add a option. */
    $(document).on('click', '.addItem', function()
    {   
        $(this).parents('.input-group').after($('#optionGroup').html());
    }); 

    /* Delete a option. */
    $(document).on('click', '.delItem', function()
    {   
        if($(this).parents('td').find('div.input-group').size() == 1)
        {   
            $(this).parents('.input-group').find('input').val('');
        }   
        else
        {   
            $(this).parents('.input-group').remove();
        }   
    }); 

    $(document).on('click', '[name=requestType]', function()
    {
        $('#selectList').toggle($(this).val() == 'select');
    });

    $.setAjaxForm('#addVarForm', function(data)
    {
        if(data.result == 'success')
        {
            var varName = data.varName;
            $('#varsTR').show();
            $('#varsTD').append($('#varGroup').html().replace(/key/g, varName));            
            var link = createLink('workflow', 'buildVarControl', 'varName=' + varName);
            $('#varsTD').find('#' + varName).find('.input-group').load(link, function()
            {
                $('#varsTD').find('#' + varName).find('.chosen').chosen();
                $('#varsTD').find('#' + varName).find('.form-date').fixedDate().datetimepicker($.extend(window.datetimepickerDefaultOptions, {startView: 2, minView: 2, format: 'yyyy-mm-dd'}));
                fixVarControls();
            });
            $('#sql').val($('#sql').val() + "'$" + varName + "'");

            $.zui.closeModal();
        }
    });

    $(document).on('click', '.delSqlVar', function()
    {
        $('#sql').val($('#sql').val().replace("'$" + $(this).parents('.varControl').attr('id') + "'", ''));
        $(this).parents('.varControl').remove();
        fixVarControls();
    });
});

function fixVarControls()
{
    var varControls = $('#varsTD .varControl');
    if(varControls.size() == 0) $('#varsTR').hide();
    for(i = 0; i < varControls.size(); i++)
    {
        if(i % 2 == 0)
        {
            $(varControls[i]).removeClass('pull-left pull-right').addClass('pull-left');    
        }
        else
        {
            $(varControls[i]).removeClass('pull-left pull-right').addClass('pull-right');
        }
        if(i > 1) 
        {
            $(varControls[i]).css('padding-top', '5px'); 
        }
        else
        {
            $(varControls[i]).css('padding', '0'); 
        }
    }
}
