<?php
/**
 * The browse review file of refund module of Ranzhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     refund
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php include '../../../sys/common/view/treeview.html.php';?>
<?php js::set('status', $status);?>
<li id='bysearchTab'><?php echo html::a('#', "<i class='icon-search icon'></i>" . $lang->search->common)?></li>
<?php if($status == 'reviewed'):?>
<div class='with-side'>
  <div class='side'>
    <div class='panel panel-sm'>
      <div class='panel-body'>
        <ul class='tree' data-collapsed='true'>
          <?php foreach($yearList as $year):?>
          <li class='<?php echo $year == $currentYear ? 'active' : ''?>'>
            <?php commonModel::printLink('refund', 'browsereview', "status=$status&date=$year", $year);?>
            <ul>
              <?php foreach($monthList[$year] as $month):?>
              <li class='<?php echo ($year == $currentYear and $month == $currentMonth) ? 'active' : ''?>'>
                <?php commonModel::printLink('refund', 'browsereview', "status=$status&date=$year$month", $year . $month);?>
              </li>
              <?php endforeach;?>
            </ul>
          </li>
          <?php endforeach;?>
        </ul>
      </div>
    </div>
  </div>
  <div class='main'>
<?php endif;?>
    <div class='panel'>
      <table class='table table-hover table-striped table-data table-fixed tablesorter'>
        <thead>
          <tr class='text-center'>
            <?php $vars = "status=$status&date=$date&type=&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}";?>
            <th class='w-50px'><?php commonModel::printOrderLink('id', $orderBy, $vars, $lang->refund->id);?></th>
            <th class='w-80px text-left'><?php commonModel::printOrderLink('dept', $orderBy, $vars, $lang->refund->dept);?></th>
            <th><?php commonModel::printOrderLink('name', $orderBy, $vars, $lang->refund->name);?></th>
            <th class='w-140px'><?php commonModel::printOrderLink('category', $orderBy, $vars, $lang->refund->category);?></th>
            <th class='w-100px text-right'><?php commonModel::printOrderLink('money', $orderBy, $vars, $lang->refund->money);?></th>
            <th class='w-100px'><?php commonModel::printOrderLink('status', $orderBy, $vars, $lang->refund->status);?></th>
            <th class='w-80px'><?php commonModel::printOrderLink('createdBy', $orderBy, $vars, $lang->refund->createdBy);?></th>
            <th class='w-80px'><?php commonModel::printOrderLink('createdDate', $orderBy, $vars, $lang->refund->createdDate);?></th>
            <th class='w-240px'><?php echo $lang->refund->desc;?></th>
            <?php $class = $this->app->clientLang == 'en' ? 'w-100px' : 'w-80px';?>
            <th class='<?php echo $class;?>'><?php echo $lang->actions;?></th>
          </tr>
        </thead>
        <?php foreach($refunds as $refund):?>
        <tr class='text-center' data-url='<?php echo $this->createLink('refund', 'view', "refundID={$refund->id}&mode=review&status=$status");?>'>
          <td><?php echo $refund->id;?></td>
          <td class='text-left'><?php echo zget($deptList, $refund->dept);?></td>
          <td class='text-left' title='<?php echo $refund->name;?>'><?php echo $refund->name;?></td>
          <td class='text-left' title='<?php echo zget($categories, $refund->category);?>'><?php echo zget($categories, $refund->category, ' ');?></td>
          <td class='text-right'><?php echo zget($currencySign, $refund->currency) . $refund->money;?></td>
          <td class='refund-<?php echo $refund->status;?>' title='<?php echo $refund->statusLabel;?>'><?php echo $refund->statusLabel;?></td>
          <td><?php echo isset($users[$refund->createdBy]) ? $users[$refund->createdBy]->realname : '';?></td>
          <td><?php echo formatTime($refund->createdDate, DT_DATE1);?></td>
          <td class='text-left' title='<?php echo $refund->desc;?>'><?php echo $refund->desc;?></td>
          <td class='text-left'>
            <?php 
            echo html::a($this->createLink('refund', 'view', "refundID={$refund->id}&mode=review&status=$status"), $lang->detail);
            if(strpos(',wait,doing,', ",$refund->status,") !== false)
            {
                echo html::a($this->createLink('refund', 'review', "refundID={$refund->id}"), $lang->refund->review, "data-toggle='modal' data-width='800'");
            }
            else
            {
                echo html::a('javascript:;', $lang->refund->review, "class='disabled'");
            }
            ?>
          </td>
        </tr>
        <?php endforeach;?>
      </table>
      <div class='table-footer'>
        <?php $totalMoney = $this->refund->total($refunds);?>
        <?php if($totalMoney):?>
        <div class='pull-left text-danger'><?php echo $lang->refund->total . $totalMoney;?></div>
        <?php endif;?>
        <?php $pager->show();?>
      </div>
    </div>
<?php if($status == 'reviewed'):?>
  </div>
</div>
<?php endif;?>
<?php include '../../common/view/footer.html.php';?>
