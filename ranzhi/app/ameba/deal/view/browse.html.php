<?php
/**
 * The browse view file of deal module of RanZhi.
 *
 * @copyright   Copyright 2009-2017 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     deal 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php js::set('mode', $mode);?>
<li id='bysearchTab'><?php echo html::a('#', "<i class='icon-search icon'></i>" . $lang->search->common);?></li>
<div id='menuActions'>
  <?php echo $menuActions;?>
  <?php commonModel::printLink('deal', 'create', '', "<i class='icon icon-plus'> </i>" . $lang->deal->create, "class='btn btn-primary' data-toggle='modal'");?>
  <?php commonModel::printLink('deal', 'batchCreate', '', "<i class='icon icon-sitemap'> </i>" . $lang->deal->batchCreate, "class='btn btn-primary'");?>
</div>
<div class='panel'>
  <table class='table table-stripped table-hover tablesorter table-fixed table-fixedHeader'>
    <thead>
      <tr class='text-center'>
        <?php $vars = "mode=$mode&month=$month&dept=$dept&status=$status&orderBy=%s&recTotal=$pager->recTotal&recPerPage=$pager->recPerPage&pageID=$pager->pageID";?>
        <th class='w-80px'> <?php commonModel::printOrderLink('id', $orderBy, $vars, $lang->deal->id);?></th>
        <th class='w-80px'> <?php commonModel::printOrderLink('date', $orderBy, $vars, $lang->deal->date);?></th>
        <th class='w-100px'><?php commonModel::printOrderLink('dept', $orderBy, $vars, $lang->deal->dept);?></th>
        <th class='w-80px'> <?php commonModel::printOrderLink('amebaAccount', $orderBy, $vars, $lang->deal->amebaAccount);?></th>
        <th class='w-140px'><?php commonModel::printOrderLink('category', $orderBy, $vars, $lang->deal->category);?></th>
        <th class='w-140px'><?php commonModel::printOrderLink('product', $orderBy, $vars, $lang->deal->product);?></th>
        <th class='w-80px'> <?php commonModel::printOrderLink('type', $orderBy, $vars, $lang->deal->type);?></th>
        <th class='w-100px text-right'><?php commonModel::printOrderLink('money', $orderBy, $vars, $lang->deal->money);?></th>
        <th><?php echo $lang->deal->contract . ' / ' . $lang->deal->desc;?></th>
        <?php $class = $this->app->clientLang == 'en' ? 'w-180px' : 'w-130px';?>
        <th class='<?php echo $class;?>'><?php echo $lang->actions;?></th>
      </tr>
    </thead>
    <tbody>
      <?php $totalIncome = $totalExpense = 0;?>
      <?php foreach($dealList as $deal):?>
      <?php if($deal->amebaAccount == 'internalIncome')  $totalIncome  += $deal->money;?>
      <?php if($deal->amebaAccount == 'internalExpense') $totalExpense += $deal->money;?>
      <tr class='text-center'>
        <td><?php if(!commonModel::printLink('deal', 'view', "dealID=$deal->id", $deal->id)) echo $deal->id;?></td>
        <td><?php echo $deal->date;?></td>
        <td><?php echo zget($deptPairs, $deal->dept);?></td>
        <td><?php echo zget($lang->deal->amebaAccountList, $deal->amebaAccount);?></td>
        <td class='text-left'><?php echo zget($categoryPairs, $deal->category);?></td>
        <td><?php echo zget($productPairs, $deal->product);?></td>
        <td><?php echo zget($lang->deal->typeList, $deal->type);?></td>
        <td class='text-right'><?php echo $deal->money;?></td>
        <?php if($deal->contract):?>
        <td class='text-left' title='<?php echo zget($contractPairs, $deal->contract, '');?>'>
          <?php 
          if(isset($contractPairs[$deal->contract]))
          {
              if(!commonModel::printLink('crm.contract', 'view', "id=$deal->contract", zget($contractPairs, $deal->contract), "class='contract'")) echo zget($contractPairs, $deal->contract);
          }
          ?>
        </td>
        <?php else:?>
        <td class='text-left' title='<?php echo $deal->desc;?>'><?php echo $deal->desc;?></td>
        <?php endif;?>
        <td>
          <?php 
          if($status == 'wait') 
          {
              if($deal->from) 
              {
                  commonModel::printLink('deal', 'confirm', "dealID=$deal->id", $lang->confirm, "data-toggle='modal'");
              }
              else
              {
                  echo html::a('#', $lang->confirm, "disabled='disabled'");
              }
          }
          commonModel::printLink('deal', 'view',   "dealID=$deal->id", $lang->detail);
          if(strpos(',internalIncome,internalDeal,', ",$deal->amebaAccount,") !== false)
          {
              commonModel::printLink('deal', 'edit', "dealID=$deal->id", $lang->edit, "data-toggle='modal'");
              commonModel::printLink('deal', 'delete', "dealID=$deal->id", $lang->delete,  "class='deleter'");
          }
          else
          {
              echo html::a('###', $lang->edit,   "disabled='disabled'");
              echo html::a('###', $lang->delete, "disabled='disabled'");
          }
          ?>
        </td>
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>  
  <div class='table-footer'>
    <span class='text-danger'>
      <strong>
        <?php if($totalIncome)  printf($lang->deal->totalIncome,  formatMoney($totalIncome));?>
        <?php if($totalExpense) printf($lang->deal->totalExpense, formatMoney($totalExpense));?>
      </strong>
    </span>
    <?php echo $pager->show();?>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
