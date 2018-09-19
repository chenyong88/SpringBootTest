<?php
/**
 * The setSites view file of leads module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     leads 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../common/view/header.html.php';?>
<div id='menuActions'>
  <?php commonModel::printLink('leads', 'createSite', '', $lang->leads->createSite, "class='btn btn-primary'");?>
</div>
<div class='with-side'>
  <?php include 'side.html.php';?>
  <div class='main'>
    <div class='panel'>
      <div class='panel-heading'>
        <strong><i class='icon-building'></i> <?php echo $lang->leads->siteList;?></strong>
      </div>
      <form method='post' id='ajaxForm'>
        <table class='table table-bordered table-hover table-striped'>
          <thead>
            <tr class='text-center'>
              <th class='w-200px'><?php echo $lang->leads->name;?></th>
              <th class='w-100px'><?php echo $lang->leads->code;?></th>
              <th class='w-240px'><?php echo $lang->leads->key;?></th>
              <th class='w-80px'><?php echo $lang->actions;?></th>
            </tr>
          </thead>
          <tbody>
            <?php if(isset($config->leads->sites)):?>
            <?php foreach($config->leads->sites as $site):?>
            <?php $site = json_decode($site);?>
            <tr class='text-left'>
              <td><?php echo $site->name;?></td>
              <td><?php echo $site->code;?></td>
              <td><?php echo $site->key;?></td>
              <td>
              <?php
                commonModel::printLink('leads', 'editSite', "code={$site->code}", $lang->edit);
                commonModel::printLink('leads', 'deleteSite', "code={$site->code}", $lang->delete, "class='deleter'");
              ?>
              </td>
            </tr>
            <?php endforeach;?>
            <?php endif;?>
          </tbody>
        </table>
      </form>
    </div>
  </div>
</div>
<?php include '../../../common/view/footer.html.php';?>
