$(function()
{
    if(config.requestType == 'GET') $('.treeview li a[href$="=' + v.action + '"]').parent('li').addClass('active');
    if(config.requestType == 'PATH_INFO') $('.treeview li a[href$="-' + v.action + '.html"]').parent('li').addClass('active');
})
