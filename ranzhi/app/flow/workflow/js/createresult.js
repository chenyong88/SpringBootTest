$(document).ready(function()
{
    $('#conditionType').change(function()
    {
        $('.sqlTR').toggle($(this).val() == 'sql');
        $('.dataTR').toggle($(this).val() == 'data');
    });

    $('#conditionType').change();

    $('#action, #table').change(function()
    {
        $('.fieldTR').toggle($('#action').val() != 'delete');
        
        if($('#action').val() != 'insert' && $('#table').val() != v.module)
        {
            $('.whereTR').show().find('input,select').removeAttr('disabled');
            $('#defaultWhere').hide().find('input[type=hidden]').attr('disabled', 'disabled');
        }
        else if($('#action').val() != 'insert' && $('#table').val() == v.module)
        {
            $('.whereTR').hide().find('input,select').attr('disabled', 'disabled');
            $('#defaultWhere').show().find('input[type=hidden]').removeAttr('disabled');
        }
        else
        {
            $('.whereTR').hide().find('input,select').attr('disabled', 'disabled');
            $('#defaultWhere').hide().find('input[type=hidden]').attr('disabled', 'disabled');
        }
    });

    $(document).on('change', '#table', function()
    {
        var link = createLink('workflow', 'ajaxGetTableFields', 'table=' + $(this).val());
        $('.field').load(link, function()
        {
            $('.field').trigger('chosen:updated');
        });
    });

    $(document).on('change', '[name*=paramType]', function()
    {
        var tr = $(this).parents('tr');
        if($(this).val() != 'custom')
        {
            var name = 'param[]';
            if(tr.hasClass('dataTR'))  name = 'conditions[param][]';
            if(tr.hasClass('fieldTR')) name = 'fields[param][]';
            if(tr.hasClass('whereTR')) name = 'wheres[param][]';

            tr.find('span.param').html("<select name='" + name + "' id='param' class='form-control chosen'></select>");
            tr.find('span.param .chosen').chosen(window.chosenDefaultOptions);
        }
        if($(this).val() == 'today' || $(this).val() == 'now' || $(this).val() == 'actor' || $(this).val() == 'deptManager')
        {
            tr.find('input#param').removeAttr('disabled').attr('readonly', 'readonly').val('').show();
            tr.find('select#param').removeAttr('disabled');
            tr.find('#param_chosen').hide();
        }
        else if($(this).val() == 'custom')
        {
            tr.find('input#param').attr('disabled', 'disabled').hide();
            var fieldCode = tr.find('[name*=field]').val() || '';
            var name      = tr.find('input#param').attr('name');
            var id        = tr.find('input#param').attr('id');
            var link      = createLink('workflow', 'ajaxGetFieldControl', 'module=' + v.module + '&fieldCode=' + fieldCode + '&value=&elementName=' + window.btoa(name) + '&elementID=' + id);
            tr.find('span.param').load(link, function()
            {
                if(tr.attr('class') == 'whereTR' && tr.is(':hidden'))
                {
                    tr.find('span.param input#param').attr('disabled', 'disabled');
                }

                tr.find('span.param .chosen').chosen(window.chosenDefaultOptions);

                tr.find('span.param .form-datetime').datetimepicker(
                {
                    language:  config.clientLang,
                    weekStart: 1,
                    todayBtn:  1,
                    autoclose: 1,
                    todayHighlight: 1,
                    startView: 2,
                    forceParse: 0,
                    showMeridian: 1,
                    format: 'yyyy-mm-dd hh:ii'
                });

                tr.find('span.param .form-date').datetimepicker(
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
        }
        else if($(this).val() == 'form')
        {
            tr.find('input#param').attr('disabled', 'disabled').hide();
            tr.find('#param_chosen .chosen-single span').html('');
            tr.find('#param_chosen').show();
            tr.find('#param_chosen .chosen-single').focus();
            tr.find('select#param').removeAttr('disabled').empty().append($('#formFieldsDIV').html());
            tr.find('select#param').trigger('chosen:updated');
        }
        else if($(this).val() == 'record')
        {
            tr.find('input#param').attr('disabled', 'disabled').hide();
            tr.find('#param_chosen .chosen-single span').html('');
            tr.find('#param_chosen').show();
            tr.find('#param_chosen .chosen-single').focus();
            tr.find('select#param').removeAttr('disabled').empty().append($('#actionFieldsDIV').html());
            tr.find('select#param').trigger('chosen:updated');
        }
        else
        {
            tr.find('input#param').attr('disabled', 'disabled').hide();
            var link = createLink('workflow', 'ajaxGetParamOptions', 'paramType=' + $(this).val());
            tr.find('select#param').removeAttr('disabled').load(link, function()
            {
                tr.find('select#param').trigger('chosen:updated');
            });
            tr.find('#param_chosen .chosen-single span').html('');
            tr.find('#param_chosen').show();
            tr.find('#param_chosen .chosen-single').focus();
        }
    });

    $(document).on('click', '.addVar, .addCondition, .addField, .addWhere', function()
    {
        var tr= $(this).parents('tr');
        if($(this).hasClass('addVar'))
        {
            tr.after(v.varRow);
        }
        else if($(this).hasClass('addCondition'))
        {
            tr.after(v.conditionRow);
        }
        else if($(this).hasClass('addField'))
        {
            tr.after(v.fieldRow);

            var link = createLink('workflow', 'ajaxGetTableFields', 'table=' + $('#table').val());
            tr.next('tr').find('.field').load(link, function()
            {
                $(this).trigger('chosen:updated');
            });
        }
        else if($(this).hasClass('addWhere'))
        {
            tr.after(v.whereRow);
        }
        tr.next().find('.chosen').chosen(window.chosenDefaultOptions);
        tr.next().find('#param_chosen').hide();
    });

    $(document).on('click', '.delVar, .delCondition, .delField, .delWhere', function()
    {
        if($(this).hasClass('delVar'))
        {
            $('#sql').val($('#sql').val().replace("'$" + $(this).parents('tr').find('#varName').val() + "'", ''));
            if($('.delVar').size() == 1) 
            { 
                $(this).parents('tr').find('input,select').val('').find('.chosen').trigger('chosen:updated');
                $(this).parents('tr').find('.chosen-single span').html('');
                return;
            }
        }

        $(this).parents('tr').remove();
    });

    $(document).on('change', '[name*=varName]', function()
    {
        if($(this).val() != '') $('#sql').val($('#sql').val() + "'$" + $(this).val() + "'");
    });

    $('.toggleCondition').click(function()
    {
        var val = $('#condition').val() == 1 ? 0 : 1;
        $('#condition').val(val);
        $('#conditionDIV').toggle();
    });

    $('[name*=paramType]').change();
    $('#action').change();
})
