<?php
/**
 * The print order view of order module of Ranzhi.
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
<?php js::import($jsRoot . 'jquery/printarea/printarea.js')?>
<?php js::set('status', $status);?>
<div id='printarea'>    
  <style>
  .table-print th, .table-print td {font-family: '宋体'; font-size: 16px; color: #000; padding: 2px;}
  .title-print {font-family: '楷体_GB2312'; font-size: 24px; font-weight: bold;}
  .order-print {font-size: 20px;font-weight: bold;}
  .trader-print {text-decoration: underline;}
  .table-bordered, .table-bordered tr, .table-bordered thead > tr > th, .table-bordered td {border: 1px solid #000;}
  .pageTitle {font-family: '宋体';font-size: 14px; color: #000; margin-top: 15px;}
  .spanTitle {margin-left:84px;}
  .printPage {height:29.7cm;}
  .page-break {page-break-after:always;}
  #printarea {width:24.1cm;height:14cm;margin:0 auto;}

  @media screen{
    .page-content.with-menu {margin-top: 20px;}
    body {padding-bottom:20px;}
    .tab-content {height:14cm;}
    #orderDIV {display:none;}
    #invoiceDIV {display:none;}
  }

  @media print{
    .tab-content {display:none;}
  }
  </style>
  <div class='tab-content'>
    <?php foreach($orders as $key => $order):?>
    <div class='tab-pane<?php echo $key == 0 ? " active" : '';?>' id='printPage<?php echo $key;?>'>
      <div class='panel-body'>
        <table class='table table-borderless'>
          <tr class='text-center'>
            <td class='title-print' colspan='2'>
              <?php if(count($orders) == 1):?>
              <span><?php echo $company->name;?></span>
              <?php else:?>
              <span class='spanTitle'><?php echo $company->name;?></span>
              <div class='pageTitle pull-right'><?php echo sprintf($lang->order->print->pageTitle, $order->page, count($orders));?></div>
              <?php endif;?>
            </td>
          </tr>
          <tr class='text-center'><td class='order-print' colspan='2'><?php echo $lang->order->print->{$order->type};?></td></tr>
          <tr class='table-print'>
            <td>
              <?php echo $lang->order->print->trader[$order->type];?>
              <label class='trader-print trader'><?php echo $trader->name;?></label>
            </td>
            <td class='text-right'><?php echo $order->orderNo;?></td>
          </tr>
          <tr class='table-print'>
            <td>
              <?php echo $lang->order->print->contract;?>
              <label class='trader-print'><?php echo $order->contract;?></label>
            </td>
            <td class='text-right'><?php echo date(DT_DATE1);?></td>
          </tr>
        </table>
        <table class='table table-bordered table-print'>
          <thead>
            <tr class='text-center'>
              <th class='w-240px'><?php echo $lang->order->print->product;?></th>
              <th class='w-180px'><?php echo $lang->orderProduct->model;?></th>
              <th class='w-80px'><?php echo $lang->orderProduct->unit;?></th>
              <th class='w-80px'><?php echo $lang->orderProduct->amount;?></th>
              <th class='w-80px price'><?php echo $lang->orderProduct->price;?></th>
              <th class='w-100px money'><?php echo $lang->order->money;?></th>
              <th class=''><?php echo $lang->order->desc;?></th>
            </tr>
          </thead>
          <?php $i = 1;?>
          <?php $rowspan = count($order->products) + 1;?>
          <?php foreach($order->products as $product):?>
          <tr> 
            <td class='text-left'><?php echo $product->name;?></td>
            <td class='text-left'><?php echo $product->model;?></td>
            <td class='text-center'><?php echo $product->unit;?></td>
            <td class='text-right'><?php echo $product->amount;?></td>
            <td class='text-right price'><?php echo $product->price;?></td>
            <td class='text-right money'><?php echo $product->money;?></td>
            <?php if($i == 1):?>
            <td class='text-left desc' rowspan='<?php echo $rowspan;?>'><?php echo $order->desc;?></td>
            <?php endif;?>
          </tr>
          <?php $i++;?>
          <?php endforeach;?>
          <tr class='money'>
            <td colspan='4'><?php echo $lang->order->total . $lang->order->money . ': ' . $order->moneyInWords;?></td>
            <td class='text-right'><?php echo $lang->order->total;?></td>
            <td class='text-right'><?php echo $order->money;?></td>
          </tr>
          <tr>
            <td class='table-footer' colspan='7'>
              <div class='col-xs-3 pull-left'><?php echo $lang->order->print->check;?></div>
              <div class='col-xs-3 pull-left'><?php echo $lang->order->print->delivery;?></div>
              <div class='col-xs-3 pull-left'><?php echo $lang->order->print->tabulation . $this->app->user->realname;?></div>
              <div class='col-xs-3 pull-left'><?php echo $lang->order->print->sign[$type];?></div>
            </td>
          </tr>
        </table>
        <div style='margin-top:5px'><?php echo sprintf($lang->order->print->finishedDate, formatTime($order->finishedDate, DT_DATE1));?></div>
      </div>
    </div>
    <div class='page-break'></div>
    <?php endforeach;?>
  </div>
  <div id='orderDIV'></div>
  <div id='invoiceDIV'></div>
</div>
<div id='invoiceHiddenDIV' class='hide'>
  <?php foreach($orders as $key => $order):?>
    <?php if($key > 0):?>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
    <?php endif;?>
    <div class='printPage'>
      <table class='table table-borderless'>
        <tr class='text-center'>
          <td class='title-print' colspan='2'>
            <?php if(count($orders) == 1):?>
              <span><?php echo $company->name;?></span>
            <?php else:?>
              <span class='spanTitle'><?php echo $company->name;?></span>
              <div class='pageTitle pull-right'><?php echo sprintf($lang->order->print->pageTitle, $order->page, count($orders));?></div>
            <?php endif;?>
          </td>
        </tr>
        <tr class='text-center'><td class='order-print printTitle' colspan='2'><?php echo $lang->order->print->{$order->type};?></td></tr>
        <tr class='table-print'>
          <td>
            <?php echo $lang->order->print->trader[$order->type];?>
            <label class='trader-print trader'><?php echo $trader->name;?></label>
          </td>
          <td class='text-right'><?php echo $order->orderNo;?></td>
        </tr>
        <tr class='table-print'>
          <td>
            <?php echo $lang->order->print->contract;?>
            <label class='trader-print'><?php echo $order->contract;?></label>
          </td>
          <td class='text-right'><?php echo date(DT_DATE1);?></td>
        </tr>
      </table>
      <table class='table table-bordered table-print'>
        <thead>
          <tr class='text-center'>
            <th class='w-240px'><?php echo $lang->order->print->product;?></th>
            <th class='w-180px'><?php echo $lang->orderProduct->model;?></th>
            <th class='w-80px'><?php echo $lang->orderProduct->unit;?></th>
            <th class='w-80px'><?php echo $lang->orderProduct->amount;?></th>
            <th class='w-80px price'><?php echo $lang->orderProduct->price;?></th>
            <th class='w-100px money'><?php echo $lang->order->money;?></th>
            <th class=''><?php echo $lang->order->desc;?></th>
          </tr>
        </thead>
        <?php $i = 1;?>
        <?php $rowspan = count($order->products) + 1;?>
        <?php foreach($order->products as $product):?>
        <tr> 
          <td class='text-left'><?php echo $product->name;?></td>
          <td class='text-left'><?php echo $product->model;?></td>
          <td class='text-center'><?php echo $product->unit;?></td>
          <td class='text-right'><?php echo $product->amount;?></td>
          <td class='text-right price'><?php echo $product->price;?></td>
          <td class='text-right money'><?php echo $product->money;?></td>
          <?php if($i == 1):?>
          <td class='text-left desc' rowspan='<?php echo $rowspan;?>'><?php echo $order->desc;?></td>
          <?php endif;?>
        </tr>
        <?php $i++;?>
        <?php endforeach;?>
        <tr class='money'>
          <td colspan='4'><?php echo $lang->order->total . $lang->order->money . ': ' . $order->moneyInWords;?></td>
          <td class='text-right'><?php echo $lang->order->total;?></td>
          <td class='text-right'><?php echo $order->money;?></td>
        </tr>
        <tr>
          <td class='table-footer' colspan='7'>
            <div class='col-xs-3 pull-left'><?php echo $lang->order->print->check;?></div>
            <div class='col-xs-3 pull-left'><?php echo $lang->order->print->delivery;?></div>
            <div class='col-xs-3 pull-left'><?php echo $lang->order->print->tabulation . $this->app->user->realname;?></div>
            <div class='col-xs-3 pull-left'><?php echo $lang->order->print->sign[$type];?></div>
          </td>
        </tr>
      </table>
      <div style='margin-top:5px'><?php echo sprintf($lang->order->print->finishedDate, formatTime($order->finishedDate, DT_DATE1));?></div>
    </div>
    <div class='page-break'></div>
  <?php endforeach;?>
</div>
<div id='orderHiddenDIV' class='hide'>
  <?php $pageCount = count($orderPages);?>
  <?php $i = 1;?>
  <?php foreach($orderPages as $pageIndex => $page):?>
    <?php if($pageIndex > 1):?>
      <div class='page-break'></div>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
    <?php endif;?>
    <table class='table table-form'>
      <tr><td class='text-center title-print' colspan='3'><?php echo $company->name;?></td></tr>
      <tr><td class='text-center' colspan='3'><?php if(isset($company->address)) echo $company->address;?></td></tr>
      <tr>
        <td class='text-center' colspan='3'>
          <?php if(isset($company->phone)) echo $lang->order->print->tel . $company->phone . '    ';?>
          <?php if(isset($company->fax)) echo $lang->order->print->fax . $company->fax;?>
        </td>
      </tr>
      <tr><td class='text-center order-print' colspan='3'><?php echo $lang->order->print->$type;?></td></tr>
      <tr>
        <td class='text-left' colspan='2'><?php echo $order->orderNo;?></td>
        <td class='w-200px text-right'><?php if($pageCount > 1) echo sprintf($lang->order->page, $pageIndex, $pageCount);?></td>
      </tr>
      <tr>
        <td colspan='2'><?php echo $lang->order->print->to . "<span class='trader'>" . $trader->name . "</span>";?></td>
        <td class='w-200px text-left'><?php echo 'DATE：' . date(DT_DATE1);?></td>
      </tr>
      <tr>
        <td colspan='2'><?php echo $lang->order->print->attn . $trader->contact;?></td>
        <td class='w-200px text-left'><?php echo $lang->order->print->fax . (isset($trader->fax) ? $trader->fax : '');?></td>
      </tr>
      <tr>
        <td colspan='2'><?php echo $lang->order->print->from . $company->name ;?></td>
        <td class='w-200px text-left'><?php echo $lang->order->print->tel . (isset($trader->phone) ? $trader->phone : '');?></td>
      </tr>
    </table>
    <table class='table table-bordered table-print'>
      <thead>
        <tr class='text-center'>
          <th class='w-40px'><?php echo $lang->order->id;?></th>
          <th><?php echo $lang->order->print->product;?></th>
          <th><?php echo $lang->orderProduct->model;?></th>
          <th class='w-80px'><?php echo $lang->orderProduct->unit;?></th>
          <th class='w-80px'><?php echo $lang->orderProduct->amount;?></th>
          <th class='w-80px'><?php echo $lang->orderProduct->price;?></th>
          <th class='w-100px'><?php echo $lang->order->money;?></th>
          <th class='w-140px'><?php echo $lang->order->desc;?></th>
        </tr>
      </thead>
      <?php $subtotalMoney = 0;?>
      <?php foreach($page as $product):?>
      <tr> 
        <td class='text-center'><?php echo $i;?></td>
        <td class='text-left'  ><?php echo $product->name;?></td>
        <td class='text-center'><?php echo $product->model;?></td>
        <td class='text-center'><?php echo $product->unit;?></td>
        <td class='text-right' ><?php echo $product->amount;?></td>
        <td class='text-right' ><?php echo $product->price;?></td>
        <td class='text-right' ><?php echo $product->money;?></td>
        <?php $subtotalMoney += $product->money;?>
        <td></td>
      </tr>
      <?php $i++;?>
      <?php endforeach;?>
      <?php if($pageCount != 1):?>
      <tr><td colspan='9'><strong><?php echo $lang->order->subtotal . '： ' . number_format($subtotalMoney);?></strong></td></tr>
      <?php endif;?>
      <?php if($pageIndex == $pageCount):?>
      <tr><td colspan='9'><strong><?php echo $lang->order->total . '： ' . number_format($originOrder->money);?></strong></td></tr>
      <tr><td colspan='9'><strong><?php echo $lang->order->total . $lang->order->money . ': ' . $originOrder->moneyInWords;?></strong></td></tr>
      <tr>
        <td colspan='9'>
          <?php
          echo $lang->order->print->taxedList[$originOrder->taxed] . '<br/>';
          echo $lang->order->print->settlement . $lang->order->settlementList[$originOrder->settlement] . '<br/>';
          echo $lang->order->print->desc . '<br/>' . $originOrder->desc;
          ?>
        </td>
      </tr>
      <?php endif;?>
    </table>
    <?php if($pageIndex == $pageCount):?>
    <div style="margin-top:20px;font-family: '宋体'; font-size: 16px; color: #000;">
      <div class='col-xs-6'><?php echo $lang->order->print->tabulation . $this->app->user->realname;?></div>
      <div class='col-xs-6'><?php echo $lang->order->print->sign[$type];?></div>
    </div>
    <?php endif;?>
  <?php endforeach;?>
</div>
<div id='rightDocker'><?php echo html::checkbox('hidePrice', $lang->order->print->hidePrice);?></div>
<div class='text-center'>
  <div class='page-guide'>
    <?php if(count($orders) > 1) foreach($orders as $key => $order) echo html::a("#printPage$key", sprintf($lang->order->print->page, $order->page), "data-toggle='tab' style='margin-right:5px;'");?>
  </div>
  <div>
    <?php 
    echo html::commonButton($lang->order->print->common . $lang->order->common, 'btn btn-primary printOrder', "id='print' data-title='$lang->order->print->$type'");
    if($type == 'sale')
    {
        echo html::commonButton($lang->order->print->common . $lang->order->print->pick, 'btn btn-primary printBtn', "id='print' data-title='{$lang->order->print->pick}'");
        echo html::commonButton($lang->order->print->common . $lang->order->print->deliver, 'btn btn-primary printBtn', "id='print' data-title='{$lang->order->print->deliver}'");
    }
    echo html::a('http://www.ranzhi.org/book/ranzhipro/print-120.html', $lang->order->print->help, "class='btn btn-success' target='_blank'");
    echo html::backButton();
    ?>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
