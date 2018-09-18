<?php
/**
 * The create mobile view file of doc module of RanZhi.
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
  <div class='title'><i class='icon-plus muted'></i> <strong><?php echo $lang->doc->create ?></strong></div>
  <nav class='nav'><a data-dismiss='display'><i class='icon-remove muted'></i></a></nav>
</div>

<form class='content box' data-form-refresh='#page' method='post' id='createDocForm' action='<?php echo $this->createLink('doc', 'create', "libID=$libID")?>'>
  <div class='control'>
    <div class='checkbox pull-right'>
      <input type='checkbox' name='private' id='private' value='1'>
      <label for='private' class='text-link'><?php echo $lang->doc->private;?></label>
    </div>
    <label for='module'><?php echo $lang->doc->category;?></label>
    <div class='select'><?php echo html::select('module', $moduleOptionMenu, $moduleID);?></div>
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
  <div class='control'>
    <label for='type'><?php echo $lang->doc->type;?></label>
    <?php foreach($lang->doc->types as $key => $type):?>
    <div class='radio inline-block'>
      <?php $checked = $key == 'text' ? "checked='checked'" : '';?>
      <input type='radio' name='type' value="<?php echo $key;?>" <?php echo $checked;?>>
      <label for="type"><?php echo $type;?></label>
    </div>
    <?php endforeach;?>    
  </div>
  <div class='control'>
    <label for='title'><?php echo $lang->doc->title;?></label>
    <?php echo html::input('title', '', "class='input' placeholder='{$lang->required}'");?>
    <?php echo html::hidden('lib', $libID);?>
  </div>
  <div class='control hidden' id='urlBox'>
    <label for='url'><?php echo $lang->doc->url;?></label>
    <?php echo html::input('url', '', "class='input'");?>
  </div>
  <div class='control' id='contentBox'>
    <label for='content'><?php echo $lang->doc->content;?></label>
    <?php echo html::textarea('content', '',"rows='5' class='textarea'");?>
    <?php echo html::hidden('contentType', 'html');?>
  </div>
  <div class='control'>
    <label for='keywords'><?php echo $lang->doc->keywords;?></label>
    <?php echo html::input('keywords', '', "class='input'");?>
  </div>
  <div class='control'>
    <label for='digest'><?php echo $lang->doc->digest;?></label>
    <?php echo html::textarea('digest', '',"rows='5' class='textarea'");?>
  </div>
  <div class='control'>
    <?php echo $this->fetch('file', 'buildForm', 'fileCount=1');?>
  </div>
</form>

<div class='footer has-padding'>
  <button type='button' data-submit='#createDocForm' class='btn primary'><?php echo $lang->save;?></button>
</div>

<script>
$(function()
{
    $form = $('#createDocForm').modalForm().listenScroll({container: 'parent'});

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

    $('[name=type]').on('click', function()
    {
        var type = $(this).val()
        setType(type);
    });

    var setType = function(type)
    {
        if(type == 'url')
        {   
            $('#urlBox').removeClass('hidden');
            $('#contentBox').addClass('hidden');
        }   
        else if(type == 'text')
        {   
            $('#urlBox').addClass('hidden');
            $('#contentBox').removeClass('hidden');
        }   
    }
})
</script>
