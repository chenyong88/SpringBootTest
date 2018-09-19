<?php include '../../../common/view/header.modal.html.php';?>
<form class='form-condensed' method='post' action='<?php echo $this->createLink('report', 'export', "module=$module&mode=$mode")?>' id='exportForm'>
  <table class='w-p100'>
    <tr>
      <td>
        <div class='input-group'>
          <span class='input-group-addon'><?php echo $lang->setFileName;?></span>
          <?php echo html::input('fileName', isset($fileName) ? $fileName : '', 'class=form-control');?>
        </div>
      </td>
      <td class='w-50px'><?php echo html::submitButton($lang->export) . html::hidden('items') . html::hidden('datas');?></td>
    </tr>
  </table>
</form>
<script>
$(function()
{
    $('#exportForm #submit').click(function()
    {
        if($('#datas').size() == 0) return true;

        $(":checkbox:checked[name^='charts']").each(function()
        {
            items = $('#exportForm #items').val();
            items += $(this).val() + ',';
            $('#exportForm #items').val(items);
        });

        var dataBox    = "<input type='hidden' name='%name%' id='%id%' />";
        var canvasSize = $('.chart-wrapper canvas').size();
        if(canvasSize == 0)
        {
            alert('<?php echo $lang->report->errorNoChart?>');
            return false;
        }
        $('.chart-wrapper canvas').each(function(i)
        {
            var obj = $(this).get(0);
            if(typeof(obj.toDataURL) == 'undefined')
            {
                alert('<?php echo $lang->report->errorExportChart?>');
                return false;
            }
            dataURL = $(this).get(0).toDataURL("image/png");
            dataID  = $(this).attr('id');
            var thisDataBox = dataBox.replace('%name%', dataID);
            thisDataBox = thisDataBox.replace('%id%', dataID);
            $('#exportForm #submit').after(thisDataBox);
            $('#exportForm #' + dataID).val(dataURL);

            if(i == canvasSize - 1) $('#datas').remove();
        });
    });
})
</script>
<?php include '../../../common/view/footer.modal.html.php';?>
