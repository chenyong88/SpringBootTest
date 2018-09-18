<?php
/**
 * The task block view file of block module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<table class='table table-fixed table-hover table-condensed block-task'>
  <?php foreach($tasks as $id => $task):?>
  <?php
  if(strpos('createdBy,assignedTo,finishedBy', $type) !== false)
  {
      $isParent  = !empty($task->children);
      $isMulti   = !empty($task->team);
      $startDisabled  = (!$isParent and $this->loadModel('task', 'sys')->isClickable($task, 'start')) ? '' : 'disabled';
      $finishDisabled = (!$isParent and $this->task->isClickable($task, 'finish')) ? '' : 'disabled';
      $recordEstimateDisabled = (!$isParent and $this->task->isClickable($task, 'recordEstimate')) ? '' : 'disabled';
  }
  ?>
  <?php $appid = ($this->get->app == 'sys' and isset($_GET['entry'])) ? "class='app-btn' data-id={$this->get->entry}" : ''?>
  <tr <?php echo $appid?>>
    <td class='w-30px text-center'><span class='active pri pri-<?php echo $task->pri;?>'><?php echo $lang->task->priList[$task->pri];?></span></td>
    <td title='<?php echo $task->name;?>' onclick="<?php echo "$.openEntry('proj', '" . $this->createLink('proj.task', 'view', "taskID=$task->id") . "')";?>"> <a href="###"><?php echo $task->name;?></a></td>
    <td class='w-50px'><?php echo $lang->task->statusList[$task->status];?></td>
    <?php if(strpos('createdBy,assignedTo,finishedBy', $type) !== false):?>
    <td class='actions w-50px'>
      <div class='dropdown'>
        <a href='###' data-target='#' data-toggle='dropdown' role='button' id='dLabel'><?php echo $lang->actions;?><span class='caret'></span></a>
        <ul aria-labelledby='dropdownMenu1' role='menu' class='dropdown-menu'>
          <?php $this->task->buildOperateMenu($task, '', 'block');?>
        </ul>
      </div>
    </td>
    <?php endif;?>
  </tr>
  <?php endforeach;?>
</table>
<script>$('.block-task').dataTable();</script>
