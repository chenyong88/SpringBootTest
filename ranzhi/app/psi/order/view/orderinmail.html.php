<?php
/**
 * The template of order view in mail of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      yaozeyuan<yaozeyaun@yidou.biz>
 * @package     order 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<html>
<head></head>
<body>
<table width="640" border="0" align="center" cellpadding="0" cellspacing="0" style="box-sizing:border-box;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;font-size:12px;">
  <tr>
    <td>
      <table class='table' style="width: 100%;">
        <tr>
          <td class='text-center title-print' colspan='2' style="text-align: center;font-family: '楷体_GB2312';font-size: 24px;font-weight: bold;">
          <?php echo $company->name;?>
          </td>
        </tr>
        <tr>
          <td class='text-center' colspan='2' style="text-align: center;"><?php echo $company->address;?></td>
        </tr>
        <tr>
        <td class='text-center' colspan='2' style="text-align: center;">
          <?php echo $lang->order->print->tel . $company->phone;?>
          <?php if(!empty($company->fax)) echo  '    ' . $lang->order->print->fax . $company->fax;?>
        </td>
        </tr>
        <tr>
          <td class='text-center order-print' colspan='2' style="text-align: center;font-size: 20px;font-weight: bold;"><?php echo $lang->order->print->{$order->type};?></td>
        </tr>
        <tr>
          <td></td>
          <td class='text-right' style="text-align: right;"><?php echo $lang->order->print->orderNo[$order->type] . $order->orderNo;?></td>
        </tr>
        <tr>
          <td class='text-left'  style="text-align: left;" ><?php echo $lang->order->print->to . "<span class='trader'>" . $trader->name. "</span>";?></td>
          <td class='text-right' style="text-align: right;"><?php echo 'DATE：' . date(DT_DATE1);?></td>
        </tr>
        <tr>
          <td class='text-left'  style="text-align: left;" ><?php echo $lang->order->print->attn;?></td>
          <td class='text-right' style="text-align: right;"><?php echo $lang->order->print->fax . $trader->fax;?></td>
        </tr>
        <tr>
          <td class='text-left'  style="text-align: left;" ><?php echo $lang->order->print->from . $company->name;?></td>
          <td class='text-right' style="text-align: right;"><?php echo $lang->order->print->tel . $trader->phone;?></td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td>
      <table class='table table-bordered table-print' style="width: 100%;border-collapse: collapse;">
        <thead>
          <tr class='text-center' style="text-align: center;">
            <th style="border-style: solid;border-color: #000000;border-width: 1px;margin: 0px;padding: 2px;font-family: '宋体';font-size: 16px;color: #000;"><?php echo $lang->order->id;?></th>
            <th style="border-style: solid;border-color: #000000;border-width: 1px;margin: 0px;padding: 2px;font-family: '宋体';font-size: 16px;color: #000;"><?php echo $lang->order->print->product;?></th>
            <th style="border-style: solid;border-color: #000000;border-width: 1px;margin: 0px;padding: 2px;font-family: '宋体';font-size: 16px;color: #000;"><?php echo $lang->orderProduct->model;?></th>
            <th style="border-style: solid;border-color: #000000;border-width: 1px;margin: 0px;padding: 2px;font-family: '宋体';font-size: 16px;color: #000;"><?php echo $lang->orderProduct->unit;?></th>
            <th style="border-style: solid;border-color: #000000;border-width: 1px;margin: 0px;padding: 2px;font-family: '宋体';font-size: 16px;color: #000;"><?php echo $lang->orderProduct->amount;?></th>
          </tr>
        </thead>
        <?php $i = 1;?>
        <?php foreach($order->products as $product):?>
        <tr> 
          <td class='text-center' style="text-align: center;border-style: solid;border-color: #000000;border-width: 1px;margin: 0px;padding: 2px;font-family: '宋体';font-size: 16px;color: #000;"><?php echo $i;?></td>
          <td class='text-left'   style="text-align: left;border-style: solid;border-color: #000000;border-width: 1px;margin: 0px;padding: 2px;font-family: '宋体';font-size: 16px;color: #000;"><?php echo $product->name;?></td>
          <td class='text-left'   style="text-align: left;border-style: solid;border-color: #000000;border-width: 1px;margin: 0px;padding: 2px;font-family: '宋体';font-size: 16px;color: #000;"><?php echo $product->model;?></td>
          <td class='text-center' style="text-align: center;border-style: solid;border-color: #000000;border-width: 1px;margin: 0px;padding: 2px;font-family: '宋体';font-size: 16px;color: #000;"><?php echo $product->unit;?></td>
          <td class='text-right'  style="text-align: right;border-style: solid;border-color: #000000;border-width: 1px;margin: 0px;padding: 2px;font-family: '宋体';font-size: 16px;color: #000;"><?php echo $product->amount;?></td>
        </tr>
        <?php $i++;?>
        <?php endforeach;?>
      </table>
    </td>
  </tr>
  <tr>
    <td class='text-right' style="text-align: right;"><?php echo $lang->order->mail->endnote;?></td>
  </tr>
</table>
<style>
  .table{
      width:100%;
  }
  .text-center{
      text-align : center;
  }
  
  .text-left{
      text-align : left;
  }
  
  .text-right{
      text-align : right;
  }
  
  .v-center{
      vertical-align: middle;
  }
  
  .table-bordered{
      border-collapse:collapse;
  }
  .table-bordered td, .table-bordered th{ 
      border-style:solid;
      border-color:#000000;
      border-width:1px;
      margin:0px;
      padding:0px;
  }
  
  .table-print th, .table-print td {
        font-family: '宋体'; 
        font-size: 16px; 
        color: #000; 
        padding: 2px;
  }
  
  .title-print {
        font-family: '楷体_GB2312'; 
        font-size: 24px; 
        font-weight: bold;
  }
  
  .order-print {
        font-size: 20px;
        font-weight: bold;
  }
  
  .trader-print {
        text-decoration: underline;
  }
</style>
</body>
</html>
