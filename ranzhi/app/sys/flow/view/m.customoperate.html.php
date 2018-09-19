<div class='heading divider'>
  <div class='title'><i class='icon-plus muted'></i> <strong><?php echo $title;?></strong></div>
  <nav class='nav'><a data-dismiss='display'><i class='icon-remove muted'></i></a></nav>
</div>

<form class='content box' data-form-refresh='#page' method='post' id='operateForm' action='<?php echo $this->createLink('flow', 'displayLayout', "module=$currentModule->module&method=$currentMethod&id={$dataID}")?>'>
  <?php if($action->position == 'menu' && $action->action != 'create'):?>
  <div class='control'>
    <label for='dataID'><?php echo $currentModule->name;?></label>
    <div class='select'><?php echo html::select('dataID', $dataPairs, $dataID);?></div>
  </div>
  <?php endif;?>

  <?php if($action->action == 'create' || $dataID != 0):?>
  <?php foreach($fields as $field):?>
  <?php $value = isset($data->{$field->field}) ? $data->{$field->field} : $field->defaultValue;?>
  <?php if($action->action == 'create' && $field->field == $foreignKey) $value = $foreignKeyValue;?>
  <?php if($field->show):?>
  <?php if($field->field == 'file'):?>
  <div class='control'>
    <?php echo $this->fetch('file', 'buildForm', 'fileCount=1');?>
  </div>
  <?php elseif(is_numeric($field->field)):?>
  <div class='children' data-child='<?php echo $field->field;?>' class='has-padding gray'>
    <div class='control small muted'><label><?php echo $field->name;?></label></div>
    <?php $datas = isset($childDatas[$field->field]) ? $childDatas[$field->field] : array('');?>
    <?php foreach($datas as $data):?>
    <div class='row flex-nowrap'>
      <?php foreach($childFields[$field->field] as $childField):?>
      <?php $value = isset($data->{$childField->field}) ? $data->{$childField->field} : $childField->defaultValue;?>
      <?php if($childField->show):?>
      <div class='cell'>
        <div class='control'>
          <?php echo $this->workflow->buildControl($childField, $value, $field->field);?>
        </div>
      </div>
      <?php endif;?>
      <?php endforeach;?>
      <div class='cell flex-none'>
        <a class='btn child-deleter'><i class='icon-trash text-danger'></i></a>
      </div>
      <?php echo html::hidden("children[{$field->field}][id][]", $data->id);?>
    </div>
    <?php endforeach;?>

    <div class='row flex-nowrap'>
      <?php foreach($childFields[$field->field] as $childField):?>
      <?php if($childField->show):?>
      <div class='cell'>
        <div class='control'>
          <?php echo $this->workflow->buildControl($childField, '', $field->field);?>
        </div>
      </div>
      <?php endif;?>
      <?php endforeach;?>
      <div class='cell flex-none'>
        <a class='btn child-deleter'><i class='icon-trash text-danger'></i></a>
      </div>
      <?php echo html::hidden("children[{$field->field}][id][]", '');?>
    </div>
    <a class="btn text-primary btn-add-child"><i class="icon-plus"></i>&nbsp; <?php echo $lang->add . ' ' . $field->name; ?></a>
  </div>
  <?php else:?>
  <div class='control'>
    <label for='<?php echo $field->field;?>'><?php echo $field->name;?></label>
    <?php echo $this->workflow->buildControl($field, $value);?>
  </div>
  <?php endif;?>
  <?php endif;?>
  <?php endforeach;?>
  <?php endif;?>
</form>

<?php foreach($childFields as $childModule => $fields):?>
<div class='template template-<?php echo $childModule?>'>
<div class='row flex-nowrap'>
  <?php foreach($fields as $field):?>
  <?php if($field->show):?>
  <div class='cell'>
    <div class='control'>
      <?php echo $this->workflow->buildControl($field, $value, $childModule);?>
    </div>
  </div>
  <?php endif;?>
  <?php endforeach;?>
  <div class='cell flex-none'>
    <a class='btn child-deleter'><i class='icon-trash text-danger'></i></a>
  </div>
  <?php echo html::hidden("children[{$childModule}][id][]", '');?>
</div>
</div>
<?php endforeach;?>

<div class='footer has-padding'>
  <button type='button' data-submit='#operateForm' class='btn primary'><?php echo $lang->save ?></button>
</div>

<script>
$(function()
{
    $form = $('#operateForm').modalForm().listenScroll({container: 'parent'});

    var addChild = function(order)
    {
        var $order = $template.clone().removeClass('template');
        if(order) $order.find('.select-order').val(order).change();
        $addOrderBtn.before($order);
    };

    $(document).on('click', '.btn-add-child', function()
    {  
        var child = $(this).parents('.children').data('child');
        $(this).before($('.template-' + child).html());
    });

    $(document).on('click', '.child-deleter', function()
    {  
        if($(this).parents('.children').find('.row').size() > 1)
        {
            $(this).closest('.row').remove();
        }
        else
        {
            $(this).closest('.row').find('input,select,textarea').val('');
        }
    });
})
</script>
