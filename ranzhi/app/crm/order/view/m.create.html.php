<?php
/**
 * The create mobile view file of order module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     order 
 * @version     $Id: index.html.php 3830 2016-05-18 09:34:17Z liugang $
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>

<style>
#createOrderForm .create-customer-fields,
#createOrderForm .create-product-fields {display: none}

#createOrderForm.create-customer .create-customer-fields,
#createOrderForm.create-product .create-product-fields {display: block;}
#createOrderForm.create-customer .row.create-customer-fields,
#createOrderForm.create-product .row.create-product-fields {display: flex;}
#createOrderForm.create-customer .select-customer-fields,
#createOrderForm.create-product .select-product-fields {display: none;}

#createOrderForm.create-customer .create-customer-field.control,
#createOrderForm.create-customer .create-customer-fields.row,
#createOrderForm.create-product .create-product-field.control,
#createOrderForm.create-product .create-product-fields.row {background: #ebf2f9; padding: 0 .5rem .5rem; margin-right: -.5rem; margin-left: -.5rem;}
#createOrderForm.create-customer .create-customer-field.control,
#createOrderForm.create-product .create-product-field.control {margin-bottom: 0; padding-top: .5rem}
#createOrderForm.create-customer .create-customer-fields.row,
#createOrderForm.create-product .create-product-fields.row {margin-right: -.75rem; margin-left: -.75rem;}
</style>

<div class='heading divider'>
  <div class='title'><i class='icon-plus muted'></i> <strong><?php echo $lang->order->create; ?></strong></div>
  <nav class='nav'><a data-dismiss='display'><i class='icon icon-remove muted'></i></a></nav>
</div>

<form class='content has-padding' method='post' id='createOrderForm' action='<?php echo $this->createLink('order', 'create') ?>' data-form-refresh='#page'>
  <div class='control create-customer-field'>
    <div class='checkbox pull-right'>
      <input type='checkbox' name='createCustomer' id='createCustomer' value='1'>
      <label for='createCustomer' class='text-link'><?php echo $lang->order->createCustomer ?></label>
    </div>
    <label for='customer'><?php echo $lang->order->customer;?></label>
    <div class='select select-customer-fields'>
      <?php echo html::select('customer', $customers);?>
    </div>
    <?php echo html::input('name', '', "class='input create-customer-fields'");?>
  </div>
  <div class='row create-customer-fields'>
    <div class='cell-6'>
      <div class='control'>
        <label for='contact'><?php echo $lang->customer->contact;?></label>
        <?php echo html::input('contact', '', "class='input' placeholder='{$lang->required}'");?>
      </div>
    </div>
    <div class='cell-6'>
      <div class='control'>
        <label for='phone'><?php echo $lang->customer->phone;?></label>
        <?php echo html::input('phone', '', "class='input'");?>
      </div>
    </div>
    <div class='cell-6'>
      <div class='control'>
        <label for='email'><?php echo $lang->customer->email;?></label>
        <input type="email" id='email' name='email' class='input'>
      </div>
    </div>
    <div class='cell-6'>
      <div class='control'>
        <label for='qq'><?php echo $lang->customer->qq;?></label>
        <?php echo html::input('qq', '', "class='input'");?>
      </div>
    </div>
  </div>
  <div class='control create-product-field'>
    <div class='checkbox pull-right'>
      <input type='checkbox' name='createProduct' id='createProduct' value='1'>
      <label for='createProduct' class='text-link'><?php echo $lang->order->createProduct ?></label>
    </div>
    <label for='product[]'><?php echo $lang->order->product;?></label>
    <div class='select select-product-fields'>
      <?php echo html::select('product[]', $products, '', "multiple");?>
    </div>
    <?php echo html::input('productName', '', "class='input create-product-fields' placeholder='{$lang->product->name}({$lang->required})'");?>
  </div>
  <div class='row create-product-fields'>
    <div class='cell-6'>
      <div class='control'>
        <label for='code'><?php echo $lang->product->code;?></label>
        <?php echo html::input("code", '', "class='input' placeholder='{$lang->product->placeholder->code}({$lang->required})'");?>
      </div>
    </div>
    <div class='cell-6'>
      <div class='control'>
        <label for='category'><?php echo $lang->product->category;?></label>
        <div class='select'>
          <?php echo html::select("category", $productCategories);?>
        </div>
      </div>
    </div>
    <div class='cell-6'>
      <div class='control'>
        <label for='type'><?php echo $lang->product->type;?></label>
        <div class='select'>
          <?php echo html::select("type", $lang->product->typeList);?>
        </div>
      </div>
    </div>
    <div class='cell-6'>
      <div class='control'>
        <label for='status'><?php echo $lang->product->status;?></label>
        <div class='select'>
          <?php echo html::select("status", $lang->product->statusList, 'normal');?>
        </div>
      </div>
    </div>
  </div>
  <div class='control'>
    <label for='plan'><?php echo $lang->order->plan;?></label>
    <div class='row'>
      <div class='cell-4'>
        <div class='select fluid'>
          <?php echo html::select('currency', $currencyList);?>
        </div>
      </div>
      <div class='cell-8'>
        <input type='number' step='0.01' name='plan' id='plan' class='input'>
      </div>
    </div>
  </div>
</form>

<div class='footer has-padding'>
  <button type='button' data-submit='#createOrderForm' class='btn primary'><?php echo $lang->save ?></button>
</div>

<?php js::execute($pageJS);?>
