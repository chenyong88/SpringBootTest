<?php
/**
 * The mail file of g module of RanZhi.
 *
 * @copyright   Copyright 2009-2017 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     
 * @author      Gang Liu <liugang@cnezsoft.com> 
 * @package     deal 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../../sys/common/view/mail.header.html.php';?>
<tr>
  <td>
    <table cellpadding='0' cellspacing='0' width='600' style='border: none; border-collapse: collapse;'>
      <tr>
        <td style='padding: 10px; background-color: #F8FAFE; border: none; font-size: 14px; font-weight: 500; border-bottom: 1px solid #e5e5e5;'>
          <?php $link = commonModel::getSysURL() . inlink('view', "dealID=$deal->id");?>
          <?php echo html::a($link, $mailTitle, "style='color: #333; text-decoration: underline;'");?>
          <?php if($deal->status == 'wait'):?>
          <?php echo html::a($link, $lang->confirm, "style='float: right;'");?> 
          <?php endif;?>
        </td>
      </tr>
    </table>
  </td>
</tr>
<tr>
  <td style='padding: 10px; border: none;'>
    <fieldset style='border: 1px solid #e5e5e5'>
      <legend style='color: #114f8e'><?php echo $lang->deal->common;?></legend>
      <div style='padding:5px;'>
        <p><?php echo $lang->deal->date . ':' . $deal->date;?></p>
        <p><?php echo $lang->deal->category . ':' . (!empty($category->name) ? $category->name : '');?></p>
        <p><?php echo $lang->deal->product . ':' . (!empty($product->name) ? $product->name : '');?></p>
        <p><?php echo $lang->deal->type . ':' . zget($lang->deal->typeList, $deal->type);?></p>
        <p><?php echo $lang->deal->status . ':' . zget($lang->deal->statusList, $deal->status);?></p>
        <p><?php echo $lang->deal->createdBy . ':' . zget($users, $deal->createdBy) . ' ' . formatTime($deal->createdDate);?></p>
        <p><?php echo $lang->deal->editedBy . ':' . zget($users, $deal->editedBy) . ' ' . formatTime($deal->editedDate);?></p>
        <p><?php echo $lang->deal->confirmedBy . ':' . zget($users, $deal->confirmedBy) . ' ' . formatTime($deal->confirmedDate);?></p>
        <p><?php echo $lang->deal->desc;?></p>
        <p><?php echo $deal->desc;?></p>
      </div>
    </fieldset>
  </td>
</tr>
<?php include '../../../sys/common/view/mail.footer.html.php';?>
