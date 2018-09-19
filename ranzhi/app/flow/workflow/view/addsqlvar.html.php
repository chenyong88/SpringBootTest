<?php
/**
 * The xxx view file of xxx module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     xxx 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../sys/common/view/header.modal.html.php';?>
<form id='addVarForm' method='post' action='<?php echo inlink('addSqlVar');?>'>
  <div class='panel mg-0'>
    <table class='table table-condensed table-borderless'>
      <thead>
        <tr class='text-center'>
          <th class='w-100px'><?php echo $lang->workflowfield->varName;?></th>
          <th class='w-100px'><?php echo $lang->workflowfield->showName;?></th>
          <th class='w-p50'><?php echo $lang->workflowfield->requestType;?></th>
          <th><?php echo $lang->workflowfield->default;?></th>
        </tr>
      </thead>
      <tbody class='text-center'>
        <tr>
          <td><?php echo html::input('varName', '', "class='form-control'");?></td>
          <td><?php echo html::input('showName', '', "class='form-control'");?></td>
          <td>
            <div id='requestType' class='input-group'>
              <span class='input-group-addon' style='text-align: left;'>
              <?php echo html::radio('requestType', $lang->workflowfield->requestTypeList);?>
              </span>
              <?php unset($lang->workflowfield->optionTypeList['custom']);?>
              <?php unset($lang->workflowfield->optionTypeList['sql']);?>
              <?php echo html::select('selectList', $lang->workflowfield->optionTypeList, '', "class='form-control' style='display:none;'");?>
            </div>
          </td>
          <td><?php echo html::input('default', '', "class='form-control'");?></td>
        </tr>
      </tbody>
      <tfoot>
        <tr><td colspan='4' class='text-center'><?php echo html::submitButton();?></td></tr>
      </tfoot>
    </table>
  </div>
</form>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
