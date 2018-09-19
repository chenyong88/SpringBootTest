<?php
/**
 * The view mobile view file of contact module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     contact 
 * @version     $Id: index.html.php 3830 2016-05-18 09:34:17Z liugang $
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}

$moduleMenu = false;
$bodyClass  = 'with-nav-bottom';
$browseLink = !empty($this->session->contactList) ? $this->session->contactList : inlink('browse');

include "../../common/view/m.header.html.php";
?>
<div id='page' class='list-with-actions'>
  <div class='section no-margin'>
    <div class='heading gray'>
      <div class='title'><i class='icon-calendar'> </i><?php echo $lang->contact->view;?></div>
      <nav class='nav'><a class='btn primary' href='<?php echo $browseLink;?>'><?php echo $lang->goback ?></a></nav>
    </div>
    <div class='box'>
      <table class='table bordered table-detail'>
        <tr>
          <td class='w-80px'><?php echo $lang->contact->customer;?></td>
          <td>
            <?php
            if(isset($customers[$contact->customer])) echo html::a($this->createLink('customer', 'view', "customerID={$contact->customer}"), $customers[$contact->customer]);
            if($contact->maker) echo " ({$lang->resume->maker})";
            ?>
          </td>
        </tr>
        <?php if(!empty($contact->dept)):?>
        <tr>
          <td><?php echo $lang->resume->dept;?></td>
          <td><?php echo  $contact->dept;?></td>
        </tr>
        <?php endif;?>
        <?php if(!empty($contact->title)):?>
        <tr>
          <td><?php echo $lang->resume->title;?></td>
          <td><?php echo  $contact->title;?></td>
        </tr>
        <?php endif;?>
        <?php if(!empty($contact->join)):?>
        <tr>
          <td><?php echo $lang->resume->join;?></td>
          <td><?php echo  $contact->join;?></td>
        </tr>
        <?php endif;?>
        <?php if($contact->birthday != '0000-00-00'):?>
        <tr>
          <td class='w-70px'><?php echo $lang->contact->birthday;?></td>
          <td><?php echo formatTime($contact->birthday);?></td>
        </tr>
        <?php endif;?>
        <?php if($contact->gender != 'u'):?>
        <tr>
          <td><?php echo $lang->contact->gender;?></td>
          <td><?php echo zget($lang->genderList, $contact->gender, '');?></td>
        </tr>
        <?php endif;?>
        <tr>
          <td><?php echo $lang->contact->createdDate;?></td>
          <td><?php echo $contact->createdDate;?></td>
        </tr>
        <?php if(!empty($contact->desc)):?>
        <tr>
          <td><?php echo $lang->contact->desc;?></td>
          <td><?php echo $contact->desc;?></td>
        </tr>
        <?php endif;?>
      </table>
    </div>

    <div class='heading gray'>
      <div class='title'><i class='icon icon-comments'> </i><?php echo $lang->contact->contactInfo;?></div>
      <nav class="nav"><a class='text-info' data-placement='center' data-display='modal' data-target-dismiss='true' data-content='<a class="dock dock-right dock-top btn"><i class="icon icon-remove muted"></i></a><img src="<?php echo $this->createLink('contact', 'vcard', "contactID={$contact->id}") ?>">'><i class='icon-qrcode'></i>&nbsp;vCard</a></nav>
    </div>
    <div class='box'>
      <table class='table bordered table-detail'>
        <?php foreach($config->contact->contactWayList as $item):?>
        <?php if(empty($contact->{$item})) continue;?>
        <tr>
          <td class='w-80px'><?php echo $lang->contact->{$item};?></td>
          <td>
            <?php $site = isset($config->company->name) ? $config->company->name : '';?>
            <?php if($item == 'qq')    echo html::a("http://wpa.qq.com/msgrd?v=3&uin={$contact->$item}&site={$site}&menu=yes", $contact->$item, "target='_blank'");?>
            <?php if($item == 'email') echo html::mailto($contact->{$item}, $contact->{$item});?>
            <?php if($item != 'qq' and $item != 'email') echo $contact->{$item};?>
          </td>
        </tr>
        <?php endforeach;?>
       <?php if(!empty($addresses)):?>
       <?php foreach($addresses as $address):?>
       <tr>
         <td class='w-80px'><?php echo $address->title;?></td>
         <td><?php echo $address->fullLocation;?></td>
       </tr>
       <?php endforeach;?>
       <?php endif;?>
      </table>
    </div>

    <?php if(!empty($resumes)):?>
    <div class='box'>
      <table class='table bordered'>
        <thead>
          <th class='w-110px'><?php echo $lang->contact->resume;?></th>
          <th><?php echo $lang->resume->customer;?></th>
        </thead>
        <?php foreach($resumes as $resume):?>
        <tr>
          <td><?php echo $resume->join . $lang->minus . $resume->left;?></td>
          <td class='text-left' style='vertical-align: middle'>
            <?php if(isset($customers[$resume->customer])) echo $customers[$resume->customer]?>
            <?php if($resume->dept) echo $lang->slash . $resume->dept?>
            <?php if($resume->title) echo $lang->slash . $resume->title?>
          </td>
        </tr>
        <?php endforeach;?>
      </table>
    </div>
    <?php endif;?>

    <?php if(!empty($fileList)):?>
    <div class='heading gray'>
      <div class='title'><i class='icon icon-file-text-o'> </i><?php echo $lang->file->common;?></div>
    </div>
    <div class='list'>
      <?php echo $this->fetch('file', 'printFiles', array('files' => $fileList, 'fieldset' => 'false'))?>
    </div>
    <?php endif;?>
  </div>

  <div class='section' id='history'>
    <?php echo $this->fetch('action', 'history', "objectType=contact&objectID={$contact->id}");?>
  </div>

  <nav class='nav affix dock-bottom nav-auto footer-actions'>
  <?php
    $canCreateRecord = commonModel::hasPriv('action', 'createRecord');
    $canEdit         = commonModel::hasPriv('contact', 'edit');
    $canDelete       = commonModel::hasPriv('contact', 'delete');

    if($canCreateRecord) echo "<a data-remote='{$this->createLink('action', 'createRecord', "objectType=contact&objectID={$contact->id}&customer={$contact->customer}&history=")}' data-display='modal' data-placement='bottom' class='strong primary'>{$lang->contact->record}</a>";

    echo "<a data-remote='{$this->createLink('crm.address', 'browse', "objectType=contact&objectID=$contact->id")}' data-name='addressesModal' data-display='modal' data-placement='bottom'>{$lang->contact->address}</a>";

    echo "<a data-remote='{$this->createLink('crm.resume', 'browse', "contactID={$contact->id}")}' data-display='modal' data-placement='bottom' data-name='resumesModal'>{$lang->contact->resume}</a>";

    if($canEdit) echo "<a data-remote='{$this->createLink('crm.contact', 'edit', "contactID={$contact->id}")}' data-display='modal' data-placement='bottom'>{$lang->edit}</a>";

    if($canDelete) echo "<a data-remote='{$this->createLink('crm.contact', 'delete', "contactID=$contact->id")}' class='danger' data-display='ajaxAction' data-ajax-delete='true' data-locate='{$this->createLink('crm.contact', 'browse')}'>{$lang->delete}</a>";

    echo html::a('#commentBox', $this->lang->comment, "data-display data-backdrop='true'");
  ?>
  </nav>
</div>

<div id='commentBox' class='hidden affix enter-from-bottom layer'>
  <div class='heading'>
    <div class="title"><?php echo $lang->comment;?></div>
    <nav class='nav'><a data-dismiss='display' class='muted'><i class='icon-remove'></i></a></nav>
  </div>
  <form id='commentForm' class='modal-form has-padding' data-form-refresh='#history' method='post' action='<?php echo inlink('edit', "contactID={$contact->id}&comment=true")?>'>
    <div class='control'><?php echo html::textarea('comment', '',"rows='5' class='textarea' data-default-val");?></div>
    <div class='control'><button type='submit' class='btn primary'><?php echo $lang->save ?></button></div>
  </form>
</div>

<?php include "../../common/view/m.footer.html.php"; ?>
