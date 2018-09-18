<?php
/**
 * The create workflow rules view file of workflow module of RanZhi.
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
<form id='ajaxForm' method='post' action='<?php echo inlink('createRule');?>'>
  <table class='table table-form w-p90'>
    <tr class='required'>
      <th class='w-80px'><?php echo $lang->workflowrule->name;?></th>
      <td><?php echo html::input('name', '', "class='form-control'");?></td>
    </tr>
    <tr class='required'>
      <th><?php echo $lang->workflowrule->typeList['regex'];?></th>
      <td><?php echo html::textarea('rule', '', "rows='5' class='form-control'");?></td>
    </tr>
    <tr>
      <th></th>
      <td>
        <?php echo html::hidden('type', 'regex');?>
        <?php echo html::submitButton();?>
      </td>
    </tr>
  </table>
</form>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
