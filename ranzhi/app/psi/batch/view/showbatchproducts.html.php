<?php
/**
 * The show batch products view of batch module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     batch 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<table class='table table-condensed table-striped table-hover'>
  <tr class='text-center'>
    <th><?php echo $lang->batch->trader->common;?></th>
    <th><?php echo $lang->batch->type;?></th>
    <th><?php echo $lang->batch->expressedBy;?></th>
    <th><?php echo $lang->batch->expressedDate;?></th>
    <th><?php echo $lang->batch->amount;?></th>
    <th></th>
  </tr>
  <?php foreach($batchProducts as $batchProduct):?>
  <tr class='text-center'>
    <td><?php echo zget($companies, $batchProduct->trader, ' ');?></td>
    <td><?php echo $lang->batch->{$batchProduct->type == 'out' ? 'deliver' : 'receive'}->common;?></td>
    <td><?php echo zget($users, $batchProduct->expressedBy, ' ');?></td>
    <td><?php echo $batchProduct->expressedDate;?></td>
    <td><?php echo $batchProduct->amount;?></td>
    <td><?php if(!commonModel::printLink('batch', 'detail', "orderID={$batchProduct->order}&status=all", $lang->detail, "data-toggle='modal'")) echo html::a('#', $lang->detail, "disabled='disabled'");?></td>  
  </tr>
  <?php endforeach;?>
  <tfoot>
    <tr>
      <td colspan='6'><?php $pager->show();?></td>
    </tr>
  </tfoot>
</table>  
