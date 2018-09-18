<?php
/**
 * The task edit mobile view file of task module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     task 
 * @version     $Id
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();} ?>

<div class='heading divider'>
  <div class='title'><i class='icon-pencil muted'></i> <strong><?php echo $lang->task->edit;?></strong></div>
  <nav class='nav'>
    <a class='text-primary' data-display='modal' data-remote='<?php echo $this->createLink('action', 'history', "objectType=task&objectID={$task->id}") ?>' data-placement='bottom'><i class='icon-history'></i>&nbsp;<?php echo $lang->history;?></a>
    <a data-dismiss='display'><i class='icon icon-remove muted'></i></a>
  </nav>
</div>
<form class='content box' data-form-refresh='#page' method='post' id='editTaskForm' action='<?php echo $this->createLink('task', 'edit', "taskID={$task->id}");?>'>
  <div class='row'>
    <div class='cell-9'>
      <div class='control'>
        <label for='name'><?php echo $lang->task->name;?></label>
        <?php echo html::input('name', $task->name, "class='input' placeholder='{$lang->required}'");?>
      </div>
    </div>
    <div class='cell-3'>
      <div class='control'>
        <label for='primary'><?php echo $lang->task->pri;?></label>
        <div class='select'><?php echo html::select('pri', $lang->task->priList, $task->pri);?></div>
      </div>
    </div>
  </div>
  <div class='control'>
    <label for='project'><?php echo $lang->task->project;?></label>
    <div class='select'><?php echo html::select('project', $projects, $task->project);?></div>
  </div>
  <div class='control'>
    <label for='assignedTo'><?php echo $lang->task->assignedTo;?></label>
    <div class='select'><?php echo html::select('assignedTo', !empty($members) ? $members : $projectMembers, $task->assignedTo);?></div>
  </div>
  <div class='control'>
    <label for='status'><?php echo $lang->task->status;?></label>
    <div class='select'><?php echo html::select('status', $lang->task->statusList, $task->status);?></div>
  </div>
  <div class='row'>
    <div class='cell'>
      <div class='control'>
        <label for='estimate'><?php echo $lang->task->estimate;?></label>
        <?php echo html::input('estimate', $task->estimate, "class='input'");?>
      </div>
    </div>
    <div class='cell'>
      <div class='control'>
        <label for='deadline'><?php echo $lang->task->deadline;?></label>
        <input type='date' class='input' id='deadline' value='<?php echo $task->deadline;?>' name='deadline'>
      </div>
    </div>
  </div>
  <div class='row'>
    <div class='cell'>
      <div class='control'>
        <label for='consumed'><?php echo $lang->task->consumed;?></label>
        <?php echo html::input('consumed', $task->consumed, "class='input'");?>
      </div>
    </div>
    <div class='cell'>
      <div class='control'>
        <label for='left'><?php echo $lang->task->left;?></label>
        <?php echo html::input('left', $task->left, "class='input'");?>
      </div>
    </div>
  </div>
  <div class='space'></div>
  <div class='heading gray'>
    <div class='title text-important'><?php echo $lang->task->life;?></div>
  </div>
  <div class='control'>
    <label for='createdBy'><?php echo $lang->task->createdBy;?></label>
    <input type='text' class='input' disabled value='<?php echo zget($users, $task->createdBy) ?>'>
  </div>
  <div class='control'>
    <label for='finishedBy'><?php echo $lang->task->finishedBy;?></label>
    <div class='select'><?php echo html::select('finishedBy', $users, $task->finishedBy);?></div>
  </div>
  <div class='control'>
    <label for='finishedDate'><?php echo $lang->task->finishedDate;?></label>
    <input type='date' class='input' id='finishedDate' value='<?php echo $task->finishedDate;?>' name='finishedDate'>
  </div>
  <div class='control'>
    <label for='canceledBy'><?php echo $lang->task->canceledBy;?></label>
    <div class='select'><?php echo html::select('canceledBy', $users, $task->canceledBy);?></div>
  </div>
  <div class='control'>
    <label for='canceledDate'><?php echo $lang->task->canceledDate;?></label>
    <input type='date' class='input' id='canceledDate' value='<?php echo $task->canceledDate;?>' name='canceledDate'>
  </div>
  <div class='control'>
    <label for='closedBy'><?php echo $lang->task->closedBy;?></label>
    <div class='select'><?php echo html::select('closedBy', $users, $task->closedBy);?></div>
  </div>
  <div class='control'>
    <label for='closedDate'><?php echo $lang->task->closedDate;?></label>
    <input type='date' class='input' id='closedDate' value='<?php echo $task->closedDate;?>' name='closedDate'>
  </div>
  <div class='control'>
    <label for='closedReason'><?php echo $lang->task->closedReason;?></label>
    <div class='select'><?php echo html::select('closedReason', $lang->task->reasonList, $task->closedReason);?>
  </div>
  <div class='control'>
    <label for='desc'><?php echo $lang->task->desc;?></label>
    <?php echo html::textarea('desc', $task->desc, "rews='5' class='textarea'");?>
  </div>
  <div class='control'>
    <label for='remark'><?php echo $lang->comment;?></label>
    <?php echo html::textarea('remark', '', "rews='5' class='textarea'");?>
  </div>
  <div class='control'>
    <label for='mailto[]'><?php echo $lang->task->mailto;?></label>
    <div class='select multiple'><?php echo html::select('mailto[]', $users, $task->mailto, 'multiple');?></div>
  </div>
  <div class='control'>
    <?php echo $this->fetch('file', 'buildForm', 'fileCount=1');?>
  </div>
</form>

<div class='footer has-padding'>
  <button type='button' data-submit='#editTaskForm' class='btn primary'><?php echo $lang->save;?></button>
</div>

<script>
$(function()
{
    $('#editTaskForm').modalForm().listenScroll({container: 'parent'});
});
</script>
