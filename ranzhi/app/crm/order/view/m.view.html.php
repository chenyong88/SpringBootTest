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

$moduleMenu   = false;
$bodyClass    = 'with-nav-bottom';
$browseLink   = !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : inlink('browse');
$customerLink = $this->createLink('customer', 'view', "customerID={$customer->id}");
$productLink  = '';
foreach($order->products as $product)
{
    $productLink .= html::a($this->createLink('product', 'view', "productID={$product->id}"), $product->name);
}
if($contract) $contractLink = html::a($this->createLink('contract', 'view', "contractID={$contract->id}"), $contract->name);

include "../../common/view/m.header.html.php";
?>

<div id='page' class='list-with-actions'>
  <div class='section no-margin'>
    <div class='heading gray'>
      <div class='title'><i class='icon-calendar'> </i><?php echo $lang->order->view;?></div>
      <nav class='nav'><a class='btn primary' href='<?php echo $browseLink;?>'><?php echo $lang->goback;?></a></nav>
    </div>
    <div class='box'>
      <table class='table bordered table-detail'>
        <tr>
          <td class='w-80px'><?php echo $lang->order->customer;?></td>
          <td><?php echo html::a($customerLink, $customer->name);?></td>
        </tr>
        <tr>
          <td><?php echo $lang->order->product;?></td>
          <td><?php echo $productLink;?></td>
        </tr>
        <?php if($contract):?>
        <tr>
          <td><?php echo $lang->contract->common;?></td>
          <td><?php echo $contractLink;?></td>
        </tr>
        <?php endif;?>
        <tr>
          <td><?php echo $lang->order->plan;?></td>
          <td><?php echo zget($currencySign, $order->currency, '') . formatMoney($order->plan);?></td>
        </tr>
        <?php if(formatMoney($order->real)):?>
        <tr>
          <td><?php echo $lang->order->real;?></td>
          <td><?php echo zget($currencySign, $order->currency, '') . formatMoney($order->real);?></td>
        </tr>
        <?php endif;?>
        <?php if(formatTime($order->contactedDate)):?>
        <tr>
          <td><?php echo $lang->order->contactedDate;?></td>
          <td><?php echo $order->contactedDate;?></td>
        </tr>
        <?php endif;?>
        <?php if(formatTime($order->nextDate)):?>
        <tr>
          <td><?php echo $lang->order->nextDate;?></td>
          <td><?php echo $order->nextDate;?></td>
        </tr>
        <?php endif;?>
      </table>
    </div>

    <div class='heading gray'>
      <div class='title'><i class='icon icon-file-text'> </i><?php echo $lang->order->lifetime;?></div>
    </div>
    <div class='box'>
      <table class='table bordered table-detail'>
        <tr>
          <td class='w-80px'><?php echo $lang->lifetime->createdBy;?></td>
          <td><?php echo zget($users, $order->createdBy) . $lang->at . $order->createdDate;?></td>
        </tr>
        <?php if($order->assignedTo):?>
        <tr>
          <td><?php echo $lang->lifetime->assignedTo;?></td>
          <td><?php if($order->assignedTo) echo zget($users, $order->assignedTo) . $lang->at . $order->assignedDate;?></td>
        </tr>
        <?php endif;?>
        <?php if($order->closedBy):?>
        <tr>
          <td><?php echo $lang->lifetime->closedBy;?></td>
          <td><?php echo zget($users, $order->closedBy) . $lang->at . $order->closedDate;?></td>
        </tr>
        <tr>
          <td><?php echo $lang->lifetime->closedReason;?></td>
          <td><?php echo $lang->order->closedReasonList[$order->closedReason];?></td>
        </tr>
        <?php endif;?>
        <?php if($contract and $contract->signedBy and $contract->status != 'canceled'):?>
        <tr>
          <td><?php echo $lang->lifetime->signedBy;?></td>
          <td><?php echo zget($users, $contract->signedBy) . $lang->at . $contract->signedDate;?></td>
        </tr>
        <?php endif;?>
        <?php if($order->editedBy):?>
        <tr>
          <td><?php echo $lang->order->editedBy;?></td>
          <td><?php echo zget($users, $order->editedBy) . $lang->at . $order->editedDate;?></td>
        </tr>
        <?php endif;?>
      </table>
    </div>
  </div>

  <div class='section' id='history'>
    <?php echo $this->fetch('action', 'history', "objectType=order&objectID={$order->id}");?>
  </div>

  <nav class='nav affix dock-bottom nav-auto footer-actions'>
  <?php
    echo "<a data-remote='{$this->createLink('action', 'createRecord', "objectType=order&objectID={$order->id}&customer={$order->customer}&history=2")}' data-display='modal' data-placement='bottom'>{$lang->order->record}</a>";

    if($order->status == 'normal') echo "<a data-remote='{$this->createLink('contract', 'create', "customer={$order->customer}&orderID={$order->id}")}' class='strong primary' data-display='modal' data-placement='bottom'>{$lang->order->sign}</a>";

    if($order->status != 'closed') echo "<a data-remote='{$this->createLink('order', 'assign', "orderID=$order->id")}' data-display='modal' data-placement='bottom'>{$lang->assign}</a>";

    if($order->status != 'closed') echo "<a data-remote='{$this->createLink('order', 'close', "orderID=$order->id")}' class='success' data-display='modal' data-placement='bottom'>{$lang->close}</a>";

    if($order->closedReason != 'payed' and $order->status == 'closed') echo "<a data-remote='{$this->createLink('order', 'activate', "orderID=$order->id")}' data-display='modal' data-placement='bottom'>{$lang->activate}</a>";

    echo "<a data-remote='{$this->createLink('order', 'edit', "orderID=$order->id")}' data-display='modal' data-placement='bottom'>{$lang->edit}</a>";

    if($order->status == 'normal' or $order->closedReason == 'failed') echo "<a data-remote='{$this->createLink('order', 'delete', "orderID=$order->id")}' class='danger' data-display='ajaxAction' data-ajax-delete='true' data-locate='{$this->createLink('order', 'browse')}'>{$lang->delete}</a>";

    echo html::a('#commentBox', $this->lang->comment, "data-display data-backdrop='true'");
  ?>
  </nav>
</div>

<div id='commentBox' class='affix enter-from-bottom layer hidden'>
  <div class='heading'>
    <div class="title"><?php echo $lang->comment;?></div>
    <nav class='nav'><a data-dismiss='display' class='muted'><i class='icon-remove'></i></a></nav>
  </div>
  <form id='commentForm' class='modal-form has-padding' data-form-refresh='#history' method='post' action='<?php echo inlink('edit', "orderID={$order->id}&comment=true")?>'>
    <div class='control'><?php echo html::textarea('comment', '',"rows='5' class='textarea' data-default-val");?></div>
    <div class='control'><button type='submit' class='btn primary'><?php echo $lang->save ?></button></div>
  </form>
</div>
<?php include "../../common/view/m.footer.html.php"; ?>
