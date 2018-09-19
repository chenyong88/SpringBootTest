<?php
/**
 * The send mail view of order module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      yaozeyuan<yaozeyuan@yidou.biz>
 * @package     order 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../sys/common/view/header.modal.html.php';?>
<form method='post' id='ajaxForm' action="<?php echo inlink('sendMail', "orderID={$order->id}")?>">
  <table class='table table-bordered'>
    <tr>
      <th class='w-100px'><?php echo $lang->contact->realname;?></th>
      <th class='w-100px'><?php echo $lang->resume->title;?></th>
      <th><?php echo $lang->contact->email;?></th>
      <th class='w-100px'><?php echo $lang->actions;?></th>
    </tr>
    <?php foreach($contactList as $contact):?>
    <tr class='v-center'>
      <td>
        <?php echo html::checkbox('contactIDList', array($contact->id => $contact->realname)); echo $contact->maker ? " <span class='label label-success'>{$lang->contact->default}</span>" : '';?>
      </td>
      <td><?php echo $contact->title;?></td>
      <td><?php echo $contact->email;?></td>
      <td>
        <?php 
          if(!commonModel::printLink('crm.contact', 'edit', "contactID={$contact->id}", $lang->edit, "class='loadInModal'")) echo html::a('#', $lang->edit, "class='disabled' disabled='disabled'");
          if(!commonModel::printLink('crm.contact', 'delete', "contactID={$contact->id}", $lang->delete, "id='contact{$contact->id}' class='deleter'")) echo html::a('#', $lang->delete, "class='disabled' disabled='disabled'");
        ?>
      </td>
    </tr>
    <?php endforeach;?>
    </tfoot>
  </table>
  <div class='text-right'>
    <?php commonModel::printLink('provider', 'linkContact', "customerID={$company->id}", $lang->contact->create, "class='loadInModal btn btn-primary'");?>
    <?php echo html::submitButton($lang->order->mail->send);?>
  </div>
<?php echo html::hidden('placeholder', 'placeholder');?>
</form>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
