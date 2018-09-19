<?php include $app->getModuleRoot() . 'common/view/header.html.php';?>
<?php include '../../../common/view/treeview.html.php';?>
<?php js::set('mode', $mode);?>
<?php js::set('status', $status);?>
<?php js::set('category', $category);?>
<?php js::set('store', $store);?>
<?php $psiPriv = ($config->psi->turnon == 1 && $this->appName == 'psi');?>
<li id='bysearchTab'><?php echo html::a('#', "<i class='icon-search icon'></i>" . $lang->search->common)?></li>
<div id='menuActions'>
  <?php if(false && $psiPriv):?>
  <?php if(commonModel::hasPriv('product', 'exportTemplate') or commonModel::hasPriv('product', 'import')):?>
  <div class='btn-group'>
    <button class='btn btn-primary dropdown-toggle' data-toggle='dropdown'><i class='icon-download-alt'></i> <?php echo $lang->import;?></button>
    <ul class='dropdown-menu' role='menu'>
      <?php commonModel::printLink('product', 'import', '', $lang->product->import, "data-toggle='modal'", '', '', 'li');?>
      <?php commonModel::printLink('product', 'exportTemplate', '', $lang->product->exportTemplate, '', '', '', 'li');?>
    </ul>
  </div>
  <?php endif;?>
  <?php commonModel::printLink('product', 'exportProduct', '', "<i class='icon-upload-alt'></i> " . $lang->export, "class='btn btn-primary export' data-toggle='modal'");?>
  <?php endif;?>
  <?php $dataWidth = $psiPriv ? '' : "data-width='600'";?>
  <?php commonModel::printLink('product', 'create', '', '<i class="icon-plus"></i> ' . $lang->product->create, "class='btn btn-primary' data-toggle='modal' $dataWidth");?>
  <?php if($psiPriv) commonModel::printLink('product', 'batchCreate', '', "<i class='icon-sitemap'></i> " . $lang->product->batchCreate, "class='btn btn-primary'");?>
