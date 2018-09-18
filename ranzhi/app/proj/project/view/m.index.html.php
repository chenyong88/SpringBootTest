<?php
/**
 * The index mobile view file of project module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     project 
 * @version     $Id
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}
include "../../common/view/m.header.html.php";?>

<?php if(count($projects)):?>
<div class='heading'>
  <div class='title'>
    <a id='sortTrigger' class='text-right sort-trigger' data-display data-target='#sortPanel' data-backdrop='true'><i class='icon icon-sort'></i>&nbsp;<span class='sort-name'><?php echo $lang->sort;?></span></a>
  </div>
  <nav class='nav'>
    <a data-display='modal' data-placement='bottom' data-remote='<?php echo $this->createLink('project', 'create');?>' class='btn primary'><i class='icon icon-plus'> </i>&nbsp;&nbsp; <?php echo $lang->project->create;?></a>
  </nav>
</div>
<?php endif;?>

<section id='page' class='section list-with-pager'>
  <?php $refreshUrl = $this->createLink('project', 'index', "status={$status}&orderBy=$orderBy&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}");?>
  <div class='box' data-page='<?php echo $pager->pageID;?>' data-refresh-url='<?php echo $refreshUrl;?>'>
    <table class='table bordered no-margin'>
      <thead>
        <tr>
          <th><?php echo $lang->project->name;?></th>
          <th class='w-70px'><?php echo $lang->project->manager;?></th>
          <th class='w-70px text-center'><?php echo $lang->project->status;?></th>
          <th class='w-60px'></th>
        </tr>
      </thead>
      <?php foreach($projects as $project):?>
      <tr class='text-center' data-id='<?php echo $project->id;?>'>
        <td class='text-left'><?php echo html::a($this->createLink('proj.task', 'browse', "projectID={$project->id}"), $project->name);?> </td>
        <td><?php foreach($project->members as $member) if($member->role == 'manager') echo zget($users, $member->account);?> </td>
        <td><span class='label status-<?php echo $project->status;?>-pale'><?php echo zget($lang->project->statusList, $project->status);?></span></td>
        <td><span class='label primary-pale text-tint'><?php echo html::a(inlink('view', "projectID={$project->id}"), $lang->detail);?></span></td>
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
  $vars   = "status={$status}&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}";
  $orders = array('id', 'name', 'begin', 'end', 'createdBy', 'createdDate', 'status');
  foreach($orders as $order)
  {
      commonModel::printOrderLink($order, $orderBy, $vars, '<i class="icon icon-sort-indicator"></i>' . $lang->project->{$order});
  }
  ?>
</div>

<script>
$('#menu > a').removeClass('active').filter('[href*="<?php echo $status;?>"]').addClass('active');
</script>
<?php include "../../common/view/m.footer.html.php";?>
