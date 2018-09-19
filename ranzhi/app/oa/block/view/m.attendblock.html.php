<?php
/**
 * The attend block mobile view file of block module of RanZhi.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php
$dateList    = range(strtotime($startDate), strtotime($endDate), 86400);
$attendsUID  = 'attends-' . uniqid();
$todaySignIn = $this->attend->checkSignIn();
?>
<style>
.attends-container {padding: .25rem .5rem}
.attends.row {margin-top: 0}
.attends.row .cell {padding: .1rem}
.attends.row .tile {height: 2.5rem; background: #f1f1f1; text-align: center;}
.attends.row .tile > small {display: block; font-size: .5rem; height: 1rem; line-height: 1rem; color: rgba(0,0,0,.5)}
.attends.row .tile.today > small {color: rgba(255,255,255,.7)}
.attends.row .attend-status {height: 1.5rem; line-height: 1.5rem; color: #666; font-size: .65rem; font-weight: bold;}
.attends.row .tile.today .attend-status {color: #fff!important}

.attends.row .tile.attend-absent {background: #E3F2FD}
.attends.row .tile.attend-absent .attend-status {color: #2196F3}
.attends.row .tile.attend-absent.today {background: #2196F3}
.attends.row .tile.attend-normal {background: #E8F5E9}
.attends.row .tile.attend-normal .attend-status {color: #4CAF50}
.attends.row .tile.attend-normal.today {background: #4CAF50}
.attends.row .tile.attend-early,
.attends.row .tile.attend-both,
.attends.row .tile.attend-late {background: #FFF3E0}
.attends.row .tile.attend-early .attend-status,
.attends.row .tile.attend-both .attend-status,
.attends.row .tile.attend-late .attend-status {color: #FF9800}
.attends.row .tile.attend-early.today,
.attends.row .tile.attend-both.today,
.attends.row .tile.attend-late.today {background: #FF9800}
.attends.row .tile.attend-absent {background: #FFEBEE}
.attends.row .tile.attend-absent .attend-status {color: #F44336}
.attends.row .tile.attend-absent.today {background: #F44336}
.attends.row .tile.attend-leave {background: #E0F2F1}
.attends.row .tile.attend-leave .attend-status {color: #009688}
.attends.row .tile.attend-leave.today {background: #009688}
.attends.row .tile.attend-trip {background: #EDE7F6}
.attends.row .tile.attend-trip .attend-status {color: #673AB7}
.attends.row .tile.attend-trip.today {background: #673AB7}
.attends.row .tile.attend-overtime {background: #EFEBE9}
.attends.row .tile.attend-overtime .attend-status {color: #795548}
.attends.row .tile.attend-overtime.today {background: #795548}
.attends.row .tile.signin {background: #FF5722}
.attends.row .tile.signin .attend-status {color: #fff}
</style>
<div class='attends-container'>
  <div class='row flex-nowrap attends' id='<?php echo $attendsUID; ?>'>
    <?php
    foreach($dateList as $d)
    {
        echo "<div class='cell'>";
        $dStr      = date('Y-m-d', $d);
        $isToday   = $dStr == $date;
        $week      = date('w', $d);
        $isWeekend = $week === 0 or $week === 6;
        $class     = $isToday ? 'today ' : '';
        $shortDate = date(DT_DATE4, $d);
        if($isWeekend) $class .= 'weekend ';

        if(isset($attends[$dStr]))
        {
             $attend = $attends[$dStr]->status;
             $class .= 'attend-' . $attend;
             $signIn = !$todaySignIn && $isToday && $attend != 'normal' && !$isWeekend;
             if($signIn) $class .= ' signin state';

             $reviewStatus = isset($attends[$dStr]->reviewStatus) ? $attends[$dStr]->reviewStatus : '';
             if($reviewStatus == 'wait' or strpos(',early,late,both,', $attend) !== false)
             {
                 $remote = $this->createLink('oa.attend', 'edit', "date=" . str_replace('-', '', $dStr));
                 echo "<div class='tile $class' data-display='modal' data-remote='{$remote}' data-placement='bottom'>";
             }
             else
             {
                 echo "<div class='tile $class'>";
             }
             if($isToday)
             {
                  if($signIn) echo "<div class='attend-status'>{$lang->attend->signIn}</div>";
                  else if($attend == 'normal') echo "<div class='attend-status'><i class='icon icon-check'></i></div>";
                  else echo '<div class="attend-status">' . zget($this->lang->attend->abbrStatusList, $attends[$dStr]->status) . '</div>';
             }
             elseif($attend == 'normal') echo "<div class='attend-status'><i class='icon icon-check'></i></div>";
             else echo '<div class="attend-status">' . zget($this->lang->attend->abbrStatusList, $attends[$dStr]->status) . '</div>';
        }
        else
        {
            echo "<div class='tile $class'><div class='attend-status'><i class='icon icon-time'></i></div>";
        }
        echo "<small>$shortDate</small></div></div>";
    }
    ?>
  </div>
</div>
<script>
$(function()
{
    $('#<?php echo $attendsUID; ?> .signin').ajaxAction(
    {
       remote: '<?php echo $this->createLink('oa.attend', 'signin') ?>',
       success: function()
       {
          $('#<?php echo $attendsUID; ?>').closest('[data-display-name]').display('show');
       }
    });
});
</script>
