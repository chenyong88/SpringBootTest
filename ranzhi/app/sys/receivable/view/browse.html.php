<?php
/**
 * The browse view file of receivable module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     receivable 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include $app->appRoot . 'common/view/header.html.php';?>
<div id='menuActions'>
  <?php commonModel::printLink('receivable', 'create', '', "<i class='icon-plus'> </i>" . $lang->receivable->create, "class='btn btn-primary' data-toggle='modal'");?>
</div>
<div class='panel'>
  <table class='table table-condensed table-bordered table-striped table-hover tablesorter table-fixed'>
    <thead>
      <tr class='text-center'>
        <?php $vars = "orderBy=%s&recTotal=$pager->recTotal&recPerPage=$pager->recPerPage&pageID=$pager->pageID";?>
        <th class='w-50px'><?php commonModel::printOrderLink('id', $orderBy, $vars, $lang->receivable->id);?></th>
        <th><?php commonModel::printOrderLink('trader', $orderBy, $vars, $lang->receivable->trader);?></th>
        <th class='w-100px'><?php commonModel::printOrderLink('origin', $orderBy, $vars, $lang->receivable->origin);?></th>
        <th class='w-200px'><?php commonModel::printOrderLink('contract', $orderBy, $vars, $lang->receivable->contract);?></th>
        <th class='w-120px'><?php commonModel::printOrderLink('order', $orderBy, $vars, $lang->receivable->order);?></th>
        <th class='w-120px'><?php commonModel::printOrderLink('batch', $orderBy, $vars, $lang->receivable->batch);?></th>
        <th class='w-80px'><?php commonModel::printOrderLink('deserved', $orderBy, $vars, $lang->receivable->deserved);?></th>
        <th class='w-80px'><?php commonModel::printOrderLink('actual', $orderBy, $vars, $lang->receivable->actual);?></th>
        <th class='w-80px'><?php commonModel::printOrderLink('balance', $orderBy, $vars, $lang->receivable->balance);?></th>
        <th class='w-100px'><?php echo $lang->receivable->desc;?></th>
        <?php $class = $this->app->clientLang == 'en' ? 'w-200px' : 'w-130px';?>
        <th class='<?php echo $class;?>'><?php echo $lang->actions;?></th>
      </tr>
    </thead>
    <?php $deserved = $actual = 0;?>
    <?php foreach($receivables as $receivable):?>
    <?php $deserved += $receivable->deserved;?>
    <?php $actual   += $receivable->actual;?>
    <tr>
      <td class='text-center'><?php echo $receivable->id;?></td>
      <td title='<?php echo zget($customers, $receivable->trader, '');?>'><?php echo zget($customers, $receivable->trader, '');?></td>
      <td><?php echo $lang->receivable->originList[$receivable->origin];?></td>
      <td title='<?php echo zget($contracts, $receivable->contract, '');?>'><?php echo zget($contracts, $receivable->contract, '');?></td>
      <td title='<?php echo zget($orders, $receivable->order, '');?>'><?php echo zget($orders, $receivable->order, '');?></td>
      <td title='<?php echo zget($batches, $receivable->batch, '');?>'><?php echo zget($batches, $receivable->batch, '');?></td>
      <td class='text-right'><?php echo formatMoney($receivable->deserved);?></td>
      <td class='text-right'><?php echo formatMoney($receivable->actual);?></td>
      <td class='text-right'><?php echo formatMoney($receivable->balance);?></td>
      <td><?php echo $receivable->desc;?></td>
      <td class='text-center'>
        <?php 
        if($mode == 'receivable') 
        {
            commonModel::printLink('receivable', 'receive', "receivableID=$receivable->id", $lang->receivable->receive, "data-toggle='modal' data-width='500'"); 
        }
        else
        {
            echo html::a('###', $lang->receivable->receive, "disabled='disabled'");
        }
        commonModel::printLink('receivable', 'edit', "receivableID=$receivable->id", $lang->receivable->edit, "data-toggle='modal'");
        commonModel::printLink('receivable', 'view',   "receivableID=$receivable->id&mode=$mode", $lang->receivable->view);
        commonModel::printLink('receivable', 'delete', "receivableID=$receivable->id", $lang->receivable->delete, "class='deleter'");
        ?>
      </td>
    </tr>
    <?php endforeach;?>
  </table>
  <div class='table-footer'>
    <?php if($receivables):?>
    <div class='pull-left'>
      <span class='text-danger'><?php printf($lang->receivable->totalMoney, $totalMoney->deserved, $totalMoney->actual, $totalMoney->balance, $deserved, $actual, $deserved - $actual);?></span>
    </div>
    <?php endif;?>
    <?php $pager->show();?>
  </div>
</div>
<?php include $app->appRoot . 'common/view/footer.html.php';?>
