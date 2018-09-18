<form id='ajaxForm' method='post' action='<?php echo inlink('importSettings', "module=$module&mode=save");?>'>
  <table class='table table-form w-700px'>
    <?php foreach($lang->attend->importFields as $field => $label):?>
    <tr>
      <th class='w-100px'><?php echo $label;?></th>
      <td>
        <?php if(strpos(',date,signIn,signOut,', ",$field,") !== false):?>
        <div class='required required-wrapper'></div>
        <?php endif;?>
        <?php echo html::input($field, zget($schema, $field, ''), "class='form-control'");?>
      </td>
      <td class='text-important'><?php if(isset($lang->attend->tips->$field)) echo $lang->attend->tips->$field;?></td>
    </tr>
    <?php endforeach;?>
    <tr>
      <th><?php echo $lang->attend->delmiter;?></th>
      <td><?php echo html::select('delmiter', $lang->attend->delmiterList, $delmiter, "class='form-control'");?></td>
      <td class='text-important'><?php echo $lang->attend->tips->delmiter;?></td>
    </tr>
    <tr>
      <th><?php echo $lang->attend->importFirstRow;?></th>
      <td><?php echo html::radio('importFirstRow', $lang->attend->importFirstRowList, $importFirstRow);?></td>
      <td></td>
    </tr>
    <tr>
      <th></th>
      <td>
        <?php echo html::submitButton();?>
        <?php echo html::a(inlink('importSettings', "module=$module&mode=reset"), $lang->attend->reset, "class='btn btn-primary jsoner'");?>
      </td>
      <td></td>
    </tr>
  </table>
</form>
