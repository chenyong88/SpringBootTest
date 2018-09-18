<form id='ajaxForm' method='post' action='<?php echo inlink('importSettings', "module=$module&mode=parse");?>' style='overflow: scroll; max-width: 100%;'>
  <table class='table table-data table-borderless'>
    <thead>
      <tr id='schema'>
        <?php for($i = 0; $i < $columns; $i ++):?>
        <th><?php echo html::select('schema[' . chr($i + 65) . ']', array('') + $lang->attend->importFields, '', "class='form-control chosen' data-placeholder='{$lang->attend->placeholder->selectField}'");?></th>
        <?php endfor;?>
      </tr>
    </thead>
    <tbody>
      <?php foreach($records as $row => $values):?>
      <?php if($row > 5) break;?>
      <tr>
        <?php foreach($values as $key => $value):?>
        <td><nobr><?php echo $value;?></nobr></td>
        <?php endforeach;?>
      </tr>
      <?php endforeach;?>
    </tbody>
  </table>
  <div><?php echo html::submitButton();?></div>
</form>
