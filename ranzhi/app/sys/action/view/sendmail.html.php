<?php
/**
 * The mail file of action module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     action 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../common/view/mail.header.html.php';?>
<tr>
  <td>
    <table cellpadding='0' cellspacing='0' width='600' style='border: none; border-collapse: collapse;'>
      <tr>
        <td style='padding: 10px; background-color: #F8FAFE; border: none; font-size: 14px; font-weight: 500; border-bottom: 1px solid #e5e5e5;'>
          <?php echo html::a($viewUrl, $mailTitle, "target='_blank'");?>
        </td>
      </tr>
    </table>
  </td>
</tr>
<tr>
  <td style='padding: 10px; border: none;'>
    <fieldset style='border: 1px solid #e5e5e5'>
      <legend style='color: #114f8e'><?php echo $lang->action->record->next;?></legend>
      <div style='padding:5px;'>
        <?php if($customer):?>
        <p><?php echo $lang->customer->relationList[$customer->relation] . ':' . $customer->name;?></p>
        <?php endif;?>
        <?php if($contact):?>
        <p><?php echo $lang->contact->common . ':' . $contact->realname;?></p>
        <?php endif;?>
        <p><?php echo $lang->action->date . ':' . $nextDate;?></p>
        <p><?php echo $lang->action->record->desc . ':' . $action->comment;?></p>
        <p><?php echo $lang->action->record->createdBy . ':' . zget($users, $action->actor);?></p>
        <p><?php echo $lang->action->record->createdDate . ':' . $action->date;?></p>
      </div>
    </fieldset>
  </td>
</tr>
<?php include '../../../sys/common/view/mail.footer.html.php';?>
