<?php
/**
 * The export field view file of workflow module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     workflow
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../../sys/common/view/header.modal.html.php';?>
<?php include '../../../sys/common/view/chosen.html.php';?>
<form id='ajaxForm' method='post' action='<?php echo inlink('exportField', "module=$module");?>'>
  <table class='table table-form'>
    <tr>
      <th class='w-80px'><?php echo $lang->workflow->exportField;?></th>
      <td><?php echo html::select('fields[]', $fields, $exportFields, "class='form-control chosen' multiple");?></td>
      <td class='w-40px'></td>
    </tr>
    <tr>
      <th></th>
      <td><?php echo html::submitButton();?></td>
    </tr>
  </table>
</form>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
