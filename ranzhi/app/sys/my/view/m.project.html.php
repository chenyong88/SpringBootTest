<?php
/**
 * The project browse mobile view file of my module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     my
 * @version     $Id: index.html.php 3830 2016-05-18 09:34:17Z liugang $
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}

include "../../common/view/m.header.html.php";
?>

<div class='heading'>
  <nav class='nav fluid'>
    <a id='sortTrigger' class='text-right sort-trigger' data-display data-target='#sortPanel' data-backdrop='true'><i class='icon icon-sort'></i>&nbsp;<span class='sort-name'><?php echo $lang->sort ?></span></a>
  </nav>
</div>

<section id='page' class='section list-with-pager'>
  <?php $refreshUrl = $this->createLink('my', 'project', "orderBy=$orderBy&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}");?>
  <div class='box' data-page='<?php echo $pager->pageID;?>' data-refresh-url='<?php echo $refreshUrl;?>'>
    <table class='table bordered'>
      <thead>
        <tr>
          <th><?php echo $lang->project->name;?></th>
          <th class='w-70px'><?php echo $lang->project->manager;?></th>
          <th class='w-70px text-center'><?php echo $lang->project->status;?></th>
        </tr>
      </thead>
      <?php foreach($projects as $project):?>
      <tr class='text-center' data-url='<?php echo $this->createLink('proj.task', 'browse', "projectID={$project->id}");?>' data-id='<?php echo $project->id;?>'>
        <td class='text-left'><?php echo $project->name;?> </td>
        <td><?php foreach($project->members as $member) if($member->role == 'manager') echo zget($users, $member->account);?> </td>
        <td><span class='label status-<?php echo $project->status;?>-pale'><?php echo zget($lang->project->statusList, $project->status);?></span></td>
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
  $vars = "orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}";
  $sortOrders = array('id', 'name', 'manager', 'begin', 'end', 'status', 'desc', 'createdBy', 'createdDate');
  foreach ($sortOrders as $project)
  {
      commonModel::printOrderLink($project, $orderBy, $vars, '<i class="icon icon-sort-indicator"></i>' . ($project == 'level' ? $lang->customer->level : $lang->project->{$project}));
  }
  ?>
</div>

<?php include "../../common/view/m.footer.html.php"; ?>
