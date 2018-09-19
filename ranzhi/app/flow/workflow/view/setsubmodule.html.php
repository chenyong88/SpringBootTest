<?php
/**
 * The set sub module view file of workflow module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     workflow 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../sys/common/view/header.modal.html.php';?>
<?php include '../../../sys/common/view/chosen.html.php';?>
<form id='ajaxForm' method='post' action='<?php echo inlink('setSubModule', "module=$module->module");?>'>
  <table class='table table-form'>
    <tr>
      <th class='w-80px'><?php echo $lang->workflow->subModule;?></th>
      <td><?php echo html::select('module', $modules, $module->child, "class='form-control chosen'");?></td>
      <td class='w-40px'></td>
    </tr>
    <tr>
      <th></th>
      <td><span class='text-important'><?php echo $lang->workflow->tips->subModule;?></span></td>
    </tr>
    <tr>
      <th><?php echo $lang->workflowfield->foreignKey;?></th>
      <td><?php echo html::select('foreignKey', $fields, $foreignKey, "class='form-control chosen'");?></td>
    </tr>
    <tr>
      <th></th>
      <td><span class='text-important'><?php echo $lang->workflow->tips->foreignKey;?></span></td>
    </tr>
    <tr>
      <th></th>
      <td><?php echo html::submitButton();?></td>
    </tr>
  </table>
</form>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
