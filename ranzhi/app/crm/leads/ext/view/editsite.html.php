<?php
/**
 * The edit site view of leads module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     leads 
 * @version     $Id: create.html.php 3294 2015-12-02 01:19:46Z liugang $
 * @link        http://www.ranzhico.com
 */
include '../../../common/view/header.html.php';
include '../../../../sys/common/view/chosen.html.php';
?>
<div class='with-side'>
  <?php include 'side.html.php';?>
  <div class='main'>
    <div class='panel'>
      <div class='panel-heading'>
        <strong><i class='icon-edit'></i> <?php echo $lang->leads->editSite;?></strong>
      </div>
      <div class='panel-body'>
        <form method='post' id='ajaxForm'>
          <table class='table table-form'>
            <tr>
              <th class='w-80px'><?php echo $lang->leads->name;?></th>
              <td class='w-p50'>
                <div class='required required-wrapper'></div>
                <?php echo html::input('name', $site->name, "class='form-control' placeholder='{$lang->leads->tips->name}'");?>
              </td>
              <td></td>
            </tr>
            <tr>
              <th><?php echo $lang->leads->code;?></th>
              <td>
                <div class='required required-wrapper'></div>
                <?php echo html::input('code', $site->code, "class='form-control' placeholder='{$lang->leads->tips->code}'");?>
              </td>
              <td></td>
            </tr>
            <tr>
              <th><?php echo $lang->leads->url;?></th>
              <td>
                <div class='required required-wrapper'></div>
                <?php echo html::input('url', $site->url, "class='form-control' placeholder='{$lang->leads->tips->url}'");?>
              </td>
              <td></td>
            </tr>
            <tr>
              <th><?php echo $lang->leads->key;?></th>
              <td><?php echo html::input('key', $site->key, "class='form-control' readonly='readonly'");?></td>
              <td><span class="help-inline"><?php echo html::a('javascript:void(0)', $lang->leads->createKey, 'onclick="createKey()"')?></span></td>
            </tr>
            <tr>
              <th><?php echo $lang->leads->modules;?></th>
              <td>
                <div class='required required-wrapper'></div>
                <?php echo html::select('modules[]', $lang->leads->actionList, $site->modules, "class='form-control chosen' multiple='multiple'");?>
              </td>
            </tr>
            <tr>
              <th></th><td><?php echo html::submitButton() . ' ' . html::backButton();?></td><td></td>
            </tr>
          </table>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include '../../../common/view/footer.html.php';?>
