<?php 
/**
 * The company's order list view of order module in Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      yaozeyuan <yaozeyuan@yidou.biz>
 * @package     order 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php 
    $i     = 0;
    $count = $config->order->newItemsCount > count($orderProducts) ? $config->order->newItemsCount : count($orderProducts);
?>
<?php foreach($orderProducts as $orderProduct):?>
<tr class='orderProductList'>
  <?php if($i == 0):?>
  <th id='product_title' rowspan='<?php echo $count;?>'><?php echo $lang->order->product;?></th>
  <?php endif;?>
  <td>
    <div class='input-group'>
      <select id='product<?php echo $i;?>' name='product[<?php echo $i;?>]' class='product-batchEdit select-product form-control chosen' data-placeholder='<?php echo $lang->orderProduct->product;?>'>
        <option></option>
        <?php foreach($products as $product):?>
            <option value='<?php echo $product->id;?>' data-keys='<?php echo $product->pinyin;?>' data-unit='<?php echo $product->unit;?>' <?php if($product->id == $orderProduct->product) echo 'selected';?>><?php echo $product->name;?></option>
        <?php endforeach;?>
      </select>
      <span class='input-group-addon'>
        <?php echo html::a($this->createLink('product', 'createFromOrder', "id=product{$i}"), $lang->order->createProduct, "data-toggle='modal'");?>
      </span>
    </div>
  </td>
  <td class='w-100px'>
    <?php $product = zget($products, $orderProduct->product);?>
    <?php echo html::input("unit[$i]", $product->unit, "id='unit{$i}' class='product-batchEdit form-control' readonly placeholder='{$lang->orderProduct->unit}'");?>
  </td>
  <td class='w-100px'>
    <?php echo html::input("price[$i]", $orderProduct->price ? $orderProduct->price : '', "id='price{$i}' class='product-batchEdit form-control product-price' placeholder='{$lang->orderProduct->price}'");?>
  </td>
  <td class='w-100px'>
    <?php echo html::input("amount[$i]", $orderProduct->amount, "id='amount{$i}' class='product-batchEdit form-control product-amount' placeholder='{$lang->orderProduct->amount}'");?>
  </td>
  <td class='w-100px'>
    <?php echo html::input("moneys[$i]", $orderProduct->money ? $orderProduct->money : '', "id='moneys{$i}' class='product-batchEdit form-control product-money' placeholder='{$lang->order->money}'");?>
  </td>
  <td>
    <?php echo html::a('javascript:;', "<i class='icon-plus'></i>", "class='btn-plus'");?>
    <?php echo html::a('javascript:;', "<i class='icon-remove'></i>", "class='btn-remove'");?>
    <?php echo html::hidden("mode[$i]", 'create', "class='product-batchEdit'");?>
  </td>
</tr>
<?php $i++;?>
<?php endforeach;?>

<?php for(; $i < $count; $i++):?>
<tr class='orderProductList'>
  <td>
    <div class='input-group'>
    <select id='product<?php echo $i;?>' name='product[<?php echo $i;?>]' class='product-batchEdit select-product form-control chosen' data-placeholder='<?php echo $lang->orderProduct->product;?>'>
        <option></option>
        <?php foreach($products as $product):?>
        <option value='<?php echo $product->id;?>' data-keys='<?php echo $product->pinyin;?>' data-unit='<?php echo $product->unit;?>'><?php echo $product->name;?></option>
        <?php endforeach;?>
      </select>
      <span class='input-group-addon'>
        <?php echo html::a($this->createLink('product','createFromOrder', "id=product{$i}"), $lang->order->createProduct, "data-toggle='modal'");?>
      </span>
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
