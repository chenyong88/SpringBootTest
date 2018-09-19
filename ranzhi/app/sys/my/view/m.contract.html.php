<?php
/**
 * The contract browse mobile view file of my module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     my 
 * @version     $Id: index.html.php 3830 2016-05-18 09:34:17Z liugang $
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}

$moduleMenu = $this->my->createModuleMenu($this->methodName);
include "../../common/view/m.header.html.php";
?>

<div class='heading'>
  <div class='title'>
    <a id='sortTrigger' class='text-right sort-trigger' data-display data-target='#sortPanel' data-backdrop='true'><i class='icon icon-sort'></i>&nbsp;<span class='sort-name'><?php echo $lang->sort ?></span></a>
  </div>
  <nav class='nav'>
    <a class='btn primary' data-display='modal' data-placement='bottom' data-remote='<?php echo $this->createLink('crm.contract', 'create') ?>'>
      <i class='icon icon-plus'></i> &nbsp;&nbsp;<?php echo $lang->contract->create;?>
    </a>
  </nav>
</div>

<section id='page' class='section list-with-pager'>
  <?php $refreshUrl = $this->createLink('crm.contract', 'browse', "type={$type}&orderBy=$orderBy&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}");?>
  <div class='box' data-page='<?php echo $pager->pageID ?>' data-refresh-url='<?php echo $refreshUrl ?>'>
    <table class='table bordered no-margin'>
      <thead>
        <tr>
          <th class='w-50px'><?php echo $lang->contract->id;?></th>
          <th><?php echo $lang->contract->name;?></th>
          <th class='w-80px'><?php echo $lang->contract->amount;?></th>
          <th class='w-70px text-center'><?php echo $lang->contract->status;?></th>
        </tr>
      </thead>
      <?php foreach($contracts as $contract):?>
      <tr class='text-center' data-url='<?php echo $this->createLink('crm.contract', 'view', "contractID={$contract->id}");?>' data-id='<?php echo $contract->id;?>'>
        <td><?php echo $contract->id;?></td>
        <td class='text-left'><?php echo $contract->name;?></td>
        <td><?php echo zget($currencySign, $contract->currency, '') . formatMoney($contract->amount);?></td>
        <td><span class='label status-<?php echo $contract->status;?>'><?php echo zget($lang->contract->statusList, $contract->status);?></span></td>
      </tr>
      <?php endforeach;?>
      <?php if(!empty($totalAmount)):?>
      <tfoot>
        <tr>
          <td colspan='4' class='text-red small'>
            <?php printf($lang->contract->totalAmount, implode('，', $totalAmount['contract']), implode('，', $totalAmount['return']), implode('，', $totalAmount['currentMonth']));?>
          </td>
        </tr>
      </tfoot>
      <?php endif;?>
    </table>
  </div>
  <nav class='nav justify pager'>
    <?php $pager->show($align = 'justify');?>
  </nav>
</section>

<div class='list sort-panel hidden affix enter-from-bottom layer' id='sortPanel'>
  <?php
  $vars = "type={$type}&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}";
  $orders = array('id', 'code', 'name', 'amount', 'createdDate', 'begin', 'end', 'return', 'delivery', 'status');
  foreach ($orders as $order)
  {
      commonModel::printOrderLink($order, $orderBy, $vars, '<i class="icon icon-sort-indicator"></i>' . $lang->contract->{$order});
  }
  ?>
</div>

<script>
$('#menu > a').removeClass('active').filter('[href*="<?php echo $type ?>"]').addClass('active');
</script>
<?php include "../../common/view/m.footer.html.php"; ?>

