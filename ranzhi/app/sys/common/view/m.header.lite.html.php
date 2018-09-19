<?php
/**
 * The header.lite mobile view of common module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     common 
 * @version     $Id: header.lite.html.php 3299 2015-12-02 02:10:06Z daitingting $
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}

// Common variables for views
$webRoot = $config->webRoot;
$jsRoot  = $webRoot . "mobile/js/";
$cssRoot = $webRoot . "mobile/css/";
$entryID = '';
if(isset($this->app->entry->id)) $entryID = $this->app->entry->id;
else if(RUN_MODE != 'upgrade' and RUN_MODE != 'install')
{
    if($this->app->user->admin == 'super') $entryID = 'superadmin';
    if($this->moduleName == 'index' or $this->moduleName == 'my' or $this->moduleName == 'todo') $entryID = 'dashboard';
}
?>
<!DOCTYPE html>
<html lang='<?php echo $this->app->getClientLang();?>'>
<head profile="http://www.w3.org/2005/10/profile">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
  <?php
  echo html::icon($webRoot . 'favicon.ico');

  if(!isset($title)) $title  = '';
  if(!empty($title)) $title .= $lang->minus;
  echo html::title($title . $lang->ranzhi);

  js::exportConfigVars();
  js::set('entryID', $entryID);
  js::set('lang', $lang->js);

  if($config->debug)
  {
      js::import($jsRoot . 'mzui.js');
      js::import($jsRoot . 'ranzhi.js');
      js::import($jsRoot . 'my.js');
      
      css::import($cssRoot . 'mzui.min.css');
      css::import($cssRoot . 'style.css');
  }
  else
  {
      js::import($jsRoot . 'all.js');
      css::import($cssRoot . 'all.css');
  }

  if((isset($config->wechat->scan) and $config->wechat->scan == 'open') or (isset($config->wechat->chooseImage) and $config->wechat->chooseImage == 'open'))
  {
      js::import('https://res.wx.qq.com/wwopen/js/jsapi/jweixin-1.0.0.js');
  }

  if(isset($pageCSS)) css::internal($pageCSS);
  ?>
</head>
<body class='m-<?php echo $this->app->getModuleName() . '-' . $this->app->getMethodName() . (isset($bodyClass) ? ' ' . $bodyClass : ''); ?>'>
