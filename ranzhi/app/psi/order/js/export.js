$(document).ready(function()
{
    $('.chosen-nosearch').chosen({placeholder_text: ' ', disable_search_threshold: 10, width: '100%'});
})

function setDownloading()
{
    time = setInterval("closeWindow()", 300);
    return true;
}

function closeWindow()
{
    if($.cookie('downloading') == 1)
    {
        parent.$.closeModal();
        $.cookie('downloading', null);
        clearInterval(time);
    }
}
