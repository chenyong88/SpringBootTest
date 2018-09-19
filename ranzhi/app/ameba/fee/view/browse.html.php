<?php
/**
 * The browse view file of fee module of Ranzhi.
 *
 * @copyright   Copyright 2009-2017 青岛易软天创网络科技有限公司 
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     fee 
 * @version     $Id$
 * @link        http://www.ranzhi.org 
 */
?>
<?php include '../../common/view/header.html.php';?>
<div id='menuActions'>
  <?php commonModel::printLink('fee', 'create', '', "<i class='icon icon-plus'> </i>" . $lang->fee->create, "class='btn btn-primary'");?>
</div>
<div class='panel'>
  <table class='table table-stripped table-hover tablesorter table-fixedHeader'>
    <thead>
      <tr class='text-center'>
        <?php $vars = "month=$month&dept=$dept&orderBy=%s&recTotal=$pager->recTotal&recPerPage=$pager->recPerPage&pageID=$pager->pageID";?>
        <th class='w-60px'><?php commonModel::printOrderLink('id', $orderBy, $vars, $lang->fee->id);?></th>
        <?php if($month):?>
        <th class='w-80px'><?php commonModel::printOrderLink('month', $orderBy, $vars, $lang->year . $lang->month);?></th>
        <?php endif;?>
        <?php $class = $this->app->clientLang == 'en' ? 'w-150px' : 'w-120px';?>
        <th class='<?php echo $class;?>'><?php commonModel::printOrderLink('category', $orderBy, $vars, $lang->fee->category);?></th>
        <th class='w-80px'><?php commonModel::printOrderLink('dept', $orderBy, $vars, $lang->fee->dept);?></th>
        <th class='w-100px text-right'><?php commonModel::printOrderLink('money', $orderBy, $vars, $lang->fee->money);?></th>
        <th class='w-80px'><?php commonModel::printOrderLink('type', $orderBy, $vars, $lang->fee->type);?></th>
        <th class='w-70px'><?php commonModel::printOrderLink('period', $orderBy, $vars, $lang->fee->period);?></th>
        <th><?php echo $lang->fee->sharedFees;?></th>
        <?php $class = $this->app->clientLang == 'en' ? 'w-140px' : 'w-110px';?>
        <th class='<?php echo $class;?>'><?php echo $lang->actions;?></th>
      </tr>
    </thead>
    <tbody>
      <?php $totalMoney = 0;?>
      <?php foreach($feeList as $fee):?>
      <?php $totalMoney += $fee->money;?>
      <tr class='text-center'>
        <td><?php if(!commonModel::printLink('fee', 'view', "feeID=$fee->id", $fee->id)) echo $fee->id;?></td>
        <?php if($month):?>
        <td><?php echo $fee->month;?></td>
        <?php endif;?>
        <td class='text-left'><?php echo zget($categoryPairs, $fee->category);?></td>
        <td><?php echo zget($deptPairs, $fee->dept);?></td>
        <td class='text-right'><?php echo formatMoney($fee->money);?></td>
        <td><?php echo zget($lang->fee->typeList, $fee->type);?></td>
        <td><?php echo zget($lang->fee->periodList, $fee->period);?></td>
        <td class='text-left'>
          <?php
          foreach($fee->sharedFees as $sharedFee)
          {
              echo zget($deptPairs, $sharedFee->dept) . ' ' . $sharedFee->rate . '%; ';
          }
          ?>
        </td>
        <td>
          <?php commonModel::printLink('fee', 'view',   "feeID=$fee->id", $lang->detail);?>
          <?php commonModel::printLink('fee', 'edit',   "feeID=$fee->id", $lang->edit);?>
          <?php commonModel::printLink('fee', 'delete', "feeID=$fee->id", $lang->delete, "class='deleter'");?></td>
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>  
  <div class='table-footer'>
    <span class='text-danger'>
      <strong><?php if($totalMoney) printf($lang->fee->totalMoney, formatMoney($totalMoney));?></strong>
    </span>
    <?php echo $pager->show();?>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
