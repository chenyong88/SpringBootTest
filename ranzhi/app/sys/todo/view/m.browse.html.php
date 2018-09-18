<?php
/**
 * The browse mobile view file of todo module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     todo 
 * @version     $Id: index.html.php 3830 2016-05-18 09:34:17Z liugang $
 * @link        http://www.ranzhico.com
 */

include "../../common/view/m.header.html.php";
?>

<div class='heading'>
  <div class='title'>
    <a id='sortTrigger' class='text-right sort-trigger' data-display data-target='#sortPanel' data-backdrop='true'><i class='icon icon-sort'></i>&nbsp;<span class='sort-name'><?php echo $lang->sort ?></span></a>
  </div>
  <nav class='nav'>
    <a data-display='modal' data-placement='bottom' data-remote='<?php echo $this->createLink('todo', 'create') ?>' class='btn primary'><i class='icon icon-plus'></i>&nbsp;&nbsp; <?php echo $lang->todo->create;?></a>
  </nav>
</div>

<section id='page' class='section list-with-pager'>
  <div class='box' data-page='<?php echo $pager->pageID ?>' data-refresh-url='<?php echo $this->createLink('todo', 'browse', "mode=$mode&orderBy=$orderBy&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}"); ?>'>
    <table class='table bordered'>
      <thead>
        <tr>
          <th><?php echo $lang->todo->name;?></th>
          <th class='w-70px'><?php echo $lang->todo->assignedTo;?></th>
          <th class='w-80px'><?php echo $lang->todo->status;?></th>
        </tr>
      </thead>
      <?php foreach($todos as $todo):?>
      <tr class='' data-url='<?php echo $this->createLink('todo', 'view', "id=$todo->id");?>' data-id='<?php echo $todo->id;?>'>
        <td><?php echo $todo->name;?></td>
        <td><?php echo zget($users, $todo->assignedTo);?></td>
        <td><span class='label status-<?php echo $todo->status;?>'><?php echo zget($lang->todo->statusList, $todo->status);?></span></td>
      </tr>
      <?php endforeach;?>
    </table>
  </div>

  <nav class='nav justify pager'>
    <?php $pager->show($align = 'justify');?>
  </nav>
</section>

<div class='list sort-panel enter-from-bottom hidden affix layer' id='sortPanel'>
  <?php
  $vars = "mode=$mode&orderBy=%s&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}";
  $orders = array('id', 'date', 'type', 'pri', 'name', 'assignedTo', 'begin', 'end', 'status');
  foreach ($orders as $order)
  {
      commonModel::printOrderLink($order, $orderBy, $vars, '<i class="icon icon-sort-indicator"></i>' . $lang->todo->{$order});
  }
  ?>
</div>

<script>
$('#menu > a').removeClass('active').filter('[href*="<?php echo $mode ?>"]').addClass('active');
</script>
<?php include "../../common/view/m.footer.html.php"; ?>
