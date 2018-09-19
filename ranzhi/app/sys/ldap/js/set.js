$(function(){
    toggleHide();
    showAnonymous();
    $(document).on('change', '#anonymous', function(){toggleHide();});
    $(document).on('change', '#type', function(){showAnonymous();});
});
function toggleHide()
{
    if($('#anonymous').prop('checked'))
    {
        $('.adshow').hide();
    }
    else
    {
        $('.adshow').show();
    }
}
function showAnonymous()
{
  if($('#type').val() == 'ad')
  {
      $('#anonymous').parent().hide();
  }
  else
  {
      $('#anonymous').parent().show();
  }
}
