<?php
/**
 * The share view file of trade module of RanZhi.
 *
 * @copyright   Copyright 2009-2017 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     trade 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../../sys/common/view/header.modal.html.php';?>
<?php include '../../../../sys/common/view/chosen.html.php';?>
<?php js::set('money', $trade->money * $trade->exchangeRate);?>
<div class='panel'>
  <table class='table table-condensed table-borderless'>
    <thead>
      <tr class='text-center'>
        <th><?php echo $lang->trade->product;?></th>
        <th><?php echo $lang->trade->category;?></th>
        <th><?php echo $lang->trade->money;?></th>
        <?php if($trade->type == 'in'):?>
        <th><?php echo $lang->trade->trader;?></th>
        <?php endif;?>
        <th><?php echo $lang->trade->dept;?></th>
        <th><?php echo $lang->trade->handlers;?></th>
      </tr>
    </thead>
    <tr class='text-center'>
      <td><?php echo zget($products, $trade->product, '');?></td>
      <td><?php echo zget($categories, $trade->category, '');?></td>
      <td><?php echo zget($lang->currencySymbols, $config->setting->mainCurrency, '') . formatMoney($trade->money * $trade->exchangeRate);?></td>
      <?php if($trade->type == 'in'):?>
      <td><?php echo zget($customers, $trade->trader, '');?></td>
      <?php endif;?>
      <td><?php echo zget($depts, $trade->dept, '');?></td>
      <td><?php foreach(explode(',', trim($trade->handlers, ',')) as $user) echo zget($users, $user, '') . ' ';?></td>
    </tr>
  </table>
</div>
<div class='panel'>
  <form id='ajaxForm' method='post' action='<?php echo inlink('share', "tradeID=$trade->id");?>'>
    <?php if($trade->type == 'in')  include './shareincome.html.php';?>
    <?php if($trade->type == 'out') include './shareexpense.html.php';?>
  </form>
</div>
<?php include '../../../../sys/common/view/footer.modal.html.php';?>
