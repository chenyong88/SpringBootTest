<div id='psiEditInfo' class='hide'>
  <?php include '../../common/view/chosen.html.php';?>
  <?php include '../../common/view/treeview.html.php';?>
  <table class='table table-form'>
    <tr>
      <th class='w-60px'><?php echo $lang->product->category;?></th>
      <td>
        <div class='input-group'>
          <?php echo html::select('category', $categories, $product->category, "class='form-contorl'");?>
          <?php echo html::input('newCategory', '', "class='newProperty form-control' style='display:none'");?>
          <span class='input-group-addon'>
            <label class='checkbox-inline'>
              <input type='checkbox' name='createCategory' value='1' id='createCategory'> <?php echo $lang->product->createCategory;?>
            </label>
          </span>
        </div>
      </td>
      <th class='w-60px'><?php echo $lang->product->type;?></th>
      <td><?php echo html::select('type', $lang->product->typeList, $product->type, "class='form-control' style='height:34px; margin-bottom: 5px;'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->product->name;?></th>
      <td><?php echo html::input('name', $product->name, "class='form-control'");?></td>
      <th><?php echo $lang->product->code;?></th>
      <td><?php echo html::input('code', $product->code, "class='form-control'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->product->model;?></th>
      <td>
        <div class='input-group'>
          <?php echo html::select('model', array('') + $lang->product->models, $product->model, "class='form-contorl'");?>
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
          <?php echo html::select('unit', array('') + $lang->product->units, $product->unit, "class='form-contorl'");?>
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
      <td><?php echo html::input('brand', $product->brand, "class='form-control'");?></td>
      <th><?php echo $lang->product->barcode;?></th>
      <td><?php echo html::input('barcode', $product->barcode, "class='form-control'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->product->store;?></th>
      <td><?php echo html::select('store', $stores, $product->store, "class='form-contorl'");?></td>
      <th><?php echo $lang->product->amount;?></th>
      <td><?php echo html::input('amount', $product->amount, "class='form-control'");?></td>
    </tr>
    <tr>
      <th><?php echo $lang->product->desc;?></th>
      <td colspan='3'><?php echo html::textarea('desc', $product->desc, "rows='5' class='form-control'");?></td>
    </tr>
    <?php if(commonModel::hasPriv('file', 'upload')):?>
    <tr>
      <th><?php echo $lang->files;?></th>
      <td colspan='3'><?php echo $this->fetch('file', 'buildForm');?></td>
    </tr>
    <?php endif;?>
    <tr>
      <th></th>
      <td colspan='3'><?php echo html::submitButton() . ' ' . html::backButton();?></td>
    </tr>
  </table>
</div>
<script>
  var psiStatus = <?php echo $config->psi->turnon;?>;
  if(psiStatus == 1 && config.appName == 'psi') 
  {
      $('#ajaxForm').empty().append($('#psiEditInfo').html()); 
      $('#ajaxForm').find('#category, #model, #unit, #store').chosen(window.chosenDefaultOptions);
      setRequiredFields();
  }
</script>
