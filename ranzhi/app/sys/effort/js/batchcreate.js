function updateAction(date)
{
    if(date.indexOf('-') != -1)
    {
      var datearray = date.split("-");
      var date = '';
      for(i=0 ; i<datearray.length ; i++)
      {
        date = date + datearray[i];
      }
    }

    var modal = $('#triggerModal');
    link = createLink('effort', 'batchCreate', 'date=' + date);
    modal.attr('ref', link);

    setTimeout(function()
    {
        modal.load(modal.attr('ref'), function(){$(this).find('.modal-dialog').css('width', $(this).data('width'));
        $.zui.ajustModalPosition()})
    }, 1000);
}

function addEffort(clickedButton)
{
    effortRow = '<tr class="effortBox new">' + $(clickedButton).closest('tr').html() + '</tr>';
    $(clickedButton).closest('tr').after(effortRow);
    var nextBox = $(clickedButton).closest('tr').next('.effortBox');
    $(nextBox).find('input[id^=id]').val(v.num);

    v.num++;
    updateID();
}

function deleteEffort(clickedButton)
{
    if($('.effortBox').size() == 1) return;
    $(clickedButton).parent().parent().remove();
    updateID();
}

function cleanEffort()
{
    $('#objectTable tbody tr.computed').remove();
    updateID();
}

function updateID()
{
    i = 1;
    $('.effortID').each(function(){$(this).html(i ++)});
}
