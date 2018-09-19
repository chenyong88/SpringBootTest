<?php
/**
 * The task create mobile view file of task module of RanZhi.
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
  <div class='title'><i class='icon-plus muted'></i> <strong><?php echo $lang->task->create;?></strong></div>
  <nav class='nav'><a data-dismiss='display'><i class='icon icon-remove muted'></i></a></nav>
</div>
<form class='content box' data-form-refresh='#page' method='post' id='createTaskForm' action='<?php echo $this->createLink('proj.task', 'create', "projectID={$projectID}");?>'>
  <div class='row'>
    <div class='cell-9'>
      <div class='control'>
        <label for='name'><?php echo $lang->task->name;?></label>
        <?php echo html::input('name', '', "class='input' placeholder='{$lang->required}'");?>
      </div>
    </div>
    <div class='cell-3'>
      <div class='control'>
        <label for='pri'><?php echo $lang->task->pri;?></label>
        <div class='select'><?php echo html::select('pri', $lang->task->priList);?></div>
      </div>
    </div>
  </div>
  <div class='control'>
    <label for='assignedTo'><?php echo $lang->task->assignedTo;?></label>
    <div class='select'><?php echo html::select('assignedTo', $members);?></div>
  </div>
  <div class='row'>
    <div class='cell'>
      <div class='control'>
        <label for='estimate'><?php echo $lang->task->estimate;?></label>
        <?php echo html::input('estimate', '', "class='input'");?>
      </div>
    </div>
    <div class='cell'>
      <div class='control'>
        <label for='deadline'><?php echo $lang->task->deadline;?></label>
        <input type='date' class='input' id='deadline' name='deadline'>
      </div>
    </div>
  </div>
  <div class='control'>
    <label for='desc'><?php echo $lang->task->desc;?></label>
    <?php echo html::textarea('desc', '', "rews='5' class='textarea'");?>
  </div>
  <div class='control'>
    <label for='mailto[]'><?php echo $lang->task->mailto;?></label>
    <div class='select multiple'><?php echo html::select('mailto[]', $users, '', 'multiple');?></div>
  </div>
  <div class='control'>
    <?php echo $this->fetch('file', 'buildForm', 'fileCount=1');?>
  </div>
</form>

<div class='footer has-padding'>
  <button type='button' data-submit='#createTaskForm' class='btn primary'><?php echo $lang->save;?></button>
</div>

<script>
$(function()
{
    $('#createTaskForm').modalForm().listenScroll({container: 'parent'});
});
</script>