</div>
<div class='with-side'>
  <div class='side'>
    <?php if($psiPriv):?>
    <?php $treeBrowsePriv  = commonModel::hasPriv('tree', 'browse');?>
    <?php $storeBrowsePriv = commonModel::hasPriv('store', 'browse');?>
    <?php if($treeBrowsePriv || $storeBrowsePriv):?>
    <div class='panel'>
      <div class='panel-heading menuDiv'>
        <ul class='nav nav-tabs'>
          <?php if($treeBrowsePriv):?>
          <li <?php if(!$store) echo "class='active'"?>>
            <a href="#categoryList" data-toggle="tab"><strong><?php echo $lang->product->category;?></strong></a>
          </li>
          <?php endif;?>
          <?php if($storeBrowsePriv):?>
          <li <?php if($store) echo "class='active'"?>>
            <a href="#storeList" data-toggle="tab"><strong><?php echo $lang->store->common;?></strong></a>
          </li>
          <?php endif;?>
        </ul>
      </div>
      <div class='tab-content'>
        <?php if($treeBrowsePriv):?>
        <div <?php echo $store ? "class='tab-pane'" : "class='tab-pane active'"?> id="categoryList">
          <div class='panel-body'>
            <div id='treeMenuBox'>
              <?php echo $categoryMenu;?>
              <div class='pull-right'><?php commonModel::printLink('tree', 'browse', "type=product", $lang->product->setCategory, "class='btn btn-primary'");?></div>
            </div>
          </div>
        </div>
        <?php endif;?>
        <?php if($storeBrowsePriv):?>
        <div <?php echo !$store ? "class='tab-pane'" : "class='tab-pane active'"?> id="storeList">
          <div class='panel-body'>
            <div id='treeMenuBox'>
              <ul class='tree treeview'>
                <?php echo $storeMenu;?>
              </ul>
              <div class='pull-right'><?php commonModel::printLink('store', 'browse', '', $lang->store->manage, "class='btn btn-primary'");?></div>
            </div>
          </div>
        </div>
        <?php endif;?>
      </div>
    </div>
    <?php endif;?>
    <?php else:?>
    <div class='panel'>
      <div class='panel-heading'>
        <strong><?php echo $lang->product->category;?></strong>
      </div>
      <div class='panel-body'>
        <div id='treeMenuBox'><?php echo $treeMenu;?></div>
        <?php commonModel::printLink('tree', 'browse', 'type=product', $lang->product->setCategory, "class='btn btn-primary pull-right'");?>
      </div>
    </div>
    <?php endif;?>
  </div>
  <div class='main panel'>
    <table class='table table-bordered table-hover table-striped tablesorter table-data' id='productList'>
      <thead>
        <tr class='text-center'>
          <?php $vars = "mode={$mode}&status={$status}&category={$category}&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}";?>
          <th class='w-60px'> <?php commonModel::printOrderLink('id', $orderBy, $vars, $lang->product->id);?></th>
          <th><?php commonModel::printOrderLink('name', $orderBy, $vars, $lang->product->name);?></th>
          <th class='w-160px'><?php commonModel::printOrderLink('category', $orderBy, $vars, $lang->product->category);?></th>
          <th class='w-120px'><?php commonModel::printOrderLink('code', $orderBy, $vars, $lang->product->code);?></th>
          <?php if($psiPriv):?>
          <th class='w-160px'><?php commonModel::printOrderLink('model', $orderBy, $vars, $lang->product->model);?></th>
          <th class='w-100px'><?php commonModel::printOrderLink('unit', $orderBy, $vars, $lang->product->unit);?></th>
          <th class='w-100px'><?php commonModel::printOrderLink('amount', $orderBy, $vars, $lang->product->amount);?></th>
          <?php else:?>
          <th class='w-160px visible-lg'><?php commonModel::printOrderLink('createdDate', $orderBy, $vars, $lang->product->createdDate);?></th>
          <th class='w-60px'><?php commonModel::printOrderLink('type', $orderBy, $vars, $lang->product->type);?></th>
          <?php endif;?>
          <th class='w-70px'> <?php commonModel::printOrderLink('status', $orderBy, $vars, $lang->product->status);?></th>
          <?php $class = $this->app->clientLang == 'en' ? ($this->appName == 'crm' ? 'w-240px' : 'w-100px') : ($this->appName == 'crm' ? 'w-220px' : 'w-80px');?>
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
          <?php if($psiPriv):?>
          <td><?php echo zget($lang->product->models, $product->model);?></td>
          <td><?php echo zget($lang->product->units, $product->unit);?></td>
          <td><?php echo $product->amount;?></td>
          <?php else:?>
          <td class='visible-lg'><?php echo $product->createdDate;?></td>
          <td><?php echo $lang->product->typeList[$product->type];?></td>
          <?php endif;?>
          <td><?php echo zget($lang->product->statusList, $product->status);?></td>
          <td>
            <?php
            commonModel::printLink('product', 'edit',        "productID=$product->id", $lang->edit, "data-toggle='modal'");
            if($this->appName == 'crm')
            {
                commonModel::printLink('product', 'adminField',  "productID=$product->id", $lang->product->field->admin);
                commonModel::printLink('product', 'adminAction', "productID=$product->id", $lang->product->action->admin);
                commonModel::printLink('product', 'adminRoles',  "productID=$product->id", $lang->product->roles, "data-toggle='modal'");
                commonModel::printLink('product', 'copy',        "productID=$product->id", $lang->copy, "data-toggle='modal'");
            }
            commonModel::printLink('product', 'delete',      "productID=$product->id", $lang->delete, "class='reloadDeleter'");
            ?>
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>
    <div class='table-footer'><?php $pager->show();?></div>
  </div>
</div>
<?php include '../../../common/view/footer.html.php';?>
