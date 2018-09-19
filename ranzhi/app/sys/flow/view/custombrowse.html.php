<?php
/**
 * The custom browse view file of workflow module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     workflow
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php js::set('moduleMenuID', $moduleMenuID);?>

<li id='bysearchTab'><?php echo html::a('#', "<i class='icon-search icon'></i>" . $lang->search->common)?></li>
<div id='menuActions'>
  <?php if(commonModel::hasPriv($currentModule->module, 'export')) echo html::a($this->createLink('flow', 'export', "module=$currentModule->module&mode=$mode&moduleMenuID=$moduleMenuID"), "<i class='icon icon-upload-alt'> </i>" . $lang->export, "class='btn btn-primary iframe'");?>
  <?php echo $this->workflow->buildOperateMenu($currentModule, $data = null, $type = 'menu');?>
</div>
<div class='panel'>
  <div class='panel-heading'>
    <strong><?php echo str_replace('-', '', $title);?></strong>
  </div>
  <table class='table table-condensed table-bordered tablesorter' id="<?php echo $currentModule->module;?>Table">
    <thead>
      <tr class='text-center'>
        <?php $vars = "module=$currentModule->module&method=$currentMethod&id=&mode=$mode&moduleMenuID=$moduleMenuID&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}";?>
        <?php foreach($fields as $field):?>
        <?php if(!$field->show) continue;?>
        <th class="text-<?php echo $field->position;?>" style="width:<?php echo $field->width ? $field->width . 'px' : '';?>">
          <?php
          if($field->field == 'desc' || $field->field == 'asc' || $field->field == 'actions')
          {
              echo $field->name;
          }
          else
          {
              commonModel::printOrderLink($field->field, $orderBy, $vars, $field->name);
          }
          ?>
        </th>
        <?php endforeach;?>
      </tr>
    </thead>
    <tbody>
      <?php $total = array();?>
      <?php foreach($dataList as $data):?>
      <tr class='text-center'>
        <?php foreach($fields as $field):?>
        <?php if(!$field->show || $field->field == 'actions') continue;?>
        <?php
        if(in_array($field->type, array_keys($lang->workflowfield->typeList['number'])) && $field->field != 'id' && $field->totalShow)
        {
            if(!isset($total[$field->field])) $total[$field->field] = 0;
            $total[$field->field] += $data->{$field->field};
        }
        ?>
        <td class="text-<?php echo $field->position;?>">
        <?php
        if(is_array($data->{$field->field}))
        {
            foreach($data->{$field->field} as $value) echo zget($field->options, $value) . ' ';
        }
        else
        {
            if($field->field == 'id' && commonModel::hasPriv($currentModule->module, 'view'))
            {
                $action = $this->workflow->getActionByModuleAndAction($currentModule->module, 'view');
                if($action->open == 'none')
                {
                    echo $data->id;
                }
                else
                {
                    $attr = $action->open == 'modal' ? "data-toggle='modal'" : '';
                    echo html::a(helper::createLink('flow', 'displayLayout', "module={$currentModule->module}&method=view&id={$data->id}"), $data->id, $attr);
                }
            }
            else
            {
                echo zget($field->options, $data->{$field->field});
            }
        }
        ?>
        </td>
        <?php endforeach;?>
        <td class="nowrap"><?php echo $this->workflow->buildOperateMenu($currentModule, $data, $type = 'browse');?></td>
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>
  <div class='table-footer'>
    <?php
    if(!empty($dataList))
    {
        $totalString = '';
        foreach($fields as $field)
        {
            if(!$field->show || $field->field == 'actions') continue;
            if(in_array($field->type, array_keys($lang->workflowfield->typeList['number'])) && $field->field != 'id' && $field->totalShow)
            {
                $totalString .= $field->name . ':' . $total[$field->field] . ',';
            }
        }
        if(!empty($totalString)) echo "<div class='pull-left'>" . $lang->workflow->total . '(' . rtrim($totalString, ',') . ')' . '</div>';
    }
    $pager->show();
    ?>
  </div>
</div>
