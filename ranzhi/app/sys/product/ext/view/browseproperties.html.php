<?php
/**
 * The browse view file of setting module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     setting
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include $app->getModuleRoot() . 'common/view/header.html.php';?>
<?php js::set('message', $lang->product->input . $this->lang->$module->property->$section);?>
<?php js::set('module',  $module);?>
<?php js::set('section', $section);?>
<div id='menuActions'>
  <form method='post' class='form-search'>
    <div class="input-group">
      <span class="input-group-btn">
        <?php echo html::a(inlink('batchCreateProperties', "module=$module&field=$section"), "<i class='icon-plus'></i> " . $lang->product->batchCreate, "class='btn btn-primary' data-toggle='modal'");?>
      </span>
      <?php echo html::input('query', '', "class='form-control search-query' placeholder='{$lang->product->input}{$this->lang->$module->property->$section}'");?>
      <span class="input-group-btn">
        <?php echo html::submitButton("<i class='icon icon-search'> </i>" . $lang->product->search);?>
      </span>
    </div>
  </form>
</div>
<?php if($section != 'expresses'):?>
<div class='side col-md-2'>
  <ul class='nav nav-primary nav-stacked'>
    <li><?php echo html::a(inlink('browseProperties', "module=product&section=models"), $lang->product->model);?></li>
    <li><?php echo html::a(inlink('browseProperties', "module=product&section=units"), $lang->product->unit);?></li>
  </ul>
</div>
<div class='col-md-10'>
<?php endif;?>
  <div class='panel'>
    <table class='table table-condensed table-striped table-hover tablesorter'>
      <thead>
        <tr>
          <?php $vars = "module=$module&section=$section&query=$query&orderBy=%s&recTotal=$pager->recTotal&recPerPage=$pager->recPerPage&pageID=$pager->pageID";?>
          <th class='w-50px'><?php echo $lang->$module->id;?></th>
          <th><?php commonModel::printOrderLink('value', $orderBy, $vars, $lang->$module->property->$section);?></th>
          <th class='w-80px'><?php echo $lang->actions;?></th>
        </tr>
      </thead>
      <?php $i = 0;?>
      <?php foreach($properties as $key => $value):?>
      <tr>
        <td><?php echo ++$i;?></td>
        <td><?php echo $value;?></td>
        <td>
          <?php echo html::a(inlink('editProperty',   "module=$module&section=$section&id=$key"), $lang->edit, "data-toggle='modal' data-width='500'");?>
          <?php echo html::a(inlink('deleteProperty', "module=$module&section=$section&id=$key"), $lang->delete, "class='deleter'");?>
        </td>
      </tr>
      <?php endforeach;?>
      <tfoot>
        <tr><td colspan='3'><?php $pager->show();?></td></tr>
      </tfoot>
    </table>
  </div>
<?php if($section != 'expresses'):?>
</div>
<?php endif;?>
<?php include '../../../common/view/footer.html.php';?>
