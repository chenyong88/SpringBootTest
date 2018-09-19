<?php
/**
 * The create view file of receivable module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     receivable 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../sys/common/view/header.modal.html.php';?>
<?php include '../../../sys/common/view/chosen.html.php';?>
<form id='createForm' method='post' action='<?php echo inlink('create');?>'>
  <table class='table table-form'>
    <tr>
      <th class='w-100px'><?php echo $lang->receivable->trader;?></th>
      <td>
        <div class='input-group'>
          <?php echo html::select('trader', $customers, $traderID, "class='form-control chosen' data-no_results_text='" . $lang->searchMore . "'");?>
          <?php echo html::input('newTrader', '', "class='form-control' style='display:none'");?>
          <span class='input-group-addon'>
            <label class='checkbox-inline'>
              <input type='checkbox' name='createTrader' id='createTrader' value='1' /> <?php echo $lang->receivable->createTrader;?>
            </label>
          </span>
        </div>
      </td>
      <td class='w-40px'></td>
    </tr>
    <tr class='traderInfo hide'>
      <th><?php echo $lang->customer->contact;?></th>
      <td>
        <div class='required required-wrapper'></div>
        <?php echo html::input('contact', '', "class='form-control'");?>
      </td>
    </tr>
    <tr class='traderInfo hide'>
      <th><?php echo $lang->customer->phone;?></th>
      <td><?php echo html::input('phone', '', "class='form-control'");?></td>
    </tr>
    <tr class='traderInfo hide'>
      <th><?php echo $lang->customer->email;?></th>
      <td><?php echo html::input('email', '', "class='form-control'");?></td>
    </tr>
    <tr class='traderInfo hide'>
      <th><?php echo $lang->customer->qq;?></th>
      <td><?php echo html::input('qq', '', "class='form-control'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->receivable->type;?></th>
      <td><?php echo html::select('origin', $lang->receivable->originList, '', "class='form-control'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->receivable->contract;?></th>
      <td>
        <div class='required required-wrapper'></div>
        <?php echo html::select('contract', '', '', "class='form-control chosen'");?>
      </td>
    </tr>
    <tr>
      <th><?php echo $lang->receivable->order;?></th>
      <td>
        <div class='required required-wrapper'></div>
        <?php echo html::select('order', '', '', "class='form-control chosen'");?>
      </td>
    </tr>
    <tr>
      <th><?php echo $lang->receivable->batch;?></th>
      <td><?php echo html::select('batch', '', '', "class='form-control chosen'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->receivable->deserved;?></th>
      <td><?php echo html::input('deserved', '', "class='form-control'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->receivable->actual;?></th>
      <td><?php echo html::input('actual', '', "class='form-control'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->receivable->balance;?></th>
      <td><?php echo html::input('balance', '', "class='form-control' readonly");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->receivable->desc;?></th>
      <td>
        <div class='required required-wrapper'></div>
        <?php echo html::input('desc', '', "class='form-control'");?>
      </td>
    </tr>
    <tr>
      <th></th>
      <td>
        <?php echo html::submitButton();?>
        <div id='duplicateError' class='hide'></div>
      </td>
    </tr>
  </table>
</form>
<div class='errorMessage hide'>
  <div class='alert alert-danger alert-dismissable'>
    <button aria-hidden='true' data-dismiss='alert' class='close' type='button'>×</button>
    <button type='submit' class='btn btn-default' id='continueSubmit'><?php echo $lang->continueSave;?></button>
  </div>
</div>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
