$(function()
{
    $('#userEditForm').modalForm(
    {
        onSuccess: function(response)
        {
            if(response.result === 'success')
            {
                response.locate = false;
                $.Display.dismiss();
                $.Display.all.userProfile.show();
            }
        }
    }).listenScroll({container: 'parent'});
});
