<?php
/**
 * The browse mobile view file of feedback module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     feedback 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}
include "../../common/view/m.header.html.php";
?>

<div class='heading'>
  <div class='title'>
    <a id='sortTrigger' class='text-right sort-trigger' data-display data-target='#sortPanel' data-backdrop='true'><i class='icon icon-sort'></i>&nbsp;<span class='sort-name'><?php echo $lang->sort ?></span></a>
  </div>
  <nav class='nav'>
    <a class='btn primary' data-display='modal' data-placement='bottom' data-remote='<?php echo $this->createLink('feedback', 'create') ?>'>
      <i class='icon icon-plus'></i> &nbsp;&nbsp;<?php echo $lang->feedback->create;?>
    </a>
  </nav>
</div>

<section id='page' class='section list-with-pager'>
  <?php $refreshUrl = $this->createLink('feedback', 'browse', "type={$type}&orderBy=$orderBy&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}");?>
  <div class='box' data-page='<?php echo $pager->pageID ?>' data-refresh-url='<?php echo $refreshUrl ?>'>
    <table class='table bordered no-margin'>
      <thead>
        <tr>
          <th class='w-120px'><?php echo $lang->issue->customer;?></th>
          <th><?php echo $lang->issue->title;?></th>
          <th class='w-90px text-center'><?php echo $lang->issue->status;?></th>
        </tr>
      </thead>
      <?php foreach($issues as $issue):?>
      <tr class='text-center' data-url='<?php echo commonModel::hasPriv('feedback', 'view') ? $this->createLink('feedback', 'view', "issueID={$issue->id}") : '';?>' data-id='<?php echo $issue->id;?>'>
        <td class='text-left'><?php echo zget($customers, $issue->customer);?></td>
        <td><?php echo $issue->title;?></td>
        <td><span class='label status-<?php echo $issue->status;?>'><?php echo zget($lang->issue->statusList, $issue->status);?></span></td>
      </tr>
      <?php endforeach;?>
    </table>
  </div>
  <nav class='nav justify pager'>
    <?php $pager->show($align = 'justify');?>
  </nav>
</section>

<div class='list sort-panel hidden affix enter-from-bottom layer' id='sortPanel'>
  <?php
  $vars = "orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}";
  $orders = array('id', 'pri', 'title', 'product', 'customer', 'contact', 'addedDate', 'assignedTo', 'status');
  foreach ($orders as $order)
  {
      commonModel::printOrderLink($order, $orderBy, $vars, '<i class="icon icon-sort-indicator"></i>' . $lang->feedback->{$order});
  }
  ?>
</div>

<?php include "../../common/view/m.footer.html.php"; ?>
