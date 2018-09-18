<?php
/**
 * The createRecord mobile view file of action module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     action 
 * @version     $Id: index.html.php 3830 2016-05-18 09:34:17Z liugang $
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>

<style>
div.nextContact {margin-top: 10px;}
</style>

<div class='heading divider'>
  <div class='title'><strong><?php echo $title ?></strong></div>
  <nav class='nav'>
    <?php if($history): ?>
    <a class='text-primary' data-display='modal' data-remote='<?php echo $this->createLink('action', 'history', "objectType=$objectType&objectID=$objectID&action=record&from=record") ?>' data-placement='bottom'><i class='icon-history'></i>&nbsp;<?php echo $lang->history ?></a>
    <?php endif;?>
    <a data-dismiss='display'><i class='icon-remove muted'></i></a>
  </nav>
</div>

<form method='post' id='createRecordForm' action='<?php echo inlink('createrecord', "objectType={$objectType}&objectID={$objectID}")?>' class='content box' data-form-refresh='#page'>
  <div class='heading gray'><div class='title'><?php echo $lang->action->record->title;?></div></div>
  <?php if($objectType != 'contact'): // if:A?>
  <div class='control'>
    <label for='date'><?php echo $lang->action->record->date;?></label>
    <input type='datetime-local' id='date' name='date' class='input' value='<?php echo date('Y-m-d\TH:i') ?>'>
  </div>
  <div class='control'>
    <?php if($objectType == 'customer'): // if:A-1?>
    <div class='checkbox pull-right'>
      <input type='checkbox' name='createContact' id='createContact' value='1'>
      <label for='createContact'><?php echo $lang->action->createContact ?></label>
    </div>
    <?php endif; // if:A-2?>
    <label for='contact'><?php echo $lang->action->record->contact;?></label>
    <?php echo html::input('realname', '', "class='input hidden' placeholder='{$lang->contact->realname}'");?>
    <div class='select'>
      <select id='contact' name='contact'>
        <option></option>
        <?php foreach($contacts as $contact):?>
        <?php 
            $phone  = $contact->phone;
            $mobile = $contact->mobile;
            $phone  = empty($phone) ? $mobile : (empty($mobile) ? $phone : $phone . $lang->slash . $mobile);
        ?>
        <option value='<?php echo $contact->id;?>' data-phone='<?php echo $phone;?>' data-qq='<?php echo $contact->qq;?>' data-email='<?php echo $contact->email;?>'><?php echo $contact->realname;?></option>
        <?php endforeach;?>
      </select>
    </div>
    <div class='help-text hidden' id='contractInfo'><span class='info-phone'><i class='icon-phone-sign'></i> <span class='text'></span> &nbsp; </span><span class='info-qq'><i class='icon-qq'></i> <span class='text'></span> &nbsp; </span><span class='info-email'><i class='icon-envelope-alt'></i></i> <span class='text'></span> &nbsp; </span></div>
  </div>
  <?php elseif(!empty($customers)): // elseif:A?>
  <div class='control'>
    <label for='customer'><?php echo $lang->action->record->customer;?></label>
    <div class='select'>
      <?php echo html::select('customer', $customers, '');?>
    </div>
  </div>
  <?php endif; // endif:A?>
  <?php if($objectType == 'customer'): // if:B?>
  <div class='control'>
    <div class='checkbox inline-block'>
      <input type='checkbox' name='objectType[1]' id='objectType1' value='order'>
      <label for='objectType[1]'><?php echo $lang->action->record->order ?></label>
    </div>
    &nbsp; <div class='checkbox inline-block'>
      <input type='checkbox' name='objectType[2]' id='objectType2' value='contract'>
      <label for='objectType[2]'><?php echo $lang->action->record->contract ?></label>
    </div>
    <div class='select hidden'>
      <?php echo html::select('order', $orders, '');?>
    </div>
    <div class='select hidden'>
      <?php echo html::select('contract', $contracts, '');?>
    </div>
  </div>
  <?php endif; // endif:B?>
  <div class='control'>
    <label for='comment'><?php echo $lang->action->record->comment;?></label>
    <?php echo html::textarea('comment', '', "class='textarea' rows='2' placeholder='{$lang->required}'");?>
  </div>
  <div class='control'>
    <?php echo $this->fetch('file', 'buildForm', 'fileCount=1');?>
  </div>
  <div class='heading gray nextContact'><div class='title'><?php echo $lang->action->nextDate;?></div></div>
  <div class='control'>
    <label for='nextContact'><?php echo $lang->action->record->nextContact;?></label>
    <div class='select'>
      <?php echo html::select('nextContact', array('ditto' => $lang->action->record->sameContact) + $contactPairs, '');?>
    </div>
  </div>
  <div class='control'>
    <label for='contactedBy'><?php echo $lang->action->record->contactedBy;?></label>
    <div class='select'>
      <?php echo html::select('contactedBy', $users, $this->app->user->account);?>
    </div>
  </div>
  <div class='control'>
    <label for='delta'><?php echo $lang->action->record->nextDate;?></label>
    <div class='row'>
      <div class='cell'>
        <div class='select fluid'>
          <select id='delta' name='delta'>
            <?php foreach($lang->action->nextContactList as $nextContactDay => $nextContactName):?>
            <option value='<?php echo $nextContactDay ?>'<?php if($nextContactDay == 365000) echo ' selected'?>><?php echo $nextContactName ?></option>
            <?php endforeach;?>
            <option value='0'><?php echo $lang->custom ?></option>
          </select>
        </div>
      </div>
      <div class='cell hidden' id='dateCell'>
        <input type='date' name='nextDate' id='nextDate' class='input' placeholder='<?php echo $lang->action->record->nextDate ?>'>
      </div>
    </div>
  </div>
  <div class='control'>
    <label for='desc'><?php echo $lang->action->record->desc;?></label>
    <?php echo html::textarea('desc', '', "class='textarea' rows='2'");?>
  </div>
  <?php if($objectType == 'contact') echo html::hidden('contact', $objectID);?>
  <?php echo html::hidden('customer', $customer);?>
</form>

<div class='footer has-padding'>
  <button type='button' data-submit='#createRecordForm' class='btn primary'><?php echo $lang->save ?></button>
</div>

<?php js::execute($pageJS);?>
