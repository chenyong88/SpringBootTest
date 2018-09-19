<?php
/**
 * The create mobile view file of project module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     project 
 * @version     $Id
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>
<?php 
$moduleMenu = false;
$bodyClass  = 'with-nav-bottom';
?>
<?php if(!helper::isAjaxRequest()) include "../../common/view/m.header.html.php";?>

<div class='heading divider'>
  <div class='title'><i class='icon-plus muted'></i> <strong><?php echo $lang->project->create;?></strong></div>
  <?php if(helper::isAjaxRequest()):?>
  <nav class='nav'><a data-dismiss='display'><i class='icon-remove muted'></i></a></nav>
  <?php endif;?>
</div>

<form class='content box' data-form-refresh='#page' method='post' id='createProjectForm' action='<?php echo $this->createLink('project', 'create');?>'>
  <div class='control'>
    <label for='name'><?php echo $lang->project->name;?></label>
    <?php echo html::input('name', '', "class='input' placeholder='{$lang->required}'");?>
  </div>
  <div class='control'>
    <label for='manager'><?php echo $lang->project->manager;?></label>
    <div class='select'><?php echo html::select('manager', $users, $this->app->user->account);?></div>
  </div>
  <div class='control'>
    <label for='member'><?php echo $lang->project->member;?></label>
    <div class='select multiple'><?php echo html::select('member[]', $users, $this->app->user->account, 'multiple');?></div>
  </div>
  <div class='control'>
    <label for='begin'><?php echo $lang->project->begin;?></label>
    <input type='date' class='input' id='begin' name='begin' placeholder='<?php echo $lang->required;?>'>
  </div>
  <div class='control'>
    <label for='end'><?php echo $lang->project->end;?></label>
    <input type='date' class='input' id='end' name='end' placeholder='<?php echo $lang->required;?>'>
  </div>
  <div class='control'>
    <label for='desc'><?php echo $lang->project->desc;?></label>
    <?php echo html::textarea('desc', '', "rows='5' class='textarea'");?>
  </div>
  <div class='control'>
    <label for='whitelist'><?php echo $lang->project->whitelist . ' ' . html::a('javascript:void(0)', "<i class='icon-question-sign'></i>", "data-original-title='{$lang->project->whitelistTip}' data-toggle='tooltip'");?></label>
    <?php foreach($groups as $key => $group):?>
    <div class='checkbox inline-block'>
      <input type='checkbox' value=<?php echo $key;?> name='whitelist[]' id="whitelist<?php echo $key;?>">
      <label for='whitelist[]'><?php echo $group;?></label>
    </div>
    <?php endforeach;?>
  </div>
</form>

<div class='footer has-padding'>
  <button type='button' data-submit='#createProjectForm' class='btn primary'><?php echo $lang->save;?></button>
</div>

<script>
$(function()
{
    <?php if(!helper::isAjaxRequest()):?>
    $('#createProjectForm').ajaxform();
    <?php else:?>
    $('#createProjectForm').modalForm().listenScroll({container: 'parent'});
    <?php endif;?>
});
</script>
<?php if(!helper::isAjaxRequest()) include "../../common/view/m.footer.html.php";?>
