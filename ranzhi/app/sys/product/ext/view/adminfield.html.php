<?php 
/**
 * The admin field view file of product module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     product 
 * @version     $Id $
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../common/view/header.html.php';?>
<?php include 'bread.html.php';?>
<div id='menuActions'>
  <?php commonModel::printLink('product', 'createField', "productID={$productID}", '<i class="icon-plus"></i> ' . $lang->product->field->create, 'class="btn btn-primary"');?>
</div>
<div class='panel'>
  <table class='table table-hover table-striped tablesorter'>
    <thead>
      <tr class='text-center'>
        <th><?php echo $lang->product->field->field;?></th>
        <th><?php echo $lang->product->field->name;?></th>
        <th class='w-160px'><?php echo $lang->product->field->control;?></th>
        <th ><?php echo $lang->product->field->options;?></th>
        <th ><?php echo $lang->product->field->default;?></th>
        <th class='w-100px'><?php echo $lang->actions;?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($fields as $field):?>
      <tr class='text-center'>
        <td class='text-left'><?php echo $field->field;?></td>
        <td class='text-left'><?php echo $field->name;?></td>
        <td><?php echo $lang->product->field->controlTypeList[$field->control];?></td>
        <td>
          <?php
          $delimiter = '';
          foreach($field->options as $value => $text)
          {
              echo $delimiter . $value . '=>' . $text;
              $delimiter = ', ';
          }
          ?>
        </td>
        <td><?php echo $field->default;?></td>
        <td>
          <?php
          commonModel::printLink('product', 'editField',   "fieldID={$field->id}", $lang->edit);
          commonModel::printLink('product', 'deleteField', "fieldID={$field->id}", $lang->delete, "class='deleter'");
          ?>
        </td>
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>
</div>
<div class='page-actions'><?php commonModel::printLink('product', 'browse', '', $lang->goback, "class='btn btn-default'");?></div>
<?php include '../../../common/view/footer.html.php';?>
