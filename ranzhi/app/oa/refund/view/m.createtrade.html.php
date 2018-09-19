<?php
/**
 * The create trade mobile view file of refund module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     refund 
 * @version     $Id
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}
?>

<div class='heading divider'>
  <div class='title'><?php echo $lang->refund->common;?></div>
  <nav class='nav'><a data-dismiss='display'><i class='icon-remove muted'></i></a></nav>
</div>

<form class='content box' id='createTradeForm' data-form-refresh='#page' method='post' action='<?php echo $this->createLink('refund', 'createTrade', "refundID=$refundID");?>'>
  <div class='control'>
    <div class='pull-right checkbox'>
      <?php foreach($lang->trade->objectTypeList as $objectType => $objectName):?>
      <div class='checkbox inline-block'>
        <input type='checkbox' value=<?php echo $objectType;?> name='objectType<?php echo $objectType;?>'>
        <label for='objectType<?php echo $objectType;?>'><?php echo $objectName;?></label>
      </div>
      <?php endforeach;?>
    </div>
    <label for='depositor'><?php echo $lang->refund->depositor;?></label>
    <div class='select'><?php echo html::select('depositor', $depositorList, isset($this->config->refund->depositor) ? $this->config->refund->depositor : '');?></div>
  </div>
  <div class='control'>
    <label for='customer'><?php echo $lang->trade->customer;?></label>
    <div class='select'><?php echo html::select('customer', $customerList);?></div>
  </div>
  <div class='control'>
    <label for='order'><?php echo $lang->trade->order;?></label>
    <div class='select'><?php echo html::select('order', array('') + (array) $orderList);?></div>
  </div>
  <div class='control'>
    <label for='contract'><?php echo $lang->trade->contract;?></label>
    <div class='select'>
      <select id='contract' name='contract'>
        <option value=''></option>
        <?php foreach($contractList as $id => $contract):?>
        <option value="<?php echo $id?>" data-amount="<?php echo $contract->amount;?>"><?php echo $contract->name;?></option>
        <?php endforeach;?>
      </select>
    </div>
  </div>
</form>

<div class='footer has-padding'>
  <button class='btn primary' type='button' data-submit='#createTradeForm'><?php echo $lang->save;?></button>
</div>

<script>
$(function()
{
    $('#createTradeForm').modalForm();

    $('[name*=objectType]').change(function()
    {
        if($(this).prop('checked')) $('[name*=objectType]').not(this).prop('checked', false).change();
        $('#' + $(this).val()).parents('.control').toggle($(this).prop('checked'))
    })

    $('[name*=objectType]').change();
});
</script>
