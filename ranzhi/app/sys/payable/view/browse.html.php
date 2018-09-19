<?php
/**
 * The browse view file of payable module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     payable 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include $app->appRoot . 'common/view/header.html.php';?>
<div id='menuActions'>
  <?php commonModel::printLink('payable', 'create', '', "<i class='icon-plus'> </i>" . $lang->payable->create, "class='btn btn-primary' data-toggle='modal'");?>
</div>
<div class='panel'>
  <table class='table table-condensed table-bordered table-striped table-hover tablesorter table-fixed'>
    <thead>
      <tr class='text-center'>
        <?php $vars = "orderBy=%s&recTotal=$pager->recTotal&recPerPage=$pager->recPerPage&pageID=$pager->pageID";?>
        <th class='w-50px'><?php commonModel::printOrderLink('id', $orderBy, $vars, $lang->payable->id);?></th>
        <th><?php commonModel::printOrderLink('trader', $orderBy, $vars, $lang->payable->trader);?></th>
        <th class='w-100px'><?php commonModel::printOrderLink('origin', $orderBy, $vars, $lang->payable->origin);?></th>
        <th class='w-120px'><?php commonModel::printOrderLink('order', $orderBy, $vars, $lang->payable->order);?></th>
        <th class='w-120px'><?php commonModel::printOrderLink('batch', $orderBy, $vars, $lang->payable->batch);?></th>
        <th class='w-80px'><?php commonModel::printOrderLink('deserved', $orderBy, $vars, $lang->payable->deserved);?></th>
        <th class='w-80px'><?php commonModel::printOrderLink('actual', $orderBy, $vars, $lang->payable->actual);?></th>
        <th class='w-80px'><?php commonModel::printOrderLink('balance', $orderBy, $vars, $lang->payable->balance);?></th>
        <th class='w-100px'><?php echo $lang->payable->desc;?></th>
        <?php $class = $this->app->clientLang == 'en' ? 'w-200px' : 'w-130px';?>
        <th class='<?php echo $class;?>'><?php echo $lang->actions;?></th>
      </tr>
    </thead>
    <?php $deserved = $actual = 0;?>
    <?php foreach($payables as $payable):?>
    <?php $deserved += $payable->deserved;?>
    <?php $actual   += $payable->actual;?>
    <tr>
      <td class='text-center'><?php echo $payable->id;?></td>
      <td title='<?php echo zget($customers, $payable->trader, '');?>'><?php echo zget($customers, $payable->trader, '');?></td>
      <td><?php echo $lang->payable->originList[$payable->origin];?></td>
      <td title='<?php echo zget($orders, $payable->order, '');?>'><?php echo zget($orders, $payable->order, '');?></td>
      <td title='<?php echo zget($batches, $payable->batch, '');?>'><?php echo zget($batches, $payable->batch, '');?></td>
      <td class='text-right'><?php echo formatMoney($payable->deserved);?></td>
      <td class='text-right'><?php echo formatMoney($payable->actual);?></td>
      <td class='text-right'><?php echo formatMoney($payable->balance);?></td>
      <td><?php echo $payable->desc;?></td>
      <td class='text-center'>
        <?php 
        if($mode == 'payable') 
        {
            commonModel::printLink('payable', 'pay', "payableID=$payable->id", $lang->payable->pay, "data-toggle='modal' data-width='500'"); 
        }
        else
        {
            echo html::a('###', $lang->payable->pay, "disabled='disabled'");
        }
        commonModel::printLink('payable', 'edit', "payableID=$payable->id", $lang->payable->edit, "data-toggle='modal'");
        commonModel::printLink('payable', 'view',   "payableID=$payable->id&mode=$mode", $lang->payable->view);
        commonModel::printLink('payable', 'delete', "payableID=$payable->id", $lang->payable->delete, "class='deleter'");
        ?>
      </td>
    </tr>
    <?php endforeach;?>
  </table>
  <div class='table-footer'>
    <?php if($payables):?>
    <div class='pull-left'>
      <span class='text-danger'><?php printf($lang->payable->totalMoney, $totalMoney->deserved, $totalMoney->actual, $totalMoney->balance, $deserved, $actual, $deserved - $actual);?></span>
    </div>
    <?php endif;?>
    <?php $pager->show();?>
  </div>
</div>
<?php include $app->appRoot . 'common/view/footer.html.php';?>
