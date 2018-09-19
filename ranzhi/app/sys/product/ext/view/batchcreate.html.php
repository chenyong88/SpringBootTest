<?php
/**
 * The batch create view file of product module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     product 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../common/view/header.html.php';?>
<?php include '../../../common/view/chosen.html.php';?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><i class='icon-sitemap'></i> <?php echo $this->lang->product->batchCreate . $lang->product->common;?></strong>
  </div>
  <form method='post' id='ajaxForm'>
    <table class='table table-condensed table-borderless'>
      <tr class='text-center'>
        <th class='w-160px required'><?php echo $this->lang->product->category;?></th>
        <th class='w-160px required'><?php echo $this->lang->product->name;?></th>
        <th class='w-160px required'><?php echo $this->lang->product->code;?></th>
        <th class='w-160px'><?php echo $this->lang->product->model;?></th>
        <th class='w-80px'><?php echo $this->lang->product->unit;?></th>
        <th class='w-100px'><?php echo $this->lang->product->amount;?></th>
        <th class='w-80px'><?php echo $this->lang->product->type;?></th>
      </tr>
      <?php $i = 1;?>
      <tr>
        <td><?php echo html::select("category[$i]", $categories, '', "id='category{$i}' class='newRows chosen' data-placeholder='{$this->lang->product->placeholder->batchCreate->category}'");?></td>
        <td><?php echo html::input("name[$i]", '', "id='name{$i}' class='newRows form-control' placeholder='{$this->lang->product->placeholder->batchCreate->name}'");?></td>
        <td><?php echo html::input("code[$i]", '', "id='code{$i}' class='newRows form-control' placeholder='{$this->lang->product->placeholder->batchCreate->code}'");?></td>
        <td><?php echo html::select("model[$i]", $models, '', "id='model{$i}' class='newRows chosen'");?></td>
        <td><?php echo html::select("unit[$i]", $units, '', "id='unit{$i}' class='newRows chosen'");?></td>
        <td><?php echo html::input("amount[$i]", '', "id='amount{$i}' class='newRows form-control'");?></td>
        <td><?php echo html::select("type[$i]", $lang->product->typeList, '', "id='type{$i}' class='newRows chosen'");?></td>
      </tr>
      <?php for($i++; $i <= $config->product->batchCreateCount; $i++):?>
      <tr>
        <td><?php echo html::select("category[$i]", $categories, 'ditto', "id='category{$i}' class='newRows chosen'");?></td>
        <td><?php echo html::input("name[$i]", '', "id='name{$i}' class='newRows form-control'");?></td>
        <td><?php echo html::input("code[$i]", '', "id='code{$i}' class='newRows form-control'");?></td>
        <td><?php echo html::select("model[$i]", $models, 'ditto', "id='model{$i}' class='newRows chosen'");?></td>
        <td><?php echo html::select("unit[$i]", $units, 'ditto', "id='unit{$i}' class='newRows chosen'");?></td>
        <td><?php echo html::input("amount[$i]", '', "id='amount{$i}' class='newRows form-control'");?></td>
        <td><?php echo html::select("type[$i]", $lang->product->typeList + array('ditto' => $lang->ditto), 'ditto', "id='type{$i}' class='newRows chosen'");?></td>
      </tr>
      <?php endfor;?>
    </table>
    <div class='page-actions'><?php echo html::submitButton() . ' ' . html::backButton();?></div>
  </form>
</div>
<?php js::set('key', $i)?>
<?php include '../../../common/view/footer.html.php';?>
