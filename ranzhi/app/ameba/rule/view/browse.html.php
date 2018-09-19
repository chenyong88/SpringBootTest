<?php
/**
 * The browse view file of rule module of Ranzhi.
 *
 * @copyright   Copyright 2009-2017 青岛易软天创网络科技有限公司 
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     rule 
 * @version     $Id$
 * @link        http://www.ranzhi.org 
 */
?>
<?php include '../../common/view/header.html.php';?>
<div id='menuActions'>
  <?php commonModel::printLink('rule', 'create', '', "<i class='icon icon-plus'> </i>" . $lang->rule->create, "class='btn btn-primary'");?>
</div>
<div class='panel'>
  <table class='table table-stripped table-hover tablesorter table-fixedHeader'>
    <thead>
      <tr>
        <?php $vars = "month=$month&orderBy=%s&recTotal=$pager->recTotal&recPerPage=$pager->recPerPage&pageID=$pager->pageID";?>
        <th class='w-60px'><?php commonModel::printOrderLink('id', $orderBy, $vars, $lang->rule->id);?></th>
        <th class='w-80px'><?php commonModel::printOrderLink('month', $orderBy, $vars, $lang->rule->year);?></th>
        <?php $class = $this->app->clientLang == 'en' ? 'w-120px' : 'w-90px';?>
        <th class='<?php echo $class;?>'><?php commonModel::printOrderLink('from', $orderBy, $vars, $lang->rule->from);?></th>
        <th class='w-200px'><?php commonModel::printOrderLink('product', $orderBy, $vars, $lang->rule->product);?></th>
        <th class='w-200px'><?php commonModel::printOrderLink('category', $orderBy, $vars, $lang->rule->category);?></th>
        <th><?php echo $lang->rule->sharedRules;?></th>
        <?php $class = $this->app->clientLang == 'en' ? 'w-140px' : 'w-110px';?>
        <th class='<?php echo $class;?>'><?php echo $lang->actions;?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($ruleList as $rule):?>
      <tr>
        <td><?php if(!commonModel::printLink('rule', 'view', "ruleID=$rule->id", $rule->id)) echo $rule->id;?></td>
        <td><?php echo $rule->month;?></td>
        <td><?php echo zget($deptList, $rule->from, '');?></td>
        <td><?php echo zget($productList, $rule->product, '');?></td>
        <td><?php echo zget($categoryList, $rule->category, '');?></td>
        <td>
          <?php
          foreach($rule->sharedRules as $sharedRule)
          {
              echo zget($deptList, $sharedRule->to) . ' ' . $sharedRule->rate . '%; ';
          }
          ?>
        </td>
        <td>
          <?php commonModel::printLink('rule', 'view',   "ruleID=$rule->id", $lang->detail);?>
          <?php commonModel::printLink('rule', 'edit',   "ruleID=$rule->id", $lang->edit);?>
          <?php commonModel::printLink('rule', 'delete', "ruleID=$rule->id", $lang->delete, "class='deleter'");?></td>
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>  
  <div class='table-footer'><?php echo $pager->show();?></div>
</div>
<?php include '../../common/view/footer.html.php';?>
