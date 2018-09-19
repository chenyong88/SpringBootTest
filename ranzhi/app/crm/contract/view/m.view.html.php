<?php
/**
 * The view mobile view file of contract module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     contract 
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
      <div class='title'><i class='icon-calendar'> </i><?php echo $lang->contract->view;?></div>
      <nav class='nav'><a class='btn primary' href='<?php echo $browseLink;?>'><?php echo $lang->goback;?></a></nav>
    </div>
    <div class='box'>
      <table class='table bordered table-detail'>
        <tr>
          <td class='w-80px'><?php echo $lang->contract->name;?></td>
          <td><?php echo $contract->name;?></td>
        </tr>
        <tr>
          <td><?php echo $lang->contract->code;?></td>
          <td><?php echo $contract->code;?></td>
        </tr>
        <tr>
          <td><?php echo $lang->contract->customer;?></td>
          <td><?php echo html::a($this->createLink('customer', 'view', "customerID={$contract->customer}"), zget($customers, $contract->customer));?></td>
        </tr>
        <?php if(!empty($orders)):?>
        <tr>
          <td><?php echo $lang->contract->order;?></td>
          <td>
            <?php foreach($orders as $order):?>
            <div><?php echo html::a($this->createLink('order', 'view', "orderID={$order->id}"), $order->title);?></div>
            <?php endforeach;?>
          </td>
        </tr>
        <tr>
          <td><?php echo $lang->order->product;?></td>
          <td>
            <?php foreach($orders as $order):?>
              <?php foreach($order->products as $product):?>
              <span><?php echo $product?> </span>
              <?php endforeach;?>
            <?php endforeach;?>
          </td>
        </tr>
        <?php endif;?>
        <tr>
          <td><?php echo $lang->contract->amount;?></td>
          <td><?php echo zget($currencySign, $contract->currency, '') . formatMoney($contract->amount);?></td>
        </tr>
        <tr>
          <td><?php echo $lang->contract->delivery;?></td>
          <td><?php echo $lang->contract->deliveryList[$contract->delivery];?></td>
        </tr>
        <tr>
          <td><?php echo $lang->contract->return;?></td>
          <td><?php echo $lang->contract->returnList[$contract->return];?></td>
        </tr>
        <tr>
          <td><?php echo $lang->contract->status;?></td>
          <td><?php echo $lang->contract->statusList[$contract->status];?></td>
        </tr>
        <tr>
          <td><?php echo $lang->contract->contact;?></td>
          <td><?php if(isset($contacts[$contract->contact]) and trim($contacts[$contract->contact]) != "") echo html::a($this->createLink('contact', 'view', "contactID={$contract->contact}"), $contacts[$contract->contact]);?></td>
        </tr>
        <tr>
          <td><?php echo $lang->contract->dateRange;?></td>
          <td><?php echo $contract->begin . ' ~ ' . $contract->end;?></td>
        </tr>
        <tr>
          <td><?php echo $lang->contract->handlers;?></td>
          <td>
            <?php
            foreach(explode(',', $contract->handlers) as $handler)
            {
                if($handler and isset($users[$handler])) echo $users[$handler] . ' ';
            }
            ?>
          </td>
        </tr>
        <?php if(!empty($contract->items)):?>
        <tr>
          <td><?php echo $lang->contract->items;?></td>
          <td><?php echo $contract->items;?></td>
        </tr>
        <?php endif;?>
      </table>
    </div>

    <?php if(!empty($contract->returnList)):?>
    <div class='box'>
      <table class='table bordered'>
        <thead>
          <tr>
            <th class='w-100px'><?php echo $lang->contract->returnedDate;?></th>
            <th class='w-80px'><?php echo $lang->contract->returnedBy;?></th> 
            <th class='text-center'><?php echo $lang->contract->amount;?></th> 
            <th class='w-50px'></th>
          </tr>
        </thead>
        <?php foreach($contract->returnList as $return):?>
        <tr>
          <td><?php echo $return->returnedDate;?></td>
          <td><?php echo zget($users, $return->returnedBy, $return->returnedBy);?></td>
          <td><?php echo zget($currencySign, $contract->currency, '') . formatMoney($return->amount);?></td>
          <td class='text-center'>
            <?php if(commonModel::hasPriv('contract', 'editreturn')) echo "<a data-placement='bottom' data-display='modal' data-remote='{$this->createLink('contract', 'editReturn', "id=$return->id")}'><i class='icon-pencil text-link'></i></a>";?>
            <?php if(commonModel::hasPriv('contract', 'deletereturn')) echo "<a class='text-danger' data-remote='{$this->createLink('contract', 'deleteReturn', "id=$return->id")}' data-display='ajaxAction' data-ajax-delete='true' data-refresh='#page'><i class='icon-trash'></i></a>";?>
         </td>
        </tr>
        <?php endforeach;?>
      </table>
    </div>
    <?php endif;?>

    <?php if(!empty($contract->deliveryList)):?>
    <div class='box'>
      <table class='table bordered'>
        <thead>
          <tr>
            <th class='w-100px'><?php echo $lang->contract->deliveredDate;?></th>
            <th class='w-80px'><?php echo $lang->contract->deliveredBy;?></th> 
            <th class=''><?php echo $lang->comment;?></th> 
            <th class='w-50px'></th>
          </tr>
        </thead>
        <?php foreach($contract->deliveryList as $delivery):?>
        <tr>
          <td><?php echo $delivery->deliveredDate;?></td>
          <td><?php echo zget($users, $delivery->deliveredBy, $delivery->deliveredBy);?></td>
          <td title='<?php echo $delivery->comment;?>'><?php echo $delivery->comment;?></td>
          <td class='text-center'>
            <?php if(commonModel::hasPriv('contract', 'editDelivery')) echo "<a data-remote='{$this->createLink('crm.contract', 'editDelivery', "id={$delivery->id}")}' data-display='modal' data-placement='bottom'><i class='icon-pencil'></i></a>";?>
            <?php if(commonModel::hasPriv('contract', 'deleteDelivery')) echo "<a data-remote='{$this->createLink('crm.contract', 'deleteDelivery', "id=$delivery->id")}' class='text-danger' data-display='ajaxAction' data-ajax-delete='true' data-locate='reload'><i class='icon-trash'></i></a>";?>
         </td>
        </tr>
        <?php endforeach;?>
      </table>
    </div>
    <?php endif;?>

    <div class='heading gray'>
      <div class='title'><i class='icon icon-file-text-o'> </i><?php echo $lang->contract->lifetime;?></div>
    </div>
    <div class='box'>
      <table class='table bordered table-detail'>
        <tr>
          <td class='w-80px'><?php echo $lang->contract->createdBy;?></td>
          <td><?php echo zget($users, $contract->createdBy, $contract->createdBy) . $lang->at . $contract->createdDate;?></td>
        </tr>
        <?php if($contract->signedBy):?>
        <tr>
          <td><?php echo $lang->contract->signedBy;?></td>
          <td><?php echo zget($users, $contract->signedBy, $contract->signedBy) . $lang->at . $contract->signedDate;?></td>
        </tr>
        <?php endif;?>
        <?php if($contract->deliveredBy):?>
        <tr>
          <td><?php echo $lang->contract->deliveredBy;?></td>
          <td><?php echo zget($users, $contract->deliveredBy, $contract->deliveredBy) . $lang->at . $contract->deliveredDate;?></td>
        </tr>
        <?php endif;?>
        <?php if($contract->returnedBy):?>
        <tr>
          <td><?php echo $lang->contract->returnedBy;?></td>
          <td><?php echo zget($users, $contract->returnedBy, $contract->returnedBy) . $lang->at . $contract->returnedDate;?></td>
        </tr>
        <?php endif;?>
        <?php if($contract->finishedBy):?>
        <tr>
          <td><?php echo $lang->contract->finishedBy;?></td>
          <td><?php echo zget($users, $contract->finishedBy, $contract->finishedBy) . $lang->at . $contract->finishedDate;?></td>
        </tr>
        <?php endif;?>
        <?php if($contract->canceledBy):?>
        <tr>
          <td><?php echo $lang->contract->canceledBy;?></td>
          <td><?php echo zget($users, $contract->canceledBy, $contract->canceledBy) . $lang->at . $contract->canceledDate;?></td>
        </tr>
        <?php endif;?>
        <?php if($contract->editedBy):?>
        <tr>
          <td><?php echo $lang->contract->editedBy;?></td>
          <td><?php echo zget($users, $contract->editedBy, $contract->editedBy) . $lang->at . $contract->editedDate;?></td>
        </tr>
        <?php endif;?>
      </table>
    </div>

    <?php if(!empty($contract->files)):?>
    <div class='heading gray'>
      <div class='title'><i class='icon icon-file-text-o'> </i><?php echo $lang->file->common;?></div>
    </div>
    <div class='list'>
      <?php echo $this->fetch('file', 'printFiles', array('files' => $contract->files, 'fieldset' => 'false'))?>
    </div>
    <?php endif;?>
  </div>

  <div class='section' id='history'>
    <?php echo $this->fetch('action', 'history', "objectType=contract&objectID={$contract->id}");?>
  </div>

  <nav class='nav affix dock-bottom nav-auto footer-actions'>
  <?php
    $canCreateRecord = commonModel::hasPriv('action', 'createRecord');
    $canReceive      = commonModel::hasPriv('contract', 'receive');
    $canDelivery     = commonModel::hasPriv('contract', 'delivery');
    $canFinish       = commonModel::hasPriv('contract', 'finish');
    $canEdit         = commonModel::hasPriv('contract', 'edit');
    $canCancel       = commonModel::hasPriv('contract', 'cancel');
    $canDelete       = commonModel::hasPriv('contract', 'delete');

    if($canCreateRecord) echo "<a data-remote='{$this->createLink('action', 'createRecord', "objectType=contract&objectID={$contract->id}&customer={$contract->customer}&history=")}' class='primary' data-display='modal' data-placement='bottom'>{$lang->contract->record}</a>";

    if($canReceive and $contract->return != 'done' and $contract->status == 'normal') echo "<a data-remote='{$this->createLink('crm.contract', 'receive', "contract={$contract->id}")}' data-display='modal' data-placement='bottom' class='strong primary'>{$lang->contract->return}</a>";

    if($canDelivery and $contract->delivery != 'done' and $contract->status == 'normal') echo "<a data-remote='{$this->createLink('crm.contract', 'delivery', "contract={$contract->id}")}' data-display='modal' data-placement='bottom'>{$lang->contract->delivery}</a>";

    if($canFinish and $contract->return == 'done' and $contract->status == 'normal' and $contract->delivery == 'done') echo "<a data-remote='{$this->createLink('crm.contract', 'finish', "contract={$contract->id}")}' data-display='modal' data-placement='bottom' class='strong success'>{$lang->finish}</a>";

    if($canEdit) echo "<a data-remote='{$this->createLink('crm.contract', 'edit', "contract={$contract->id}")}' data-display='modal' data-placement='bottom'>{$lang->edit}</a>";

    if($canCancel and $contract->status == 'normal' and !($contract->return == 'done' and $contract->delivery == 'done')) echo "<a data-remote='{$this->createLink('crm.contract', 'cancel', "contract={$contract->id}")}' data-display='modal' data-placement='bottom'>{$lang->cancel}</a>";

    if($contract->status == 'canceled' or ($contract->status == 'normal' and !($contract->return == 'done' and $contract->delivery == 'done')) and $canDelete) echo "<a data-remote='{$this->createLink('crm.contract', 'delete', "contract=$contract->id")}' class='danger' data-display='ajaxAction' data-ajax-delete='true' data-locate='{$this->createLink('crm.contract', 'browse')}'>{$lang->delete}</a>";

    echo html::a('#commentBox', $this->lang->comment, "data-display data-backdrop='true'");

    if($canEdit and strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false and  isset($this->config->wechat->chooseImage) and $this->config->wechat->chooseImage == 'open') echo "<a href='javascript:;' class='chooseImage' data-url='{$this->createLink('sys.wechat', 'uploadImage', "image=imageID&objectType=contract&objectID={$contract->id}")}' data-placement='bottom'>{$lang->files}</a>";
  ?>
  </nav>
</div>

<div id='commentBox' class='hidden affix enter-from-bottom layer'>
  <div class='heading'>
    <div class="title"><?php echo $lang->comment;?></div>
    <nav class='nav'><a data-dismiss='display' class='muted'><i class='icon-remove'></i></a></nav>
  </div>
  <form id='commentForm' class='modal-form has-padding' data-form-refresh='#history' method='post' action='<?php echo inlink('edit', "contractID={$contract->id}&comment=true")?>'>
    <div class='control'><?php echo html::textarea('comment', '',"rows='5' class='textarea' data-default-val");?></div>
    <div class='control'><button type='submit' class='btn primary'><?php echo $lang->save ?></button></div>
  </form>
</div>
<?php include "../../common/view/m.footer.html.php"; ?>
