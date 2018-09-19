<?php
$lang->attend->menu->detail = array('link' => $lang->attend->menu->detail, 'alias' => 'import,showimporterror');

$lang->attend->menu->settings['alias'] .= ',importsettings';

$settingMenus = $lang->setting->menu;
$lang->setting->menu = new stdclass();
foreach($settingMenus as $key => $menu)
{
    $lang->setting->menu->$key = $menu;
    if($key == 'deptManager') $lang->setting->menu->importSettings = '導入模板|attend|importSettings|module=setting';
}
