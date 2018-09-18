<?php
/**
 * The browse mobile view file of order module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     order 
 * @version     $Id: index.html.php 3830 2016-05-18 09:34:17Z liugang $
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}

include "../../common/view/m.header.html.php";
?>
<div class='heading'>
  <div class='title'>
    <a id='sortTrigger' class='text-right sort-trigger' data-display data-target='#sortPanel' data-backdrop='true'><i class='icon icon-sort'></i>&nbsp;<span class='sort-name'><?php echo $lang->sort ?></span></a>
  </div>
  <nav class='nav'>
    <a class='btn primary' data-display='modal' data-placement='bottom' data-remote='<?php echo $this->createLink('order', 'create') ?>'>
      <i class='icon icon-plus'></i> &nbsp;&nbsp;<?php echo $lang->order->create;?>
    </a>
  </nav>
</div>

<section id='page' class='section list-with-pager'>
  <?php $refreshUrl = $this->createLink('order', 'browse', "mode=$mode&orderBy=$orderBy&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}");?>
  <div class='box' data-page='<?php echo $pager->pageID ?>' data-refresh-url='<?php echo $refreshUrl ?>'>
    <table class='table bordered no-margin'>
      <thead>
        <tr>
          <th class='w-50px'><?php echo $lang->order->id;?></th>
          <th><?php echo $lang->order->customer;?></th>
          <th class='w-80px'><?php echo $lang->order->real;?></th>
          <th class='w-70px text-center'><?php echo $lang->order->status;?></th>
        </tr>
      </thead>
      <?php foreach($orders as $order):?>
      <tr class='text-center' data-url='<?php echo $this->createLink('order', 'view', "orderID={$order->id}")?>' data-id='<?php echo $order->id;?>'>
        <td><?php echo $order->id;?></td>
        <td class='text-left'><?php echo $order->customerName;?></td>
        <td><?php echo formatMoney($order->real) ? zget($currencySign, $order->currency, '') . formatMoney($order->real) : '';?></td>
        <td><span class='label status-<?php echo $order->status;?>'><?php echo zget($lang->order->statusList, $order->status);?></span></td>
      </tr>
      <?php endforeach;?>
      <?php if(!empty($totalAmount)):?>
      <tfoot>
        <tr>
          <td class='text-red small' colspan='4'>
            <?php printf($lang->order->totalAmount, implode('，', $totalAmount['plan']), implode('，', $totalAmount['real']));?>
          </td>
        </tr>
      </tfoot>
      <?php endif;?>
    </table>
  </div>
  <nav class='nav justified pager'>
    <?php $pager->show($align = 'justify');?>
  </nav>
</section>

<div class='list sort-panel hidden affix enter-from-bottom layer' id='sortPanel'>
  <?php
  $vars = "mode={$mode}&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}";
  $sortOrders = array('id', 'customer', 'product', 'plan', 'real', 'assignedTo', 'status', 'contactedDate', 'nextDate');
  foreach ($sortOrders as $order)
  {
      commonModel::printOrderLink($order, $orderBy, $vars, '<i class="icon icon-sort-indicator"></i>' . ($order == 'level' ? $lang->customer->level : $lang->order->{$order}));
  }
  ?>
</div>

<script>
$('#menu > a').removeClass('active').filter('[href*="<?php echo $mode ?>"]').addClass('active');
</script>
<?php include "../../common/view/m.footer.html.php"; ?>
