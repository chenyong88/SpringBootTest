<?php
/**
 * The view file for view method of feedback module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     feedback
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php include '../../../sys/common/view/kindeditor.html.php';?>
<?php js::set('type', $type);?>
<ul id='menuTitle'>
  <li><?php commonModel::printLink('feedback', $type, '', $lang->feedback->$type);?></li>
  <li class='divider angle'></li>
  <li class='title'><?php echo $issue->title;?></li>
</ul>
<div class="row-table">
  <div class='col-main'>
    <div class='panel'>
      <div class='panel-heading'><strong><?php echo $lang->feedback->desc;?></strong></div>
      <div class='panel-body'>
        <?php echo htmlspecialchars_decode($issue->desc);?>
      </div>
    </div>
    <?php echo $this->fetch('action', 'history', "objectType=feedback&objectID={$issue->id}")?>
    <div class='page-actions'>
      <div class='btn-group'>
        <?php
        $disabled = $issue->status == 'closed' ? "disabled='disabled'" : '';
        commonModel::printLink('feedback', 'assignTo', "issueID={$issue->id}", $lang->assign, "data-toggle='modal' class='btn' $disabled");
        if($issue->status != 'replied') commonModel::printLink('feedback', 'reply',    "issueID={$issue->id}", $lang->feedback->reply, "data-toggle='modal' class='btn'");
        if($issue->status == 'replied') commonModel::printLink('feedback', 'doubt',    "issueID={$issue->id}", $lang->feedback->doubt, "data-toggle='modal' class='btn'");
        if($issue->status == 'closed')  commonModel::printLink('feedback', 'activate', "issueID={$issue->id}", $lang->activate,        "data-toggle='modal' class='btn'");
        if($issue->status != 'closed')  commonModel::printLink('feedback', 'close',    "issueID={$issue->id}", $lang->close,           "data-toggle='modal' class='btn'");
        ?>
      </div>
      <div class='btn-group'>
        <?php  
        commonModel::printLink('feedback', 'edit',   "issueID={$issue->id}&type=$type", $lang->edit, "class='btn' $disabled");
        commonModel::printLink('feedback', 'delete', "issueID={$issue->id}", $lang->delete, "class='deleter btn'");
        ?>
      </div>
      <?php echo html::backButton();?>
    </div>
  </div>
  <div class='col-side'>
    <div class='panel'>
      <div class='panel-heading'>
        <strong><?php echo $lang->feedback->legendBasic;?></strong>
      </div>
      <div class='panel-body'>
        <table class='table table-info'>
          <tr>
            <?php $customerName = isset($customer->name) ? $customer->name : $issue->customer;?>
            <th class='w-80px'><?php echo $lang->feedback->customer?></th>
            <td><?php if(!commonModel::printLink('customer', 'view', "customerID={$issue->customer}", $customerName)) echo $customerName;?></td>
          </tr>
          <tr>
            <th><?php echo $lang->feedback->product?></th>
            <td><?php echo zget($products, $issue->product);?></td>
          </tr>
          <tr>
            <th><?php echo $lang->feedback->contact?></th>
            <td><?php if(!commonModel::printLink('contact', 'view', "contactID={$issue->contact}", zget($contacts, $issue->contact))) echo zget($contacts, $issue->contact)?></td>
          </tr>
          <tr>
            <th><?php echo $lang->feedback->status?></th>
            <td><?php echo $lang->feedback->statusList[$issue->status]?></td>
          </tr>
          <tr>
            <th><?php echo $lang->feedback->pri?></th>
            <td><span class='pri pri-<?php echo $issue->pri;?> active'><?php echo $lang->feedback->priList[$issue->pri]?></span></td>
          </tr>
        </table>
      </div>
    </div>
    <div class='panel'>
      <div class='panel-heading'>
        <strong><?php echo $lang->feedback->legendEffort;?></strong>
      </div>
      <div class='panel-body'>
        <table class='table table-info'>
          <tr>
            <th class='w-80px'><?php echo $lang->feedback->addedBy;?></th>
            <td><?php echo zget($users, $issue->addedBy) . $lang->at . $issue->addedDate;?></td>
          </tr>
          <tr>
            <th><?php echo $lang->feedback->assignedTo;?></th>
            <td><?php if($issue->assignedTo) echo zget($users, $issue->assignedTo) . $lang->at . $issue->assignedDate;?></td>
          </tr>
          <tr>
            <th><?php echo $lang->feedback->transferedBy;?></th>
            <td><?php if($issue->transferedBy) echo zget($users, $issue->transferedBy) . $lang->at . $issue->transferedDate;?></td>
          </tr>
          <tr>
            <th><?php echo $lang->feedback->closedBy;?></th>
            <td><?php if($issue->closedBy) echo zget($users, $issue->closedBy) . $lang->at . $issue->closedDate;?></td>
          </tr>
          <tr>
            <th><?php echo $lang->feedback->closedReason;?></th>
            <td><?php if($issue->closedReason) echo zget($lang->feedback->closedReasonList, $issue->closedReason);?></td>
          </tr>
          <tr>
            <th><?php echo $lang->feedback->editedBy;?></th>
            <td><?php if($issue->editedBy) echo zget($users, $issue->editedBy) . $lang->at . $issue->editedDate;?></td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
