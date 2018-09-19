<?php
/**
 * The edit mobile view file of project module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     project 
 * @version     $Id
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>

<div class='heading divider'>
  <div class='title'><i class='icon-pencil muted'></i> <strong><?php echo $lang->project->edit;?></strong></div>
  <nav class='nav'>
    <a class='text-primary' data-display='modal' data-remote='<?php echo $this->createLink('action', 'history', "objectType=project&objectID={$project->id}") ?>' data-placement='bottom'><i class='icon-history'></i>&nbsp;<?php echo $lang->history;?></a>
    <a data-dismiss='display'><i class='icon-remove muted'></i></a>
  </nav>
</div>

<form class='content box' data-form-refresh='#page' method='post' id='editProjectForm' action='<?php echo $this->createLink('project', 'edit', "projectIT={$project->id}");?>'>
  <div class='control'>
    <label for='name'><?php echo $lang->project->name;?></label>
    <?php echo html::input('name', $project->name, "class='input' placeholder='{$lang->required}'");?>
  </div>
  <div class='control'>
    <label for='manager'><?php echo $lang->project->manager;?></label>
    <div class='select'><?php echo html::select('manager', $users, $project->PM);?></div>
  </div>
  <div class='control'>
    <label for='begin'><?php echo $lang->project->begin;?></label>
    <input type='date' class='input' id='begin' name='begin' value='<?php echo $project->begin;?>' placeholder='<?php echo $lang->required;?>'>
  </div>
  <div class='control'>
    <label for='end'><?php echo $lang->project->end;?></label>
    <input type='date' class='input' id='end' name='end' value='<?php echo $project->end;?>' placeholder='<?php echo $lang->required;?>'>
  </div>
  <div class='control'>
    <label for='desc'><?php echo $lang->project->desc;?></label>
    <?php echo html::textarea('desc', $project->desc, "rows='5' class='textarea'");?>
  </div>
  <div class='control'>
    <label for='whitelist'><?php echo $lang->project->whitelist . ' ' . html::a('javascript:void(0)', "<i class='icon-question-sign'></i>", "data-original-title='{$lang->project->whitelistTip}' data-toggle='tooltip'");?></label>
    <?php foreach($groups as $key => $group):?>
    <?php $checked = strpos(',' . $project->whitelist . ',', ',' . $key . ',') !== false ? "checked='checked'" : '';?>
    <div class='checkbox inline-block'>
      <input type='checkbox' value=<?php echo $key;?> name='whitelist[]' id="whitelist<?php echo $key;?>" <?php echo $checked;?>>
      <label for='whitelist[]'><?php echo $group;?></label>
    </div>
    <?php endforeach;?>
  </div>
</form>

<div class='footer has-padding'>
  <button type='button' data-submit='#editProjectForm' class='btn primary'><?php echo $lang->save;?></button>
</div>

<script>
$(function()
{
    $('#editProjectForm').modalForm().listenScroll({container: 'parent'});
});
</script>
<?php if(!helper::isAjaxRequest()) include "../../common/view/m.footer.html.php";?>
