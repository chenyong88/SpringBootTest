<?php
/**
 * The contract block mobile view file of block module of RanZhi.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php $currencySign = $this->loadModel('common', 'sys')->getCurrencySign(); ?>
<table class='table bordered'>
  <thead>
    <tr>
      <th><?php echo $lang->contract->name;?></th>
      <th class='text-center w-80px'><?php echo $lang->contract->amount;?></th>
      <th class='text-center w-70px'><?php echo $lang->contract->status;?></th>
    </tr>
  </thead>
  <?php foreach($contracts as $contract):?>
  <tr class= 'text-center' data-id='<?php echo $contract->id ?>' data-url='<?php echo $this->createLink('crm.contract', 'view', "contractID={$contract->id}")?>'>
    <td class='text-left'><?php echo $contract->name;?></td>
    <td><?php echo zget($currencySign, $contract->currency, '') . formatMoney($contract->amount);?></td>
    <td><span class='label status-<?php echo $contract->status;?>'><?php echo zget($lang->contract->statusList, $contract->status);?></span></td>
  </tr>
  <?php endforeach;?>
</table>
