<?php
/**
 * The effort calendar view file of project module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     project
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include $app->getModuleRoot() . 'common/view/header.html.php';?>
<?php include '../../../../sys/common/view/datepicker.html.php';?>
<?php include '../../../../sys/common/view/calendar.html.php'?>

<?php js::set('account', $account);?>
<?php js::set('settings', new stdclass());?>
<?php js::set('settings.startDate', date('Y-m-d'));?>
<?php js::set('settings.data', $efforts);?>
<?php js::set('users', $users);?>

<?php $this->loadModel('project', 'proj')->setMenu($projects, $projectID);?>
<div id='menuActions' class='actions'>
  <?php commonModel::printLink('effort', 'export', "account={$account}&orderBy=date_asc&date=_date_", "<i class='icon icon-download-alt'></i> " . $lang->export, "class='iframe btn btn-primary' data-width='700'");?></li>
</div>
<div class='calendar' id='calendar'></div>
<script>
$(document).ready(function()
{
    $('#menu .nav >li').removeClass('active').find('a[href*=effortcalendar]').parent('li').css('font-weight', 'bold');
})

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

function changeUser(projectID, account)
{
    location.href = createLink('project', 'effortcalendar', 'projectID=' + projectID + '&account=' + account); 
}

/* Add calendar event handler. */
v.date = new Date();
v.d    = v.date.getDate();
v.m    = v.date.getMonth();
v.y    = v.date.getFullYear();

if(typeof(v.settings) == 'undefined') v.settings = {};
if(typeof(v.settings.data) == 'undefined') v.settings.data = {};

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
}

v.settings.clickNextBtn  = updateCalendar;
v.settings.clickPrevBtn  = updateCalendar;
v.settings.clickTodayBtn = updateCalendar;
</script>
<?php include '../../../common/view/footer.html.php';?>

