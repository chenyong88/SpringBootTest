<?php
/**
 * The create weekly view file of effort module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     effort 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../sys/my/view/header.html.php';?>
<div id='menuActions' class='actions'>
<?php commonModel::printLink('effort', 'createWeekly', '', "<i class='icon icon-create'></i> " . $lang->effort->weekly->create, "class='btn btn-primary'");?>
</div>
<div class='panel'>
  <?php $vars = "account=$account&orderBy=%s&recTotal=$pager->recTotal&recPerPage=$pager->recPerPage&pageID=$pager->pageID";?>
  <table class='table table-hover table-bordered tablesorter table-fixed'>
    <thead>
      <tr class='text-center'>
        <th class='w-50px'><?php  commonModel::printOrderLink('id', $orderBy, $vars, $lang->effort->weekly->id);?></th>
        <th class='w-160px'><?php commonModel::printOrderLink('begin', $orderBy, $vars, $lang->effort->weekly->dateRange);?></th>
        <th class='w-200px'><?php commonModel::printOrderLink('title', $orderBy, $vars, $lang->effort->weekly->title);?></th>
        <th><?php echo $lang->effort->weekly->summary;?></th>
        <th class='w-80px'><?php commonModel::printOrderLink('status', $orderBy, $vars, $lang->effort->weekly->status);?></th>
        <th class='w-140px'><?php commonModel::printOrderLink('createdDate', $orderBy, $vars, $lang->effort->weekly->createdDate);?></th>
        <th class='w-100px'><?php echo $lang->actions;?></th>
      </tr>
    </thead>
    <?php foreach($weeklyList as $weekly):?>
    <tr class='text-center'>
      <td><?php echo $weekly->id;?></td>
      <td><?php echo $weekly->begin . ' ~ ' . $weekly->end;?></td>
      <td class='text-left' title='<?php echo $weekly->title;?>'><?php echo $weekly->title;?></td>
      <td class='text-left' title='<?php echo $weekly->summary;?>'><?php echo $weekly->summary;?></td>
      <td><?php echo zget($lang->effort->weekly->statusList, $weekly->status);?></td>
      <td><?php echo formatTime($weekly->createdDate, DT_DATE1);?></td>
      <td>
        <?php commonModel::printLink('effort', 'viewWeekly', "id=$weekly->id", $lang->view);?>
        <?php commonModel::printLink('effort', 'editWeekly', "id=$weekly->id", $lang->edit);?>
        <?php commonModel::printLink('effort', 'deleteWeekly', "id=$weekly->id", $lang->delete, "class='deleter'");?>
      </td>
    </tr>
    <?php endforeach;?>
    <tfoot>
      <tr><td colspan='7'><?php echo $pager->show();?></td></tr>
    </tfoot>
  </table>
</div>
<?php include '../../../sys/common/view/footer.html.php';?>
