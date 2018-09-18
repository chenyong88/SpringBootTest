<?php 
/**
 * The browse view file of store module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     store 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include $app->getModuleRoot() . 'common/view/header.html.php';?>
<div id='menuActions'>
  <?php commonModel::printLink('store', 'create', '', "<i class='icon-plus'></i> " . $lang->store->create, "class='btn btn-primary' data-toggle='modal'"); ?>
</div>
<div class="panel">
  <table class='table table-hover table-striped tablesorter'>
    <thead>
      <tr>
        <th><?php echo $lang->store->name;?></th>
        <th><?php echo $lang->store->location;?></th>
        <th><?php echo $lang->store->manager;?></th>
        <th><?php echo $lang->store->desc;?></th>
        <th class="w-80px"><?php echo $lang->actions;?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($stores as $store):?>
      <tr class='test-center'>
        <td><?php echo $store->name;?></td>
        <td><?php echo $store->location;?></td>
        <td><?php echo $store->manager;?></td>
        <td><?php echo $store->desc;?></td>
        <td>
          <?php commonModel::printLink('store', 'edit', "storeID={$store->id}", $lang->edit, "data-toggle='modal'");?>
          <?php commonModel::printLink('store', 'delete', "storeID={$store->id}", $lang->delete, "class='deleter'");?>
        </td>
      </tr>
      <?php endforeach;?> 
    </tbody>
    <tfoot><tr><td colspan='5'><?php $pager->show();?></td></tr></tfoot>
  </table>
</div>
<?php include '../../common/view/footer.html.php';?>
