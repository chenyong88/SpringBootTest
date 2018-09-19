$(document).ready(function()
{
    if($('#bysearchTab').length) $('#bysearchTab').before($('#reportNav'));
    if(!$('#bysearchTab').length) $('#menu > ul:first').append($('#reportNav'));
})
