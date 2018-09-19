<?php 
/**
 * The edit view of order module of Ranzhi.
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
<div class='panel'>
  <div class='panel-heading'>
    <strong><i class='icon-edit'></i> <?php echo $lang->order->edit;?></strong>
  </div>
  <div class='panel-body'>
  <form method='post' id='ajaxForm'>
    <table class='table table-form'>
      <tr>
        <th class='w-70px'><?php echo $lang->order->trader[$order->type];?></th>
        <td>
          <div class='required required-wrapper'></div>
          <div class='input-group'>
            <?php echo html::select('trader', $companies, $order->trader, "class='order-trader form-control chosen' data-no_results_text='" . $lang->searchMore . "'");?>
            <?php echo html::input('newTrader', '', "class='order-trader form-control' style='display:none'");?>
            <span class='input-group-addon'>
              <?php echo html::checkbox('createTrader', $lang->order->createTrader, '', "class='createTrader'");?>
            </span>
          </div>
        </td>
        <td></td>
        <?php if(!empty($contract)):?>
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
        $productsCount = count($order->products); 
        $newItemsCount = $config->order->newItemsCount;
        foreach($order->products as $orderProduct):
      ?>
      <tr>
        <?php if($i == 1):?>
        <th id='product_title' rowspan='<?php echo $productsCount < $newItemsCount ? $newItemsCount : $productsCount + 1;?>'><?php echo $lang->order->product;?></th>
        <?php endif;?>
        <td>
          <div class='input-group'>
            <?php $product = zget($products, $orderProduct->product);?>
            <?php echo html::input('', empty($product) ? '' : $product->name, "class='form-control sentProduct' readonly data-toggle='tooltip' data-placement='right' data-original-title='" . sprintf($lang->order->error->cantChange, $lang->order->batch[$order->type]) . "' style='display:none'");?>
            <select id='product<?php echo $i;?>' name='product[<?php echo $i;?>]' class='product-batchEdit select-product form-control chosen'data-placeholder='<?php echo $lang->orderProduct->product;?>'>
              <option></option>
              <?php foreach($products as $product):?>
              <option value='<?php echo $product->id;?>' data-keys='<?php echo $product->pinyin;?>' data-unit='<?php echo $product->unit;?>' <?php if($product->id == $orderProduct->product) echo 'selected';?>><?php echo $product->name;?></option>
              <?php endforeach;?>
            </select>
            <?php if(commonModel::hasPriv('product', 'createFromOrder')):?>
            <span class='input-group-addon sentProduct'>
              <?php echo html::a($this->createLink('product','createFromOrder', "id=product{$i}"), $lang->order->createProduct, "data-toggle='modal'");?>
            </span>
            <?php endif;?>
          </div>
        </td>
        <td class='w-100px'>
          <?php $product = zget($products, $orderProduct->product);?>
          <?php echo html::input("unit[$i]", $product->unit, "id='unit{$i}' class='product-batchEdit form-control' readonly placeholder='{$lang->orderProduct->unit}'");?>
        </td>
        <td class='w-100px'>
          <?php echo html::input("price[$i]", $orderProduct->price, "id='price{$i}' class='product-batchEdit form-control product-price' laceholder='{$lang->orderProduct->price}'");?>
        </td>
        <td class='w-100px'>
          <?php echo html::input("amount[$i]", $orderProduct->amount, "id='amount{$i}' class='product-batchEdit form-control product-amount' placeholder='{$lang->orderProduct->amount}'");?>
          <?php echo html::hidden("sentAmount[$i]", $orderProduct->sentAmount, "id='sentAmount'");?>
        </td>
        <td class='w-100px'>
          <?php echo html::input("moneys[$i]", $orderProduct->money, "id='moneys{$i}' class='product-batchEdit form-control product-money' placeholder='{$lang->order->money}'");?>
        </td>
        <td>
          <?php 
            if($orderProduct->sentAmount > 0)
            {
              echo "<i class='icon-lock icon-large' data-toggle='tooltip' data-placement='left' data-original-title='" . sprintf($lang->order->error->hasSent, $lang->order->batch[$order->type]) . "' style='margin-left:10px;'></i>";
            }
            else
            {
              echo html::a('javascript:;', "<i class='icon-plus'></i>", "class='btn-plus'") . html::a('javascript:;', "<i class='icon-remove'></i>", "class='btn-remove'");
            }
            echo html::hidden("mode[$i]", 'update', "id='mode{$i}'");
            echo html::hidden("id[$i]", $orderProduct->id, "id='id{$i}'");
          ?>
        </td>
      </tr>
      <?php $i ++;?>
      <?php endforeach;?>
      <?php $count = $productsCount < $newItemsCount ? $newItemsCount - $productsCount : 1;?>
      <?php for($j = 0; $j < $count; $j ++, $i ++):?>
      <tr>
        <td>
          <div class='input-group'>
            <select id='product<?php echo $i;?>' name='product[<?php echo $i;?>]' class='product-batchEdit select-product form-control chosen'data-placeholder='<?php echo $lang->orderProduct->product;?>'>
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
        <td><?php echo html::input("unit[$i]", '', "id='unit{$i}' class='product-batchEdit form-control' placeholder='{$lang->orderProduct->unit}'");?></td>
        <td><?php echo html::input("price[$i]", '', "id='price{$i}' class='product-batchEdit form-control product-price' placeholder='{$lang->orderProduct->price}'");?></td>
        <td><?php echo html::input("amount[$i]", '', "id='amount{$i}' class='product-batchEdit form-control product-amount' placeholder='{$lang->orderProduct->amount}'");?></td>
        <td><?php echo html::input("moneys[$i]", '', "id='moneys{$i}' class='product-batchEdit form-control product-money' placeholder='{$lang->order->money}'");?></td>
        <td>
          <?php echo html::a('javascript:;', "<i class='icon-plus'></i>", "class='btn-plus'");?>
          <?php echo html::a('javascript:;', "<i class='icon-remove'></i>", "class='btn-remove'");?>
          <?php echo html::hidden("mode[$i]", 'new', "id='mode{$i}' class='product-batchEdit'");?>
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
        <td colspan='2'><?php echo html::select('settlement', $lang->order->settlementList, '', "class='form-control'");?></td>
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
          <?php html::hidden('type', $order->type);?>
          <?php echo ($order->status == 'finished' ? '' : html::submitButton()) . ' ' . html::backButton();?>
        </td>   
      </tr>
    </table>
  </form>
  </div>
</div>
<?php js::set('key', $i)?>
<script>
<?php helper::import('../js/searchcustomer.js');?>
</script>
<?php include '../../common/view/footer.html.php';?>
