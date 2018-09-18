<?php 
/**
 * The create from order view file of product module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com> 
 * @package     product
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../common/view/header.modal.html.php';?>
<?php include '../../../common/view/chosen.html.php';?>
<form id='createForm' method='post' action='<?php echo inlink('createFromOrder', "element=$element");?>'>
  <table class='table table-form'>
    <tr>
      <th class='w-60px'><?php echo $lang->product->category;?></th>
      <td>
        <div class='input-group'>
          <?php echo html::select('category', $categories, '', "class='form-contorl chosen'");?>
          <?php echo html::input('newCategory', '', "class='newProperty form-control' style='display:none'");?>
          <span class='input-group-addon'>
            <label class='checkbox-inline'>
              <input type='checkbox' name='createCategory' value='1' id='createCategory'> <?php echo $lang->product->createCategory;?>
            </label>
          </span>
        </div>
      </td>
      <th class='w-60px'><?php echo $lang->product->type;?></th>
      <td><?php echo html::select('type', $lang->product->typeList, 'real', "class='form-control'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->product->name;?></th>
      <td><?php echo html::input('name', '', "class='form-control'");?></td>
      <th><?php echo $lang->product->code;?></th>
      <td><?php echo html::input('code', '', "class='form-control'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->product->model;?></th>
      <td>
        <div class='input-group'>
          <?php echo html::select('model', array('') + $lang->product->models, '', "class='form-contorl chosen'");?>
          <?php echo html::input('newModel', '', "class='newProperty form-control' style='display:none'");?>
          <span class='input-group-addon'>
            <label class='checkbox-inline'>
              <input type='checkbox' name='createModel' value='1' id='createModel'> <?php echo $lang->product->createModel;?>
            </label>
          </span>
        </div>
      </td>
      <th><?php echo $lang->product->unit;?></th>
      <td>
        <div class='input-group'>
          <?php echo html::select('unit', array('') + $lang->product->units, '', "class='form-contorl chosen'");?>
          <?php echo html::input('newUnit', '', "id='newUnit' class='form-control newProperty' style='display:none'");?>
          <span class='input-group-addon'>
            <label class='checkbox-inline'>
              <input type='checkbox' name='createUnit' value='1' id='createUnit'> <?php echo $lang->product->createUnit;?>
            </label>
          </span>
        </div>
      </td>
    </tr>
    <tr>
      <th><?php echo $lang->product->brand;?></th>
      <td><?php echo html::input('brand', '', "class='form-control'");?></td>
      <th><?php echo $lang->product->barcode;?></th>
      <td><?php echo html::input('barcode', '', "class='form-control'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->product->store;?></th>
      <td><?php echo html::select('store', $stores, '', "class='form-contorl chosen'");?></td>
      <th><?php echo $lang->product->amount;?></th>
      <td><?php echo html::input('amount', '', "class='form-control'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->product->desc;?></th>
      <td colspan='3'><?php echo html::textarea('desc', '', "rows='5' class='form-control'");?></td>
    </tr>
    <tr>
      <th></th>
      <td colspan='3'><?php echo html::submitButton() . html::commonButton($lang->close, 'btn', "data-dismiss='modal'");?></td>
    </tr>
  </table>
</form>
<?php include '../../../common/view/footer.modal.html.php';?>
