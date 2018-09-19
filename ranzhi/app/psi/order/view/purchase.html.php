<?php
/**
 * The purchase view file of order module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     order
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../common/view/header.html.php';?>
<div class='panel w-p60'>
  <form method='post' id='ajaxForm'>
    <table class='table table-condensed table-hover tablesorter'>
      <thead>
        <tr class='text-middle'>
          <?php $vars = 'orderBy=%s';?>
          <th><?php commonModel::printOrderLink('id', $orderBy, $vars, $lang->product->name);?></th>
          <th class='w-200px'><?php echo $lang->product->model;?></th>
          <th class='w-120px'><?php echo $lang->product->unit;?></th>
          <th class='w-100px'><?php commonModel::printOrderLink('id', $orderBy, $vars, $lang->order->purchaseAmount);?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($products as $product):?>
        <tr class='text-middle'>
          <td><?php echo html::checkbox('product', array($product->product => $product->name), '', "class='checkbox-choose''");?></td>
          <td><?php echo $product->model;?></td>
          <td><?php echo $product->unit;?></td>
          <td class='text-center'><?php echo $product->amount;?></td>
        </tr>
        <?php endforeach;?>
        <tr>
          <td colspan='6'>
            <?php if($products):?>
            <?php echo html::selectButton();?>
            <?php echo html::submitButton($lang->order->createBuyOrder);?>
            <?php echo html::hidden('notSelected');?>
            <?php endif;?>
          </td>
        </tr>
      </tbody>
    </table>
  </form>
</div>
<?php include '../../common/view/footer.html.php';?>
