<?php
/**
 * The browse view file of workflow module of RanZhi.
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
<?php js::set('parent', $parent);?>
<?php js::set('type', $type);?>
<?php js::set('app', $app);?>
<?php $vars="&parent={$parent}&type={$type}&app={$app}&orderBy=%s";?>
<div id='menuActions'>
  <?php echo html::a("javascript:;", "<i class='icon icon-th-large'></i>", "data-mode='card' class='mode-toggle btn'");?>
  <?php echo html::a("javascript:;", "<i class='icon icon-list'></i>", "data-mode='list' class='mode-toggle btn'");?>
  <?php $parent = str_replace(array('all', 'parent', 'sub'), '', $parent);?>
  <?php commonModel::printLink('workflow', 'create', "parent=$parent&type=$type&app=$app",  "<i class='icon-plus'> </i>" . ($type == 'flow' ? $lang->workflow->create : $lang->workflow->createTable), "class='btn btn-primary' data-toggle='modal' data-width='600'");?>
</div>
<?php $class = $this->cookie->flowViewType == 'card' ? '' : 'hide';?>
<div class='row <?php echo $class;?>' id='cardMode'>
  <?php foreach($modules as $id => $module):?>
  <div class='col-md-4 col-sm-6'>
    <div class='panel flow-block'>
      <div class='panel-heading'>
        <strong title="<?php echo $module->name . ' - ' . $module->module;?>"><?php echo $module->name . ' - ' . $module->module;?></strong>
        <?php if(commonModel::hasPriv('workflow', 'edit') or commonModel::hasPriv('workflow', 'backup') or commonModel::hasPriv('workflow', 'delete')):?>
        <div class="panel-actions pull-right">
          <div class="dropdown">
            <button class="btn btn-mini" data-toggle="dropdown"><span class="caret"></span></button>
            <ul class="dropdown-menu pull-right">
              <?php commonModel::printLink('workflow', 'edit',   "id=$id", $lang->edit, "data-toggle='modal' data-width='600'", '', '', 'li');?>
              <?php commonModel::printLink('workflow', 'backup', "module=$module->module",   $lang->workflow->upgrade->backup, "class='jsoner'", '', '', 'li');?>
              <?php commonModel::printLink('workflow', 'delete', "id=$id", $lang->delete, "class='deleter'", '', '', 'li');?>
            </ul>
          </div>
        </div>
        <?php endif;?>
      </div>
      <div class='panel-body'>
        <div class='info'>
          <div>
            <strong><?php echo $lang->workflow->app;?></strong>&nbsp;&nbsp;<span class='text-important'><?php echo zget($apps, $module->app, '');?></span>
            <?php if($module->newVersion):?>
            <span class='text-danger pull-right'>
              <strong><?php echo $lang->workflow->upgrade->newVersion;?></strong>
              <?php commonModel::printLink('workflow', 'upgrade', "module=$module->module&step=start", $lang->workflow->upgrade->clickme, "data-toggle='modal' data-width='400'");?>
            </span>
            <?php endif;?>
          </div>
          <div><strong><?php echo $lang->workflow->desc;?></strong>&nbsp;&nbsp;<span class='text-important'><?php echo $module->desc;?></span></div>
        </div>
        <div class='footerbar'>
          <?php
          commonModel::printLink('workflow', 'adminField', "module=$module->module", $lang->workflowfield->common, "class='btn btn-primary'");
          if($type == 'flow')
          {
              commonModel::printLink('workflow', 'adminAction', "module=$module->module", $lang->workflowaction->common, "class='btn btn-primary'");
              commonModel::printLink('workflow', 'adminModuleMenu', "module=$module->module", $lang->workflowmenu->common, "class='btn btn-primary'");
              if($module->parent)
              {
                  echo html::a('###', $lang->workflow->subModule, "class='btn' data-toggle='tooltip' title='{$lang->workflow->title->subModule}'");
              }
              else
              {
                  commonModel::printLink('workflow', 'setSubModule', "module=$module->module", $lang->workflow->subModule, "class='btn btn-primary' data-toggle='modal' data-width='500'");
              }

              $tableTips = sprintf($lang->workflow->tips->table, $module->name);
              commonModel::printLink('workflow', 'browse', "parent=$module->module&type=table&app=$module->app", $lang->workflow->subTables, "class='btn btn-primary' data-toggle='tooltip' title='{$tableTips}'");
          }
          ?>
        </div>
      </div>
    </div>
  </div>
  <?php if(!empty($module->children)):?>
  <?php foreach($module->children as $id => $child):?>
  <div class='col-md-4 col-sm-6'>
    <div class='panel flow-block'>
      <div class='panel-heading'>
        <strong title="<?php echo $child->name . ' - ' . $child->module;?>"><?php echo $child->name . ' - ' . $child->module;?></strong>
          <?php if(commonModel::hasPriv('workflow', 'edit') or commonModel::hasPriv('workflow', 'backup') or commonModel::hasPriv('workflow', 'delete')):?>
          <div class="panel-actions pull-right">
            <div class="dropdown">
              <button class="btn btn-mini" data-toggle="dropdown"><span class="caret"></span></button>
              <ul class="dropdown-menu pull-right">
                <?php commonModel::printLink('workflow', 'edit',   "id=$id", $lang->edit, "data-toggle='modal' data-width='600'", '', '', 'li');?>
                <?php commonModel::printLink('workflow', 'backup', "module=$child->module",   $lang->workflow->upgrade->backup, "class='jsoner'", '', '', 'li');?>
                <?php commonModel::printLink('workflow', 'delete', "id=$id", $lang->delete, "class='deleter'", '', '', 'li');?>
              </ul>
            </div>
          </div>
          <?php endif;?>
      </div>
      <div class='panel-body'>
        <div class='info'>
          <div>
            <strong><?php echo $lang->workflow->app;?></strong>&nbsp;&nbsp;<span class='text-important'><?php echo zget($apps, $child->app, '');?></span>
              <?php if($child->newVersion):?>
              <span class='text-danger pull-right'>
                <strong><?php echo $lang->workflow->upgrade->newVersion;?></strong>
                <?php commonModel::printLink('workflow', 'upgrade', "module=$child->module&step=start", $lang->workflow->upgrade->clickme, "data-toggle='modal' data-width='400'");?>
              </span>
              <?php endif;?>
          </div>
          <div><strong><?php echo $lang->workflow->desc;?></strong>&nbsp;&nbsp;<span class='text-important'><?php echo $child->desc;?></span></div>
        </div>
        <div class='footerbar'>
          <?php
          commonModel::printLink('workflow', 'adminField', "module=$child->module", $lang->workflowfield->common, "class='btn btn-primary'");
          if($type == 'flow')
          {
              commonModel::printLink('workflow', 'adminAction', "module=$child->module", $lang->workflowaction->common, "class='btn btn-primary'");
              commonModel::printLink('workflow', 'adminModuleMenu', "module=$child->module", $lang->workflowmenu->common, "class='btn btn-primary'");
              echo html::a('###', $lang->workflow->subModule, "class='btn' data-toggle='tooltip' title='{$lang->workflow->title->subModule}'");
              $tableTips = sprintf($lang->workflow->tips->table, $child->name);
              commonModel::printLink('workflow', 'browse', "parent=$child->module&type=table&app=$child->app", $lang->workflow->subTables, "class='btn btn-primary' data-toggle='tooltip' title='{$tableTips}'");
          }
          ?>
        </div>
      </div>
    </div>
  </div>
  <?php endforeach;?>
  <?php endif;?>
  <?php endforeach;?>
  <div class='col-sm-6 col-md-12'><?php echo $pager->show();?></div>
</div>
<?php $class = $this->cookie->flowViewType == 'list' ? '' : 'hide';?>
<div class='panel <?php echo $class;?>' id='listMode'>
  <table class='table table-condensed tablesorter table-fixed'>
    <thead>
      <tr>
        <th class='w-60px'><?php commonModel::printOrderLink('id', $orderBy, $vars, $lang->workflow->id);?></th>
        <th class='w-150px'><?php commonModel::printOrderLink('name', $orderBy, $vars, $lang->workflow->name);?></th>
        <th class='w-150px'><?php commonModel::printOrderLink('module', $orderBy, $vars, $lang->workflow->module);?></th>
        <?php if($type == 'flow' and empty($app)):?>
        <th class='w-100px'><?php commonModel::printOrderLink('app', $orderBy, $vars, $lang->workflow->app);?></th>
        <?php endif;?>
        <th><?php echo $lang->workflow->desc;?></th>
        <?php $width = $type == 'flow' ? 'width:330px' : 'width:150px';?>
        <th style='<?php echo $width;?>'><?php echo $lang->actions;?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($modules as $id => $module):?>
      <tr>
        <td><?php if(!commonModel::printLink('workflow', 'view', "id=$id", $id, "data-toggle='modal'")) echo $id;?></td>
        <td title="<?php echo $module->name;?>">
          <?php if(!commonModel::printLink('workflow', 'view', "id=$id", $module->name, "data-toggle='modal'")) echo $module->name;?>
          <?php if(!empty($module->children)) echo "<span class='flow-toggle'>&nbsp;&nbsp;<i class='icon icon-minus'></i>&nbsp;&nbsp;</span>"?>
        </td>
        <td><?php echo $module->module;?></td>
        <?php if($type == 'flow' and empty($app)):?>
        <td><?php echo zget($apps, $module->app, '');?></td>
        <?php endif;?>
        <td title='<?php echo $module->desc;?>'><?php echo $module->desc;?></td>
        <td>
          <?php
          commonModel::printLink('workflow', 'edit', "id=$id", $module->type == 'flow' ? $lang->workflow->edit : $lang->workflowtable->edit, "data-toggle='modal' data-width='600'");
          commonModel::printLink('workflow', 'adminField', "module=$module->module", $lang->workflowfield->common);
          if($type == 'flow')
          {
              commonModel::printLink('workflow', 'adminAction', "module=$module->module", $lang->workflowaction->common);
              commonModel::printLink('workflow', 'adminModuleMenu', "module=$module->module", $lang->workflowmenu->common);
              if($module->parent)
              {
                  echo html::a('#', $lang->workflow->subModule, "class='disabled' disabeld='disabeld' data-toggle='tooltip' title='{$lang->workflow->title->subModule}'");
              }
              else
              {
                  commonModel::printLink('workflow', 'setSubModule', "module=$module->module", $lang->workflow->subModule, "data-toggle='modal' data-width='500'");
              }
              commonModel::printLink('workflow', 'browse', "parent=$module->module&type=table&app=$module->app", $lang->workflow->subTables);
          }
          commonModel::printLink('workflow', 'delete', "id=$id", $module->type == 'flow' ? $lang->workflow->delete : $lang->workflowtable->delete, "class='deleter'");
          ?>
        </td>
      </tr>
      <?php if(!empty($module->children)):?>
      <tr class='tr-child'>
        <td colspan='<?php echo ($type == 'flow' && empty($app)) ? 6 : 5?>'>
          <table class='table table-data table-hover table-fixed'>
            <?php foreach($module->children as $id => $child):?>
            <tr>
              <td class='w-60px'><?php if(!commonModel::printLink('workflow', 'view', "id=$id", $id, "data-toggle='modal'")) echo $id;?></td>
              <td class="w-150px" title="<?php echo $child->name;?>"><?php if(!commonModel::printLink('workflow', 'view', "id=$id", $child->name, "data-toggle='modal'")) echo $child->name;?></td>
              <td class="w-150px"><?php echo $child->module;?></td>
              <?php if($type == 'flow' and empty($app)):?>
              <td class="w-100px"><?php echo zget($apps, $module->app, '');?></td>
              <?php endif;?>
              <td title='<?php echo $child->desc;?>'><?php echo $child->desc;?></td>
              <td style='<?php echo $width;?>'>
                <?php
                commonModel::printLink('workflow', 'edit', "id=$id", $child->type == 'flow' ? $lang->workflow->edit : $lang->workflowtable->edit, "data-toggle='modal' data-width='600'");
                commonModel::printLink('workflow', 'adminField', "module=$child->module", $lang->workflowfield->common);
                if($type == 'flow')
                {
                    commonModel::printLink('workflow', 'adminAction', "module=$child->module", $lang->workflowaction->common);
                    commonModel::printLink('workflow', 'adminModuleMenu', "module=$child->module", $lang->workflowmenu->common);
                    echo html::a('#', $lang->workflow->subModule, "class='disabled' disabeld='disabeld' data-toggle='tooltip' title='{$lang->workflow->title->subModule}'");
                    commonModel::printLink('workflow', 'browse', "parent=$child->module&type=table&app=$child->app", $lang->workflow->subTables);
                }
                commonModel::printLink('workflow', 'delete', "id=$id", $child->type == 'flow' ? $lang->workflow->delete : $lang->workflowtable->delete, "class='deleter'");
                ?>
              </td>
            </tr>
            <?php endforeach;?>
          </table>
        </td>
      </tr>
      <?php endif;?>
      <?php endforeach;?>
    </tbody>
  </table>
  <div class='table-footer'><?php $pager->show();?></div>
</div>
<?php include '../../common/view/footer.html.php';?>
