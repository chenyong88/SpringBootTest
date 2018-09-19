<?php
/**
 * The header mobile view of common module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     common 
 * @version     $Id: header.lite.html.php 3299 2015-12-02 02:10:06Z daitingting $
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}

if(!isset($bodyClass)) $bodyClass = '';
$bodyClass .= ' with-heading-top with-nav-top';

$customModuleMenu = isset($customModuleMenu) ? $customModuleMenu : (isset($moduleMenu) && $moduleMenu === true);
if(!isset($moduleMenu) || $customModuleMenu) $moduleMenu = commonModel::createModuleMenu($this->moduleName);
if($moduleMenu) $bodyClass .= ' with-menu-top';

include 'm.header.lite.html.php';
include 'm.avatar.html.php';

$entryList = $this->loadModel('entry')->getEntries('mobile');
foreach($entryList as $key => $entry) 
{
    if(!$entry->buildin) unset($entryList[$key]);
    if(strpos(',cash,hr,psi,superadmin,', ",$entry->code,") !== false) unset($entryList[$key]);
}
$entries = array();
foreach(explode(',', 'dashboard,crm,proj,oa,doc,cash,team,flow') as $code)
{
    foreach($entryList as $key => $entry) 
    {
        if($entry->code == $code) 
        {
            $entries[$key] = $entry;
            break;
        }
    }
}
$currentEntry = isset($entries[$entryID]) ? $entries[$entryID] : $entries['dashboard'];
$entrySkin    = 'default';
?>

<header id='appbar' class='heading skin-<?php echo $entrySkin ?> affix dock-top'>
  <a data-target='#userMenu' data-backdrop='true' data-display class='profile has-padding' data-target-dismiss='true'>
    <div class='avatar text-tint circle'>
    <?php if(!empty($this->app->user->avatar)):?>
      <?php echo html::image($this->app->user->avatar);?>
    <?php else:?>
    <img src='<?php echo $webRoot . 'mobile/img/profile.png' ?>' alt='<?php echo $this->app->user->realname;?>'>
    <?php endif;?>
    </div>
  </a>
  <strong><?php echo $currentEntry->name;?></strong>
  <nav id='searchbar' class='has-padding'>
    <a href='<?php echo helper::createLink('sys.my', 'search');?>' class='avatar'>
      <img src='<?php echo $webRoot . 'mobile/img/search.png' ?>'>
    </a>
  </nav>
</header>

<nav id='appnav' class='affix dock-top nav skin-<?php echo $entrySkin ?>-pale'>
<?php
if($currentEntry->id === 'dashboard')
{
    echo html::a($this->createLink('index', 'index'), $lang->home, $this->moduleName == 'index' && $this->methodName == 'index' ? "class='active'" : '');
    echo commonModel::createDashboardMenu();
}
else
{
    echo commonModel::createMainMenu($this->moduleName);
}
?>
  <a class='moreAppnav hidden' data-display='dropdown' data-target-dismiss='false' data-placement='beside-bottom'><i class='icon icon-bars'></i></a>
  <div id='moreAppnav' class='list dropdown-menu'></div>
</nav>

<?php if($moduleMenu && !$customModuleMenu):?>
<nav id='menu' class='menu nav affix dock-top canvas'>
  <?php echo $moduleMenu;?>
  <a class='moreMenu hidden' data-display='dropdown' data-target-dismiss='false' data-placement='beside-bottom'><?php echo $lang->more;?></a>
  <div id='moreMenu' class='list dropdown-menu'></div>
</nav>
<?php endif;?>

<div id='moreMenu' class='layer hidden'></div>

<div id='userMenu' class='list compact layer hidden fade'>
  <a class='item multi-lines primary-pale' data-remote='<?php echo $this->createLink('user', 'profile');?>' data-display='modal' data-placement='bottom' data-name='userProfile'>
    <?php printUserAvatar('circle', $app->user);?>
    <div class='content'>
      <div class='title'><?php echo empty($app->user->realname) ? ('@' . $app->user->account) : $app->user->realname ?></div>
      <div class='subtitle'><?php echo $lang->user->profile ?></div>
    </div>
    <?php
    $todaySignIn = $this->loadModel('attend', 'oa')->checkSignIn();
    if($todaySignIn) echo '<i class="text-success signin-icon icon icon-calendar-empty"><span class="icon-check"></span></i>';
    ?>
  </a>
  <div class='divider no-margin'></div>
  <?php
  $currentTime = time();
  if($currentTime < strtotime(date("Y-m-d") . " " . $this->config->attend->signInLimit . "+4 hour"))
  {
      $signinLink = $this->createLink('oa.attend', 'signin');
      echo html::a('###', '<i class="icon icon-checked"></i> <span class="title">' . $this->lang->signIn . '</span>', "class='item signin-btn text-link' data-remote='$signinLink' data-display='ajaxAction' data-refresh='#userMenu'");
  }
  if($this->config->attend->mustSignOut == 'yes' and $currentTime > strtotime(date("Y-m-d") . " " . $this->config->attend->signOutLimit . "-4 hour")) 
  {
      $signoutLink = $this->createLink('oa.attend', 'signout');
      $locateLink  = $this->createLink('user', 'logout');
      echo html::a('###', '<i class="icon icon-exclamation-sign"></i> <span class="title">' . $this->lang->signOut . '</span>', "class='item signout-btn text-danger' data-remote='$signoutLink' data-display='ajaxAction' data-locate='$locateLink'");
  }
  ?>
  <div class='divider no-margin'></div>
  <div class='item'>
    <i class='icon icon-globe muted'></i>
    <div class="content">
      <nav class='nav lang-menu dock'>
        <?php foreach($config->langs as $key => $value):?>
          <a data-value='<?php echo $key; ?>'<?php if($key === $this->app->getClientLang()) echo ' class="active"' ?>><?php echo $value; ?></a>
        <?php endforeach;?>
      </nav>
    </div>
  </div>
  <div class='divider no-margin'></div>
  <a class='item' data-remote='<?php echo $this->createLink('misc', 'about');?>' data-display='modal' data-placement='bottom'><i class='icon icon-info-sign muted'></i> <span class='title'><?php echo $lang->index->about?></span></a>
  <div class='divider no-margin'></div>
  <?php echo html::a($this->createLink('user', 'logout'), "<i class='icon icon-signout muted'></i> <span class='title'>{$lang->logout}</span>", "class='item'")?>
</div>

<?php 
$entryIconList = array();
$entryIconList['dashboard'] = 'icon-home';
$entryIconList['crm']       = 'icon-phone';
$entryIconList['oa']        = 'icon-edit';
$entryIconList['proj']      = 'icon-file-o';
$entryIconList['doc']       = 'icon-folder-open-alt';
$entryIconList['team']      = 'icon-group';
$entryIconList['flow']      = 'icon-usecase';
?>
<div class="nav affix dock-bottom justified">
  
  <?php $canScan = (strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false and isset($config->wechat->scan) and $config->wechat->scan == 'open');?>
  <?php $i = 0;?>
  <?php $count = count($entries);?>
  <?php foreach ($entries as $entry):?>
  <?php $i++;?>
  <?php if(($canScan and ($count < 5 or ($count > 4 && $i < 5))) or (!$canScan and ($count < 6 or ($count > 5 && $i < 5)))):?>
  <a class='item<?php if($entry->id == $currentEntry->id) echo ' active' ?>' href='<?php echo $entry->url ?>'>
    <div class='content'>
      <div class='title text-center'><i class='icon <?php echo $entryIconList[$entry->code];?>'></i></div>
      <div class='title'><?php echo $entry->abbr;?></div>
    </div>
  </a>
  <?php endif;?>

  <?php if($canScan and $count < 5 and $i == $count):?>
  <a href='javascript:;' class='item text-center scanQRCode'>
    <div class='content'>
      <div class='title'><i class='icon icon-qrcode'></i></div>
      <div class='title'><?php echo $lang->scan;?></div>
    </div>
  </a>
  <?php endif;?>

  <?php if($canScan and $count < 5) continue;?>
  <?php if(!$canScan and $count < 6) continue;?>
  <?php if($i == 5):?>
  <a class='item' data-display='dropdown' data-placement='{"position": "absolute", "top": "auto", "left": "auto", "bottom": 48, "right": 0}'>
    <div class='content'>
      <div class='title text-center'><i class='icon icon-plus-sign'></i></div>
      <div class='title'><?php echo $lang->more;?></div>
    </div>
  </a>
  <div id='moreApp' class='list dropdown-menu'>
  <?php endif;?>
  <?php if($i > 4):?>
    <a class='item text-center<?php if($entry->id == $currentEntry->id) echo ' active' ?>' href='<?php echo $entry->url ?>'>
      <div class='title'>
        <i class='icon <?php echo $entryIconList[$entry->code];?>'></i> <?php echo $entry->abbr;?>
      </div>
    </a>
    <div class='divider no-margin'></div>
  <?php endif;?>
  <?php if($i == $count):?>  
  <?php if($canScan):?>
  <a href='javascript:;' class='item text-center scanQRCode'>
    <div class='title'><i class='icon icon-qrcode'> </i><?php echo $lang->scan;?></div>
  </a>
  <?php endif;?>
  </div>
  <?php endif;?>
  <?php endforeach;?>

</div>

<?php
if((isset($config->wechat->scan) and $config->wechat->scan == 'open') or (isset($config->wechat->chooseImage) and $config->wechat->chooseImage == 'open'))
{
    $wechat    = $this->loadModel('wechat')->loadApi('page');
    $signature = $wechat->getSignPackage(); 
    js::set('appId', $signature['appId']);
    js::set('timestamp', $signature['timestamp']);
    js::set('nonceStr', $signature['nonceStr']);
    js::set('signature', $signature['signature']);
}
?>
