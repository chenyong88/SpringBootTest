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
  <?php foreach($batches as $id => $batch):?>
  <?php $order = zget($orders, $batch->order);?>
  <?php $appid = ($this->get->app == 'sys' and isset($_GET['entry'])) ? "class='app-btn' data-id='{$this->get->entry}'" : ''?>
  <tr <?php echo $appid?>>
    <td class='w-100px'><?php echo $order->orderNo;?></td>
    <td><?php echo zget($customers, $batch->trader);?></td>
    <td class='w-80px'><?php echo $batch->money;?></td>
    <td class='w-80px'><?php echo formatTime($order->finishedDate, DT_DATE1);?></td>
  </tr>
  <?php endforeach;?>
</table>
<script>$('.block-order').dataTable();</script>
