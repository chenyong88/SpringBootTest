<?php
/**
 * The create view file of setting module of Ranzhi.
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
<form id='ajaxForm' method='post' action='<?php echo inlink('batchCreateProperties', "module=$module&section=$section");?>'>
  <table class='table table-form'>
    <?php for($i = 1; $i <= $config->$module->batchCreatePropertiesCount; $i++):?>
    <tr>
      <th class='w-40px'><?php echo $i;?></th>
      <td><?php echo html::input('values[]', '', "class='form-control'");?></td>
      <td class='w-40px'></td>
    </tr>
    <?php endfor;?>
    <tr>
      <tr>
        <td></td>
        <td><?php echo html::submitButton() . html::commonButton($lang->close, 'btn', "data-dismiss='modal'");?></td>
      </tr>
    </tr>
  </table>
</form>
<?php include '../../../common/view/footer.modal.html.php';?>
