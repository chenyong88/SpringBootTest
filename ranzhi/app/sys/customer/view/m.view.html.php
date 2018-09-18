<?php
/**
 * The view mobile view file of customer module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     customer 
 * @version     $Id: index.html.php 3830 2016-05-18 09:34:17Z liugang $
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}

$moduleMenu = false;
$bodyClass  = 'with-nav-bottom';
$browseLink = !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : inlink('browse'); 
include "../../common/view/m.header.html.php";
?>

<div id='page' class='list-with-actions'>
  <div class='section no-margin'>
    <div class='heading gray'>
      <div class='title'><i class='icon-calendar'> </i><?php echo $lang->customer->view;?></div>
      <nav class='nav'><a class='btn primary' href='<?php echo $browseLink;?>'><?php echo $lang->goback ?></a></nav>
    </div>
    <div class='box'>
      <table class='table bordered table-detail'>
        <tr>
          <td class='w-80px'><?php echo $lang->customer->name;?></td>
          <td><?php echo $customer->name;?></td>
        </tr>
        <?php if($customer->depositor):?>
        <tr>
          <td class='w-80px'><?php echo $lang->customer->depositor;?></td>
          <td><?php echo $customer->depositor;?></td>
        </tr>
        <?php endif;?>
        <?php if($customer->level):?>
        <tr>
          <td><?php echo $lang->customer->level;?></td>
          <td><?php echo $lang->customer->levelNameList[$customer->level];?></td>
        </tr>
        <?php endif;?>
        <?php if($customer->status):?>
        <tr>
          <td><?php echo $lang->customer->status;?></td>
          <td><?php echo $lang->customer->statusList[$customer->status];?></td>
        </tr>
        <?php endif;?>
        <?php if($customer->assignedTo):?>
        <tr>
          <td><?php echo $lang->customer->assignedTo;?></td>
          <td><?php echo zget($users, $customer->assignedTo);?></td>
        </tr>
        <?php endif;?>
        <?php if($customer->size):?>
        <tr>
          <td><?php echo $lang->customer->size;?></td>
          <td><?php echo $lang->customer->sizeNameList[$customer->size];?></td>
        </tr>
        <?php endif;?>
        <?php if($customer->type):?>
        <tr>
          <td><?php echo $lang->customer->type;?></td>
          <td><?php echo $lang->customer->typeList[$customer->type];?></td>
        </tr>
        <?php endif;?>
        <?php if($customer->industry):?>
        <tr>
          <td><?php echo $lang->customer->industry;?></td>
          <td><?php echo $industryList[$customer->industry];?></td>
        </tr>
        <?php endif;?>
        <?php if($customer->area):?>
        <tr>
          <td><?php echo $lang->customer->area;?></td>
          <td><?php echo $areaList[$customer->area];?></td>
        </tr>
        <?php endif;?>
        <?php if(!empty($customer->desc)):?>
        <tr>
          <td><?php echo $lang->customer->desc;?></td>
          <td><?php echo $customer->desc;?></td>
        </tr>
        <?php endif;?>
        <?php if(!empty($customer->intension)):?>
        <tr>
          <td><?php echo $lang->customer->intension;?></td>
          <td><?php echo $customer->intension;?></td>
        </tr>
        <?php endif;?>
        <?php if($customer->weibo):?>
        <tr>
          <td><?php echo $lang->customer->weibo;?></td>
          <td><?php echo html::a("$customer->weibo", $customer->weibo, "target='_blank'");?></td>
        </tr>
        <?php endif;?>
        <?php if($customer->weixin):?>
        <tr>
          <td><?php echo $lang->customer->weixin;?></td>
          <td><?php echo $customer->weixin;?></td>
        </tr>
        <?php endif;?>
        <?php if($customer->site):?>
        <tr>
          <td><?php echo $lang->customer->site;?></td>
          <td><?php echo html::a("$customer->site", $customer->site, "target='_blank'");?></td>
        </tr>
        <?php endif;?>
        <?php if(formatTime($customer->nextDate)):?>
        <tr>
          <td><?php echo $lang->customer->nextDate;?></td>
          <td><?php echo $customer->nextDate;?></td>
        </tr>
        <?php endif;?>
      </table>
    </div>

    <?php if(!empty($contacts)):?>
    <div class='box'>
      <table class='table bordered'>
        <thead>
          <tr>
            <th class='w-100px'><?php echo $lang->customer->contact;?></th>
            <th class='w-120px'><?php echo $lang->customer->phone;?></th>
            <th class='text-center'><?php echo $lang->customer->email;?></th>
          </tr>
        </thead>
        <?php foreach($contacts as $contact):?>
        <tr>
          <td><?php echo html::a($this->createLink('crm.contact', 'view', "contactID={$contact->id}"), $contact->realname);?></td>
          <td><?php echo html::a("tel:$contact->phone", $contact->phone);?></td>
          <td class='text-center'><?php echo $contact->email;?></td>
        </tr>
        <?php endforeach;?>
      </table>
    </div>
    <?php endif;?>

    <?php if(!empty($contracts)):?>
    <div class='box'>
      <table class='table bordered'>
        <thead>
          <tr>
            <th><i class="icon-list-info"></i> <?php echo $lang->customer->contract;?></th>
            <th class='w-100px'><?php echo $lang->order->amount;?></th> 
            <th class='w-70px'><?php echo $lang->order->status;?></th> 
          </tr>
        </thead>
        <?php foreach($contracts as $contract):?>
        <tr>
          <td class='w-p70'><?php echo html::a($this->createLink('crm.contract', 'view', "contractID=$contract->id"), $contract->name);?></td>
          <td class='w-p15'><?php echo zget($currencySign, $contract->currency, '') . $contract->amount;?></td>
          <td class='w-p15 <?php echo "status-{$contract->status}";?>'><?php echo $lang->contract->statusList[$contract->status];?></td>
        </tr>
        <?php endforeach;?>
      </table>
    </div>
    <?php endif;?>

    <?php if(!empty($orders)):?>
    <div class='box'>
      <table class='table bordered'>
        <thead>
          <tr>
            <th><i class="icon-list-info"></i> <?php echo $lang->customer->order;?></th>
            <th class='w-100px'><?php echo $lang->order->real;?></th>
            <th class='w-70px'><?php echo $lang->order->status;?></th>
          </tr>
        </thead>
        <?php foreach($orders as $order):?>
        <tr>
          <?php $orderName = ''; foreach($order->products as $product) $orderName .= ' ' . $product;?>
          <td><?php echo html::a($this->createLink('crm.order', 'view', "orderID=$order->id"), $orderName);?></td>
          <td><?php echo zget($currencySign, $order->currency, '') . $order->real;?></td>
          <td class='<?php echo "status-{$order->status}";?>'><?php echo $lang->order->statusList[$order->status];?></td>
        </tr>
        <?php endforeach;?>
      </table>
    </div>
    <?php endif;?>

    <?php if(!empty($addresses)):?>
    <div class='box'>
      <table class='table bordered table-detail'>
        <?php foreach($addresses as $address):?>
        <tr>
          <td class='w-100px'><?php echo $address->title;?></td>
          <td><?php echo $address->fullLocation;?></td>
        </tr>
        <?php endforeach;?>
      </table>
    </div>
    <?php endif;?>
  </div>

  <div class='section' id='history'>
    <?php echo $this->fetch('action', 'history', "objectType=customer&objectID={$customer->id}");?>
  </div>

  <nav class='nav affix dock-bottom nav-auto footer-actions'>
  <?php
    $canCreateRecord = commonModel::hasPriv('action', 'createRecord');
    $canEdit         = commonModel::hasPriv('customer', 'edit');
    $canDelete       = commonModel::hasPriv('customer', 'delete');

    if($canCreateRecord) echo "<a data-remote='{$this->createLink('action', 'createRecord', "objectType=customer&objectID={$customer->id}&customer={$customer->id}&history=")}' data-display='modal' data-placement='bottom' class='strong primary'>{$lang->customer->record}</a>";

    echo "<a data-remote='{$this->createLink('crm.customer', 'assign', "customerID={$customer->id}")}' data-display='modal' data-placement='bottom'>{$lang->customer->assign}</a>";

    echo "<a data-remote='{$this->createLink('crm.customer', 'contact', "customerID={$customer->id}")}' data-display='modal' data-name='customerContactsModal' data-placement='bottom'>{$lang->customer->contact}</a>";

    echo "<a data-remote='{$this->createLink('crm.address', 'browse', "objectType=customer&objectID=$customer->id")}' data-name='addressesModal' data-display='modal' data-placement='bottom'>{$lang->customer->address}</a>";

    if($canEdit) echo "<a data-remote='{$this->createLink('crm.customer', 'edit', "customerID={$customer->id}")}' data-display='modal' data-placement='bottom'>{$lang->edit}</a>";


    if($canDelete) echo "<a data-remote='{$this->createLink('crm.customer', 'delete', "customerID=$customer->id")}' class='danger' data-display='ajaxAction' data-ajax-delete='true' data-locate='{$this->createLink('crm.customer', 'browse')}'>{$lang->delete}</a>";

    echo html::a('#commentBox', $this->lang->comment, "data-display data-backdrop='true'");
  ?>
  </nav>
</div>

<div id='commentBox' class='hidden affix enter-from-bottom layer'>
  <div class='heading'>
    <div class="title"><?php echo $lang->comment;?></div>
    <nav class='nav'><a data-dismiss='display' class='muted'><i class='icon-remove'></i></a></nav>
  </div>
  <form id='commentForm' class='modal-form has-padding' data-form-refresh='#history' method='post' action='<?php echo inlink('edit', "customerID={$customer->id}&comment=true")?>'>
    <div class='control'><?php echo html::textarea('comment', '',"rows='5' class='textarea' data-default-val");?></div>
    <div class='control'><button type='submit' class='btn primary'><?php echo $lang->save ?></button></div>
  </form>
</div>

<?php include "../../common/view/m.footer.html.php"; ?>
