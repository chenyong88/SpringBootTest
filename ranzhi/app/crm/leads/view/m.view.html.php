<?php
/**
 * The view mobile view file of leads module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     leads 
 * @version     $Id: index.html.php 3830 2016-05-18 09:34:17Z liugang $
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}

$moduleMenu = false;
$bodyClass  = 'with-nav-bottom';
$browseLink = !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : inlink('browse', "mode={$mode}&status={$status}"); 
include "../../common/view/m.header.html.php";
?>

<div id='page' class='list-with-actions'>
  <div class='section no-margin'>
    <div class='heading gray'>
      <div class='title'><i class='icon-calendar'> </i><?php echo $lang->contact->view;?></div>
      <nav class='nav'><a class='btn primary' href='<?php echo $browseLink;?>'><?php echo $lang->goback;?></a></nav>
    </div>
    <div class='box'>
      <table class='table bordered table-detail'>
        <tr>
          <td class='w-80px'><?php echo $lang->contact->company;?></t>
          <td><?php echo $contact->company;?></td>
        </tr>
        <?php if(!empty($contact->birthday)):?>
        <tr>
          <td><?php echo $lang->contact->birthday;?></td>
          <td><?php echo $contact->birthday;?></td>
        </tr>
        <?php endif;?>
        <?php if(!empty($contact->gender)):?>
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

    if($canCreateRecord) echo "<a data-remote='{$this->createLink('action', 'createRecord', "objectType=contact&objectID={$contact->id}&customer={$contact->customer}&history=")}' data-display='modal' data-placement='bottom' class='strong primary'>{$lang->contact->record}</a>";

    echo "<a data-remote='{$this->createLink('crm.leads', 'assign', "contactID=$contact->id")}' data-display='modal' data-placement='bottom'>{$lang->contact->assign}</a>";

    echo "<a data-remote='{$this->createLink('crm.address', 'browse', "objectType=contact&objectID=$contact->id")}' data-name='addressesModal' data-display='modal' data-placement='bottom'>{$lang->contact->address}</a>";

    if($canEdit) echo "<a data-remote='{$this->createLink('crm.leads', 'edit', "contactID={$contact->id}")}' data-display='modal' data-placement='bottom'>{$lang->edit}</a>";

    echo "<a data-remote='{$this->createLink('crm.leads', 'transform', "contactID=$contact->id")}' class='success' data-display='modal' data-placement='bottom'>{$lang->confirm}</a>";

    if(empty($contact->ignoredBy)) echo "<a data-remote='{$this->createLink('crm.leads', 'ignore', "contactID=$contact->id")}' class='danger' data-display='modal' data-placement='bottom'>{$lang->ignore}</a>";

    echo html::a('#commentBox', $this->lang->comment, "data-display data-backdrop='true'");
  ?>
  </nav>
</div>

<div id='commentBox' class='hidden affix enter-from-bottom layer'>
  <div class='heading'>
    <div class="title"><?php echo $lang->comment;?></div>
    <nav class='nav'><a data-dismiss='display' class='muted'><i class='icon-remove'></i></a></nav>
  </div>
  <form id='commentForm' class='modal-form has-padding' data-form-refresh='#history' method='post' action='<?php echo inlink('edit', "contactID={$contact->id}&mode={$mode}&status={$status}&comment=true")?>'>
    <div class='control'><?php echo html::textarea('comment', '',"rows='5' class='textarea' data-default-val");?></div>
    <div class='control'><button type='submit' class='btn primary'><?php echo $lang->save ?></button></div>
  </form>
</div>

<?php include "../../common/view/m.footer.html.php"; ?>
