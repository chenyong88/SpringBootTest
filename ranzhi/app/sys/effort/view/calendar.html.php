<?php
/**
 * The calendar view file of effort module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     effort 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../sys/my/view/header.html.php';?>
<?php include '../../../sys/common/view/datepicker.html.php';?>
<?php include '../../../sys/common/view/calendar.html.php';?>
<?php js::set('account', $this->app->user->account);?>
<?php js::set('settings', new stdclass());?>
<?php js::set('settings.startDate', $date == 'future' ? date('Y-m-d') : date('Y-m-d', strtotime($date)));?>
<?php js::set('settings.data', $data);?>
<?php js::set('users', $users);?>
<div id='menuActions' class='actions'>
  <?php commonModel::printLink('effort', 'export', "account={$this->app->user->account}&orderBy=date_asc&date=_date_", "<i class='icon icon-download-alt'></i> " . $lang->export, "class='iframe btn btn-primary' data-width='700'");?>
</div>
<div class='calendar' id='calendar'></div>
<script>
function updateCalendar()
{
    var calendar = $('.calendar').data('zui.calendar');
    var date = calendar.date.format('yyyyMMdd');
    $.get(createLink('effort', 'calendar', 'date=' + date, 'json'), function(response)
    {
        if(response.status == 'success')
        {
            var data = JSON.parse(response.data);
            for(e in data.data.events) 
            {
                data.data.events[e]['start'] = new Date(data.data.events[e]['start']);
                data.data.events[e]['end']   = new Date(data.data.events[e]['end']);
            }
            calendar.events = data.data.events;
            v.settings.data.events = data.data.events;
            calendar.display();
        }
    }, 'json');
}

/* Adjust calendar width. */
function adjustWidth()
{
    var weekendEvents = 0;
    var width = 80;
    $('.calendar tbody.month-days tr.week-days').each(function()
    {
        weekendEvents += $(this).find('td').eq(5).find('.event').size();
        weekendEvents += $(this).find('td').eq(6).find('.event').size();
    });
    if(weekendEvents == 0)
    {
        $('.calendar tr.week-head th').width('auto');
        $('.calendar tr.week-head th').eq(5).width(width);
        $('.calendar tr.week-head th').eq(6).width(width - 10);
        $('.calendar tbody.month-days tr.week-days').each(function()
        {
            $(this).find('td').width('auto');
            $(this).find('td').eq(5).width(width);
            $(this).find('td').eq(6).width(width - 10);
        });
    }
    else
    {
        $('.calendar tr.week-head th').removeAttr('style');
        $('.calendar tbody.month-days tr.week-days').each(function()
        {
            $(this).find('td').removeAttr('style');
        });
    }
}

/* Add +. */
function appendAddLink()
{
    $('.calendar tbody.month-days tr.week-days td.cell-day div.day div.heading .number').each(function()
    {
        var $this = $(this);
        $this.parent().find('.icon-plus').remove();

        thisDate = new Date($this.parents('div.day').attr('data-date'));
        year     = thisDate.getFullYear();
        month    = thisDate.getMonth();
        day      = thisDate.getDate();
        if(year < v.y || (year == v.y && month < v.m) || (year == v.y && month == v.m && day <= v.d))
        {
            $this.after(" <span class='text-muted icon-plus'>&nbsp;<\/span>")
        }
    });
}

/* Add calendar event handler. */
v.date = new Date();
v.d    = v.date.getDate();
v.m    = v.date.getMonth();
v.y    = v.date.getFullYear();

if(typeof(v.settings) == 'undefined') v.settings = {};
if(typeof(v.settings.data) == 'undefined') v.settings.data = {};
v.settings.clickCell = function(event)
{
    if(event.view == 'month')
    {
        var date = event.date;
        var year   = date.getFullYear();
        var month  = date.getMonth();
        var day    = date.getDate();
        if(year < v.y || (year == v.y && month < v.m) || (year == v.y && month == v.m && day <= v.d))
        {
            month = month + 1;
            if(day <= 9) day = '0' + day;
            if(month <= 9) month = '0' + month;
            var efforturl = createLink('effort', 'batchCreate', "date=" + year + '' + month + '' + day, '', true);

            $.zui.modalTrigger.show({width: '85%', url: efforturl, backdrop: 'static'});
        }
    }
};

v.settings.beforeChange = function(event)
{
    if(event.change == 'start')
    {
        var data = {
            'date': event.to.format('yyyy-MM-dd'),
            'name': event.event.title,
            'type': event.event.calendar
        }
        if(!event.event.allDay)
        {
            data.begin = event.event.start.format('hh:mm');
            data.end = event.event.end.format('hh:mm');
        }
        if(data.date == '1970-01-01')
        {
            /* Delete. */
            var link = createLink('effort', 'delete', 'id=' + event.event.id);
        }
        else
        {
            /* Edit. */
            var link = createLink('effort', 'edit', 'id=' + event.event.id);
        }

        $.post(link, data, function(response)
        {
            updateCalendar();
        }, 'json');
    }
};

v.settings.display = function(event)
{
    for(key in v.settings.data.events)
    {
        var e = v.settings.data.events[key];
        if(e.data.status == 'done' || e.data.status == 'closed')
        {
            var eventObj = $('.events .event[data-id=' + e.id + ']');
            eventObj.css('background-color', '#38B03F');
            eventObj.appendTo(eventObj.parent());
        }
    }
    adjustWidth();
    appendAddLink();
}

v.settings.clickNextBtn  = updateCalendar;
v.settings.clickPrevBtn  = updateCalendar;
v.settings.clickTodayBtn = updateCalendar;
v.settings.dragThenDrop  = false;
</script>
<?php include '../../../sys/common/view/footer.html.php';?>
