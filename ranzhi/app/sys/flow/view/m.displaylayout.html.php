<?php
/**
 * The browse mobile view file of order module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     order 
 * @version     $Id: index.html.php 3830 2016-05-18 09:34:17Z liugang $
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}

if($currentMethod == 'browse' || $currentMethod == 'view'):
include "../../common/view/m.header.html.php";
endif;
?>
<?php 
if($currentMethod == 'browse')
{
    include './m.custombrowse.html.php';
}
elseif($currentMethod == 'view')
{
    include './m.customview.html.php';
}
else
{
    include './m.customoperate.html.php';
}
?>
<?php if($action->open != 'modal'):?>
<?php include "../../common/view/m.footer.html.php";?>
<?php endif;?>
<script>
$(function()
{
    var module        = '<?php echo !empty($currentModule->parent) ? $currentModule->parent : $currentModule->module;?>';
    var moduleMenu    = '<?php echo !empty($moduleMenuID) ? $moduleMenuID : 0;?>';
    var currentMethod = '<?php echo !empty($currentMethod) ? $currentMethod : '';?>';

    if(module)
    {
        if(config.requestType == 'GET')
        {
            $('#appnav > a').removeClass('active').filter('[href*="module=' + module + '"]').addClass('active');
        }
        else
        {
            $('#appnav > a').removeClass('active').filter('[href*="displayLayout-' + module + '-"]').addClass('active');
        }
    }

    if(moduleMenu)
    {
        if(config.requestType == 'GET')
        {
            $('#menu > a').removeClass('active').filter('[href*="moduleMenuID=' + moduleMenu + '"]').addClass('active');
        }
        else
        {
            $('#menu > a').removeClass('active').filter('[href*="browse-' + moduleMenu + '"]').addClass('active');
        }
    }

    $(document).on('change', '#dataID', function()
    {
        location.href = createLink('flow', 'displayLayout', 'module=' + module + '&method=' + currentMethod + '&id=' + $(this).val());
    });
});
</script>
