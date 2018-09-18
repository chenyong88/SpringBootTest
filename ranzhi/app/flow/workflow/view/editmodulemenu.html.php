<?php
/**
 * The edit menu for module browse view file of workflow module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     workflow 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../sys/common/view/header.modal.html.php';?>
<?php include '../../../sys/common/view/datepicker.html.php';?>
<?php include '../../../sys/common/view/chosen.html.php';?>
<?php js::set('module', $menu->module);?>
<form id='ajaxForm' method='post' action='<?php echo inlink('editModuleMenu', "menuID={$menu->id}");?>'>
  <table class='table table-form'>
    <tr>
      <th><?php echo $lang->workflowmenu->label;?></th>
      <td><?php echo html::input('label', $menu->label, "class='form-control'")?></td>
    </tr>
    <?php $i = 1;?>
    <?php foreach($menu->params as $key => $param):?>
    <tr>
      <?php if($i == 1):?>
      <th class='params' rowspan='<?php echo count($menu->params);?>'><?php echo $lang->workflowmenu->params;?></th>
      <?php endif;?>
      <td>
        <div class='row'>
          <div class='col-md-4'><?php echo html::select('keys[]', $fieldPairs, $param['key'], "class='form-control'")?></div>
          <div class='col-md-2'><?php echo html::select('operators[]', $lang->workflowaction->operatorList, $param['operator'], "class='form-control'");?></div>
          <div class='col-md-5'><span class='value'><?php $this->ajaxGetFieldControl($menu->module, $param['key'], $param['value']);?></span></div>
          <div class='col-md-1'>
            <a href='javascript:;'><i class='icon icon-plus'></i></a>
            <a href='javascript:;'><i class='icon icon-remove'></i></a>
          </div>
        </div>
      </td>
    </tr>
    <?php $i++;?>
    <?php endforeach;?>
    <tr>
      <th></th>
      <td><?php echo html::submitButton();?></td>
    <tr>
  </table>
</form>

<?php
$th       = "<th class='params' rowspan='ROWSPAN'>{$lang->workflowmenu->params}</th>";
$key      = html::select("keys[]", $fieldPairs, '', "class='form-control chosen'");
$operator = html::select('operators[]', $lang->workflowaction->operatorList, '', "class='form-control'");
$value    = html::input('values[]', '', "class='form-control'");
$itemRow  = <<<EOT
  <tr>
    <td>
      <div class='row'>
        <div class='col-md-4'>{$key}</div>
        <div class='col-md-2'>{$operator}</div>
        <div class='col-md-5'><span class='value'>{$value}</span></div>
        <div class='col-md-1'>
          <a href='javascript:;'><i class='icon icon-plus'></i></a>
          <a href='javascript:;'><i class='icon icon-remove'></i></a>
        </div>
      </div>
    </td>
  </tr>
EOT;
js::set('th', $th);
js::set('itemRow', $itemRow);
?>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
