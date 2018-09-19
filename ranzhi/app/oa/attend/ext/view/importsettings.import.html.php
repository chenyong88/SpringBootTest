<form id='ajaxForm' method='post' enctype='multipart/form-data' action='<?php echo inlink('importSettings', "module=$module&mode=import");?>'>
  <table class='table table-form'>
    <tr>
      <th class='w-80px'><?php echo $lang->attend->importFile;?></th>
      <td class='w-300px'>
        <div class='required required-wrapper'></div>
        <?php echo html::file('files', "class='form-control'")?>
      </td>
      <td class='text-important'><?php echo $lang->attend->fileNode;?></td>
    </tr>
    <tr>
      <th><?php echo $lang->attend->encode?></th>
      <td><?php echo html::select('encode', $lang->attend->encodeList, '', "class='form-control'")?></td>
    </tr>
    <tr>
      <th><?php echo $lang->attend->delmiter;?></th>
      <td><?php echo html::select('delmiter', $lang->attend->delmiterList, ',', "class='form-control'");?></td>
      <td class='text-important'><?php echo $lang->attend->tips->delmiter;?></td>
    </tr>
    <tr>
      <th></th>
      <td colspan='3'><?php echo html::submitButton();?></td>
    </tr>
  </table>
</form>
