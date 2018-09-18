<?php 
/**
 * The copy view file of product module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     product 
 * @version     $Id $
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../common/view/header.modal.html.php';?>
<?php include '../../../common/view/chosen.html.php';?>
<form method='post' id='ajaxForm' action="<?php echo inlink('copy', "productID={$productID}");?>">
  <table class='table table-form'>
    <tr>
      <th class='w-60px'><?php echo $lang->product->common;?></th>
      <td>
        <div class='input-group'>
          <?php echo html::select('product', $products, '', "class='form-control chosen'");?>
          <?php echo html::input('name', '', "class='form-control' style='display:none'");?>
          <span class='input-group-addon'>
            <label class='checkbox-inline'>
              <input type='checkbox' name='createProduct' id='createProduct' value='1' /> <?php echo $lang->product->create;?>
            </label>
          </span>
        </div>
      </td>
    </tr>
    <tr class='productInfo hide'>
      <th><?php echo $lang->product->code;?></th>
      <td><?php echo html::input('code', '', "class='form-control'");?></td>
    </tr>
    <tr class='productInfo hide'>
      <th><?php echo $lang->product->category;?></th>
      <td><?php echo html::select('category', $categories, '', "class='form-control'");?></td>
    </tr>
    <tr class='productInfo hide'>
      <th><?php echo $lang->product->type;?></th>
      <td><?php echo html::select('type', $lang->product->typeList, '', "class='form-control'");?></td>
    </tr>
    <tr class='productInfo hide'>
      <th><?php echo $lang->product->status;?></th>
      <td><?php echo html::select('status', $lang->product->statusList, '', "class='form-control'");?></td>
    </tr>
    <tr><th></th><td><div class='alert alert-primary'><?php echo $lang->product->copyTip;?></div></td></tr>
    <tr class='text-center'><td colspan='2'><?php echo html::submitButton();?></td></tr>
  </table>
</form>
<?php include '../../../common/view/footer.modal.html.php';?>
