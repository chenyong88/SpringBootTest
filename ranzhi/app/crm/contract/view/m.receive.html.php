<?php
/**
 * The receive mobile view file of contract module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     contract 
 * @version     $Id: index.html.php 3830 2016-05-18 09:34:17Z liugang $
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>
<style>
#receiveContractForm .create-trade-fields {display: none; background: #ebf2f9; padding: 0 .5rem .5rem; margin-right: -.5rem; margin-left: -.5rem;}
#receiveContractForm.create-trade .create-trade-field {background: #ebf2f9; padding: .5rem; margin-bottom: 0; margin-right: -.5rem; margin-left: -.5rem;}
#receiveContractForm.create-trade .create-trade-fields {display: block;}
</style>

<div class='heading divider'>
  <div class='title'><strong><?php echo $lang->contract->receive ?></strong></div>
  <nav class='nav'><a data-dismiss='display'><i class='icon-remove muted'></i></a></nav>
</div>

<form class='content box' data-form-refresh='#page' method='post' id='receiveContractForm' action='<?php echo $this->createLink('contract', 'receive', "contractID=$contract->id")?>'>
  <div class='box yellow-pale space-sm'>
    <?php echo $lang->contract->all;?>: <strong class='text-red'><?php echo zget($currencySign, $contract->currency, $contract->currency) . $contract->amount;?></strong>
  </div>
  <div class='control'>
    <div class='checkbox pull-right'>
      <input type='checkbox' id='finish' name='finish' value='1'>
      <label for='finish'><?php echo $lang->contract->completeReturn;?></label>
    </div>
    <label for='amount'><?php echo $lang->contract->thisAmount;?></label>
    <input type='number' step='0.01' name='amount' id='amount' class='input' placeholder='<?php echo $lang->required ?>'>
  </div>
  <?php if(!empty($depositorList)): ?>
  <div class='control create-trade-field'>
    <div class='checkbox'>
      <input type='checkbox' id='createTrade' name='createTrade' value='1' checked='checked'>
      <label for='createTrade' class='strong'><?php echo $lang->trade->create;?></label>
    </div>
  </div>
  <div class='create-trade-fields space-sm'>
    <div class='control'>
      <label for='depositor'><?php echo $lang->trade->depositor;?></label>
      <div class='select'>
        <?php echo html::select('depositor', $depositorList, '', '');?>
      </div>
    </div>
    <div class='control'>
      <label for='category'><?php echo $lang->trade->category;?></label>
      <div class='select'>
        <?php echo html::select('category', array('') + (array) $categories, '', '');?>
      </div>
    </div>
    <div class='control'>
      <label for='dept'><?php echo $lang->trade->dept;?></label>
      <div class='select'>
        <?php echo html::select('dept', array('') + (array) $deptList, isset($dept->id) ? $dept->id : '');?>
      </div>
    </div>
    <div class='control'>
      <label for='product'><?php echo $lang->trade->product;?></label>
      <div class='select'>
        <?php echo html::select('product', $productList, $product);?>
      </div>
    </div>
  </div>
  <?php endif; ?>
  <div class='control'>
    <label for='returnedBy'><?php echo $lang->contract->returnedBy;?></label>
    <div class='select'>
      <?php echo html::select('returnedBy', $users, $this->app->user->account);?>
    </div>
  </div>
  <div class='control'>
    <label for='returnedDate'><?php echo $lang->contract->returnedDate;?></label>
    <input type='date' id='returnedDate' name='returnedDate' class='input' value='<?php echo date('Y-m-d') ?>'>
  </div>
  <div class='control'>
    <label for='handlers[]'><?php echo $lang->contract->handlers;?></label>
    <div class='select'>
      <?php echo html::select('handlers[]', $users, $contract->handlers . ',' . $this->app->user->account, 'multiple');?>
    </div>
  </div>
  <div class='control'>
    <label for='comment'><?php echo $lang->comment;?></label>
    <?php echo html::textarea('comment', '', "class='textarea' rows='2'");?>
  </div>
</form>

<div class='footer has-padding'>
  <button type='button' data-submit='#receiveContractForm' class='btn primary'><?php echo $lang->save ?></button>
  <?php if(!empty($contract->returnList)):?>
    <a data-display='modal' data-placement='bottom' data-load='<?php echo inlink('view', "contractID=$contract->id") . ' #returnList'; ?>' class='btn outline pull-right'><?php echo $lang->contract->returnRecords;?> &nbsp;<span class='label red circle'><?php echo count($contract->returnList) ?></span></a>
  <?php endif;?>
</div>

<script>
$(function()
{
    var $form = $('#receiveContractForm').modalForm().listenScroll({container: 'parent'});
    $('#createTrade').on('change', function()
    {
        $form.toggleClass('create-trade', $(this).is(':checked'));
    }).change();
});
</script>
