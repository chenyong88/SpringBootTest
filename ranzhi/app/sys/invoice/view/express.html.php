<?php
/**
 * The express view file of invoice module of RanZhi.
 *
 * @copyright   Copyright 2009-2017 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     invoice 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../common/view/header.modal.html.php';?>
<?php js::set('invoiceType', $invoice->invoiceType);?>
<form id='invoiceForm' method='post' action='<?php echo inlink('express', "invoiceID=$invoice->id");?>'>
  <table class='table table-form'>
    <tr>
      <th class='w-80px'><?php echo $lang->invoice->contact;?></th>
      <td colspan='3'>
        <div class='input-group'>
          <?php echo html::input('newContact', '', "class='form-control'");?>
          <span class='input-group-addon contactPhone fix-border'><?php echo $lang->invoice->phone;?></span>
          <?php echo html::input('contactPhone', '', "class='form-control contactPhone'");?>
          <?php echo html::select('contact', $contacts, $invoice->contact, "class='form-control'");?>
          <span class='input-group-addon'>
            <label class='checkbox-inline'><input type='checkbox' name='createContact' id='createContact' value='1'> <?php echo $lang->create;?></label>
          </span>
        </div>
      </td>
      <td class='w-40px'></td>
    </tr>
    <?php if($invoice->invoiceType == 'paper'):?>
    <tr>
      <th><?php echo $lang->invoice->address;?></th>
      <td colspan='3'>
        <div class='input-group'>
          <?php echo html::input('newAddress', '', "class='form-control'");?>
          <?php echo html::select('address', $addresses, $invoice->address, "class='form-control'");?>
          <span class='input-group-addon'>
            <label class='checkbox-inline'><input type='checkbox' name='createAddress' id='createAddress' value='1' <?php echo empty($addresses) ? 'checked' : '';?>> <?php echo $lang->create;?></label>
          </span>
        </div>
      </td>
      <td></td>
    </tr>
    <tr>
      <th><?php echo $lang->invoice->express;?></th>
      <td class='w-200px'><?php echo html::input('express', '', "class='form-control'");?></td>
      <th><?php echo $lang->invoice->waybill;?></th>
      <td class='w-240px'><?php echo html::input('waybill', '', "class='form-control'");?></td>
      <td></td>
    </tr>
    <?php else:?>
    <tr>
      <th><?php echo $lang->invoice->sendway;?></th>
      <td>
        <div class='input-group'>
          <?php echo html::select('sendway', $lang->invoice->sendwayList, 'email', "class='form-control'");?>
          <span class='input-group-addon fix-border fix-padding'></span>
          <?php echo html::input('sendAccount', '', "class='form-control'");?>
        </div>
      </td>
    </tr>
    <tr class='email'>
      <th><?php echo $lang->invoice->subject;?></th>
      <td><?php echo html::input('subject', $lang->invoice->invoiceTypeList['digital'], "class='form-control'");?></td>
    </tr>
    <tr class='email'>
      <th><?php echo $lang->invoice->content;?></th>
      <td><?php echo html::textarea('content', $lang->invoice->invoiceTypeList['digital'], "rows='1' class='form-control'");?></td>
    </tr>
    <tr class='email'>
      <th><?php echo $lang->files;?></th>
      <td>
        <?php foreach($invoice->files as $file):?>
        <?php $checked = $file->extra == 'e-invoice' ? "checked='checked'" : '';?>
        <div class='checkbox'>
          <label>
            <input type='checkbox' name='attachments[<?php echo $file->id;?>]' <?php echo $checked;?> value='<?php echo $file->id;?>'><?php echo $file->title;?>
          </label>
        </div>
        <?php endforeach;?>
      </td>
    </tr>
    <?php endif;?>
    <?php if(commonModel::hasPriv('file', 'upload')):?>
    <tr>
      <th><?php echo $lang->invoice->file;?></th>
      <td colspan='3'><?php echo $this->fetch('file', 'buildForm', 'filecount=1');?></td>
      <td></td>
    </tr>
    <?php endif;?>
    <tr>
      <th></th>
      <td colspan='3'>
        <?php echo html::submitButton();?>
        <div id='duplicateError' class='hide'></div>
      </td>
      <td></td>
    </tr>
  </table>
</form>
<div class='errorMessage hide'>
  <div class='alert alert-danger alert-dismissable'>
    <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>
    <button type='submit' class='btn btn-default' id='continueSubmit'><?php echo $lang->continueSave;?></button>
  </div>
</div>
<?php include '../../common/view/footer.modal.html.php';?>
