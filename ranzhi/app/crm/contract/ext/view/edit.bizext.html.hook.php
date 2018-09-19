<table class='companyInfo hide'>
  <tbody>
    <?php if(count($companys) > 1):?>
    <tr>
      <th><?php echo $lang->contract->company;?></th>
      <td><?php echo html::select('company', $companys, $contract->company, "class='form-control chosen'");?></td>
    </tr>
    <?php else:?>
    <tr class='hidden'><td colspan='2'><?php echo html::hidden('company', (!empty($companys) ? key($companys) : 0));?></td></tr>
    <?php endif;?>
  </tbody>
</table>

<script>
$('#customer').parents('tr').before($('.companyInfo tbody').html());
</script>
