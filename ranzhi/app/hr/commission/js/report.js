$(document).ready(function()
{
    /* expand active tree. */
    $('.tree li.active .hitarea').click();

    $('.btnsearch').click(function()
    {
        $('#searchForm').submit();
    });

    $('.expandAll').click(function()
    {
        $('.expandAll').toggle();
        $('.collapseAll').toggle();
        $('.account').each(function()
        {
            var account = $(this).attr('data-account');
            $('.header-' + account).show();
            $('.child-' + account).hide();
        });
    });

    $('.collapseAll').click(function()
    {
        $('.expandAll').toggle();
        $('.collapseAll').toggle();
        $('.account').each(function()
        {
            var account = $(this).attr('data-account');
            $('.header-' + account).hide();
            $('.child-' + account).show();
        });
    });

    $('.account').click(function()
    {
        var account = $(this).attr('data-account');
        $('.header-' + account).toggle();
        $('.child-' + account).toggle();

        var scrollPos = $(this).offset().top;
        $(document).scrollTop(scrollPos);
        return false;
    });

    $('#dept').change(function()
    {
        $('#account').load(createLink('salary', 'ajaxGetDeptUsers', 'dept=' + $(this).val()), function()
        {
            $('#account').trigger('chosen:updated');
        });
    });

    $('.side-handle').click(function()
    {
        if($(this).find('.icon-caret-left').length)
        {
            $('.page-content .with-side').addClass('hide-side');
            $('.side-handle .icon-caret-left').removeClass('icon-caret-left').addClass('icon-caret-right');
        }
        else if($(this).find('.icon-caret-right').length)
        {
            $('.page-content .with-side').removeClass('hide-side');
            $('.side-handle .icon-caret-right').removeClass('icon-caret-right').addClass('icon-caret-left');
        }
        $('#fixedHeader').remove();
    });

    $('[name*=matrixShowType]').click(function()
    {
        $('.amount, .rate').toggle();
    });

    $('table.datatable').datatable({fixedHeaderOffset: 80});

    $(window).scroll(function()
    {
        fixScrollWrapper();
    }).resize(function()
    {
        fixScrollWrapper();
    });
    
    fixScrollWrapper();
})

function fixScrollWrapper()
{
    var tbHeight   = parseFloat($('div.datatable').css('height'));
    var wHeight    = $(window).height();
    var wScrollTop = $(window).scrollTop();
    $('div.datatable>div.scroll-wrapper').css('bottom', tbHeight - wHeight - wScrollTop + 100);
}
