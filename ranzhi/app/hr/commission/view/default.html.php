<?php
/**
 * The default report view file of commission module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     commission 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<table class='table table-condensed table-bordered table-striped table-hover table-fixed table-fixedHeader tablesorter'>
  <thead>
    <?php $vars = "month=$currentYear$currentMonth&mode=$mode&orderBy=%s";?>
    <tr class='text-center'>
      <th class='w-80px headerTH'>
        <a href='#' class='expandAll' data-action='expand'><i class='icon-caret-down'></i></a>
        <a href='#' class='collapseAll' data-action='collapse' style='display:none'><i class='icon-caret-right'></i></a>
        <?php commonModel::printOrderLink('account', $orderBy, $vars, $lang->commission->account);?>
      </th>
      <th class='w-80px'><?php echo $lang->commission->type;?></th>
      <th class='w-80px'><?php echo $lang->commission->rule;?></th>
      <th><?php commonModel::printOrderLink('trader', $orderBy, $vars, $lang->commission->trader);?></th>
      <th><?php commonModel::printOrderLink('product', $orderBy, $vars, $lang->commission->product . ' / ' . $lang->commission->lineCommission->lineList);?></th>
      <th class='w-100px'><?php commonModel::printOrderLink('money', $orderBy, $vars, $lang->commission->money);?></th>
      <th class='w-100px'><?php commonModel::printOrderLink('commission', $orderBy, $vars, $lang->commission->base);?></th>
      <th class='w-100px'><?php commonModel::printOrderLink('rate', $orderBy, $vars, $lang->commission->contribution . ' / ' . $lang->commission->rate);?></th>
      <th class='w-80px'><?php commonModel::printOrderLink('amount', $orderBy, $vars, $lang->commission->amount);?></th>
    </tr>
  </thead>
  <?php $recordCount = $totalMoney = $totalCommission = $totalAmount = 0;?>
  <?php foreach($commissionList as $account => $commissions):?>
  <?php $lineCommissionList = isset($commissions['lineCommissionList']) ? $commissions['lineCommissionList'] : array();?>
  <?php $saleCommissionList = isset($commissions['saleCommissionList']) ? $commissions['saleCommissionList'] : array();?>
  <?php $saleRule           = isset($commissions['saleRule']) ? $commissions['saleRule'] : array();?>
  <?php $count = count($lineCommissionList) + count($saleCommissionList);?>
  <?php $lineCount = $saleCount = $money = $commission = $amount = 0;?>
  <?php foreach($lineCommissionList as $lineCommission):?>
  <tr class='text-center child-<?php echo $account;?>'>
    <?php if($lineCount == 0):?>
    <td class='groupuser text-middle not-table-hover' rowspan='<?php echo $count + 1;?>' title='<?php echo zget($userList, $account, ' ');?>'>
      <a href='#' class='account' data-account='<?php echo $account;?>'><i class='icon-caret-down'></i><?php echo zget($userList, $account, ' ');?></a>
    </td>
    <td class='groupuser text-middle not-table-hover' rowspan='<?php echo count($lineCommissionList);?>'><?php echo $lang->commission->typeList['line'];?></td>
    <?php endif;?>
    <td></td>
    <td></td>
    <td><?php echo $lineCommission->line;?></td>
    <td class='text-right'><?php echo formatMoney($lineCommission->money);?></td>
    <td class='text-right'><?php echo formatMoney($lineCommission->commission);?></td>
    <td><?php echo formatMoney($lineCommission->rate) . $lang->percent;?></td>
    <td class='text-right'><?php echo formatMoney($lineCommission->amount);?></td>
  </tr>
  <?php 
      $lineCount++;
      $recordCount++;
      $money           += $lineCommission->money;
      $commission      += $lineCommission->commission;
      $amount          += $lineCommission->amount;
      $totalMoney      += $lineCommission->money;
      $totalCommission += $lineCommission->commission;
      $totalAmount     += $lineCommission->amount;
      endforeach;
      foreach($saleCommissionList as $saleCommission):
  ?>
  <tr class='text-center child-<?php echo $account;?>'>
    <?php if($saleCount == 0):?>
    <?php if($lineCount ==0):?>
    <td class='groupuser text-middle not-table-hover' rowspan='<?php echo $count + 1;?>' title='<?php echo zget($userList, $account, ' ');?>'>
      <a href='#' class='account' data-account='<?php echo $account;?>'><i class='icon-caret-down'></i><?php echo zget($userList, $account, ' ');?></a>
    </td>
    <?php endif;?>
    <td class='groupuser text-middle not-table-hover' rowspan='<?php echo count($saleCommissionList);?>'><?php echo $lang->commission->typeList['sale'];?></td>
    <?php endif;?>
    <td>
    <?php if(!empty($saleRule->rule)) echo $lang->commission->saleCommission->ruleList[$saleRule->rule];?>
    </td>
    <td class='text-left' title='<?php echo zget($customers, $saleCommission->trader, ' ');?>'><?php echo zget($customers, $saleCommission->trader, ' ');?></td>
    <td class='text-left' title='<?php echo zget($products, $saleCommission->product, ' ');?>'><?php echo zget($products, $saleCommission->product, ' ');?></td>
    <td class='text-right'><?php echo formatMoney($saleCommission->money);?></td>
    <td class='text-right'><?php echo formatMoney($saleCommission->commission);?></td>
    <?php if(!empty($saleRule->rule) && $saleRule->rule == 'multistep'):?>
    <td><?php echo formatMoney($saleCommission->contribution) . $lang->percent;?></td>
    <?php else:?>
    <td><?php echo formatMoney($saleCommission->rate) . $lang->percent;?></td>
    <?php endif;?>
    <td class='text-right'><?php echo formatMoney($saleCommission->amount);?></td>
  </tr>
  <?php 
      $saleCount++;
      $recordCount++;
      $money           += $saleCommission->money;
      $commission      += $saleCommission->commission;
      $amount          += $saleCommission->amount;
      $totalMoney      += $saleCommission->money;
      $totalCommission += $saleCommission->commission;
      $totalAmount     += $saleCommission->amount;
      endforeach;
      if($count):
  ?>
  <tr class='text-center footer child-<?php echo $account;?>'>
    <th><?php echo $lang->commission->total;?></th>
    <td colspan='3'></td>
    <th class='text-right'><?php echo formatMoney($money);?></th>
    <th class='text-right'><?php echo formatMoney($commission);?></th>
    <td></td>
    <th class='text-right'><?php echo formatMoney($amount);?></th>
  </tr>
  <tr class='text-center groupheader header-<?php echo $account;?>' style='display:none' title='<?php echo zget($userList, $account, ' ');?>'>
    <th class='text-left'>
      <a href='#' class='account' data-account='<?php echo $account;?>'><i class='icon-caret-right'></i><?php echo zget($userList, $account, ' ');?></a>
    </th>
    <td colspan='4'></td>
    <td class='text-right'><?php echo formatMoney($money);?></td>
    <td class='text-right'><?php echo formatMoney($commission);?></td>
    <td></td>
    <td class='text-right'><?php echo formatMoney($amount);?></td>
  </tr>
  <?php endif;?>
  <?php endforeach;?>
  <tr class='text-center footer'>
    <th class=''><?php echo $lang->commission->total;?></th>
    <td colspan='4'></td>
    <th class='text-right'><?php echo formatMoney($totalMoney);?></th>
    <th class='text-right'><?php echo formatMoney($totalCommission);?></th>
    <td></td>
    <th class='text-right'><?php echo formatMoney($totalAmount);?></th>
  </tr>
</table>
