<?php
/**
 * The print batch view of batch module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     batch 
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
    .order-print {font-size: 20px; font-weight: bold;}
    .trader-print {text-decoration: underline;}
    .table-bordered, .table-bordered tr, .table-bordered thead > tr > th, .table-bordered td{border: 1px solid #000;}
    .pageTitle {font-family: '宋体'; font-size: 14px; color: #000; margin-top: 15px;}
    .spanTitle {margin-left:84px;}
    #printarea {width:24.1cm;height:14cm;margin:0 auto}
    
  @media screen{
    .page-content.with-menu {margin-top: 20px;}
    body {padding-bottom:20px;}
    .tab-content {height:14cm;}
    .printPage {display:none;}
  }
  @media print{
    .tab-content {display:none;}
    .printPage {height:29.7cm;}
    .mutilPage {height:220px;}
  }
  </style>
  <div class='tab-content'>
    <?php foreach($batches as $key => $batch):?>
    <div class='tab-pane<?php echo $key == 0 ? " active" : '';?>' id='printPage<?php echo $key;?>'>
      <div class='panel-body'>
        <table class='table table-borderless'>
          <tr class='text-center'>
            <td class='title-print' colspan='2'>
              <?php if(count($batches) == 1):?>
              <span><?php echo isset($company->name) ? $company->name : '';?></span>
              <?php else:?>
              <span class='spanTitle'><?php echo isset($company->name) ? $company->name : '';?></span>
              <div class='pageTitle pull-right'><?php echo sprintf($lang->order->print->pageTitle, $batch->page, count($batches));?></div>
              <?php endif;?>
            </td>
          </tr>
          <tr class='text-center'><td class='order-print' colspan='2'><?php echo $lang->batch->print->$type;?></td></tr>
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
              <th class='w-200px'><?php echo $lang->batch->model;?></th>
              <th class='w-80px'><?php echo $lang->batch->unit;?></th>
              <th class='w-80px'><?php echo $lang->batch->amount;?></th>
              <th class='w-80px price'><?php echo $lang->batch->price;?></th>
              <th class='w-100px money'><?php echo $lang->batch->money;?></th>
              <th class='w-140px'><?php echo $lang->order->desc;?></th>
            </tr>
          </thead>
          <?php $i = 1;?>
          <?php $rowspan = count($batch->products) + 1;?>
          <?php foreach($batch->products as $product):?>
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
            <td colspan='4'><?php echo $lang->order->total . $lang->order->money . ': ' . $batch->moneyInWords;?></td>
            <td class='text-right'><?php echo $lang->order->total;?></td>
            <td class='text-right'><?php echo $batch->money;?></td>
          </tr>
          <tr>
            <td colspan='7'>
              <div class='col-xs-3 pull-left'><?php echo $lang->order->print->check;?></div>
              <div class='col-xs-3 pull-left'><?php echo $lang->order->print->delivery;?></div>
              <div class='col-xs-3 pull-left'><?php echo $lang->order->print->tabulation . $this->app->user->realname;?></div>
              <div class='col-xs-3 pull-left'><?php echo $lang->order->print->sign[$order->type];?></div>
            </td>
          </tr>
        </table>
        <div style='margin-top:5px'><?php echo sprintf($lang->order->print->finishedDate, formatTime($batch->expressedDate, DT_DATE1));?></div>
      </div>
    </div>
    <?php endforeach;?>
  </div>
  <?php foreach($batches as $key => $batch):?>
  <?php if($key > 0):?>
  <div class='mutilPage'></div>
  <?php endif;?>
  <div class='printPage'>
    <table class='table table-borderless'>
      <tr class='text-center'>
        <td class='title-print' colspan='2'>
          <?php if(count($batches) == 1):?>
          <span><?php echo $company->name;?></span>
          <?php else:?>
          <span class='spanTitle'><?php echo $company->name;?></span>
          <div class='pageTitle pull-right'><?php echo sprintf($lang->order->print->pageTitle, $batch->page, count($batches));?></div>
          <?php endif;?>
        </td>
      </tr>
      <tr class='text-center'><td class='order-print printTitle' colspan='2'><?php echo $lang->batch->print->$type;?></td></tr>
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
          <th class='w-200px'><?php echo $lang->batch->model;?></th>
          <th class='w-80px'><?php echo $lang->batch->unit;?></th>
          <th class='w-80px'><?php echo $lang->batch->amount;?></th>
          <th class='w-80px price'><?php echo $lang->batch->price;?></th>
          <th class='w-100px money'><?php echo $lang->batch->money;?></th>
          <th class='w-140px'><?php echo $lang->order->desc;?></th>
        </tr>
      </thead>
      <?php $i = 1;?>
      <?php $rowspan = count($batch->products) + 1;?>
      <?php foreach($batch->products as $product):?>
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
        <td colspan='4'><?php echo $lang->order->total . $lang->order->money . ': ' . $batch->moneyInWords;?></td>
        <td class='text-right'><?php echo $lang->order->total;?></td>
        <td class='text-right'><?php echo $batch->money;?></td>
      </tr>
      <tr>
        <td colspan='7'>
          <div class='col-xs-3 pull-left'><?php echo $lang->order->print->check;?></div>
          <div class='col-xs-3 pull-left'><?php echo $lang->order->print->delivery;?></div>
          <div class='col-xs-3 pull-left'><?php echo $lang->order->print->tabulation . $this->app->user->realname;?></div>
          <div class='col-xs-3 pull-left'><?php echo $lang->order->print->sign[$order->type];?></div>
        </td>
      </tr>
    </table>
    <div style='margin-top:5px'><?php echo sprintf($lang->order->print->finishedDate, formatTime($batch->expressedDate, DT_DATE1));?></div>
  </div>
  <?php endforeach;?>
</div>
<div id='rightDocker'><?php echo html::checkbox('hidePrice', $lang->order->print->hidePrice);?></div>
<div class='text-center bottom'>
  <div class='page-guide'>
    <?php if(count($batches) > 1) foreach($batches as $key => $batch) echo html::a("#printPage$key", sprintf($lang->order->print->page, $batch->page), "data-toggle='tab' style='margin-right:5px;'");?>
  </div>
  <div>
    <?php echo html::commonButton($lang->order->print->common . $lang->order->print->pick, 'btn btn-primary printBtn', "id='print' data-title='{$lang->order->print->pick}'");?>
    <?php echo html::commonButton($lang->order->print->common . $lang->order->print->deliver, 'btn btn-primary printBtn', "id='print' data-title='{$lang->order->print->deliver}'");?>
    <?php echo html::a('http://www.ranzhi.org/book/ranzhipro/print-120.html', $lang->order->print->help, "class='btn btn-success' target='_blank'");?>
    <?php echo html::backButton();?>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
