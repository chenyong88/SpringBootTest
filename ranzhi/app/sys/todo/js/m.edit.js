$(function()
{
    var switchDate = function(enable)
    {
        $('#switchDate').attr('checked', enable ? 'checked' : null);
        $('#date').attr('disabled', enable ? null : 'disabled');
        if(!enable) switchTime(false);
    };
    
    var switchTime = function(enable)
    {
        $('#switchTime').attr('checked', !enable ? 'checked' : null);
        $('#beginAndEnd').toggleClass('disabled', !enable);
        $('#begin, #end').attr('disabled', enable ? null : 'disabled');
        if(enable) switchDate(true);
    };

    $('#switchDate').on('change', function()
    {
        switchDate($(this).is(':checked'));
    });

    $('#switchTime').on('change', function()
    {
        switchTime(!$(this).is(':checked'));
    });

    $('#editForm').modalForm().listenScroll({container: 'parent'});
});
