<?php
/**
 * The task start mobile view file of task module of RanZhi.
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
  <div class='title'><strong><?php echo $task->name . $lang->minus . $lang->start;?></strong></div>
  <nav class='nav'><a data-dismiss='display'><i class='icon icon-remove muted'></i></a></nav>
</div>

<form class='content box' id='startForm' data-form-refresh='#page' method='post' action='<?php echo $this->createLink('task', 'start', "taskID=$taskID")?>'>
  <div class='control'>
    <label for='realStarted'><?php echo $lang->task->realStarted;?></label>
    <input type='date' class='input' id='realStarted' name='realStarted' value='<?php echo $task->realStarted;?>'>
  </div>
  <div class='control'>
    <label for='consumed'><?php echo $lang->task->consumed;?></label>
    <?php echo html::input('consumed', $task->consumed, "class='input'");?>
  </div>
  <div class='control'>
    <label for='left'><?php echo $lang->task->left;?></label>
    <?php echo html::input('left', $task->left, "class='input'");?>
  </div>
  <div class='control'>
    <label for='comment'><?php echo $lang->comment;?></label>
    <?php echo html::textarea('comment', '', "rows='5' class='textarea'");?>
  </div>
</form>

<div class='footer has-padding'>
  <button type='button' data-submit='#startForm' class='btn primary'><?php echo $lang->save;?></button>
</div>

<script>
$(function()
{
    $('#startForm').modalForm().listenScroll({container: 'parent'});
});
</script>
