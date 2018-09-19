<?php
/**
 * The edit mobile view file of blog module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <sunhao@cnezsoft.com>
 * @package     blog 
 * @version     $Id
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>

<div class='heading divider'>
  <div class='title'><i class='icon-plus muted'></i> <strong><?php echo $lang->blog->edit;?></strong></div>
  <nav class='nav'><a data-dismiss='display'><i class='icon-remove muted'></i></a></nav>
</div>

<form class='content box' data-form-refresh='#page' method='post' id='editBlogForm' action='<?php echo $this->createLink('blog', 'edit', "articleID=$article->id")?>'>
  <div class='control'>
    <div class='checkbox pull-right'>
      <input type='checkbox' name='private' id='private' value='1'>
      <label for='private' class='text-link'><?php echo $lang->article->private;?></label>
    </div>
    <label for='categories'><?php echo $lang->article->category;?></label>
    <div class='select'><?php echo html::select('categories[]', $categories, array_keys($article->categories), 'multiple');?></div>
  </div>
  <div class='control' id='userDIV'>
    <label for='users'><?php echo $lang->category->users;?></label>
    <div class='select'><?php echo html::select('users[]', $users, $article->users, 'multiple');?></div>
  </div>
  <div class='control' id='groupDIV'>
    <label for='groups'><?php echo $lang->article->groups;?></label>
    <?php foreach($groups as $key => $group):?>
    <?php $checked = strpos(',' . $article->groups . ',', ',' . $key . ',') !== false ? "checked='checked'" : '';?>
    <div class='checkbox inline-block'>
      <input type='checkbox' value=<?php echo $key;?> name='groups[]' id="group<?php echo $key;?>" <?php echo $checked;?>>
      <label for='groups[]'><?php echo $group;?></label>
    </div>
    <?php endforeach;?>
  </div>
  <div class='control'>
    <label class='title'><?php echo $lang->article->title;?></label>
    <?php echo html::input('title', $article->title, "class='input' placeholder='{$lang->required}'");?>
  </div>
  <div class='control'>
    <label class='keywords'><?php echo $lang->article->keywords;?></label>
    <?php echo html::input('keywords', $article->keywords, "class='input'");?>
  </div>
  <div class='control'>
    <label class='content'><?php echo $lang->article->content;?></label>
    <?php echo html::textarea('content', $article->content, "class='textarea' placeholder='{$lang->required}'");?>
  </div>
</form>

<div class='footer has-padding'>
  <button type='button' data-submit='#editBlogForm' class='btn primary'><?php echo $lang->save ?></button>
</div>

<script>
$(function()
{
    $('#editBlogForm').modalForm().listenScroll({container: 'parent'});

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

    var blogPrivate = '<?php echo $article->private;?>';
    if(blogPrivate == 1) $('#private').click();
})
</script>
