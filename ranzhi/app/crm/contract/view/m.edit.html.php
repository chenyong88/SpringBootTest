<?php
/**
 * The edit mobile view file of contract module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     contract 
 * @version     $Id: index.html.php 3830 2016-05-18 09:34:17Z liugang $
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>

<div class='heading divider'>
  <div class='title'><i class='icon-pencil muted'></i> <strong><?php echo $lang->contract->edit ?></strong></div>
  <nav class='nav'>
    <a class='text-primary' data-display='modal' data-remote='<?php echo $this->createLink('action', 'history', "objectType=contract&objectID={$contract->id}") ?>' data-placement='bottom'><i class='icon-history'></i>&nbsp;<?php echo $lang->history ?></a>
    <a data-dismiss='display'><i class='icon-remove muted'></i></a>
  </nav>
</div>

<form class='content box' data-form-refresh='#page' method='post' id='editContractForm' action='<?php echo $this->createLink('contract', 'edit', "contractID={$contract->id}")?>'>
  <div class='control'>
    <label for='name'><?php echo $lang->contract->name;?></label>
    <?php echo html::input('name', $contract->name, "class='input' placeholder='{$lang->required}'");?>
  </div>
  <div class='control'>
    <label for='code'><?php echo $lang->contract->code;?></label>
    <?php echo html::input('code', $contract->code, "class='input'");?>
  </div>
  <div id='contractOrders' class='has-padding gray'>
    <div class='control small muted'><label><?php echo $lang->contract->order;?></label></div>
    <div class='template row flex-nowrap'>
      <div class='cell'>
        <div class='control'>
          <div class='select'>
            <select name='order[]' class='select-order'>
            <?php foreach($orders as $order):?>
            <?php if(!$order):?>
            <option value='' data-real='' data-currency=''></option>
            <?php else:?>
            <option value="<?php echo $order->id;?>" data-real="<?php echo $order->plan;?>" data-currency="<?php echo $order->currency?>"><?php echo $order->title;?></option>
            <?php endif;?>
            <?php endforeach;?>
          </select>
          </div>
        </div>
      </div>
      <div class='cell-4'>
        <div class='control has-label-left'>
          <input type='number' step='0.01' name='real[]' class='input text-right order-real disabled' placeholder='<?php echo $this->lang->contract->placeholder->real ?>'>
          <label class='order-currency'></label>
        </div>
      </div>
      <div class='cell flex-none'>
        <a class='btn order-deleter'><i class='icon-trash text-danger'></i></a>
      </div>
    </div>
    <?php foreach($contractOrders as $currentOrder):?>
    <div class='row flex-nowrap'>
      <div class='cell'>
        <div class='control'>
          <div class='select'>
            <select name='order[]' class='select-order form-control'>
              <?php foreach($orders as $order):?>
              <?php if(!$order):?>
              <option value='' data-real='' data-currency=''></option>
              <?php else:?>
              <?php if($order->id == $currentOrder->id or $order->status == 'normal'):?>
              <?php $selected = $currentOrder->id == $order->id ? "selected='selected'" : '';?>
              <option value="<?php echo $order->id;?>" <?php echo $selected;?> data-real="<?php echo $order->plan;?>" data-currency="<?php echo $order->currency?>"><?php echo $order->title;?></option>
              <?php endif;?>
              <?php endif;?>
              <?php endforeach;?>
            </select>
          </div>
        </div>
      </div>
      <div class='cell-4'>
        <div class='control has-label-left'>
          <input type='number' step='0.01' name='real[]' class='input text-right order-real' value='<?php echo ($currentOrder->real and $currentOrder->real != '0.00') ? $currentOrder->real : $currentOrder->plan ?>' placeholder='<?php echo $this->lang->contract->placeholder->real ?>'>
          <label class='order-currency'><?php echo zget($currencySign, $currentOrder->currency, '') ?></label>
        </div>
      </div>
      <div class='cell flex-none'>
        <a class='btn order-deleter'><i class='icon-trash text-danger'></i></a>
      </div>
    </div>
    <?php endforeach;?>
    <a class="btn text-primary btn-add-order"><i class="icon-plus"></i>&nbsp; <?php echo $lang->add . ' ' . $lang->contract->order; ?></a>
  </div>
  <div class='control'>
    <label for='amount'><?php echo $lang->contract->amount;?></label>
    <div class='row'>
      <div class='cell-4'>
        <div class='select fluid'>
          <?php echo html::select('currency', $currencyList, $contract->currency);?>
        </div>
      </div>
      <div class='cell-8'>
        <input type='number' step='0.01' name='amount' id='amount' class='input' value='<?php echo $contract->amount ?>'>
      </div>
    </div>
  </div>
  <div class='control'>
    <label for='items'><?php echo $lang->contract->items;?></label>
    <?php echo html::textarea('items', $contract->items,"rows='5' class='textarea'");?>
  </div>
  <div class='control'>
    <?php echo $this->fetch('file', 'buildForm', 'fileCount=1');?>
  </div>
  <div class='space'></div>
  <div class='heading gray'>
    <div class='title text-important'><?php echo $lang->basicInfo; ?></div>
  </div>
  <div class="cotrol">
    <label for='customer'><?php echo $lang->contract->customer;?></label>
    <div class='select'>
      <?php echo html::select('customer', $customers, $contract->customer, 'disabled');?>
    </div>
  </div>
  <div class='control'>
    <label for='delivery'><?php echo $lang->contract->delivery;?></label>
    <div class='select'>
      <?php echo html::select('delivery', $lang->contract->deliveryList, $contract->delivery);?>
    </div>
  </div>
  <div class='control'>
    <label for='return'><?php echo $lang->contract->return;?></label>
    <div class='select'>
      <?php echo html::select('return', $lang->contract->returnList, $contract->return);?>
    </div>
  </div>
  <div class='control'>
    <label for='status'><?php echo $lang->contract->status;?></label>
    <div class='select'>
      <?php echo html::select('status', $lang->contract->statusList, $contract->status);?>
    </div>
  </div>
  <div class='control'>
    <label for='contact'><?php echo $lang->contract->contact;?></label>
    <div class='select'>
      <?php echo html::select('contact', $contacts, $contract->contact);?>
    </div>
  </div>
  <div class='control'>
    <label for='begin'><?php echo $lang->contract->begin;?></label>
    <input type='date' class='input' id='begin' name='begin' value='<?php echo $contract->begin ?>'>
  </div>
  <div class='control'>
    <label for='end'><?php echo $lang->contract->end;?></label>
    <input type='date' class='input' id='end' name='end' value='<?php echo $contract->end ?>'>
  </div>
  <div class='control'>
    <label for='handlers'><?php echo $lang->contract->handlers;?></label>
    <div class='select'>
      <?php echo html::select('handlers[]', $users, $contract->handlers, 'multiple');?>
    </div>
  </div>
  <div class='space'></div>
  <div class='heading gray'>
    <div class='title text-important'><?php echo $lang->contract->lifetime; ?></div>
  </div>
  <div class='control'>
    <label for='createdBy'><?php echo $lang->contract->createdBy;?></label>
    <input type='text' class='input' disabled value='<?php echo zget($users, $contract->createdBy) ?>'>
  </div>
  <div class='control'>
    <label for='signedBy'><?php echo $lang->contract->signedBy;?></label>
    <div class='select'>
      <?php echo html::select('signedBy', $users, $contract->signedBy);?>
    </div>
  </div>
  <div class='control'>
    <label for='signedDate'><?php echo $lang->contract->signedDate;?></label>
    <input type='date' class='input' value='<?php echo $contract->signedDate ?>'>
  </div>
  <div class='control'>
    <label for='deliveredBy'><?php echo $lang->contract->deliveredBy;?></label>
    <div class='select'>
      <?php echo html::select('deliveredBy', $users, $contract->deliveredBy);?>
    </div>
  </div>
  <div class='control'>
    <label for='deliveredDate'><?php echo $lang->contract->deliveredDate;?></label>
    <input type='date' class='input' value='<?php echo $contract->deliveredDate ?>'>
  </div>
  <div class='control'>
    <label for='returnedBy'><?php echo $lang->contract->returnedBy;?></label>
    <div class='select'>
      <?php echo html::select('returnedBy', $users, $contract->returnedBy);?>
    </div>
  </div>
  <div class='control'>
    <label for='returnedDate'><?php echo $lang->contract->returnedDate;?></label>
    <input type='date' class='input' value='<?php echo $contract->returnedDate ?>'>
  </div>
  <?php if($contract->finishedBy):?>
  <div class='control'>
    <label for='finishedBy'><?php echo $lang->contract->finishedBy;?></label>
    <div class='select'>
      <?php echo html::select('finishedBy', $users, $contract->finishedBy);?>
    </div>
  </div>
  <div class='control'>
    <label for='finishedDate'><?php echo $lang->contract->finishedDate;?></label>
    <input type='date' class='input' value='<?php echo $contract->finishedDate ?>'>
  </div>
  <?php endif;?>
  <?php if($contract->canceledBy):?>
  <div class='control'>
    <label for='canceledBy'><?php echo $lang->contract->canceledBy;?></label>
    <div class='select'>
      <?php echo html::select('canceledBy', $users, $contract->canceledBy);?>
    </div>
  </div>
  <div class='control'>
    <label for='canceledDate'><?php echo $lang->contract->canceledDate;?></label>
    <input type='date' class='input' value='<?php echo $contract->canceledDate ?>'>
  </div>
  <?php endif;?>
</form>

<div class='footer has-padding'>
  <button type='button' data-submit='#editContractForm' class='btn primary'><?php echo $lang->save ?></button>
</div>
<script>
$(function()
{
    var $orders       = $('#contractOrders');
    var $template     = $orders.children('.template.row');
    var $templateList = $template.find('.select-order');
    var $addOrderBtn  = $orders.find('.btn-add-order');
    var currencySign  = $.parseJSON('<?php echo json_encode(array('' => '') + $currencySign); ?>');

    var addOrder = function(order)
    {
        var $order = $template.clone().removeClass('template');
        if(order) $order.find('.select-order').val(order).change();
        $addOrderBtn.before($order);
    };

    var $form = $('#editContractForm').modalForm().listenScroll({container: 'parent'});

    $orders.on($.TapName, '.order-deleter', function()
    {
        $(this).closest('.row').remove();
    }).on('change', '.select-order', function()
    {
        var $this = $(this);
        var $selectOption = $(this.options[this.selectedIndex]);
        var data = $selectOption.data();
        var $row = $this.closest('.row');
        $row.find('.order-real').val(data.real).toggleClass('disabled', !$this.val()).data('currency', data.currency).change();
        $row.find('.order-currency').text(currencySign[data.currency]);
    }).on('focus', '.select-order', function()
    {
        var $this = $(this);
        var thisVal = $this.val();
        $orders.children('.row').not('.template').find('.select-order').not($this).each(function()
        {
            var selectedVal = $(this).val();
            if(selectedVal && thisVal !== selectedVal) $this.children("option[value='" + selectedVal + "']").remove();
        });
    }).on('change', '.order-real', function()
    {
        var $row = $orders.children('.row').not('.template');
        var amount = 0;
        var currency = $row.find('.order-real').each(function(){if($(this).val()) amount += parseFloat($(this).val()); }).first().data('currency');
        $('#amount').val(amount);
        $('#currency').val(currency);
    });

    $addOrderBtn.on($.TapName, function(){addOrder()});
});
</script>
