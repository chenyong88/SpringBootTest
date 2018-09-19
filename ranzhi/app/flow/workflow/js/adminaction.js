$(document).ready(function()
{
    $(document).on('click', '.icon-plus', function()
    {
        $(this).parents('tr').after(v.itemRow);
        var chosenDefaultOptions = {no_results_text: v.noResultsMatch, disable_search_threshold: 1, search_contains: true, width: '100%', allow_single_deselect: true};
        $(this).parents('tr').next().find('[name*=field]').chosen(chosenDefaultOptions);
    });

    $(document).on('click', '.icon-remove', function()
    {
       if($('.icon-remove').size() == 1)
       {
          $(this).parents('tr').find('input,select').val('');
          $(this).parents('tr').find('[name*=field]').trigger('chosen:updated');
          return;
       }

      $(this).parents('tr').remove();
    });

    $(document).on('change', '[name*=field]', function()
    {
        var tr   = $(this).parents('tr');
        var link = createLink('workflow', 'ajaxGetFieldControl', 'module=' + v.module + '&fieldCode=' + $(this).val() + '&value=&elementName=' + window.btoa('param[]') + '&elementID=param');
        tr.find('#paramTD').load(link, function()
        {
            tr.find('select.chosen').chosen(window.chosenDefaultOptions);

            tr.find('.form-datetime').datetimepicker(
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

            tr.find('.form-date').datetimepicker(
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

    $('a.mode-toggle').click(function()
    {
        $('a.mode-toggle').removeClass('active');
        $(this).addClass('active');
        $('a.mode-toggle').parent('div').nextAll('#cardMode, #listMode').hide();
        $('#' + $(this).data('mode') + 'Mode').show();
        $.cookie('actionViewType', $(this).data('mode'), {path: "/"});
        fixTableHeader();
    })

    var type = $.cookie('actionViewType');
    if(typeof(type) == 'undefined' || type == '') type = 'list';
    $('#menuActions a[data-mode=' + type +']').click();
});
