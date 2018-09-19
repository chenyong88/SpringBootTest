<table class='companyInfo hide'>
  <tbody>
    <?php if(count($companys) > 1):?>
    <tr>
      <th><?php echo $lang->depositor->company;?></th>
      <td><?php echo html::select('company', $companys, '', "class='form-control chosen'");?></td>
    </tr>
    <?php else:?>
    <tr class='hidden'><td colspan='2'><?php echo html::hidden('company', (!empty($companys) ? key($companys) : 0));?></td></tr>
    <?php endif;?>
  </tbody>
</table>

<script>
$('#type').parents('tr').before($('.companyInfo tbody').html());
</script>
