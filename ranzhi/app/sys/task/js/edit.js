$(document).ready(function()
{
    /* show team menu. */
    $('[name=multiple]').change(function()
    {
        var checked = $(this).prop('checked');
        if(checked)
        {
            $('#teamTr').removeClass('hidden');
            computeTeamMember();
        }
        else
        {
            $('#teamTr').addClass('hidden');
        }
    });

    $('#modalTeam .btn').click(function(){computeTeamMember()});

    $('[name=multiple]').change();
});
