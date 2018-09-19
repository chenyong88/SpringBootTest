<?php 
/**
 * The browse view file of product module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     product 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include $app->getModuleRoot() . 'common/view/header.html.php';?>
<?php include '../../common/view/treeview.html.php';?>
<?php js::set('mode', $mode);?>
<?php js::set('status', $status);?>
<?php js::set('category', $category);?>
<li id='bysearchTab'><?php echo html::a('#', "<i class='icon-search icon'></i>" . $lang->search->common)?></li>
<div id='menuActions'>
  <?php commonModel::printLink('product', 'create', '', '<i class="icon-plus"></i> ' . $lang->product->create, "class='btn btn-primary' data-toggle='modal' data-width='600'");?>
</div>
<div class='with-side'>
  <div class='side'>
    <div class='panel'>
      <div class='panel-heading'>
        <strong><?php echo $lang->product->category;?></strong>
      </div>
      <div class='panel-body'>
        <div id='treeMenuBox'><?php echo $treeMenu;?></div>
        <?php commonModel::printLink('tree', 'browse', 'type=product', $lang->product->setCategory, "class='btn btn-primary pull-right'");?>
      </div>
    </div>
  </div>
  <div class='main panel'>
    <table class='table table-bordered table-hover table-striped tablesorter table-data' id='productList'>
      <thead>
        <tr class='text-center'>
          <?php $vars = "mode={$mode}&status={$status}&category={$category}&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}";?>
          <th class='w-60px'> <?php commonModel::printOrderLink('id', $orderBy, $vars, $lang->product->id);?></th>
          <th><?php commonModel::printOrderLink('name', $orderBy, $vars, $lang->product->name);?></th>
          <th class='w-120px'> <?php commonModel::printOrderLink('category', $orderBy, $vars, $lang->product->category);?></th>
          <th class='w-200px'><?php commonModel::printOrderLink('code', $orderBy, $vars, $lang->product->code);?></th>
          <th class='w-160px visible-lg'><?php commonModel::printOrderLink('createdDate', $orderBy, $vars, $lang->product->createdDate);?></th>
          <th class='w-60px'><?php commonModel::printOrderLink('type', $orderBy, $vars, $lang->product->type);?></th>
          <th class='w-70px'><?php commonModel::printOrderLink('status', $orderBy, $vars, $lang->product->status);?></th>
          <?php $class = $this->app->clientLang == 'en' ? 'w-240px' : 'w-100px';?>
          <th class='<?php echo $class;?>'><?php echo $lang->actions;?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($products as $product):?>
        <tr class='text-center' data-url="<?php echo $this->createLink('product', 'view', "productID={$product->id}");?>">
          <td><?php echo $product->id;?></td>
          <td class='text-left'><?php echo $product->name;?></td>
          <td><?php echo zget($categories, $product->category, '');?></td>
          <td><?php echo $product->code;?></td>
          <td class='visible-lg'><?php echo $product->createdDate;?></td>
          <td><?php echo $lang->product->typeList[$product->type];?></td>
          <td><?php echo $lang->product->statusList[$product->status];?></td>
          <td>
            <?php
            commonModel::printLink('product', 'edit', "productID=$product->id", $lang->edit, "data-toggle='modal' data-width='600'");
            commonModel::printLink('product', 'delete', "productID=$product->id", $lang->delete, "class='reloadDeleter'");
            ?>
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>
    <div class='table-footer'><?php $pager->show();?></div>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
