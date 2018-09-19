<?php
/**
 * The view mobile view file of project module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     project 
 * @version     $Id: index.html.php 3830 2016-05-18 09:34:17Z liugang $
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}

$moduleMenu = false;
$bodyClass  = 'with-nav-bottom';
$browseLink = !empty($this->session->projectList) ? $this->session->projectList : inlink('index'); 

$statusIcons = array();
$statusIcons['doing']    = array('icon' => 'time', 'color' => 'blue');
$statusIcons['finished'] = array('icon' => 'check', 'color' => 'green');
$statusIcons['suspend']  = array('icon' => 'minus', 'color' => 'purple');
$projectColor = $statusIcons[$project->status]['color'];

include "../../common/view/m.header.html.php";
?>

<div id='page' class='list-with-actions'>
  <div class='section no-margin'>
    <div class='heading gray'>
      <div class='title'><i class='icon-calendar'> </i><?php echo $lang->project->view;?></div>
      <nav class='nav'><?php echo html::a($browseLink, $lang->goback, "class='btn primary'");?></nav>
    </div>
    <div class='box'>
      <table class='table bordered table-detail'>
        <tr>
          <td class='w-80px'><?php echo $lang->project->name;?></td>
          <td><?php echo $project->name;?></td>
        </tr>
        <?php if(!empty($project->desc)):?>
        <tr>
          <td><?php echo $lang->project->desc;?></td>
          <td><?php echo $project->desc;?></td>
        </tr>
        <?php endif;?>
        <tr>
          <td><?php echo $lang->project->manager;?></td>
          <td><?php echo zget($users, $project->PM);?></td>
        </tr>
        <tr>
          <td><?php echo $lang->project->dateRange;?></td>
          <td><?php echo $project->begin . ' ~ ' . $project->end;?></td>
        </tr>
        <tr>
          <td><?php echo $lang->project->status;?></td>
          <td><span class='label status-<?php echo $project->status;?>-pale'><?php echo zget($lang->project->statusList, $project->status);?></td>
        </tr>
        <tr>
          <td><?php echo $lang->project->createdBy;?></td>
          <td><?php echo zget($users, $project->createdBy) . ' ' . $project->createdDate;?></td>
        </tr>
      </table>
    </div>
  </div>

  <div class='section' id='history'>
    <?php echo $this->fetch('action', 'history', "objectType=project&objectID={$project->id}");?>
  </div>

  <nav class='nav affix dock-bottom nav-auto footer-actions'>
  <?php
    $canEdit   = commonModel::hasPriv('project', 'edit');
    $canMember = commonModel::hasPriv('project', 'member');
    $canDelete = commonModel::hasPriv('project', 'delete');
    $canFinish = commonModel::hasPriv('project', 'finish');
    $canActive = commonModel::hasPriv('project', 'activate');
    $canSuspend = commonModel::hasPriv('project', 'suspend');

    $this->app->loadLang('task', 'sys');
    $browseLink = helper::createLink('task', $this->cookie->taskListType == false ? 'browse' : $this->cookie->taskListType, "projectID=$project->id");
    echo "<a href='{$browseLink}' class='primary' data-placement='bottom'>{$lang->task->browse}</a>";
    if($canEdit)   echo "<a data-remote='{$this->createLink("proj.project", "edit", "projectID={$project->id}")}' data-display='modal' data-placement='bottom'>{$lang->edit}</a>";
    if($canMember) echo "<a data-remote='{$this->createLink('proj.project', 'member', "projectID={$project->id}")}' data-display='modal' data-placement='bottom'>{$lang->project->member}</a>";
    if($canFinish and $project->status != 'finished') echo "<a data-remote='{$this->createLink('proj.project', 'finish', "projectID=$project->id")}' class='success' data-display='modal', data-placement='bottom'>{$lang->finish}</a>";
    if($canActive and $project->status != 'doing') echo "<a data-remote='{$this->createLink('proj.project', 'activate', "projectID=$project->id")}' data-display='ajaxAction', data-confirm='{$lang->project->confirm->activate}' data-locate='{$this->createLink('proj.project', 'view', "projectID=$project->id")}'>{$lang->activate}</a>";
    if($canSuspend and $project->status != 'suspend') echo "<a data-remote='{$this->createLink('proj.project', 'suspend', "projectID=$project->id")}' data-display='ajaxAction', data-confirm='{$lang->project->confirm->suspend}' data-locate='{$this->createLink('proj.project', 'view', "projectID=$project->id")}'>{$lang->project->suspend}</a>";
    if($canDelete) echo "<a data-remote='{$this->createLink('proj.project', 'delete', "projectID=$project->id")}' class='danger' data-display='ajaxAction' data-ajax-delete='true' data-locate='{$this->createLink('proj.project', 'index')}'>{$lang->delete}</a>";
  ?>
  </nav>
</div>

<?php include "../../common/view/m.footer.html.php"; ?>
