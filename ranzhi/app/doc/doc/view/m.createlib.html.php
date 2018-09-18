<?php
/**
 * The create lib mobile view file of doc module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     doc 
 * @version     $Id
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>

<div class='heading divider'>
  <div class='title'><i class='icon-plus muted'></i> <strong><?php echo $lang->doc->createLib;?></strong></div>
  <nav class='nav'><a data-dismiss='display'><i class='icon-remove muted'></i></a></nav>
</div>

<form class='content box' data-form-refresh='#page' method='post' id='createLibForm' action='<?php echo $this->createLink('doc', 'createLib');?>'>
  <div class='control'>
    <label for='libType'><?php echo $lang->doc->libType;?></label>
    <div class='select'>
      <?php echo html::select('libType', $lang->doc->libTypeList, $type);?>
    </div>
  </div>
  <div class='control project hidden'>
    <label for='project'><?php echo $lang->doc->project;?></label>
    <div class='select'>
      <?php echo html::select('project', $projects, $projectID);?>
    </div>
  </div>
  <div class='control'>
    <div class='checkbox pull-right'>
      <input type='checkbox' name='private' id='private' value='1'>
      <label for='private' class='text-link'><?php echo $lang->doc->private;?></label>
    </div>
    <label for='name'><?php echo $lang->doc->libName;?></label>
    <?php echo html::input('name', '', "class='input' placeholder='{$lang->required}'");?>
  </div>
  <div class='control' id='userDIV'>
    <label for='users'><?php echo $lang->doc->users;?></label>
    <div class='select'><?php echo html::select('users[]', $users, '', 'multiple');?></div>
  </div>
  <div class='control' id='groupDIV'>
    <label for='groups'><?php echo $lang->doc->groups;?></label>
    <?php foreach($groups as $key => $group):?>
    <div class='checkbox inline-block'>
      <input type='checkbox' value=<?php echo $key;?> name='groups[]' id="group<?php echo $key;?>">
      <label for='groups[]'><?php echo $group;?></label>
    </div>
    <?php endforeach;?>
  </div>
</form>

<div class='footer has-padding'>
  <button type='button' data-submit='#createLibForm' class='btn primary'><?php echo $lang->save;?></button>
</div>

<script>
$(function()
{
    $('#createLibForm').modalForm().listenScroll({container: 'parent'});
    $('#libType').change(function()
    {   
        var libType = $(this).val();
        if(libType == 'project')
        {   
            $('.content div.project').removeClass('hidden');
        }   
        else
        {   
            $('.content div.project').addClass('hidden');
        }   
    }); 

    $('#libType').change();

    $('#private').click(function()
    {   
        $('#userDIV').toggle();
        $('#groupDIV').toggle();

        if($(this).prop('checked'))
        {   
            $('#users').val('');
            $('#users').trigger('chosen:updated');
            $('[name*=groups]').prop('checked', false);
        }   
    }); 
});
</script>
