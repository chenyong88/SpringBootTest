<?php
/**
 * The browse mobile view file of customer module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     customer 
 * @version     $Id: index.html.php 3830 2016-05-18 09:34:17Z liugang $
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}

include "../../common/view/m.header.html.php";
?>

<style>
#menu > a[href*="report"] {display: none}
</style>

<div class='heading'>
  <div class='title'>
    <a id='sortTrigger' class='text-right sort-trigger' data-display data-target='#sortPanel' data-backdrop='true'><i class='icon icon-sort'></i>&nbsp;<span class='sort-name'><?php echo $lang->sort ?></span></a>
  </div>
  <nav class='nav'>
    <a data-display='modal' data-placement='bottom' data-remote='<?php echo $this->createLink('customer', 'create') ?>' class='btn primary shadow-2'>
      <i class='icon icon-plus'></i> &nbsp;&nbsp;<?php echo $lang->customer->create;?>
    </a>
  </nav>
</div>

<section id='page' class='section list-with-pager'>
  <?php $refreshUrl = $this->createLink('customer', 'browse', "mode={$mode}&orderBy=$orderBy&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}");?>
  <div class='box' data-page='<?php echo $pager->pageID ?>' data-refresh-url='<?php echo $refreshUrl ?>'>
    <table class='table bordered no-margin'>
      <thead>
        <tr>
          <th class='w-50px'><?php echo $lang->customer->id;?></th>
          <th><?php echo $lang->customer->name;?></th>
          <th class='w-100px'><?php echo $lang->customer->nextDate;?></th>
          <th class='w-90px text-center'><?php echo $lang->customer->status;?></th>
        </tr>
      </thead>
      <?php foreach($customers as $customer):?>
      <tr class='text-center' data-url='<?php echo $this->createLink('customer', 'view', "customerID={$customer->id}")?>' data-id='<?php echo $customer->id;?>'>
        <td><?php echo $customer->id;?></td>
        <td class='text-left'><?php echo $customer->name;?></td>
        <td><?php echo formatTime($customer->nextDate) ? formatTime($customer->nextDate) : '';?></td>
        <td>
          <?php if($customer->status):?>
          <span class='label status-<?php echo $customer->status;?>'><?php echo zget($lang->customer->statusList, $customer->status);?></span></td>
          <?php endif;?>
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
  $vars = "mode={$mode}&param=&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}";
  $orders = array('id', 'name', 'assignedTo', 'level', 'status', 'size', 'type', 'contactedDate', 'nextDate', 'createdDate');
  foreach ($orders as $order)
  {
      commonModel::printOrderLink($order, $orderBy, $vars, '<i class="icon icon-sort-indicator"></i>' . $lang->customer->{$order});
  }
  ?>
</div>

<script>
$('#menu > a').removeClass('active').filter('[href*="<?php echo $mode ?>"]').addClass('active');
</script>
<?php include "../../common/view/m.footer.html.php"; ?>
