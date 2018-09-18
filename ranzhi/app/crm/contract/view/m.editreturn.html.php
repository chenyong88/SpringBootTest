<?php
/**
 * The editreturn mobile view file of contract module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     contract 
 * @version     $Id: index.html.php 3830 2016-05-18 09:34:17Z liugang $
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>

<div class='heading divider'>
  <div class='title'><strong><?php echo $lang->contract->editReturn ?></strong></div>
  <nav class='nav'><a data-dismiss='display'><i class='icon-remove muted'></i></a></nav>
</div>

<form class='content box' data-form-refresh='#page' method='post' id='editReturnForm' action='<?php echo $this->createLink('contract', 'editReturn', "returnID=$return->id")?>'>
  <div class='box yellow-pale space-sm'>
    <?php echo $lang->contract->all;?>: <strong class='text-red'><?php echo zget($currencySign, $contract->currency, $contract->currency) . $contract->amount;?></strong>
  </div>
  <div class='control'>
    <div class='checkbox pull-right'>
      <?php $checked = $contract->return == 'done' ? 'checked' : '';?>
      <input type='checkbox' id='finish' name='finish' value='1' <?php echo $checked;?>>
      <label for='finish'><?php echo $lang->contract->completeReturn;?></label>
    </div>
    <label for='amount'><?php echo $lang->contract->thisAmount;?></label>
    <input type='number' step='0.01' name='amount' id='amount' class='input' placeholder='<?php echo $lang->required ?>' value='<?php echo $return->amount ?>'>
  </div>
  <div class='control'>
    <label for='returnedBy'><?php echo $lang->contract->returnedBy;?></label>
    <div class='select'>
      <?php echo html::select('returnedBy', $users, $return->returnedBy);?>
    </div>
  </div>
  <div class='control'>
    <label for='returnedDate'><?php echo $lang->contract->returnedDate;?></label>
    <input type='date' id='returnedDate' name='returnedDate' class='input' value='<?php echo $return->returnedDate ?>'>
  </div>
  <div class='control'>
    <label for='handlers[]'><?php echo $lang->contract->handlers;?></label>
    <div class='select'>
      <?php echo html::select('handlers[]', $users, $contract->handlers, 'multiple');?>
    </div>
  </div>
  <div class='control'>
    <label for='comment'><?php echo $lang->comment;?></label>
    <?php echo html::textarea('comment', '', "class='textarea' rows='2'");?>
  </div>
</form>

<div class='footer has-padding'>
  <button type='button' data-submit='#editReturnForm' class='btn primary'><?php echo $lang->save ?></button>
</div>

<script>
$(function()
{
    $('#editReturnForm').modalForm().listenScroll({container: 'parent'});
});
</script>
