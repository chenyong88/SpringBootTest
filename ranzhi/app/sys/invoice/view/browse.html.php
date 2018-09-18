<?php
/**
 * The browse view file of invoice module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     invoice 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include $app->getAppRoot() . 'common/view/header.html.php';?>
<?php js::set('mode', $mode);?>
<li id='bysearchTab'><?php echo html::a('#', "<i class='icon-search icon'></i>" . $lang->search->common)?></li>
<div id='menuActions'>
  <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" type="button"><i class="icon-upload-alt"> </i><?php echo $lang->export;?><span class="caret"></span></button>
  <ul class='dropdown-menu <?php if($this->appName != 'crm' or !commonModel::hasPriv('invoice', 'create')) echo 'pull-right';?>'>
    <?php foreach($lang->invoice->exportTypeList as $type => $label):?>
    <?php commonModel::printLink('invoice', 'export', "type=$type", $label, "class='iframe' data-width='700'", '', '', 'li');?>
    <?php endforeach;?>
  </ul>
  <?php if($this->appName == 'crm') commonModel::printLink('invoice', 'create', '', '<i class="icon-plus"></i> ' . $lang->invoice->create, "class='btn btn-primary'");?>
</div>
<div class='panel'>
  <table class='table table-hover table-striped table-bordered tablesorter table-data table-fixed' id='invoiceList'>
    <thead>
      <tr class='text-center'>
        <?php $vars = "mode=$mode&company=$company&month={$currentYear}{$currentMonth}&status=$status&orderBy=%s";?>
        <th class='w-60px'><?php commonModel::printOrderLink('id', $orderBy, $vars, $lang->invoice->id);?></th>
        <th class='w-100px'><?php commonModel::printOrderLink('sn', $orderBy, $vars, $lang->invoice->sn);?></th>
        <th class='w-200px'><?php commonModel::printOrderLink('customer', $orderBy, $vars, $lang->invoice->customer);?></th>
        <th class='w-100px'><?php echo $lang->invoice->contractReturn;?></th>
        <th class='w-100px'><?php commonModel::printOrderLink('money', $orderBy, $vars, $lang->invoice->money);?></th>
        <th class='w-150px'><?php commonModel::printOrderLink('type', $orderBy, $vars, $lang->invoice->type);?></th>
        <th class='w-80px'><?php commonModel::printOrderLink('status', $orderBy, $vars, $lang->invoice->status);?></th>
        <th><?php echo $lang->invoice->desc;?></th>
        <?php $class = $this->app->clientLang == 'en' ? 'w-280px' : 'w-200px';?>
        <th class='<?php echo $class;?>'><?php echo $lang->actions;?></th>
      </tr>
    </thead>
    <tbody>
      <?php $allMoney    = 0;?>
      <?php $normalMoney = 0;?>
      <?php foreach($invoiceList as $invoice):?>
      <tr class='text-center' data-url='<?php echo inlink('view', "invoiceID=$invoice->id"); ?>'>
        <td><?php echo $invoice->id;?></td>
        <td><?php echo $invoice->sn;?></td>
        <td class='text-left' title='<?php echo zget($customers, $invoice->customer, '');?>'><?php echo zget($customers, $invoice->customer, '');?></td>
        <td class='text-right' title='<?php echo zget($contractReturns, $invoice->contract, '');?>'><?php echo zget($contractReturns, $invoice->contract, '');?></td>
        <td class='text-right'><?php echo $invoice->money;?></td>
        <td><?php echo zget($lang->invoice->typeList, $invoice->type);?></td>
        <td class="text-<?php echo $config->invoice->colorList[$invoice->status];?>"><?php echo zget($lang->invoice->statusList, $invoice->status);?></td>
        <td class='text-left'><?php echo $invoice->desc;?></td>
        <td>
          <?php 
          commonModel::printLink('invoice', 'edit', "invoiceID=$invoice->id", $lang->edit);
          
          if($invoice->status == 'wait')
          {
              commonModel::printLink('invoice', 'drawn', "invoiceID=$invoice->id", $lang->invoice->drawn, "data-toggle='modal'");
          }
          else
          {
              echo html::a('javascript:;', $lang->invoice->drawn, "class='disabled'");
          }
          
          $expressLabel = $invoice->invoiceType == 'paper' ? $lang->invoice->express : $lang->invoice->send;
          if($invoice->status == 'normal')
          {
              if($invoice->expressedBy)
              {
                  echo html::a('javascript:;', $expressLabel, "class='disabled'");
              }
              else
              {
                  commonModel::printLink('invoice', 'express', "invoiceID=$invoice->id", $expressLabel, "data-toggle='modal'");
              }
          
              commonModel::printLink('invoice', 'taxRefund', "invoiceID=$invoice->id&status=canceled", $lang->invoice->cancel, "data-toggle='modal'");
              commonModel::printLink('invoice', 'taxRefund', "invoiceID=$invoice->id&status=red", $lang->invoice->red, "data-toggle='modal'");
          }
          else
          {
              echo html::a('javascript:;', $expressLabel, "class='disabled'");
              echo html::a('javascript:;', $lang->invoice->cancel, "class='disabled'");
              echo html::a('javascript:;', $lang->invoice->red, "class='disabled'");
          }
          if($invoice->status == 'wait')
          {
              commonModel::printLink('invoice', 'delete', "invoiceID=$invoice->id", $lang->delete, "class='deleter'");
          }
          else
          {
              echo html::a('javascript:;', $lang->delete, "class='disabled'");
          }
          ?>
        </td>
      </tr>
      <?php $allMoney += $invoice->money;?>
      <?php if($invoice->status == 'normal') $normalMoney += $invoice->money;?>
      <?php endforeach;?>
  </table>
  <div class='table-footer'>
    <?php if($allMoney):?>
    <div class='pull-left'>
      <span class='text-danger'><?php printf($lang->invoice->totalMoney, formatMoney($allMoney), formatMoney($normalMoney));?></span>
    </div>
    <?php endif;?>
    <?php echo $pager->show();?>
  </div>
</div>
<?php include $app->getAppRoot() . 'common/view/footer.html.php';?>
