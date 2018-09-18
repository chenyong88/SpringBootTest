<?php
/**
 * The edit view file of usercontact module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     usercontact 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../common/view/header.modal.html.php';?>
<?php include '../../common/view/chosen.html.php';?>
<form id='ajaxForm' method='post' action='<?php echo inlink('edit', "id=$contact->id");?>'>
  <table class='table table-form'>
    <tr>
      <th class='w-100px'><?php echo $lang->usercontact->name;?></th>
      <td><?php echo html::input('name', $contact->name, "class='form-control'");?>
    </tr>
    <tr>
      <th><?php echo $lang->usercontact->member;?></th>
      <td><?php echo html::select('member[]', $users, $contact->member, "class='form-control chosen' multiple");?>
    </tr>
    <tr>
      <th></th>
      <td><label class='checkbox-inline'><input type='checkbox' id='public' name='public' value='1' <?php if($contact->public) echo "checked='checked'";?>><?php echo $lang->usercontact->public;?></label></td>
    </tr>
    <tr>
      <th></th>
      <td><?php echo html::submitButton();?></td>
    </tr>
  </table>
</form>
<?php include '../../common/view/footer.modal.html.php';?>
