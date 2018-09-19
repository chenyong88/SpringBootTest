<?php
/**
 * The task block mobile view file of block module of RanZhi.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php $users = $this->loadModel('user')->getPairs(); ?>
<table class='table bordered'>
  <thead>
    <tr>
      <th class='text-center w-40px'><?php echo $lang->task->lblPri;?> </th>
      <th><?php echo $lang->task->name;?> </th>
      <th class='text-center w-80px'><?php echo $lang->task->assignedTo;?> </th>
      <th class='text-center w-70px'><?php echo $lang->project->status;?> </th>
    </tr>
  </thead>
  <?php foreach($tasks as $task):?>
  <tr class='text-center' data-id='<?php echo $task->id;?>' data-url='<?php echo $this->createLink('proj.task', 'view', "taskID={$task->id}");?>'>
    <td><span class='label pri-<?php echo $task->pri;?>'><?php echo $task->pri;?></span></td>
    <td class='text-left'><?php echo $task->name;?></td>
    <td><?php echo zget($users, $task->assignedTo);?></td>
    <td><span class='label status-<?php echo $task->status;?>'><?php echo zget($lang->task->statusList, $task->status);?></span></td>
  </tr>
  <?php endforeach;?>
</table>
