<?php
/**
 * The view mobile view file of provider module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     provider 
 * @version     $Id: index.html.php 3830 2016-05-18 09:34:17Z liugang $
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}

$moduleMenu = false;
$bodyClass  = 'with-nav-bottom';
$browseLink = !empty($this->session->providerList) ? $this->session->providerList : inlink('browse'); 
include "../../common/view/m.header.html.php";
?>

<div id='page' class='list-with-actions'>
  <div class='section no-margin'>
    <div class='heading gray'>
      <div class='title'><i class='icon-calendar'> </i><?php echo $lang->provider->view;?></div>
      <nav class='nav'><a class='btn primary' href='<?php echo $browseLink;?>'><?php echo $lang->goback ?></a></nav>
    </div>
    <div class='box'>
      <table class='table bordered table-detail'>
        <tr>
          <td class='w-80px'><?php echo $lang->provider->name;?></td>
          <td><?php echo $provider->name;?></td>
        </tr>
        <?php if($provider->desc):?>
        <tr>
          <td><?php echo $lang->provider->desc;?></td>
          <td><?php echo $provider->desc;?></td>
        </tr>
        <?php endif;?>
        <?php if($provider->size):?>
        <tr>
          <td><?php echo $lang->provider->size;?></td>
          <td><?php echo $lang->provider->sizeList[$provider->size];?></td>
        </tr>
        <?php endif;?>
        <?php if($provider->type):?>
        <tr>
          <td><?php echo $lang->provider->type;?></td>
          <td><?php echo $lang->provider->typeList[$provider->type];?></td>
        </tr>
        <?php endif;?>
        <?php if($provider->industry):?>
        <tr>
          <td><?php echo $lang->provider->industry;?></td>
          <td><?php echo zget($industries, $provider->industry, '');?></td>
        </tr>
        <?php endif;?>
        <?php if($provider->area):?>
        <tr>
          <td><?php echo $lang->provider->area;?></td>
          <td><?php echo zget($areas, $provider->area, '');?></td>
        </tr>
        <?php endif;?>
        <?php if($provider->weibo):?>
        <tr>
          <td><?php echo $lang->provider->weibo;?></td>
          <td><?php echo html::a("$provider->weibo", $provider->weibo, "target='_blank'");?></td>
        </tr>
        <?php endif;?>
        <?php if($provider->weixin):?>
        <tr>
          <td><?php echo $lang->provider->weixin;?></td>
          <td><?php echo $provider->weixin;?></td>
        </tr>
        <?php endif;?>
        <?php if($provider->site):?>
        <tr>
          <td><?php echo $lang->provider->site;?></td>
          <td><?php echo html::a("$provider->site", $provider->site, "target='_blank'");?></td>
        </tr>
        <?php endif;?>
      </table>
    </div>

    <?php if(!empty($contacts)):?>
    <div class='box'>
      <table class='table bordered'>
        <thead>
          <tr>
            <th class='w-100px'><?php echo $lang->provider->contact;?></th>
            <th class='w-120px'><?php echo $lang->provider->phone;?></th>
            <th class='text-center'><?php echo $lang->provider->email;?></th>
          </tr>
        </thead>
        <?php foreach($contacts as $contact):?>
        <tr>
          <td><?php echo html::a($this->createLink('crm.contact', 'view', "contactID={$contact->id}"), $contact->realname);?></td>
          <td><?php echo html::a("tel:$contact->phone", $contact->phone);?></td>
          <td class='text-center'><?php echo $contact->email;?></td>
        </tr>
        <?php endforeach;?>
      </table>
    </div>
    <?php endif;?>
  </div>

  <div class='section' id='history'>
    <?php echo $this->fetch('action', 'history', "objectType=provider&objectID={$provider->id}");?>
  </div>

  <nav class='nav affix dock-bottom nav-auto footer-actions'>
  <?php
    $canCreateRecord = commonModel::hasPriv('action', 'createRecord');
    $canEdit         = commonModel::hasPriv('provider', 'edit');
    $canDelete       = commonModel::hasPriv('provider', 'delete');

    echo "<a data-remote='{$this->createLink('crm.provider', 'contact', "providerID={$provider->id}")}' data-display='modal' data-name='providerContactsModal' data-placement='bottom'>{$lang->provider->contact}</a>";
    if($canEdit) echo "<a data-remote='{$this->createLink('crm.provider', 'edit', "providerID={$provider->id}")}' data-display='modal' data-placement='bottom'>{$lang->edit}</a>";

    if($canDelete) echo "<a data-remote='{$this->createLink('crm.provider', 'delete', "providerID=$provider->id")}' class='danger' data-display='ajaxAction' data-ajax-delete='true' data-locate='{$this->createLink('crm.provider', 'browse')}'>{$lang->delete}</a>";
  ?>
  </nav>
</div>
<?php include "../../common/view/m.footer.html.php"; ?>
