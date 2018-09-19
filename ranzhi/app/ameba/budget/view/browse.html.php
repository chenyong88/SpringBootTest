<?php
/**
 * The browse view file of budget module of RanZhi.
 *
 * @copyright   Copyright 2009-2017 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     budget 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../common/view/header.html.php';?>
<div id='menuActions'>
  <?php commonModel::printLink('budget', 'create', '', "<i class='icon icon-plus'> </i>" . $lang->budget->create, "class='btn btn-primary' data-toggle='modal'");?>
  <?php commonModel::printLink('budget', 'batchCreate', "year=$year&dept=$dept&method=browse", "<i class='icon icon-sitemap'> </i>" . $lang->budget->batchCreate, "class='btn btn-primary'");?>
</div>
<div class='panel'>
  <table class='table table-condensed  table-striped table-hover table-fixedHeader tablesorter'>
    <thead>
      <tr class='text-center'>
        <?php $vars = "year=$year&dept=$dept&orderBy=%s&recTotal=$pager->recTotal&recPerPage=$pager->recPerPage&pageID=$pager->pageID";?>
        <th class='w-60px'> <?php commonModel::printOrderLink('id', $orderBy, $vars, $lang->budget->id);?></th>
        <th class='w-70px'><?php commonModel::printOrderLink('year', $orderBy, $vars, $lang->budget->year);?></th>
        <th class='w-100px'><?php commonModel::printOrderLink('dept', $orderBy, $vars, $lang->budget->dept);?></th>
        <?php $class = $this->app->clientLang == 'en' ? 'w-130px' : 'w-100px';?>
        <th class='<?php echo $class;?>'><?php commonModel::printOrderLink('amebaAccount', $orderBy, $vars, $lang->budget->amebaAccount);?></th>
        <?php $class = $this->app->clientLang == 'en' ? 'w-130px' : 'w-100px';?>
        <th class='<?php echo $class;?>'><?php commonModel::printOrderLink('line', $orderBy, $vars, $lang->budget->line);?></th>
        <th class='w-200px'><?php commonModel::printOrderLink('category', $orderBy, $vars, $lang->budget->category);?></th>
        <th class='w-120px text-right'><?php commonModel::printOrderLink('money', $orderBy, $vars, $lang->budget->money);?></th>
        <th><?php echo $lang->budget->desc;?></th>
        <th class='w-140px'><?php echo $lang->actions;?></th>
      </tr>
    </thead>
    <?php $totalMoney = 0;?>
    <?php foreach($budgetList as $budget):?>
    <?php $totalMoney += $budget->money;?>
    <tr class='text-center'>
      <td><?php if(!commonModel::printLink('budget', 'view', "budgetID=$budget->id", $budget->id)) echo $budget->id;?></td>
      <td><?php echo $budget->year;?></td>
      <td><?php echo zget($deptList, $budget->dept);?></td>
      <td><?php echo zget($lang->budget->amebaAccountList, $budget->amebaAccount);?></td>
      <td class='text-center'><?php echo zget($productLines, $budget->line);?></td>
      <td class='text-left'><?php echo zget($categoryList, $budget->category);?></td>
      <td class='text-right'><?php echo formatMoney($budget->money);?></td>
      <td class='text-left' title='<?php echo $budget->desc;?>'><?php echo $budget->desc;?></td>
      <td>
        <?php commonModel::printLink('budget', 'view',   "budgetID=$budget->id", $lang->detail);?>
        <?php commonModel::printLink('budget', 'edit',   "budgetID=$budget->id", $lang->edit,   "data-toggle='modal'");?>
        <?php commonModel::printLink('budget', 'delete', "budgetID=$budget->id", $lang->delete, "class='deleter'");?>
      </td>
    </tr>
    <?php endforeach;?>
  </table>
  <div class='table-footer'>
    <span class='text-danger pull-left'><strong><?php printf($lang->budget->totalMoney, formatMoney($totalMoney));?></strong></span> 
    <?php echo $pager->show();?>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
