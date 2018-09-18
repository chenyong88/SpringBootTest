<?php
/**
 * The task finish mobile view file of task module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     task 
 * @version     $Id
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}
?>

<div class='heading divider'>
  <div class='title'><strong><?php echo $task->name . $lang->minus . $lang->finish;?></strong></div>
  <nav class='nav'><a data-dismiss='display'><i class='icon icon-remove muted'></i></a></nav>
</div>

<form class='content box' id='finishForm' data-form-refresh='#page' method='post' action='<?php echo $this->createLink('task', 'finish', "taskID=$taskID");?>'>
  <div class='control'>
    <label for='consumed'><?php echo $lang->task->consumed;?></label>
    <?php echo html::input('consumed', $task->consumed, "class='input'");?>
  </div>
  <div class='control'>
    <label for='assignedTo'><?php echo $lang->task->assignedTo;?></label>
    <div class='select'><?php echo html::select('assignedTo', $users, $task->createdBy);?></div>
  </div>
  <div class='control'>
    <label for='finishedDate'><?php echo $lang->task->finishedDate;?></label>
    <input type='date' id='finishedDate' name='finishedDate' class='input'>
  </div>
  <div class='control'>
    <label for='comment'><?php echo $lang->comment;?></label>
    <?php echo html::textarea('comment', '', "rows='5' class='textarea'");?>
  </div>
</form>

<div class='footer has-padding'>
  <button type='button' data-submit='#finishForm' class='btn primary'><?php echo $lang->save;?></button>
</div>

<script>
$(function()
{
    $('#finishForm').modalForm().listenScroll({container: 'parent'});
});
</script>
