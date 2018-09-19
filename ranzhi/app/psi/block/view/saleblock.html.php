<?php
/**
 * The order block view file of block module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<table class='table table-data table-hover block-order table-fixed'>
  <?php foreach($orders as $id => $order):?>
  <?php $appid = ($this->get->app == 'sys' and isset($_GET['entry'])) ? "class='app-btn' data-id='{$this->get->entry}'" : ''?>
  <tr data-url='<?php echo $this->createLink('psi.sale', 'detail', "orderID=$id"); ?>' <?php echo $appid?>>
    <td class='w-100px'><?php echo $order->orderNo;?></td>
    <td><?php echo zget($companies, $order->trader);?></td>
    <td class='w-80px'><?php echo $order->money;?></td>
    <td class='w-60px'><?php echo zget($lang->order->statusList, $order->status, ' ');?></td>
  </tr>
  <?php endforeach;?>
</table>
<script>$('.block-order').dataTable();</script>
