<?php 
/**
 * The create view of order module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     order 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php include '../../../sys/common/view/datepicker.html.php';?>
<?php include '../../../sys/common/view/chosen.html.php';?> 
<?php js::set('status', $status);?>
<?php js::set('companiesCount', count($companies));?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><i class='icon-plus'></i> <?php echo $lang->order->create;?></strong>
  </div>
  <div class='panel-body'>
  <form method='post' id='orderForm'>
    <table class='table table-form'>
      <tr>
        <th class='w-70px'><?php echo $lang->order->trader[$type];?></th>
        <td>
          <div class='required required-wrapper'></div>
          <div class='input-group'>
            <?php echo html::select('trader', $companies, isset($trader) ? $trader : '', "class='form-control chosen' data-no_results_text='" . $lang->searchMore . "'");?>
            <?php echo html::input('newTrader', '', "class='form-control newTrader' style='display:none' placeholder='{$lang->order->trader[$type]}'");?>
            <span class='input-group-addon fix-border newTrader' style='display:none'><?php echo $lang->customer->contact;?></span>
            <?php echo html::input('contact', '', "class='form-control newTrader' style='display:none' placeholder='{$lang->customer->contact}'");?>
            <span class='input-group-addon'>
              <?php echo html::checkbox('createTrader', $lang->order->createTrader, '', "class='createTrader'");?>
            </span>
          </div>
        </td>
        <td></td>
        <?php if(isset($contract)):?>
        <th><?php echo $lang->order->contract;?></th>
        <td colspan='2'>
          <?php $label = $contract->code ? $contract->code : $contract->id;?>
          <?php if(!commonModel::printLink('crm.contract', 'view', "contractID=$contract->id", $label, "class='contract'")) echo $label;?>
          <?php echo html::hidden('contract', $contract->id);?>
        </td>
        <?php else:?>
        <th></th><td></td>
        <?php endif;?>
        <td class='w-60px'></td>
      </tr>
      <?php 
        $i = 1; 
        $productsCount = count($orderProducts); 
        $newItemsCount = $config->order->newItemsCount;
        $money = 0;
        foreach($orderProducts as $productID => $orderProduct):
        $money += isset($orderProduct->money) ? $orderProduct->money : 0;
      ?>
      <tr>
        <?php if($i == 1):?>
        <th id='product_title' rowspan='<?php echo $productsCount < $newItemsCount ? $newItemsCount : $productsCount + 1;?>'><?php echo $lang->order->product;?></th>
        <?php endif;?>
        <td>
          <div class='input-group'>
            <select id='product<?php echo $i;?>' name='product[<?php echo $i;?>]' class='product-batchEdit select-product form-control chosen' data-placeholder='<?php echo $lang->orderProduct->product;?>'>
              <option></option>
              <?php foreach($products as $product):?>
              <option value='<?php echo $product->id;?>' data-keys='<?php echo $product->pinyin;?>' data-unit='<?php echo $product->unit;?>' <?php if($product->id == $productID) echo 'selected';?>><?php echo $product->name;?></option>
              <?php endforeach;?>
            </select>
            <?php if(commonModel::hasPriv('product', 'createFromOrder')):?>
            <span class='input-group-addon'>
              <?php echo html::a($this->createLink('product','createFromOrder', "id=product{$i}"), $lang->order->createProduct, "data-toggle='modal'");?>
            </span>
            <?php endif;?>
          </div>
        </td>
        <td class='w-100px'>
          <?php $product = zget($products, $productID);?>
          <?php echo html::input("unit[$i]", isset($product->unit) ? $product->unit : '', "id='unit{$i}' class='product-batchEdit form-control' placeholder='{$lang->orderProduct->unit}'");?>
        </td>
        <td class='w-100px'>
          <?php echo html::input("price[$i]", isset($orderProduct->price) ? $orderProduct->price : '', "id='price{$i}' class='product-batchEdit form-control product-price' placeholder='{$lang->orderProduct->price}'");?>
        </td>
        <td class='w-100px'>
          <?php echo html::input("amount[$i]", isset($orderProduct->amount) ? $orderProduct->amount : '', "id='amount{$i}' class='product-batchEdit form-control product-amount' placeholder='{$lang->orderProduct->amount}'");?>
        </td>
        <td class='w-100px'>
          <?php echo html::input("moneys[$i]", isset($orderProduct->money) ? $orderProduct->money : '', "id='moneys{$i}' class='product-batchEdit form-control product-money' placeholder='{$lang->order->money}'");?>
        </td>
        <td>
          <?php echo html::a('javascript:;', "<i class='icon-remove'></i>", "class='btn btn-link pull-left btn-mini btn-remove'");?>
          <?php echo html::hidden("mode[$i]", 'purchase', "class='product-batchEdit'");?>
        </td>
      </tr>
      <?php $i ++;?>
      <?php endforeach;?>
      <?php $count = $productsCount < $newItemsCount ? $newItemsCount - $productsCount : 1;?>
      <?php for($j = 0; $j < $count; $j ++, $i ++):?>
      <tr>
        <?php if($i == 1):?>
        <th id='product_title' rowspan='<?php echo $newItemsCount;?>'><?php echo $lang->order->product;?></th>
        <?php endif;?>
        <td>
          <div class='input-group'>
          <select id='product<?php echo $i;?>' name='product[<?php echo $i;?>]' class='product-batchEdit select-product form-control chosen' data-placeholder='<?php echo $lang->orderProduct->product;?>'>
              <option></option>
              <?php foreach($products as $product):?>
              <option value='<?php echo $product->id;?>' data-keys='<?php echo $product->pinyin;?>' data-unit='<?php echo $product->unit;?>'><?php echo $product->name;?></option>
              <?php endforeach;?>
            </select>
            <?php if(commonModel::hasPriv('product', 'createFromOrder')):?>
            <span class='input-group-addon'>
              <?php echo html::a($this->createLink('product','createFromOrder', "id=product{$i}"), $lang->order->createProduct, "data-toggle='modal'");?>
            </span>
            <?php endif;?>
          </div>
        </td>
        <td class='w-100px'>
          <?php echo html::input("unit[$i]", '', "id='unit{$i}' class='product-batchEdit form-control' placeholder='{$lang->orderProduct->unit}'");?>
        </td>
        <td class='w-100px'>
          <?php echo html::input("price[$i]", '', "id='price{$i}' class='product-batchEdit form-control product-price' placeholder='{$lang->orderProduct->price}'");?>
        </td>
        <td class='w-100px'>
          <?php echo html::input("amount[$i]", '', "id='amount{$i}' class='product-batchEdit form-control product-amount' placeholder='{$lang->orderProduct->amount}'");?>
        </td>
        <td class='w-100px'>
          <?php echo html::input("moneys[$i]", '', "id='moneys{$i}' class='product-batchEdit form-control product-money' placeholder='{$lang->order->money}'");?>
        </td>
        <td>
          <?php echo html::a('javascript:;', "<i class='icon-plus'></i>", "class='btn-plus'");?>
          <?php echo html::a('javascript:;', "<i class='icon-remove'></i>", "class='btn-remove'");?>
          <?php echo html::hidden("mode[$i]", 'create', "class='product-batchEdit'");?>
        </td>
      </tr>
      <?php endfor;?>
      <tr>
        <th><?php echo $lang->order->finishedDate;?></th>
        <td>
          <div class='required required-wrapper' style='width:40%'></div>
          <?php echo html::input('finishedDate', ($type == 'sale' && isset($contract)) ? formatTime($contract->end) : '', "class='w-p40 form-control form-date'");?>
        </td>
        <td></td>
        <th><?php echo $lang->order->money;?></th>
        <td colspan='2'><?php echo html::input('money', $money ? $money : '', "class='form-control'");?></td>
        <td></td>
      </tr>
      <tr>
        <th><?php echo $lang->order->taxed;?></th>
        <td>
          <div class='required required-wrapper' style='width:40%'></div>
          <?php echo html::select('taxed', $lang->order->taxedList, 1, "class='w-p40 form-control'");?>
        </td>
        <td></td>
        <th><?php echo $lang->order->settlement;?></th>
        <td colspan='2'><?php echo html::select('settlement', $lang->order->settlementList, '', "class='form-control'");?></td>
        <td></td>
      </tr>
      <tr>
        <th><?php echo $lang->order->desc;?></th>
        <td colspan='5'><?php echo html::textarea('desc', '', "rows='1' class='form-control'");?></td>
        <td></td>
      </tr>
      <tr>
        <th></th>        
        <td colspan='6'>
          <?php echo html::hidden('type', $type);?>
          <?php echo html::submitButton() . ' ' . html::backButton();?>
          <div id='duplicateError' class='hide'></div>
        </td>   
      </tr>
    </table>
  </form>
  </div>
</div>
<div class='errorMessage hide'>
  <div class='alert alert-danger alert-dismissable'>
    <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>
    <button type='submit' class='btn btn-default' id='continueSubmit'><?php echo $lang->continueSave;?></button>
  </div>
</div>
<?php js::set('key', $i);?>
<script>
<?php helper::import('../js/searchcustomer.js');?>
</script>
<?php include '../../common/view/footer.html.php';?>
