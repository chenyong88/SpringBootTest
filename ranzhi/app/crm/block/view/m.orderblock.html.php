<?php
/**
 * The order block mobile view file of block module of RanZhi.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php $currencySign = $this->loadModel('common', 'sys')->getCurrencySign(); ?>
<table class='table bordered'>
  <thead>
    <tr>
      <th><?php echo $lang->order->customer;?></th>
      <th class='text-center w-90px'><?php echo $lang->order->real;?></th>
      <th class='text-center w-80px'><?php echo $lang->order->status;?></th>
    </tr>
  </thead>
  <?php foreach($orders as $order):?>
  <tr class= 'text-center' data-id='<?php echo $order->id ?>' data-url='<?php echo $this->createLink('crm.order', 'view', "orderID={$order->id}");?>'>
    <td class='text-left'><?php echo zget($customers, $order->customer);?></td>
    <td><?php echo formatMoney($order->real) ? zget($currencySign, $order->currency) . $order->real : '';?></td>
    <td><span class='label status-<?php echo $order->status;?>'><?php echo zget($lang->order->statusList, $order->status);?></span></td>
  </tr>
  <?php endforeach;?>
</table>
