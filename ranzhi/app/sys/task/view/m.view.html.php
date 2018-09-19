<?php
/**
 * The task view mobile view file of task module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     task 
 * @version     $Id
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}

$moduleMenu = false;
$bodyClass  = 'with-nav-bottom';

include "../../common/view/m.header.html.php";

$isTaskDone   = $task->status == 'done';
$isTaskClosed = $task->status == 'closed';
$statusIcons  = array();
$statusIcons['wait']   = 'time';
$statusIcons['doing']  = 'play';
$statusIcons['done']   = 'check';
$statusIcons['cancel'] = 'times';
$statusIcons['closed'] = 'minus';
$headingColor = $isTaskClosed ? 'dark' : ($isTaskDone ? 'success' : 'pri-' . $task->pri);
?>
<style>.pri-0 {background: #666;}</style>

<div id='page' class='list-with-actions'>
  <div class='heading gray'>
    <div class='title'><i class='icon-calendar'> </i><?php echo $lang->task->common . $lang->detail;?></i></div>
    <nav class='nav'><a href="javascript:history.go(-1);" class='btn primary'><?php echo $lang->goback;?></a></nav>
  </div>
  <div class='box'>
    <table class='table bordered table-detail'>
      <tr>
        <td class='w-80px'><?php echo $lang->task->name;?></td>
        <td><?php echo $task->name?></td>
      </tr>
      <?php if($task->parent != 0):?>
      <tr>
        <td><?php echo $lang->task->parent;?></td>
        <td><?php echo html::a(inlink('view', "id=$parent->id"), $parent->name);?></td>
      </tr>
      <?php endif;?>
      <tr>
        <td><?php echo $lang->task->project;?></td>
        <td><?php echo $projects[$task->project];?></td>
      </tr>
      <tr>
        <td><?php echo $lang->task->assignedTo;?></td>
        <td><?php echo zget($members, $task->assignedTo, $task->assignedTo);?></td>
      </tr>
      <tr>
        <td><?php echo $lang->task->status;?></td>
        <td><span class='label status-<?php echo $task->status;?>'><?php echo $lang->task->statusList[$task->status];?></span></td>
      </tr>
      <tr>
        <td><?php echo $lang->task->pri;?></td>
        <td><?php echo $lang->task->priList[$task->pri];?></td>
      </tr>
      <tr>
        <td><?php echo $lang->task->deadline;?></td>
        <td><?php echo $task->deadline;?></td>
      </tr>
      <tr>
        <td><?php echo $lang->task->estimate;?></td>
        <td><?php echo $task->estimate;?></td>
      </tr>
      <tr>
        <td><?php echo $lang->task->consumed;?></td>
        <td><?php echo $task->consumed;?></td>
      </tr>
      <tr>
        <td><?php echo $lang->task->left;?></td>
        <td><?php echo $task->left;?></td>
      </tr>
      <tr>
        <td><?php echo $lang->task->desc;?></td>
        <td><?php echo $task->desc;?></td>
      </tr>
    </table>
  </div>
  <div class='heading gray'>
    <div class='title'><i class='icon icon-file-text-o'> </i><?php echo $lang->task->life;?></div>
  </div>
  <div class='box'>
    <table class='table bordered table-detail'>
      <tr>
        <td class='w-80px'><?php echo $lang->task->createdBy;?></td>
        <td><?php echo zget($users, $task->createdBy, $task->createdBy) . $lang->at . $task->createdDate;?></td>
      </tr>
      <?php if($task->finishedBy):?>
      <tr>
        <td><?php echo $lang->task->finishedBy;?></td>
        <td><?php echo zget($users, $task->finishedBy, $task->finishedBy) . $lang->at . $task->finishedDate;?></td>
      </tr>
      <?php endif;?>
      <?php if($task->canceledBy):?>
      <tr>
        <td><?php echo $lang->task->canceledBy;?></td>
        <td><?php echo zget($users, $task->canceledBy, $task->canceledBy) . $lang->at . $task->canceledDate;?></td>
      </tr>
      <?php endif;?>
      <?php if($task->closedBy):?>
      <tr>
        <td><?php echo $lang->task->closedBy;?></td>
        <td><?php echo zget($users, $task->closedBy, $task->closedBy) . $lang->at . $task->closedDate;?></td>
      </tr>
      <tr>
        <td><?php echo $lang->task->closedReason;?></td>
        <td><?php echo $lang->task->reasonList[$task->closedReason];?></td>
      </tr>
      <?php endif;?>
      <?php if($task->editedBy):?>
      <tr>
        <td><?php echo $lang->task->lastEditedBy;?></td>
        <td><?php echo zget($users, $task->editedBy, $task->editedBy) . $lang->at . $task->editedDate;?></td>
      </tr>
      <?php endif;?>
    </table>
  </div>

  <?php if(!empty($task->files)):?>
  <div class='heading gray'>
    <div class='title'><i class='icon icon-file-text-o'> </i><?php echo $lang->file->common;?></div>
  </div>
  <div class='box'>
    <div class='list'>
      <?php echo $this->fetch('file', 'printFiles', array('files' => $task->files, 'fieldset' => 'false'))?>
    </div>
  </div>
  <?php endif;?>

  <div class='section' id='history'>
    <?php echo $this->fetch('action', 'history', "objectType=task&objectID={$task->id}");?>
  </div>

  <nav class='nav nav-auto affix dock-bottom footer-actions'>
    <?php
    $canEdit   = $this->task->checkPriv($task, 'edit');
    $canDelete = $this->task->checkPriv($task, 'delete');

    if($canEdit) echo "<a data-remote='{$this->createLink('task', 'edit', "id=$task->id")}' data-display='modal' data-placement='bottom'>{$lang->edit}</a>";
    if(empty($task->parent) and empty($task->team))
    {
        if($canEdit and $this->task->isClickable($task, 'recordEstimate')) echo "<a data-remote='{$this->createLink('task', 'recordestimate', "id=$task->id")}' data-display='modal' data-placement='bottom'>{$lang->task->recordEstimate}</a>";

        if($canEdit and $this->task->isClickable($task, 'assignto')) echo "<a data-remote='{$this->createLink('task', 'assignto', "id=$task->id")}' data-display='modal' data-placement='bottom'>{$lang->assign}</a>";

        if($canEdit and $this->task->isClickable($task, 'start')) echo "<a data-remote='{$this->createLink('task', 'start', "id=$task->id")}' class='primary' data-display='modal' data-placement='bottom'>{$lang->start}</a>";

        if($canEdit and $this->task->isClickable($task, 'finish')) echo "<a data-remote='{$this->createLink('task', 'finish', "id=$task->id")}' class='success' data-display='modal' data-placement='bottom'>{$lang->finish}</a>";

        if($canEdit and $this->task->isClickable($task, 'close')) echo "<a data-remote='{$this->createLink('task', 'close', "id=$task->id")}' data-display='modal' data-placement='bottom'>{$lang->close}</a>";
    }
    if($canDelete and $this->task->isClickable($task, 'delete')) echo "<a data-remote='{$this->createLink('task', 'delete', "id=$task->id")}' class='danger' data-display='ajaxAction' data-ajax-delete='true' data-locate='{$this->createLink('task', 'browse', "projectID=$task->project")}'>{$lang->delete}</a>";
    if($canEdit) echo html::a('#commentBox', $this->lang->comment, "data-display data-backdrop='true'");
    if($canEdit and strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false and isset($this->config->wechat->chooseImage) and $this->config->wechat->chooseImage == 'open') echo "<a href='javascript:;' class='chooseImage' data-url='{$this->createLink('sys.wechat', 'uploadImage', "image=imageID&objectType=task&objectID={$task->id}")}' data-placement='bottom'>{$lang->files}</a>";
    ?>
  </nav>
</div>

<div id='commentBox' class='enter-from-bottom hidden affix layer'>
  <div class='heading'>
    <div class='title'><?php echo $lang->comment;?></div>
    <nav class='nav'><a data-dismiss='display' class='muted'><i class='icon-remove'></i></a></nav>
  </div>
  <form id='commentForm' class='modal-form has-padding' data-form-refresh='#history' method='post' action='<?php echo inlink('edit', "taskID=$task->id&comment=true")?>'>
    <div class='control'><?php echo html::textarea('remark', '',"rows='5' class='textarea' data-default-val");?></div>
    <div class='control'><button type='submit' class='btn primary'><?php echo $lang->save;?></button></div>
  </form>
</div>
<?php include "../../common/view/m.footer.html.php"; ?>
