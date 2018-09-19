<?php
/**
 * The edit property view file of product module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     setting
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../common/view/header.modal.html.php';?>
<form id='ajaxForm' method='post' action='<?php echo inlink('editProperty', "module=$module&section=$section&id=$id");?>'>
  <table class='table table-form'>
    <tr>
      <th class='w-80px'><?php echo $lang->$module->property->$section;?></th>
      <td><?php echo html::input('value', zget($lang->$module->$section, $id), "class='form-control'");?></td>
      <td class='w-40px'></td>
    </tr>
    <tr>
      <tr>
        <td></td>
        <td><?php echo html::submitButton() . html::commonButton($lang->close, 'btn', "data-dismiss='modal'");?></td>
      </tr>
    </tr>
  </table>
</form>
<?php include '../../../common/view/footer.modal.html.php';?>
