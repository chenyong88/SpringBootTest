/**
 * create key for an entry.
 *
 * @access public
 * @return void
 */
function createKey()
{
    var chars = '0123456789abcdefghiklmnopqrstuvwxyz'.split('');
    var key   = '';
    for(var i = 0; i < 32; i ++)
    {
        key += chars[Math.floor(Math.random() * chars.length)];
    }
    $('#key').val(key);
    return false;
}

/* Toggle size custom form. */
$('#size').change(function(){$('#custom').toggle($(this).val() == 'custom')});
$(function(){$('#custom').toggle($('#size').val() == 'custom')})

$('#allip').change(function()
{
    if($(this).prop('checked'))
    {
        $('#ip').attr('disabled', 'disabled');
    }
    else
    {
        $('#ip').removeAttr('disabled');
    }
});

$('#platformxuanxuan').change(function()
{
  if($(this).prop('checked'))
  {
    $('.entry-version, .entry-files').removeClass('hide');
  }
  else
  {
    $('.entry-version, .entry-files').addClass('hide');
  }
});


/* refresh entries. */
$(document).ready(function()
{
    $.setAjaxForm('#entryForm', function(response)
    {
        if(response.result == 'success')
        {
            if(response.entries)
            {
                v.entries = JSON.parse(response.entries);
                $.refreshDesktop(v.entries, true);
            }
            location.href = response.locate;
        }
    });

   $("#fileform .w-30px").hide();
});
