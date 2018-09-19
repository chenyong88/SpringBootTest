<?php
/**
 * The issue view file of feedback module of RanZhi.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     feedback
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php
if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}

$moduleMenu = false;
$bodyClass  = 'with-nav-bottom';
$browseLink = !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : inlink('personal');
include "../../common/view/m.header.html.php";
?>

<div id='page' class='list-with-actions'>
  <div class='section no-margin'>
    <div class='heading gray'>
      <div class='title'><i class='icon-calendar'> </i><?php echo $lang->feedback->view;?></div>
      <nav class='nav'><a class='btn primary' href='<?php echo $browseLink;?>'><?php echo $lang->goback;?></a></nav>
    </div>
    <div class='box'>
      <table class='table bordered table-detail'>
        <tr>
          <td class='w-100px'><?php echo $lang->feedback->customer;?></td>
          <td><?php if(!commonModel::printLink('crm.customer', 'view', "customerID=$issue->customer", zget($customers, $issue->customer))) echo zget($customers, $issue->customer);?></td>
        </tr>
        <tr>
          <td><?php echo $lang->feedback->product;?></td>
          <td><?php if(!commonModel::printLink('crm.product', 'view', "productID=$issue->product", zget($products, $issue->product))) echo zget($products, $issue->product);?></td>
        </tr>
        <tr>
          <td><?php echo $lang->feedback->contact;?></td>
          <td><?php if(!commonModel::printLink('crm.contact', 'view', "contactID=$issue->contact", zget($contacts, $issue->contact))) echo zget($contacts, $issue->contact);?></td>
        </tr>
        <tr>
          <td><?php echo $lang->feedback->pri;?></td>
          <td><?php echo $issue->pri;?></td>
        </tr>
        <tr>
          <td><?php echo $lang->feedback->title;?></td>
          <td><?php echo $issue->title;?></td>
        </tr>
        <tr>
          <td><?php echo $lang->feedback->desc;?></td>
          <td><?php echo $issue->desc;?></td>
        </tr>
        <tr>
          <td><?php echo $lang->feedback->status;?></td>
          <td><?php echo zget($lang->feedback->statusList, $issue->status);?></td>
        </tr>
      </table>
    </div>

    <div class='heading gray'>
      <div class='title'><i class='icon icon-file-text-o'> </i><?php echo $lang->feedback->legendEffort;?></div>
    </div>
    <div class='box'>
      <table class='table bordered table-detail'>
        <tr>
          <td><?php echo $lang->feedback->addedBy;?></td>
          <td><?php echo zget($users, $issue->addedBy) . $lang->at . $issue->addedDate;?></td>
        </tr>
        <tr>
          <td><?php echo $lang->feedback->assignedTo;?></td>
          <td><?php if($issue->assignedTo) echo zget($users, $issue->assignedTo) . $lang->at . $issue->assignedDate;?></td>
        </tr>
        <tr>
          <td><?php echo $lang->feedback->transferedBy;?></td>
          <td><?php if($issue->transferedBy) echo zget($users, $issue->transferedBy) . $lang->at . $issue->transferedDate;?></td>
        </tr>
        <tr>
          <td><?php echo $lang->feedback->closedBy;?></td>
          <td><?php if($issue->closedBy) echo zget($users, $issue->closedBy) . $lang->at . $issue->closedDate;?></td>
        </tr>
        <tr>
          <td><?php echo $lang->feedback->closedReason;?></td>
          <td><?php echo $issue->closedReason;?></td>
        </tr>
        <tr>
          <td><?php echo $lang->feedback->editedBy;?></td>
          <td><?php echo zget($users, $issue->editedBy) . $lang->at . $issue->editedDate;?></td>
        </tr>
      </table>
    </div>
  </div>

  <div class='section' id='history'>
    <?php echo $this->fetch('action', 'history', "objectType=feedback&objectID={$issue->id}");?>
  </div>

  <nav class='nav nav-auto affix dock-bottom footer-actions'>
    <?php
    if($issue->status != 'closed')
    {
        if(commonModel::hasPriv('feedback', 'edit'))     echo "<a data-remote='{$this->createLink('feedback', 'edit', "id=$issue->id")}' data-display='modal' data-placement='bottom'>{$lang->edit}</a>";
        if(commonModel::hasPriv('feedback', 'assignto')) echo "<a data-remote='{$this->createLink('feedback', 'assignto', "id=$issue->id")}' data-display='modal' data-placement='bottom'>{$lang->assign}</a>";
        if(commonModel::hasPriv('feedback', 'close'))    echo "<a data-remote='{$this->createLink('feedback', 'close', "id=$issue->id")}' class='success' data-display='modal' data-placement='bottom'>{$lang->close}</a>";
        if($issue->status != 'replied' && commonModel::hasPriv('feedback', 'reply')) echo html::a('#replyBox', $lang->feedback->reply, "class='primary' data-display data-backdrop='true'");
        if($issue->status == 'replied' && commonModel::hasPriv('feedback', 'doubt')) echo html::a('#doubtBox', $lang->feedback->doubt, "data-display data-backdrop='true'");
  
    }
    else
    {
        if(commonModel::hasPriv('feedback', 'activate')) echo "<a data-remote='{$this->createLink('feedback', 'activate', "id=$issue->id")}' class='primary' data-display='modal' data-placement='bottom'>{$lang->activate}</a>";
    }

    echo "<a data-remote='{$this->createLink('feedback', 'delete', "id=$issue->id")}' class='danger' data-display='ajaxAction' data-ajax-delete='true' data-locate='{$this->createLink('feedback', 'browse')}'>{$lang->delete}</a>";
    ?>
  </nav>
</div>

<div id='replyBox' class='affix enter-from-bottom layer hidden'>
  <div class='heading'>
    <div class="title"><?php echo $lang->feedback->reply;?></div>
    <nav class='nav'><a data-dismiss='display' class='muted'><i class='icon-remove'></i></a></nav>
  </div>
  <form id='replyForm' class='modal-form has-padding' data-form-refresh='#history' method='post' action='<?php echo inlink('reply', "issueID={$issue->id}")?>'>
    <div class='control'><?php echo html::textarea('reply', '',"rows='5' class='textarea' data-default-val");?></div>
    <div class='control'><button type='submit' class='btn primary'><?php echo $lang->save;?></button></div>
  </form>
</div>

<div id='doubtBox' class='affix enter-from-bottom layer hidden'>
  <div class='heading'>
    <div class="title"><?php echo $lang->feedback->doubt;?></div>
    <nav class='nav'><a data-dismiss='display' class='muted'><i class='icon-remove'></i></a></nav>
  </div>
  <form id='doubtForm' class='modal-form has-padding' data-form-refresh='#history' method='post' action='<?php echo inlink('doubt', "issueID={$issue->id}")?>'>
    <div class='control'><?php echo html::textarea('doubt', '',"rows='5' class='textarea' data-default-val");?></div>
    <div class='control'><button type='submit' class='btn primary'><?php echo $lang->save ?></button></div>
  </form>
</div>
<?php include "../../common/view/m.footer.html.php"; ?>
