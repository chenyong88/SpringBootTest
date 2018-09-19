/* open view page. */
function viewTodo(obj)
{
    $.zui.modalTrigger.show($.extend({backdrop: 'static'}, $(obj).data()));
}

$(document).ready(function()
{
    /* Adjust calendar' startDate. */
    $('.calendar').data('zui.calendar').display('month', v.settings.startDate);

    /* dropable setting. */
    var dropSetting = {drop: function(event)
    {
        if(event.target)
        {
            var from   = event.element;
            var to     = event.target;
            var target = from.data('targeta');
            if(typeof target == 'undefined') target = '.droppable-target';
            to.date = new Date(to.data('date'));
            if(from.data('action') == 'edit' && to.data('date') != '1970-01-01')
            {
                var data = {
                'date': to.date.format('yyyy-MM-dd'),
                'name': from.data('name'),
                'type': from.data('type'),
                'begin': from.data('begin'),
                'end': from.data('end')
                }
                var url = createLink('effort', 'edit', 'id=' + from.data('id'), 'json');
            }
            else if(from.data('action') != 'edit' && to.data('date') != '1970-01-01')
            {
                var data = {
                'date': to.date.format('yyyy-MM-dd'),
                'type': from.data('type'),
                'idvalue': from.data('id'),
                'name': from.data('name'),
                'begin': '',
                'end':'' 
                }
                var url = createLink('effort', 'create', '', 'json');
            }
            else if(from.data('action') == 'edit' && to.data('date') == '1970-01-01')
            {
                var data = {}
                var url = createLink('effort', 'delete', 'id=' + from.data('id'), 'json');
            }
            else if(from.data('action') != 'edit' && to.data('date') == '1970-01-01')
            {
                return false;
            }

            $.post(url, data, function(response)
            {
                if(response.result == 'success')
                {
                    if(response.message) $.zui.messager.success(response.message);
                    updateCalendar();
                    from.hide();
                    from.prop('data-remove', '1')
                }
            }, 'json');
        }
    }};
    $('[data-toggle="droppable"]').droppable(dropSetting);

    /* adjust focus position. */
    if($('.current').offset().top >= $(window).scrollTop() + $(window).height()) $(window).scrollTop($('.current').offset().top);

    fixTableHeader();
});
