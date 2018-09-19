<?php
/**
 * The browse mobile view file of refund module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     refund 
 * @version     $Id
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}

include "../../common/view/m.header.html.php";?>

<style>
.list > .list {margin-left: 10px;}
.list > .item {padding: 8px;}
</style>
<div class='heading'>
  <?php if($yearList):?>
  <div class='title'>
    <a data-display='dropdown' data-placement='beside-bottom-start'><i class='icon-bars'></i> &nbsp; <?php echo $lang->refund->date;?></a>
    <div class='list dropdown-menu'>
      <?php foreach($yearList as $year):?>    
      <a class='item item-year' href='<?php echo inlink($mode, "date={$year}");?>'><?php echo $year;?></a>
      <div class='list'>
        <?php foreach($monthList[$year] as $month):?>    
        <a class='item item-month' href='<?php echo inlink($mode, "date=$year$month");?>'><?php echo $year . $month;?></a>
        <?php endforeach;?>
      </div>
      <?php endforeach;?>
    </div>
  </div>
  <?php endif;?>

  <nav class='nav'>
    <a id='sortTrigger' class='text-right sort-trigger' data-display data-target='#sortPanel' data-backdrop='true'><i class='icon icon-sort'></i>&nbsp;<span class='sort-name'><?php echo $lang->sort;?></span></a>
    <a class='btn primary' data-display='modal' data-placement='bottom' data-remote='<?php echo $this->createLink('refund', 'create') ?>'>
      <i class='icon icon-plus'></i> &nbsp;&nbsp;<?php echo $lang->refund->create;?>
    </a>
  </nav>
</div>
<section id='page' class='section list-with-pager'>
  <?php $refreshUrl = $this->createLink('refund', 'browse', "mode={$mode}&date={$date}&orderBy={$orderBy}&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}");?>
  <div class='box' data-page='<?php echo $pager->pageID;?>' data-refresh-url='<?php echo $refreshUrl;?>'>
    <table class='table bordered'>
      <thead>
        <tr>
         <th class='w-80px text-center'><?php echo $lang->refund->createdBy;?></th>
         <th><?php echo $lang->refund->name;?></th>
         <th class='w-80px text-center'><?php echo $lang->refund->money;?></th>
         <th class='w-90px text-center'><?php echo $lang->refund->status;?></th>
        </tr>
      </thead>
      <?php foreach($refunds as $refund):?>
      <tr class='text-center' data-url='<?php echo inlink('view', "refundID={$refund->id}&mode={$mode}")?>' data-id='<?php echo $refund->id;?>'>
        <td><?php echo zget($userPairs, $refund->createdBy);?></td>
        <td><?php echo $refund->name;?></td>
        <td class='text-right'><?php echo zget($currencySign, $refund->currency) . $refund->money;?></td>
        <td><span class='label status-<?php echo $refund->status?>-pale'><?php echo zget($lang->refund->statusList, $refund->status);?></span></td>
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
  $vars   = "data={$date}&orderBy=%s";
  $orders = array('id', 'name', 'category', 'money', 'status', 'createdBy', 'createdDate', 'firstReviewer', 'refundBy', 'refundDate');
  foreach($orders as $order)
  {
      commonModel::printOrderLink($order, $orderBy, $vars, '<i class="icon icon-sort-indicator"></i>' . $lang->refund->{$order});
  }
  ?>
</div>

<?php include "../../common/view/m.footer.html.php";?>
