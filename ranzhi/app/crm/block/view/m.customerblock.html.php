<?php
/**
 * The customer block mobile view file of block module of RanZhi.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<table class='table bordered'>
  <thead>
    <tr>
      <th><?php echo $lang->customer->name;?></th>
      <th class='text-center w-100px'><?php echo $lang->customer->nextDate;?></th>
      <th class='text-center w-70px'><?php echo $lang->customer->status;?></th>
    </tr>
  </thead>
  <?php foreach($customers as $customer):?>
  <tr class= 'text-center' data-id='<?php echo $customer->id ?>' data-url='<?php echo $this->createLink('crm.customer', 'view', "customerID={$customer->id}")?>'>
    <td class='text-left'><?php echo $customer->name;?></td>
    <td><?php echo formatTime($customer->nextDate);?></td>
    <td><span class='label status-<?php echo $customer->status;?>'><?php echo zget($lang->customer->statusList, $customer->status);?></span></td>
  </tr>
  <?php endforeach;?>
</table>
