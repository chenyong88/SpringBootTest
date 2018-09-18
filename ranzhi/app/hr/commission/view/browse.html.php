<?php
/**
 * The browse view file of commission module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     commission 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php include '../../../sys/common/view/treeview.html.php';?>
<?php js::set('type', $type);?>
<div class='with-side'>
  <div class='side'>
    <div class='side-body'>
      <div class='panel panel-sm'>
        <div class='panel-body'>
          <ul class='tree' data-collapsed='true'>
            <?php foreach($tradeYears as $tradeYear):?>
            <li class='<?php echo $tradeYear == $currentYear ? 'active' : '';?>'>
              <?php commonModel::printLink('commission', 'browse', "type={$type}&date={$tradeYear}", $tradeYear);?>
              <ul>
                <?php foreach($tradeMonths[$tradeYear] as $month):?>
                <li class='<?php echo ($tradeYear == $currentYear && $month == $currentMonth) ? 'active' : '';?>'><?php commonModel::printLink('commission', 'browse', "type={$type}&date=$tradeYear$month", $tradeYear . $month);?></li>
                <?php endforeach;?>
              </ul>
            </li>
            <?php endforeach;?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class='main'>
    <div class='panel'>
      <?php $param = $type == 'ignored' ? '&commission=0' : '';?>
      <?php $label = $type == 'ignored' ? $lang->commission->restore : $lang->ignore;?>
      <form id='ajaxForm' method='post' action='<?php echo inlink('batchSwitchIgnore', "type={$type}&date=$currentYear$currentMonth{$param}");?>'>
        <table id='tradeList' class='table table-hover table-striped tablesorter table-data table-fixed'>
          <thead>
            <tr class='text-center'>
              <?php $vars = "type={$type}&date={$date}&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}";?>
              <th class='w-80px'><?php echo $lang->trade->id;?></th>
              <th class='w-100px'><?php commonModel::printOrderLink('date', $orderBy, $vars, $lang->trade->date);?></th>
              <th class='text-left'><?php commonModel::printOrderLink('trader', $orderBy, $vars, $lang->trade->customer);?></th>
              <th class='text-left'><?php commonModel::printOrderLink('product', $orderBy, $vars, $lang->trade->product);?></th>
              <th class='w-140px text-left'><?php commonModel::printOrderLink('category', $orderBy, $vars, $lang->trade->category);?></th>
              <th class='w-120px text-left'><?php commonModel::printOrderLink('handlers', $orderBy, $vars, $lang->trade->handlers);?></th>
              <th class='w-80px text-right'><?php commonModel::printOrderLink('money', $orderBy, $vars, $lang->commission->money);?></th>
              <?php if($type == 'commissioned'):?>
              <th class='w-80px text-right'><?php echo $lang->commission->amount;?></th>
              <?php endif;?>
              <?php $class = $this->app->clientLang == 'en' ? 'w-150px' : 'w-120px';?>
              <th class='<?php echo $class;?>'><?php echo $lang->actions;?></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($trades as $trade):?>
            <tr class='text-center'>
              <td>
                <?php if($type == 'commissioned'):?>
                <?php echo $trade->id;?>
                <?php else:?>
                <label class='checkbox-inline'><input type='checkbox' name='tradeIDList[]' value='<?php echo $trade->id;?>'/> <?php echo $trade->id;?></label>
                <?php endif;?>
              </td>
              <td class='text-left'><?php echo formatTime($trade->date, DT_DATE1);?></td>
              <td class='text-left' title="<?php echo zget($customerList, $trade->trader, ' ');?>"><?php if($trade->trader) echo zget($customerList, $trade->trader, ' ');?></td>
              <td class='text-left' title="<?php echo zget($productList, $trade->product, ' ');?>"><?php echo zget($productList, $trade->product, ' ');?></td>
              <td class='text-left'><?php echo zget($categories, $trade->category, ' ');?></td>
              <td class='text-left' title='<?php foreach(explode(',', $trade->handlers) as $handler) echo zget($users, $handler) . ' ';?>'><?php foreach(explode(',', $trade->handlers) as $handler) echo zget($users, $handler) . ' ';?></td>
              <td class='text-right'>
                <?php echo zget($lang->currencySymbols, $config->setting->mainCurrency, '') . formatMoney($trade->money * $trade->exchangeRate);?>
              </td>
              <?php if($type == 'commissioned'):?>
              <td class='text-right'>
                <?php echo formatMoney($trade->commissionedAmount);?>
              </td>
              <?php endif;?>
              <td>
                <?php if($type == 'commissioned') commonModel::printLink('commission', 'create', "type={$type}&tradeID={$trade->id}", $lang->commission->commissioned, "class='commissioned'");?>
                <?php if($type == 'uncommission') commonModel::printLink('commission', 'create', "type={$type}&tradeID={$trade->id}", $lang->commission->commission);?>
                <?php if($type != 'commissioned') commonModel::printLink('commission', 'switchIgnore', "type={$type}&tradeID={$trade->id}&date=$currentYear$currentMonth{$param}", $label, "class='jsoner'");?> 
              </td>
            </tr>
            <?php endforeach;?>
          </tbody>
        </table>
        <div class='table-footer'>
          <?php if($trades && $type != 'commissioned'):?>
          <div class='pull-left'>
            <?php echo html::selectButton();?>
            <?php echo html::submitButton($label);?>
          </div>
          <?php endif;?>
          <?php echo $pager->get();?>
        </div>
      </form>
    </div>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
