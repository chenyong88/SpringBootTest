<?php
/**
 * The edit mobile view file of order module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     order 
 * @version     $Id: index.html.php 3830 2016-05-18 09:34:17Z liugang $
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>

<div class='heading divider'>
  <div class='title'><i class='icon-pencil muted'></i> <strong><?php echo $lang->order->edit;?></strong></div>
  <nav class='nav'>
    <a class='text-primary' data-display='modal' data-remote='<?php echo $this->createLink('action', 'history', "objectType=order&objectID={$order->id}") ?>' data-placement='bottom'><i class='icon-history'></i>&nbsp;<?php echo $lang->history ?></a>

    <a data-dismiss='display'><i class='icon-remove muted'></i></a>
  </nav>
</div>

<form method='post' id='editOrderForm' class='content has-padding modal-form listen-scroll' data-container='parent' action='<?php echo $this->createLink('order', 'edit', "orderID=$order->id") ?>' data-form-refresh='#page'>
  <div class='heading gray hidden'>
    <div class='title text-important'><?php echo $lang->order->basicInfo; ?></div>
  </div>
  <div class='control'>
    <label for='customer'><?php echo $lang->order->customer;?></label>
    <div class='select'>
      <?php echo html::select('customer', $customers, $order->customer);?>
    </div>
  </div>
  <div class='control'>
    <label for='product[]'><?php echo $lang->order->product;?></label>
    <div class='select'>
      <?php echo html::select('product[]', $products, $order->product, "multiple");?>
    </div>
  </div>
  <div class='control hidden'>
    <label for='currency'><?php echo $lang->order->currency;?></label>
    <div class='select'>
      <?php echo html::select('currency', $currencyList, $order->currency, "disabled");?>
    </div>
  </div>
  <div class='control'>
    <label for='plan'><?php echo $lang->order->plan;?></label>
    <input type='number' step='0.01' name='plan' id='plan' class='input' value='<?php echo $order->plan ?>'>
  </div>
  <div class='control hidden'>
    <label for='real'><?php echo $lang->order->real;?></label>
    <?php echo html::input('real', $order->real, "class='input' disabled");?>
  </div>
  <div class='control hidden'>
    <label for='assignedTo'><?php echo $lang->order->assignedTo;?></label>
    <div class='select'>
      <?php echo html::select('assignedTo', $users, $order->assignedTo, 'disabled');?>
    </div>
  </div>
  <div class='control hidden'>
    <label for='assignedBy'><?php echo $lang->order->assignedBy;?></label>
    <div class='select'>
      <?php echo html::select('assignedBy', $users, $order->assignedBy, 'disabled');?>
    </div>
  </div>
  <div class='control hidden'>
    <label for='assignedDate'><?php echo $lang->order->assignedDate;?></label>
    <?php echo html::input('assignedDate', formatTime($order->assignedDate), "class='input' disabled");?>
  </div>
  <div class='control'>
    <label for='status'><?php echo $lang->order->status;?></label>
    <div class='select'>
      <?php echo html::select('status', $lang->order->statusList, $order->status);?>
    </div>
  </div>
  <div class='heading gray hidden'>
    <div class='title text-important'><?php echo $lang->order->lifetime; ?></div>
  </div>
  <div class='control'>
    <label for='nextDate'><?php echo $lang->order->nextDate;?></label>
    <input type='date' value='<?php echo $order->nextDate ?>' class='input'>
  </div>
  <div class='control hidden'>
    <label for='signedBy'><?php echo $lang->order->signedBy;?></label>
    <div class='select'>
      <?php echo html::select('signedBy', $users, $order->signedBy);?>
    </div>
  </div>
  <div class='control hidden'>
    <label for='signedDate'><?php echo $lang->order->signedDate;?></label>
    <?php echo html::input('signedDate', $order->signedDate, "class='input'");?>
  </div>
  <div class='control hidden'>
    <label for='closedBy'><?php echo $lang->order->closedBy;?></label>
    <div class='select'>
      <?php echo html::select('closedBy', $users, $order->closedBy);?>
    </div>
  </div>
  <div class='control hidden'>
    <label for='closedReason'><?php echo $lang->order->closedReason;?></label>
    <div class='select'>
      <?php echo html::select('closedReason', $lang->order->closedReasonList, $order->closedReason);?>
    </div>
  </div>
  <div class='control hidden'>
    <label for='closedDate'><?php echo $lang->order->closedDate;?></label>
    <?php echo html::input('closedDate', $order->closedDate, "class='input'");?>
  </div>
  <div class='control hidden'>
    <label for='activatedBy'><?php echo $lang->order->activatedBy;?></label>
    <div class='select'>
      <?php echo html::select('activatedBy', $users, $order->activatedBy);?>
    </div>
  </div>
  <div class='control hidden'>
    <label for='activatedDate'><?php echo $lang->order->activatedDate;?></label>
    <?php echo html::input('activatedDate', $order->activatedDate, "class='input'");?>
  </div>
  <?php echo html::hidden('referer', $this->server->http_referer);?>
</form>

<div class='footer has-padding'>
  <button type='button' data-submit='#editOrderForm' class='btn primary'><?php echo $lang->save ?></button>
</div>

<script>
$(function()
{
    // $('#editOrderForm').modalForm().listenScroll({container: 'parent'});
});
</script>
