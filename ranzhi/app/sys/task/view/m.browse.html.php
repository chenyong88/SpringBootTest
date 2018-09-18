<?php
/**
 * The task browse mobile view file of task module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     task 
 * @version     $Id
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}

$moduleMenu = commonModel::printLink('task', 'browse', "projectID=$projectID&mode=all", $this->lang->task->all, '', false);
if(isset($project->members[$this->app->user->account])) $moduleMenu .= commonModel::printLink('task', 'browse', "projectID=$projectID&mode=assignedTo", $this->lang->task->assignedToMe, '', false);
$moduleMenu .= commonModel::printLink('task', 'browse', "projectID=$projectID&mode=createdBy",  $this->lang->task->createdByMe, '', false);
$moduleMenu .= commonModel::printLink('task', 'browse', "projectID=$projectID&mode=finishedBy", $this->lang->task->finishedByMe, '', false);
$moduleMenu .= commonModel::printLink('task', 'browse', "projectID=$projectID&mode=untilToday", $this->lang->task->untilToday, '', false);
$moduleMenu .= commonModel::printLink('task', 'browse', "projectID=$projectID&mode=expired",    $this->lang->task->expired, '', false);


include $app->getModuleRoot() . "common/view/m.header.html.php";
?>

<div class='project-list hidden'>
  <a data-display='dropdown' data-placement='beside-bottom-start'><?php echo $project ? $project->name : $lang->project->selectProject;?> &nbsp;<i class='icon-caret-down'></i></a>
  <div class='list dropdown-menu'>
    <?php
    foreach($projects as $id => $projectName)
    {
        commonModel::printLink('task', 'browse', "projectID=$id", $projectName, "class='item'");
    }
    ?>
  </div>
</div>

<div class='heading'>
  <div class='title'>
    <a id='sortTrigger' class='text-right sort-trigger' data-display data-target='#sortPanel' data-backdrop='true'><i class='icon icon-sort'></i>&nbsp;<span class='sort-name'><?php echo $lang->sort ?></span></a>
  </div>
  <?php if($projectID):?>
  <nav class='nav'>
    <a data-display='modal' data-placement='bottom' data-remote='<?php echo $this->createLink('proj.task', 'create', "projectID=$projectID");?>' class='btn primary'><i class='icon icon-plus'> </i> &nbsp;&nbsp;<?php echo $lang->task->create;?></a>
  </nav>
  <?php endif;?>
</div>

<section id='page' class='section list-with-pager'>
  <?php $refreshUrl = $this->createLink('task', 'browse', "projectID=$projectID&mode=$mode&orderBy=$orderBy&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}");?>
  <div class='box' data-page='<?php echo $pager->pageID;?>' data-refresh-url='<?php echo $refreshUrl;?>'>
    <table class='table bordered no-margin'>
      <thead>
        <tr>
          <th class='text-center w-40px'><?php echo $lang->task->lblPri;?> </th>
          <th><?php echo $lang->task->name;?> </th>
          <th class='text-center w-80px'><?php echo $lang->task->assignedTo;?> </th>
          <th class='text-center w-70px'><?php echo $lang->project->status;?> </th>
        </tr>
      </thead>
      <?php foreach($tasks as $task):?>
      <tr class='text-center' data-url='<?php echo $this->createLink('proj.task', 'view', "taskID={$task->id}")?>' data-id='<?php echo $task->id;?>'>
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
  $vars = "projectID={$projectID}&mode={$mode}&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}";
  $sortOrders = array('id', 'pri', 'name', 'deadline', 'assignedTo', 'status', 'createdDate', 'consumed', 'left');
  foreach($sortOrders as $task)
  {
      commonModel::printOrderLink($task, $orderBy, $vars, '<i class="icon icon-sort-indicator"></i>' . ($task == 'level' ? $lang->customer->level : $lang->task->{$task}));
  }
  ?>
</div>

<script>
$('#menu > a').removeClass('active').filter('[href*="<?php echo $mode;?>"]').addClass('active');
$('#menu').prepend($('.project-list').html());
$(document).on('click', '#menu > a[data-display=dropdown]', function()
{
    $('[id*=displayTarget-display]').css('top', '140px');
})
</script>

<?php include $app->getModuleRoot() . "common/view/m.footer.html.php"; ?>
