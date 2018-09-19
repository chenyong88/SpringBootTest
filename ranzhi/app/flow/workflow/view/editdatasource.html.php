<?php
/**
 * The edit workflow datasource view file of workflow module of RanZhi.
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
<form id='ajaxForm' method='post' action='<?php echo inlink('editDatasource', "datasourceID={$datasource->id}");?>'>
  <table class='table table-form w-p95'>
    <tr class='required'>
      <th class='w-80px'><?php echo $lang->workflowdatasource->name;?></th>
      <td><?php echo html::input('name', $datasource->name, "class='form-control'");?></td>
    </tr>
    <tr class='required'>
      <th><?php echo $lang->workflowdatasource->type;?></th>
      <td><?php echo html::select('type', $lang->workflowdatasource->typeList, $datasource->type, "class='form-control'");?></td>
    </tr>
    <tr class='required' id='optionTR'>
      <th><?php echo $lang->workflowdatasource->typeList['option'];?></th>
      <td id='datasource'>
        <?php foreach($datasource->options as $key => $value):?>
        <div class='input-group'>
          <?php echo html::input('options[value][]', $key, "class='form-control' placeholder={$lang->workflowdatasource->optionValue}");?>
          <span class='input-group-addon fix-border'>:</span>
          <?php echo html::input('options[text][]', $value, "class='form-control' placeholder={$lang->workflowdatasource->optionText}");?>
          <span class='input-group-btn'>
            <a href='#' class='btn btn-default addItem'><i class='icon-plus'></i></a>
            <a href='#' class='btn btn-default delItem'><i class='icon-minus'></i></a>
          </span>
        </div> 
        <?php endforeach;?>
        <div class='input-group'>
          <?php echo html::input('options[value][]', '', "class='form-control' placeholder={$lang->workflowdatasource->optionValue}");?>
          <span class='input-group-addon fix-border'>:</span>
          <?php echo html::input('options[text][]', '', "class='form-control' placeholder={$lang->workflowdatasource->optionText}");?>
          <span class='input-group-btn'>
            <a href='#' class='btn btn-default addItem'><i class='icon-plus'></i></a>
            <a href='#' class='btn btn-default delItem'><i class='icon-minus'></i></a>
          </span>
        </div> 
        <div id='options'></div>
      </td>
    </tr>
    <tr class='required' id='systemTR'>
      <th><?php echo $lang->workflowdatasource->typeList['system'];?></th>
      <td id='datasource'>
        <div class="input-group">
          <span class='input-group-addon'><?php echo $lang->workflowdatasource->app;?></span>
          <?php echo html::select('app', $apps, $datasource->app, "class='form-control''");?>
          <span class='input-group-addon fix-border'><?php echo $lang->workflowdatasource->module;?></span>
          <?php echo html::select('module', $modules, $datasource->module, "class='form-control'");?>
        </div> 
        <div class="input-group">
          <span class='input-group-addon'><?php echo $lang->workflowdatasource->method;?></span>
          <?php echo html::select('method', $methods, $datasource->method, "class='form-control'");?>
          <span class='input-group-addon fix-border methodDesc'><?php echo $lang->workflow->desc;?></span>
          <?php echo html::input('methodDesc', $datasource->methodDesc, "class='form-control methodDesc' readonly='readonly' title='{$datasource->methodDesc}'");?>
        </div> 
        <div class='input-group' id='paramsDIV'>
        <?php foreach($datasource->params as $param):?>
          <div class='input-group'>
            <span class='input-group-addon'><?php echo $this->lang->workflowdatasource->param;?></span>
            <?php echo html::input("paramName[]", $param->name, "class='form-control' readonly='readonly' title='{$param->name}'");?>
            <span class='input-group-addon fix-border'><?php echo $this->lang->workflowdatasource->paramType;?></span>
            <?php echo html::input("paramType[]", $param->type, "class='form-control' readonly='readonly' title='{$param->type}'");?>
            <span class='input-group-addon fix-border'><?php echo $this->lang->workflow->desc;?></span>
            <?php echo html::input("paramDesc[]", $param->desc, "class='form-control' readonly='readonly' title='{$param->desc}'");?>
            <span class='input-group-addon fix-border'><?php echo $this->lang->workflowdatasource->paramValue;?></span>
            <?php echo html::input("paramValue[]", $param->value, "class='form-control'");?>
          </div>
        <?php endforeach;?>
        </div>
      </td>
    </tr>
    <tr class='required' id='sqlTR'>
      <th><?php echo $lang->workflowfield->sql;?></th>
      <td id='datasource'><?php echo html::textarea('sql', $datasource->sql, "rows='5' class='form-control' placeholder='{$lang->workflow->placeholder->sql}'");?></td>
    </tr>
    <tr class='required' id='langTR'>
      <th><?php echo $lang->workflowdatasource->typeList['lang'];?></th>
      <td id='datasource'><?php echo html::select('lang', $lang->workflowdatasource->langList, $datasource->lang, "class='form-control'");?></td>
    </tr>
    <tr>
      <th></th>
      <td>
        <?php echo html::submitButton();?>
      </td>
    </tr>
  </table>
</form>
<div id='optionGroup' class='hide'>
  <div class='input-group'>
    <?php echo html::input('options[value][]', '', "class='form-control' placeholder={$lang->workflowdatasource->optionValue}");?>
    <span class='input-group-addon fix-border'>:</span>
    <?php echo html::input('options[text][]', '', "class='form-control' placeholder={$lang->workflowdatasource->optionText}");?>
    <div class='input-group-btn'>
      <a href='#' class='btn btn-default addItem'><i class='icon-plus'></i></a>
      <a href='#' class='btn btn-default delItem'><i class='icon-minus'></i></a>
    </div>
  </div> 
</div>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
