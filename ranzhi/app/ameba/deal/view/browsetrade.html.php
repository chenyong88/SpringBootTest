<?php
/**
 * The browse trade view file of deal module of RanZhi.
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
<div id='menuActions'>
  <?php 
  echo $menuActions;
  if(commonModel::hasPriv('deal', 'batchShare')) 
  {
      $url = inlink('batchShare', "type=$type&month=$month");
      echo html::a('###', "<i class='icon icon-sitemap'> </i>" . $lang->deal->batchShareList[$type], "class='btn btn-primary batchShare' data-url='$url'");
  }
  ?>
</div>
<div class='panel'>
  <?php $batchSwitch = commonModel::hasPriv('deal', 'batchSwitchTradeStatus');?>
  <?php if($batchSwitch):?>
  <?php $switchStatus = $status == 'ignored' ? 'wait' : 'ignored';?>
  <form id='tradeForm' method='post' action='<?php echo inlink('batchSwitchTradeStatus', "status=$switchStatus&type=$type&month=$month");?>'>
  <?php endif;?>
    <table class='table table-stripped table-hover tablesorter table-fixed table-fixedHeader'>
      <thead>
        <tr class='text-center'>
          <?php $vars = "month=$month&status=$status&orderBy=%s&recTotal=$pager->recTotal&recPerPage=$pager->recPerPage&pageID=$pager->pageID";?>
          <th class='w-100px'><?php commonModel::printOrderLink('date', $orderBy, $vars, $lang->trade->date);?></th>
          <th class='w-100px'><?php commonModel::printOrderLink('depositor', $orderBy, $vars, $lang->trade->depositor);?></th>
          <th class='w-60px'><?php commonModel::printOrderLink('type', $orderBy, $vars, $lang->trade->type);?></th>
          <th><?php commonModel::printOrderLink('trader', $orderBy, $vars, $lang->trade->trader);?></th>
          <th class='w-120px text-right'><?php commonModel::printOrderLink('money', $orderBy, $vars, $lang->trade->money);?></th>
          <th class='w-100px'><?php commonModel::printOrderLink('dept', $orderBy, $vars, $lang->trade->dept);?></th>
          <th class='w-100px'><?php commonModel::printOrderLink('handlers', $orderBy, $vars, $lang->trade->handlers);?></th>
          <th class='w-200px'><?php commonModel::printOrderLink('product', $orderBy, $vars, $lang->trade->product . $lang->slash . $lang->trade->category);?></th>
          <th class='w-200px visible-lg'><?php echo $lang->trade->desc;?></th>
          <th class='w-100px'><?php echo $lang->actions;?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($tradeList as $trade):?>
        <tr class='text-center'>
          <td class='text-left'>
            <?php if($batchSwitch):?>
            <label class='checkbox-inline'>
              <input type='checkbox' name='tradeIDList[]' value='<?php echo $trade->id;?>'/> <?php echo formatTime($trade->date, DT_DATE1);?>
            </label>
            <?php else:?>
            <?php echo formatTime($trade->date, DT_DATE1);?>
            <?php endif;?>
          </td>
          <td class='text-left'><?php echo zget($depositorList, $trade->depositor, ' ');?></td>
          <td><?php echo $lang->trade->typeList[$trade->type];?></td>
          <td class='text-left' title="<?php echo zget($customerList, $trade->trader, '');?>"><?php if($trade->trader) echo zget($customerList, $trade->trader, ' ');?></td>
          <td class='text-right'><?php echo zget($currencySign, $config->setting->mainCurrency, '') . formatMoney($trade->money * $trade->exchangeRate);?></td>
          <td><?php echo zget($deptList, $trade->dept);?></td>
          <td title='<?php foreach(explode(',', $trade->handlers) as $handler) echo zget($users, $handler) . ' ';?>'><?php foreach(explode(',', $trade->handlers) as $handler) echo zget($users, $handler) . ' ';?></td>
          <td class='text-left'><?php echo isset($productList[$trade->product]) ? $productList[$trade->product] . $lang->slash . zget($categories, $trade->category, ' ') : zget($categories, $trade->category, ' ');?></td>
          <td class='text-left visible-lg'><div title="<?php echo $trade->desc;?>" class='w-200px text-ellipsis'><?php echo $trade->desc;?><div></td>
          <td>
            <?php $width = $type == 'in' ? "data-width='1000'" : '';?>
            <?php if($status != 'ignored') commonModel::printLink('cash.trade', 'share', "tradeID=$trade->id", $lang->trade->shareList[$type], "data-toggle='modal' $width");?>
            <?php if($status != 'ignored') commonModel::printLink('deal', 'switchTradeStatus', "tradeID=$trade->id&status=ignored&type=$type&month=$month", $lang->trade->ignore, "class='jsoner'");?>
            <?php if($status == 'ignored') commonModel::printLink('deal', 'switchTradeStatus', "tradeID=$trade->id&status=wait&type=$type&month=$month", $lang->trade->restore, "class='jsoner'");?>
            <?php commonModel::printLink('cash.trade', 'edit', "tradeID=$trade->id", $lang->edit, "class='editTrade'");?> 
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>  
    <div class='table-footer'>
      <?php if($batchSwitch):?>
      <?php $label = $status == 'ignored' ? $lang->trade->restore : $lang->trade->ignore;?>
      <div class='pull-left'><?php echo html::selectButton() . html::submitButton($label);?></div>
      <?php endif;?>
      <?php echo $pager->show();?>
    </div>
  </form>
</div>
<?php include '../../common/view/footer.html.php';?>
