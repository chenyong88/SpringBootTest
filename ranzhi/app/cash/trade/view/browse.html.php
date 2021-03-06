<?php 
/**
 * The browse view file of trade module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     trade 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php include '../../../sys/common/view/treeview.html.php';?>
<?php js::set('modeType', $mode);?>
<?php js::set('mode', $bysearch);?>
<?php js::set('date', $date);?>
<?php js::set('null', $lang->search->null);?>
<?php js::set('currentYear', $currentYear);?>
<?php js::set('treeview', !empty($_COOKIE['treeview']) ? $_COOKIE['treeview'] : '');?>
<?php js::set('currencyList', $currencyList);?>
<?php js::set('unit', $lang->currencyTip['w']);?>
<?php js::set('semicolon', $lang->semicolon);?>
<li id='bysearchTab'><?php echo html::a('#', "<i class='icon-search icon'></i>" . $lang->search->common)?></li>
<div id='menuActions'>
  <?php commonModel::printLink('trade', 'import', '', "<i class='icon-download-alt'> </i>" . $lang->trade->import, "class='btn btn-primary' data-toggle='modal'")?>
  <?php if(commonModel::hasPriv('trade', 'export')):?>
  <div class='btn-group'>
    <button data-toggle='dropdown' class='btn btn-primary dropdown-toggle' type='button'><?php echo "<i class='icon-upload-alt'> </i>" . $lang->export;?> <span class='caret'></span></button>
    <ul id='exportActionMenu' class='dropdown-menu pull-right'>
      <li><?php commonModel::printLink('trade', 'export', "mode=all&orderBy={$orderBy}", $lang->exportAll, "class='iframe' data-width='700'");?></li>
      <li><?php commonModel::printLink('trade', 'export', "mode=thisPage&orderBy={$orderBy}", $lang->exportThisPage, "class='iframe' data-width='700'");?></li>
    </ul>
  </div>
  <?php endif;?>
  <?php if($mode == 'all'):?>
  <div class='btn-group'>
    <button data-toggle='dropdown' class='btn btn-primary dropdown-toggle' type='button'><?php echo  "<i class='icon-plus'> </i>" . $lang->trade->create;?> <span class='caret'></span></button>
    <ul id='createActionMenu' class='dropdown-menu pull-right'>
      <li><?php commonModel::printLink('trade', 'create',   'type=in',     $lang->trade->createIn)?></li>
      <li><?php commonModel::printLink('trade', 'create',   'type=out',    $lang->trade->createOut)?></li>
      <li><?php commonModel::printLink('trade', 'transfer', '',            $lang->trade->transfer)?></li>
      <li><?php commonModel::printLink('trade', 'invest',   'type=invest', $lang->trade->invest)?></li>
      <li><?php commonModel::printLink('trade', 'loan',     'type=loan',   $lang->trade->loan)?></li>
    </ul>
  </div>
  <?php endif;?>
  <?php if($mode == 'in')       commonModel::printLink('trade', 'create',   'type=in',     "<i class='icon-plus'> </i>" . $lang->trade->createIn,  "class='btn btn-primary'");?>
  <?php if($mode == 'out')      commonModel::printLink('trade', 'create',   'type=out',    "<i class='icon-plus'> </i>" . $lang->trade->createOut, "class='btn btn-primary'");?>
  <?php if($mode == 'transfer') commonModel::printLink('trade', 'transfer', '',            "<i class='icon-plus'> </i>" . $lang->trade->transfer,  "class='btn btn-primary'");?>
  <?php if($mode == 'invest')   commonModel::printLink('trade', 'invest',   'type=invest', "<i class='icon-plus'> </i>" . $lang->trade->invest,    "class='btn btn-primary'");?>
  <?php if($mode == 'invest')   commonModel::printLink('trade', 'invest',   'type=redeem', "<i class='icon-plus'> </i>" . $lang->trade->redeem,    "class='btn btn-primary'");?>
  <?php if($mode == 'loan')     commonModel::printLink('trade', 'loan',     'type=loan',   "<i class='icon-plus'> </i>" . $lang->trade->loan,      "class='btn btn-primary'");?>
  <?php if($mode == 'loan')     commonModel::printLink('trade', 'loan',     'type=repay',  "<i class='icon-plus'> </i>" . $lang->trade->repay,     "class='btn btn-primary'");?>
  <?php if($mode == 'all' || $mode == 'in' || $mode == 'out') commonModel::printLink('trade', 'batchcreate', '', "<i class='icon-sitemap'> </i>" . $lang->trade->batchCreate, "class='btn btn-primary'")?>
</div>
<div class='panel'>
  <?php $batchEdit = ($mode == 'in' or $mode == 'out') && commonModel::hasPriv('trade', 'batchEdit');?>
  <?php if($batchEdit):?>
  <form method='post' action='<?php echo inlink('batchEdit', "step=form&mode=$mode")?>'>
  <?php endif;?>
    <?php $class = ($mode != 'invest' && $mode != 'loan') ? 'table-bordered' : '';?>
    <table class='table table-hover table-striped tablesorter table-data table-fixed <?php echo $class;?>' id='tradeList'>
      <thead>
        <tr class='text-center'>
          <?php $vars = "mode={$mode}" . ($bysearch ? '_bysearch' : '') . "&date={$date}&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}";?>
          <th class='w-100px text-right'><?php commonModel::printOrderLink('date', $orderBy, $vars, $lang->trade->date);?></th>
          <th class='w-100px'><?php commonModel::printOrderLink('depositor', $orderBy, $vars, $lang->trade->depositor);?></th>
          <th class='w-60px'><?php commonModel::printOrderLink('type', $orderBy, $vars, $lang->trade->type);?></th>
          <th class='w-140px'><?php commonModel::printOrderLink('trader', $orderBy, $vars, $lang->trade->trader);?></th>
          <th class='w-80px text-right'><?php commonModel::printOrderLink('money', $orderBy, $vars, $lang->trade->money);?></th>
          <th class='w-80px'><?php commonModel::printOrderLink('dept', $orderBy, $vars, $lang->trade->dept);?></th>
          <th class='w-80px'><?php commonModel::printOrderLink('handlers', $orderBy, $vars, $lang->trade->handlers);?></th>
          <?php if(strpos(',in,all,', ",$mode,") !== false):?>
          <th class='w-160px'><?php commonModel::printOrderLink('product', $orderBy, $vars,  $lang->trade->product . $lang->slash . $lang->trade->category);?></th>
          <?php else:?>
          <th class='w-100px'><?php commonModel::printOrderLink('category', $orderBy, $vars, $lang->trade->category);?></th>
          <?php endif;?>
          <?php if($mode == 'invest' or $mode == 'loan'):?>
          <th class='w-60px'><?php echo $lang->trade->status;?></th>
          <th class='w-80px'><?php echo $lang->trade->progressList[$mode];?></th>
          <th class='w-80px'><?php echo $lang->trade->deadline;?></th>
          <?php endif;?>
          <?php if($mode == 'invest'):?>
          <th class='w-80px'><?php echo $lang->trade->rate;?></th>
          <?php endif;?>
          <?php if($mode == 'loan'):?>
          <th class='w-80px'><?php echo $lang->trade->loanrate;?></th>
          <?php endif;?>
          <th class='text-left visible-lg'><?php echo $lang->trade->desc;?></th>
          <th class='w-80px text-center'><?php commonModel::printOrderLink('createdDate', $orderBy, $vars, $lang->trade->createdDate);?></th>
          <?php $class = $this->app->clientLang == 'en' ? 'w-160px' : 'w-130px';?>
          <th class='<?php echo $class;?>'><?php echo $lang->actions;?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($trades as $trade):?>
        <tr class='text-center' data-money='<?php echo $trade->money;?>' data-currency='<?php echo $trade->currency;?>'>
          <td class='text-right <?php if(!empty($trade->children)) echo 'hasChildren';?>'>
            <?php if($batchEdit):?>
            <label class='checkbox-inline'><input type='checkbox' name='tradeIDList[]' value='<?php echo $trade->id;?>'/> <?php echo formatTime($trade->date, DT_DATE1);?></label>
            <?php else:?>
            <?php if(!empty($trade->children)) echo "<span class='trade-toggle'><i class='icon icon-minus'> </i></span>"?>
            <?php echo formatTime($trade->date, DT_DATE1);?>
            <?php endif;?>
          </td>
          <?php 
            $depositor = zget($depositorList, $trade->depositor, '');
            $trader    = zget($customerList, $trade->trader, '');
            $dept      = zget($deptList, $trade->dept, '');
            $product   = zget($productList, $trade->product, '');
            $category  = zget($categories, $trade->category, '');
            $product   = $product ? $product . $lang->slash . $category : $category;
            $handlers  = '';
            foreach(explode(',', $trade->handlers) as $handler) $handlers .= zget($users, $handler) . ' ';
          ?>
          <td class='text-left' title='<?php echo $depositor;?>'><?php echo $depositor;?></td>
          <td><?php echo $lang->trade->typeList[$trade->type];?></td>
          <td class='text-left' title='<?php echo $trader;?>'><?php echo $trader;?></td>
          <td class='text-right'><?php echo zget($currencySign, $trade->currency) . formatMoney($trade->money);?></td>
          <td title='<?php echo $dept;?>'><?php echo $dept;?></td>
          <td class='text-left' title='<?php echo $handlers;?>'><?php echo $handlers;?></td>
          <?php if(strpos(',in,all,', ",$mode,") !== false):?>
          <td class='text-left' title='<?php echo $product;?>'><?php echo $product;?></td>
          <?php else:?>
          <td class='text-nowrap text-ellipsis text-left' title='<?php echo $category;?>'><?php echo $category;?></td>
          <?php endif;?>
          <?php if($mode == 'invest' or $mode == 'loan'):?>
          <td><?php echo zget($lang->trade->statusList, $trade->status);?></td>
          <td>
            <div class='progress' title='<?php echo $trade->progress;?>'>
              <div class='progress-bar' role='progressbar' aria-valuenow='<?php echo $trade->progress;?>' aria-valuemin='0' aria-valuemax='100' style='width: <?php echo $trade->progress;?>'></div>
            </div>
          </td>
          <td><?php echo formatTime($trade->deadline, DT_DATE1);?></td>
          <?php endif;?>
          <?php if($mode == 'invest'):?>
          <td><?php if($trade->return) echo $trade->return;?></td>
          <?php endif;?>
          <?php if($mode == 'loan'):?>
          <td><?php if($trade->interest) echo $trade->interest;?></td>
          <?php endif;?>
          <td class='text-left visible-lg'><div title="<?php echo $trade->desc;?>" class='w-200px text-ellipsis'><?php echo $trade->desc;?><div></td>
          <td class='text-center'><?php echo formatTime($trade->createdDate, DT_DATE1);?></td>
          <td>
            <?php commonModel::printLink('trade', 'view', "tradeID={$trade->id}&mode={$mode}", $lang->view);?>
            <?php commonModel::printLink('trade', 'edit', "tradeID={$trade->id}&mode={$mode}", $lang->edit);?>
            <?php commonModel::printLink('trade', 'detail', "tradeID={$trade->id}&mode={$mode}", $lang->trade->detail, "data-toggle='modal'");?>
            <?php commonModel::printLink('trade', 'delete', "tradeID={$trade->id}&mode={$mode}", $lang->delete, "class='deleter'");?>
          </td>
        </tr>
        <?php if(!empty($trade->children)):?>
        <tr class='tr-children'>
          <td colspan='15'>
            <table class='table table-hover table-striped table-data table-fixed'>
              <?php foreach($trade->children as $trade):?>
              <tr class='text-center'>
                <?php 
                  $depositor = zget($depositorList, $trade->depositor, '');
                  $trader    = zget($customerList, $trade->trader, '');
                  $dept      = zget($deptList, $trade->dept, '');
                  $category  = zget($categories, $trade->category, '');
                  $handlers  = '';
                  foreach(explode(',', $trade->handlers) as $handler) $handlers .= zget($users, $handler) . ' ';
                ?>
                <td class='w-100px text-right'><?php echo formatTime($trade->date, DT_DATE1);?></td>
                <td class='w-100px text-left'><?php echo $depositor;?></td>
                <td class='w-60px'><?php echo $lang->trade->typeList[$trade->type];?></td>
                <td class='w-140px text-left' title="<?php echo $trader;?>"><?php echo $trader;?></td>
                <td class='w-80px text-right'><?php echo zget($currencySign, $trade->currency) . formatMoney($trade->money);?></td>
                <td class='w-80px' title='<?php echo $dept;?>'><?php echo $dept;?></td>
                <td class='w-80px text-left' title='<?php echo $handlers;?>'><?php echo $handlers;?></td>
                <td class='w-100px text-nowrap text-ellipsis text-left' title='<?php echo $category;?>'><?php echo $category;?></td>
                <td colspan='4' class='w-300px'></td>
                <td class='text-left visible-lg'><div title="<?php echo $trade->desc;?>" class='w-200px text-ellipsis'><?php echo $trade->desc;?><div></td>
                <td class='w-80px text-center'><?php echo formatTime($trade->createdDate, DT_DATE1);?></td>
                <?php $class = $this->app->clientLang == 'en' ? 'w-160px' : 'w-130px';?>
                <td class='<?php echo $class;?>'>
                  <?php commonModel::printLink('trade', 'view', "tradeID={$trade->id}&mode={$mode}", $lang->view);?>
                  <?php commonModel::printLink('trade', 'edit', "tradeID={$trade->id}&mode={$mode}", $lang->edit);?>
                  <?php commonModel::printLink('trade', 'detail', "tradeID={$trade->id}&mode={$mode}", $lang->trade->detail, "data-toggle='modal'");?>
                  <?php commonModel::printLink('trade', 'delete', "tradeID={$trade->id}&mode={$mode}", $lang->delete, "class='deleter'");?>
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
    <div class='table-footer'>
      <?php if($trades):?>
      <div class='pull-left'>
        <?php if($batchEdit) echo html::selectButton() . html::submitButton($lang->edit);?>
        <span class='text-danger'>
          <?php $this->trade->countMoney($trades, $mode);?>
          <span class='selectedItem hide'>
            <?php echo $lang->trade->selectItem;?><span class='selectedMoney'></span>
          </span>
        </span>
      </div>
      <?php endif;?>
      <?php echo $pager->get();?>
    </div>
  </form>
</div>
<?php include '../../common/view/footer.html.php';?>
