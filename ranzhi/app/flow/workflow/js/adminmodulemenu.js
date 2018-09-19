$(function()
{
    $('#moduleMenuList').on('sort.sortable', function(e, data)
    {
        $.post(createLink('workflow', 'sortModuleMenu'), data.orders, function(response)
        {
            if(response.result != 'success'){bootbox.alert(response.message);}
        }, 'json');
    });

    $(document).on('click', '.icon-plus', function()
    {
        var $rowspan = parseInt($('th.params').attr('rowspan'));
        $rowspan ++;

        $('th.params').attr('rowspan', $rowspan);
        $(this).parents('tr').after(v.itemRow);
    })

    $(document).on('click', '.icon-remove', function()
    {
        if($('th.params').attr('rowspan') < 2) return false;

        var rowspan = parseInt($('th.params').attr('rowspan'));
        rowspan --;

        if($(this).parents('tr').find('th').length) 
        {
            $(this).parents('tr').next().prepend(v.th.replace(/ROWSPAN/g, rowspan));
        }
        else
        {
            $('th.params').attr('rowspan', rowspan);
        }
        $(this).parents('tr').remove();
    })

    $(document).on('change', '[name*=keys]', function()
    {
        var $fieldCode = $(this).find('option:selected').val();
        $(this).parents('.row').find('span.value').load(createLink('workflow', 'ajaxGetFieldControl', 'module=' + v.module + '&fieldCode=' + $fieldCode), function()
        {
            $('select.chosen').chosen(window.chosenDefaultOptions);

            $('.form-datetime').datetimepicker(
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

            $('.form-date').datetimepicker(
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
    });
});
