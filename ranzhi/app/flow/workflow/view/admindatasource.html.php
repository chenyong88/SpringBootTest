<?php
/**
 * The admin workflow datasources view file of workflow module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     workflow 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../common/view/header.html.php';?>
<div id='menuActions'>
  <?php commonModel::printLink('workflow', 'createDatasource', '', $lang->workflow->createDatasource, "class='btn btn-primary' data-toggle='modal'");?>
</div>
<div class='panel'>
  <table class='table table-condensed table-striped table-hover tablesorter'>
    <thead>
      <tr>
        <?php $vars="&orderBy=%s";?>
        <th class='w-80px'><?php commonModel::printOrderLink('id', $orderBy, $vars, $lang->workflow->id);?></th>
        <th class='w-140px'><?php commonModel::printOrderLink('name', $orderBy, $vars, $lang->workflowdatasource->name);?></th>
        <th><?php echo $lang->workflowdatasource->datasource;?></th>
        <th class='w-120px'><?php commonModel::printOrderLink('type', $orderBy, $vars, $lang->workflowdatasource->type);?></th>
        <th class='w-120px'><?php commonModel::printOrderLink('createdBy', $orderBy, $vars, $lang->workflow->createdBy);?></th>
        <th class='w-120px'><?php commonModel::printOrderLink('createdDate', $orderBy, $vars, $lang->workflow->createdDate);?></th>
        <th class='w-120px'><?php commonModel::printOrderLink('editedBy', $orderBy, $vars, $lang->workflow->editedBy);?></th>
        <th class='w-120px'><?php commonModel::printOrderLink('editedDate', $orderBy, $vars, $lang->workflow->editedDate);?></th>
        <th class='w-100px'><?php echo $lang->actions;?></th>
      </tr>
    </thead>
    <?php foreach($datasources as $datasource):?>
      <tr>
        <td><?php echo $datasource->id;?></td>
        <td><?php echo $datasource->name;?></td>
        <td>
        <?php 
            if($datasource->type == 'system')
            {
                $data = json_decode($datasource->datasource);
                echo $data->app . '->' . $data->module . 'Model->' . $data->method . '(';
                $i = 0;
                foreach($data->params as $param)
                {
                    if($i > 0) echo ', ';
                    echo $param->name . '=' . $param->value;
                    $i++;
                }
                echo ')';
            }
            elseif($datasource->type == 'option')
            {
                echo implode(',', json_decode($datasource->datasource, true));
            }
            elseif($datasource->type == 'sql')
            {
                echo $datasource->datasource;
            }
            elseif($datasource->type == 'lang')
            {
                echo zget($lang->workflowdatasource->langList, $datasource->datasource);
            }
            elseif($datasource->type == 'func')
            {
            }
        ?>
        </td>
        <td><?php echo $lang->workflowdatasource->typeList[$datasource->type];?></td>
        <td><?php echo zget($users, $datasource->createdBy);?></td>
        <td><?php echo formatTime($datasource->createdDate, DT_DATE1);?></td>
        <td><?php echo zget($users, $datasource->editedBy);?></td>
        <td><?php echo formatTime($datasource->editedDate, DT_DATE1);?></td>
        <td>
          <?php commonModel::printLink('workflow', 'editDatasource', "datasourceID={$datasource->id}", $lang->edit, "data-toggle='modal'");?>
          <?php commonModel::printLink('workflow', 'deleteDatasource', "datasourceID={$datasource->id}", $lang->delete, "class='deleter'");?>
        </td>
      </tr>
    <?php endforeach;?>
  </table>
</div>
<?php include '../../common/view/footer.html.php';?>
