<?php 
/**
 * The create view file of product module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     product 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../../sys/common/view/header.modal.html.php';?>
<form method='post' action='<?php echo inlink('create');?>' id='ajaxForm'>
  <table class='table table-form'>
    <tr>
      <th class='w-60px'><?php echo $lang->product->name;?></th>
      <td>
        <div class="col-sm-8 no-padding">
          <?php echo html::input('name', '', "class='form-control col-sm-8'");?>
        </div>
        <div class="col-sm-4 no-padding">
          <div class="input-group">
            <span class='input-group-addon'><?php echo $lang->product->order?></span>
            <?php echo html::input('order', $order, "class='form-control'");?>
          </div>
        </div>
      </td>
    </tr>
    <tr>
      <th><?php echo $lang->product->code;?></th>
      <td><?php echo html::input('code', '', "class='form-control'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->product->category;?></th>
      <td><?php echo html::select("category", $categories, '', "class='form-control'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->product->type;?></th>
      <td><?php echo html::select("type", $lang->product->typeList, '', "class='form-control'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->product->status;?></th>
      <td><?php echo html::select("status", $lang->product->statusList, '', "class='form-control'");?></td>
    </tr>
    <?php if(commonModel::hasPriv('file', 'upload')):?>
    <tr>
      <th><?php echo $lang->files;?></th>
      <td><?php echo $this->fetch('file', 'buildForm');?></td>
    </tr>
    <?php endif;?>
    <tr>
      <th></th>
      <td><?php echo html::submitButton();?></td>
    </tr>
  </table>
</form>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
