<?php
/**
 * The create view file of usercontact module of RanZhi.
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
<form id='createContactForm' method='post' action='<?php echo inlink('create');?>'>
  <table class='table table-form'>
    <tr>
      <th class='w-80px'><?php echo $lang->usercontact->name;?></th>
      <td><?php echo html::input('name', '', "class='form-control'");?>
      <td class='w-40px'></td>
    </tr>
    <tr>
      <th><?php echo $lang->usercontact->member;?></th>
      <td><?php echo html::select('member[]', $users, '', "class='form-control chosen' multiple");?>
      <td></td>
    </tr>
    <tr>
      <th></th>
      <td><label class='checkbox-inline'><input type='checkbox' id='public' name='public' value='1'><?php echo $lang->usercontact->public;?></label></td>
      <td></td>
    </tr>
    <tr>
      <th></th>
      <td><?php echo html::submitButton();?></td>
      <td></td>
    </tr>
  </table>
</form>
<?php include '../../common/view/footer.modal.html.php';?>
