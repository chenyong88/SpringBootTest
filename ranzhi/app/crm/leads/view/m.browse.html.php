<?php
/**
 * The browse mobile view file of leads module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     leads
 * @version     $Id: index.html.php 3830 2016-05-18 09:34:17Z liugang $
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
    <a class='btn primary' data-display='modal' data-placement='bottom' data-remote='<?php echo $this->createLink('leads', 'create') ?>'>
      <i class='icon icon-plus'></i> &nbsp;&nbsp;<?php echo $lang->contact->create;?>
    </a>
  </nav>
</div>

<section id='page' class='section list-with-pager'>
  <?php $refreshUrl = $this->createLink('contact', 'browse', "mode={$mode}&status={$status}&origin={$origin}&orderBy=$orderBy&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}");?>
  <div class='box' data-page='<?php echo $pager->pageID;?>' data-refresh-url='<?php echo $refreshUrl ?>'>
    <table class='table bordered no-margin'>
      <thead>
        <tr>
          <th class='w-80px'><?php echo $lang->contact->realname;?></th>
          <th><?php echo $lang->contact->customer;?></th>
          <th class='w-120px text-center'><?php echo $lang->contact->phone;?></th>
        </tr>
      </thead>
      <?php foreach($contacts as $contact):?>
      <tr class='text-center' data-url='<?php echo inlink('view', "contactID={$contact->id}&status={$contact->status}")?>' data-id='<?php echo $contact->id?>'>
        <td class='text-left'><?php echo $contact->realname;?></td>
        <td class='text-left'><?php echo $contact->company;?></td>
        <?php $phone = $contact->phone ? $contact->phone : $contact->mobile;?>
        <td class='text-left'><?php if($phone) echo html::a("tel:$phone", $phone);?></td>
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
  $vars = "mode={$mode}&status={$status}&origin={$origin}&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}";
  $orders = array('id', 'realname', 'nextDate', 'company', 'gender', 'phone', 'email', 'qq', 'origin');
  foreach ($orders as $order)
  {
      commonModel::printOrderLink($order, $orderBy, $vars, '<i class="icon icon-sort-indicator"></i>' . $lang->contact->{$order});
  }
  ?>
</div>

<script>
$('#menu > a').removeClass('active').filter('[href*="<?php echo $mode ?>"]').addClass('active');
</script>
<?php include "../../common/view/m.footer.html.php"; ?>
