<?php 
/**
 * The refund view of order module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      yaozeyuan <yaozeyuan@yidou.biz>
 * @package     order 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php include '../../../sys/common/view/datepicker.html.php';?>
<?php include '../../../sys/common/view/chosen.html.php';?> 
<?php js::set('status', $status);?>
<?php js::set('type', $type);?>
<?php js::set('moduleType', $moduleType);?>
<?php js::set('product', $lang->order->product);?>
<?php js::set('companiesCount', count($companies));?>
<div class='panel'>
  <div class='panel-heading'>
    <?php if(!$order->trader):?>
    <strong><i class='icon-plus'></i> <?php echo $lang->order->createRefund;?></strong>
    <?php else:?>
    <strong><i class='icon-edit'></i> <?php echo $lang->order->editRefund;?></strong>
    <?php endif?>
  </div>
  <div class='panel-body'>
  <form method='post' action=<?php echo "$actionUrl";?> id='ajaxForm'>
    <table class='table table-form'>
      <tr class='orderProductListHref'>
        <th class='w-70px'><?php echo $lang->order->trader[$order->type];?></th>
        <td><?php echo html::select('trader', $companies, $order->trader, "class='traderList form-control chosen'");?></td>
        <th><?php echo $lang->order->orderNo->common;?></th>
        <td colspan='2'>
          <div class='input-group' id='orderList'>
            <?php echo html::select('order', $orderList, $order->order, "class='orderList form-control'");?>
          </div>
        </td>
        <td><?php echo html::input('contract', $order->contract, "class='form-control' placeholder='{$lang->order->contract}'");?></td>
        <td class='w-60px'></td>
      </tr>
      <?php $count = $config->order->newItemsCount > count($order->products) ? $config->order->newItemsCount : count($order->products) + 1;?>
      <?php $i = 0;?>
      <?php foreach($order->products as $orderProduct):?>
      <tr class='orderProductList'>
        <?php if($i == 0):?>
        <th id='product_title' rowspan='<?php echo $count;?>'><?php echo $lang->order->product;?></th>
        <?php endif;?>
        <td>
          <?php if($orderProduct->sentAmount > 0):?>
            <?php $product = zget($products, $orderProduct->product);?>
            <?php echo html::input('', empty($product) ? '' : $product->name, "class='form-control sentProduct' readonly data-toggle='tooltip' data-placement='right' data-original-title='" . sprintf($lang->order->error->cantChange, $lang->order->batch[$order->type]) . "'");?>
            <?php echo html::hidden("product[$i]", $orderProduct->product);?>
          <?php else:?> 
          <div class='input-group'>
            <select id='product<?php echo $i;?>' name='product[<?php echo $i;?>]' class='product-batchEdit select-product form-control chosen' data-placeholder='<?php echo $lang->orderProduct->product;?>'>
              <option></option>
              <?php foreach($products as $product):?>
              <option <?php if($product->id == $orderProduct->product){ echo 'selected="selected"';}?> value='<?php echo $product->id;?>' data-keys='<?php echo $product->pinyin;?>' data-unit='<?php echo $product->unit;?>'><?php echo $product->name;?></option>
              <?php endforeach;?>
            </select>
            <span class='input-group-addon'>
              <?php echo html::a($this->createLink('product', 'createFromOrder', "id=product{$i}"), $lang->order->createProduct, "data-toggle='modal'");?>
            </span>
          </div>
          <?php endif ?> 
        </td>
        <td class='w-100px'>
          <?php $product = zget($products, $orderProduct->product);?>
          <?php echo html::input("unit[$i]", $product->unit, "id='unit{$i}' class='product-batchEdit form-control' placeholder='{$lang->orderProduct->unit}'");?>
        </td>
        <td class='w-100px'>
          <?php echo html::input("price[$i]", $orderProduct->price, "id='price{$i}' class='product-batchEdit form-control product-price' placeholder='{$lang->orderProduct->price}'");?>
        </td>
        <td class='w-100px'>
          <?php echo html::input("amount[$i]", $orderProduct->amount, "id='amount{$i}' class='product-batchEdit form-control product-amount' placeholder='{$lang->orderProduct->amount}'");?>
        </td>
        <td class='w-100px'>
          <?php echo html::input("moneys[$i]", $orderProduct->money, "id='moneys{$i}' class='product-batchEdit form-control product-money' placeholder='{$lang->order->money}'");?>
        </td>
        <td>
          <?php
            if($orderProduct->sentAmount > 0)
            {
              echo "<i class='icon-lock' data-toggle='tooltip' data-placement='left' data-original-title='" . sprintf($lang->order->error->hasSent, $lang->order->batch[$order->type]) . "' style='color:#e48600;margin-left:10px;font-size:24px;'></i>";
            }
            else
            {
              echo html::a('javascript:;', "<i class='icon-plus'></i>", "class='btn-plus'") . html::a('javascript:;', "<i class='icon-remove'></i>", "class='btn-remove'");
            }
            echo html::hidden("mode[$i]", 'create', "class='product-batchEdit'");
            echo html::hidden("id[$i]", $orderProduct->id, "id='id{$i}'");
          ?>
        </td>
      </tr>
      <?php $i++;?>
      <?php endforeach;?>
      <?php for(; $i < $count; $i++):?>
      <tr class='orderProductList'>
        <?php if($i == 0):?>
        <th id='product_title' rowspan='<?php echo $count;?>'><?php echo $lang->order->product;?></th>
        <?php endif;?>
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
      <tr>
        <th><?php echo $lang->order->finishedDate;?></th>
        <td>
          <div class='required required-wrapper' style='width:40%'></div>
          <?php echo html::input('finishedDate', $order->finishedDate, "class='w-p40 form-control form-date'");?>
        </td>
        <td></td>
        <th><?php echo $lang->order->money;?></th>
        <td colspan='2'><?php echo html::input('money', $order->money, "class='form-control'");?></td>
        <td></td>
      </tr>
      <tr>
        <th><?php echo $lang->order->taxed;?></th>
        <td>
          <div class='required required-wrapper' style='width:40%'></div>
          <?php echo html::select('taxed', $lang->order->taxedList, $order->taxed, "class='w-p40 form-control'");?>
        </td>
        <td></td>
        <th><?php echo $lang->order->settlement;?></th>
        <td colspan='2'><?php echo html::select('settlement', $lang->order->settlementList, $order->settlement, "class='form-control'");?></td>
        <td></td>
      </tr>
      <tr>
        <th><?php echo $lang->order->desc;?></th>
        <td colspan='5'><?php echo html::textarea('desc', $order->desc, "rows='1' class='form-control'");?></td>
        <td></td>
      </tr>
      <tr>
        <th></th>        
        <td colspan='6'>
          <?php echo html::hidden('type', $order->type);?>
          <?php echo html::submitButton() . ' ' . html::backButton();?>
        </td>   
      </tr>
    </table>
  </form>
  </div>
</div>
<?php js::set('key', $i);?>
<?php include '../../common/view/footer.html.php';?>
