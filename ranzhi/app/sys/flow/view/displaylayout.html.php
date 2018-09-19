<?php
/**
 * The display layout view file of workflow module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     workflow 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php if($action->open == 'modal'):?>
<?php include '../../common/view/header.modal.html.php';?>
<?php else:?>
<?php include $app->getModuleRoot($currentModule->app) . 'common/view/header.html.php';?>
<?php endif;?>
<?php if($currentModule->parent):?>
<?php js::set('module', $currentModule->parent);?>
<?php else:?>
<?php js::set('module', $currentModule->module);?>
<?php endif;?>
<?php 
if($currentMethod == 'browse')
{
    include './custombrowse.html.php';
}
elseif($currentMethod == 'view')
{
    include './customview.html.php';
}
else
{
    include './customoperate.html.php';
}
?>
<?php if($action->open == 'modal'):?>
<?php include '../../common/view/footer.modal.html.php';?>
<?php else:?>
<?php include $app->getModuleRoot($currentModule->app) . 'common/view/footer.html.php';?>
<?php endif;?>
