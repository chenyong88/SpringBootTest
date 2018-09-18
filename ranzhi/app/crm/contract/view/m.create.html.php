<?php
/**
 * The create mobile view file of contract module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     contract 
 * @version     $Id: index.html.php 3830 2016-05-18 09:34:17Z liugang $
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>

<style>
.contractCode {border: 1px solid #ddd; padding: 5px;}
</style>
<div class='heading divider'>
  <div class='title'><i class='icon-plus muted'></i> <strong><?php echo $lang->contract->create ?></strong></div>
  <nav class='nav'><a data-dismiss='display'><i class='icon-remove muted'></i></a></nav>
</div>

<form class='content box' data-form-refresh='#page' method='post' id='createContractForm' action='<?php echo $this->createLink('contract', 'create')?>'>
  <div class='control'>
    <label><?php echo $lang->contract->customer;?></label>
    <div class='select'>
      <?php echo html::select('customer', $customers, isset($customer) ? $customer : '');?>
    </div>
  </div>
  <div id='contractOrders' class='has-padding gray'>
    <div class='control small muted'><label><?php echo $lang->contract->order;?></label></div>
    <div class='template row flex-nowrap'>
      <div class='cell'>
        <div class='control'>
          <div class='select'>
            <select class='select-order' name='order[]'><option value=''></option></select>
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
    <?php if(isset($currentOrder)):?>
    <div class='row flex-nowrap'>
      <div class='cell'>
        <div class='control'>
          <div class='select'>
            <select name='order[]' class='select-order'>
              <option value=''></option>
              <?php foreach($orders as $order):?>
              <?php $selected = $orderID == $order->id ? 'selected' : ''; ?>
              <option value='<?php echo $order->id;?>' <?php echo $selected;?>  data-real='<?php echo $order->plan;?>' data-currency='<?php echo $order->currency?>'><?php echo $order->title;?></option>
              <?php endforeach;?>
            </select>
          </div>
        </div>
      </div>
      <div class='cell-4'>
        <div class='control has-label-left'>
          <input type='number' step='0.01' name='real[]' class='input text-right order-real' value='<?php echo $currentOrder->plan ?>' placeholder='<?php echo $this->lang->contract->placeholder->real ?>'>
          <label class='order-currency'><?php echo zget($currencySign, $currentOrder->currency, '') ?></label>
        </div>
      </div>
      <div class='cell flex-none'>
        <a class='btn order-deleter'><i class='icon-trash text-danger'></i></a>
      </div>
    </div>
    <?php endif;?>
    <a class="btn text-primary btn-add-order"><i class="icon-plus"></i>&nbsp; <?php echo $lang->add . ' ' . $lang->contract->order; ?></a>
  </div>
  <div class='control'>
    <label for='name'><?php echo $lang->contract->name;?></label>
    <?php echo html::input('name', '', "class='input' placeholder='{$lang->required}'");?>
  </div>
  <div class='control'>
    <label for='code'><?php echo $lang->contract->code;?></label>
    <?php
    $format = $this->config->contract->codeFormat;
    if(!is_array($format)) $format = json_decode($format, true);
        
    $form = "<div class='control-group'>";
    foreach($format as $key => $unit)
    {
        if(in_array($unit, array('Y', 'm', 'd'))) $form .= "<a class='contractCode'>" . date($unit) . '</a>';
        elseif($unit == 'input') $form .= html::input("code[{$key}]", '', "id='code' class='input'");
        elseif(!isset($lang->contract->codeUnitList[$unit])) $form .= "<a class='contractCode'>$unit</a>";
    }
    $form .= '</div>';
    echo $form;
    ?>
  </div>

  <div class='control'>
    <label for='amount'><?php echo $lang->contract->amount;?></label>
    <div class='row'>
      <div class='cell-4'>
        <div class='select fluid'>
          <?php echo html::select('currency', $currencyList, isset($currentOrder) ? $currentOrder->currency : '');?>
        </div>
      </div>
      <div class='cell-8'>
        <input type='number' step='0.01' name='amount' id='amount' class='input'>
      </div>
    </div>
  </div>
  <div class='control' id='contactControl'>
    <label for='contact'><?php echo $lang->contract->contact;?></label>
    <div class='select'>
      <select name='contact' id='contact'></select>
    </div>
  </div>
  <div class='row'>
    <div class='cell-6'>
      <div class='control'>
        <label for='signedBy'><?php echo $lang->contract->signedBy;?></label>
        <div class='select'>
          <?php echo html::select('signedBy', $users);?>
        </div>
      </div>
    </div>
    <div class='cell-6'>
      <div class='control'>
        <label for='signedDate'><?php echo $lang->contract->signedDate;?></label>
        <input type='date' class='input' id='signedDate' name='signedDate'>
      </div>
    </div>
  </div>
  <div class='control'>
    <label for='begin'><?php echo $lang->contract->dateRange;?></label>
    <div class='row'>
      <div class='cell'>
        <input type='date' class='input' id='begin' name='begin' placeholder='<?php echo $lang->contract->begin ?>'>
      </div>
      <div class='cell'>
        <input type='date' class='input' id='end' name='end' placeholder='<?php echo $lang->contract->end ?>'>
      </div>
    </div>
  </div>
  <div class='control'>
    <label for='handlers[]'><?php echo $lang->contract->handlers;?></label>
    <div class='select'>
      <?php echo html::select('handlers[]', $users, $this->app->user->account, 'multiple');?>
    </div>
  </div>
  <div class='control'>
    <label for='items'><?php echo $lang->contract->items;?></label>
    <?php echo html::textarea('items', '',"rows='5' class='textarea'");?>
  </div>
  <div class='control'>
    <?php echo $this->fetch('file', 'buildForm', 'fileCount=1');?>
  </div>
</form>

<div class='footer has-padding'>
  <button type='button' data-submit='#createContractForm' class='btn primary'><?php echo $lang->save ?></button>
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

    var setCustomer = function(customerID)
    {
        // remove old orders
        $orders.children('.row').not('.template').remove();

        // load customer contacts
        $('#contact').load($.format('<?php echo $this->createLink('contact', 'getOptionMenu', 'customerID={0}') ?>', customerID));

        $.getJSON($.format('<?php echo $this->createLink('contract', 'getOrder', 'customerID={0}&status=normal', 'json') ?>', customerID), function(orders)
        {
            var $select = $templateList.empty();
            $.each(orders, function(idx, order)
            {
                if(order)
                {
                    $('<option>', 
                    {
                        value: order.id,
                        'data-real': order.plan,
                        'data-currency': order.currency
                    }).text(order.title).appendTo($select);
                } else $select.append('<option value="">');
            });
            addOrder();
        });
    };

    var copyOrderName = function()
    {
        var $select = $orders.children('.row').not('.template').find('.select-order').first();
        if($select.length) $('#name').val($($select[0].options[$select[0].selectedIndex]).text());
    };

    <?php if(isset($customer)) echo "setCustomer($customer);" ?>

    var $form = $('#createContractForm').modalForm().listenScroll({container: 'parent'});

    $('#customer').on('change', function()
    {
        var customer = $(this).val();
        setCustomer(customer);
        $orders.toggleClass('hidden', !customer);
    }).change();

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

        copyOrderName();
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

    copyOrderName();
});
</script>
