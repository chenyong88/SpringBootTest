$(function()
{
    $('.upgradeBtn').click(function()
    {
        //var link = createLink('workflow', 'upgrade', 'module=' + v.module + '&step=' + v.step + '&toVersion=' + $('#version').val() + '&mode=' + v.mode);
        var link = $(this).prop('href');
        if($('#version').val()) link += '&toVersion=' + $('#version').val();
        $('#ajaxModal').load(link); 

        return false;
    });
})
