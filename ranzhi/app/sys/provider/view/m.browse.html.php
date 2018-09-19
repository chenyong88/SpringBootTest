<?php
/**
 * The browse mobile view file of provider module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     provider 
 * @version     $Id
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
    <a data-display='modal' data-placement='bottom' data-remote='<?php echo $this->createLink('provider', 'create') ?>' class='btn primary shadow-2'>
      <i class='icon icon-plus'></i> &nbsp;&nbsp;<?php echo $lang->provider->create;?>
    </a>
  </nav>
</div>

<section id='page' class='section list-with-pager'>
  <?php $refreshUrl = $this->createLink('provider', 'browse', "mode={$mode}&param=&orderBy=$orderBy&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}");?>
  <div class='box' data-page='<?php echo $pager->pageID ?>' data-refresh-url='<?php echo $refreshUrl ?>'>
    <table class='table bordered no-margin'>
      <thead>
        <tr>
          <th class='w-50px'><?php echo $lang->provider->id;?></th>
          <th><?php echo $lang->provider->name;?></th>
          <th class='w-100px'><?php echo $lang->provider->size;?></th>
          <th class='w-70px text-center'><?php echo $lang->provider->type;?></th>
        </tr>
      </thead>
      <?php foreach($providers as $provider):?>
      <tr class='text-center' data-url='<?php echo $this->createLink('provider', 'view', "providerID={$provider->id}")?>' data-id='<?php echo $provider->id;?>'>
        <td><?php echo $provider->id;?></td>
        <td class='text-left'><?php echo $provider->name;?></td>
        <td><?php echo zget($lang->provider->sizeList, $provider->size);?></td>
        <td><?php echo zget($lang->provider->typeList, $provider->type);?></td>
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
  $vars = "mode={$mode}&param=&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}";
  $orders = array('id', 'name', 'size', 'type', 'area', 'industry', 'createdDate');
  foreach ($orders as $order)
  {
      commonModel::printOrderLink($order, $orderBy, $vars, '<i class="icon icon-sort-indicator"></i>' . $lang->provider->{$order});
  }
  ?>
</div>
<?php include "../../common/view/m.footer.html.php"; ?>
