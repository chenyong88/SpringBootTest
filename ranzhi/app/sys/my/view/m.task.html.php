<?php
/**
 * The task browse mobile view file of my module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     my
 * @version     $Id: index.html.php 3830 2016-05-18 09:34:17Z liugang $
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}

$moduleMenu = $this->my->createModuleMenu($this->methodName);
include "../../common/view/m.header.html.php";
?>

<div class='heading'>
  <div class='title'>
    <a id='sortTrigger' class='text-right sort-trigger' data-display data-target='#sortPanel' data-backdrop='true'><i class='icon icon-sort'></i>&nbsp;<span class='sort-name'><?php echo $lang->sort ?></span></a>
  </div>
</div>

<section id='page' class='section list-with-actions list-with-pager'>
  <?php $refreshUrl = $this->createLink('my', 'task', "type={$type}&orderBy=$orderBy&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}");?>
  <div class='box' data-page='<?php echo $pager->pageID;?>' data-refresh-url='<?php echo $refreshUrl;?>'>
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
      <tr class='text-center' data-url='<?php echo $this->createLink('proj.task', 'view', "taskID={$task->id}");?>' data-id='<?php echo $task->id;?>'>
        <td><span class='label pri-<?php echo $task->pri;?>'><?php echo $task->pri;?></span></td>
        <td class='text-left'><?php echo $task->name;?></td>
        <td><?php echo zget($users, $task->assignedTo);?></td>
        <td><span class='label status-<?php echo $task->status;?>'><?php echo zget($lang->task->statusList, $task->status);?></span></td>
      </tr>
      <?php endforeach;?>
    </table>
  </div>

  <nav class='nav justify pager'>
    <?php $pager->show($align = 'justify');?>
  </nav>
</section>

<div class='list sort-panel hidden affix enter-from-bottom layer' id='sortPanel'>
  <?php
  $vars = "type={$type}&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}";
  $sortOrders = array('id', 'pri', 'name', 'deadline', 'assignedTo', 'status', 'createdDate', 'consumed', 'left');
  foreach ($sortOrders as $task)
  {
      commonModel::printOrderLink($task, $orderBy, $vars, '<i class="icon icon-sort-indicator"></i>' . ($task == 'level' ? $lang->customer->level : $lang->task->{$task}));
  }
  ?>
</div>

<script>
$('#menu > a').removeClass('active').filter('[href*="<?php echo $type ?>"]').addClass('active');
</script>
<?php include "../../common/view/m.footer.html.php"; ?>
