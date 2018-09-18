<?php
/**
 * The mobile view file of blog module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     blog 
 * @version     $Id
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}
$moduleMenu = false;
$bodyClass  = 'with-nav-bottom';
$browseLink = !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : inlink('index'); 
include "../../common/view/m.header.html.php";
?>
<div id='page' class='list-with-actions'>
  <div class='section'>
    <div class='heading gray'>
      <div class='title'><i class='icon-calendar'> </i><?php echo $lang->blog->view;?></div>
      <nav class='nav'><a class='btn primary' href='<?php echo $browseLink;?>'><?php echo $lang->goback ?></a></nav>
    </div>
    <div class='box'>
      <table class='table bordered table-detail'>
        <tr>
          <td class='w-80px'><?php echo $lang->article->title;?></td>
          <td><?php echo $article->title;?></td>
        </tr>
        <?php if(!empty($article->summary)):?>
        <tr>
          <td><?php echo $lang->article->summary;?></td>
          <td><?php echo $article->summary;?></td>
        </tr>
        <?php endif;?>
        <tr>
          <td><?php echo $lang->article->content;?></td>
          <td><?php echo $article->content;?></td>
        </tr>
        <?php if(!empty($article->keywords)):?>
        <tr>
          <td><?php echo $lang->article->keywords;?></td>
          <td><?php echo $article->keywords;?></td>
        </tr>
        <?php endif;?>
        <tr>
          <td><?php echo $lang->article->views;?></td>
          <td><?php echo $article->views;?></td>
        </tr>
        <tr>
          <td><?php echo $lang->article->author;?></td>
          <td><?php echo zget($users, $article->author) . ' ' . $article->createdDate;?></td>
        </tr>
        <?php if(!empty($article->editedBy)):?>
        <tr>
          <td><?php echo $lang->article->editedBy;?></td>
          <td><?php echo zget($users, $article->editedBy) . ' ' . $article->editedDate;?></td>
        </tr>
        <?php endif;?>
      </table>
    </div>
  </div>

   <nav class='nav nav-auto affix dock-bottom footer-actions'>
    <?php
    $canEdit   = commonModel::hasPriv('blog', 'edit');
    $canDelete = commonModel::hasPriv('blog', 'delete');

    if($canEdit) echo "<a data-remote='{$this->createLink('blog', 'edit', "id=$article->id")}' class='primary'  data-display='modal' data-placement='bottom'>{$lang->edit}</a>";
    if($canDelete) echo "<a data-remote='{$this->createLink('blog', 'delete', "id=$article->id")}' class='danger' data-display='ajaxAction' data-ajax-delete='true' data-locate='{$this->createLink('blog', 'index')}'>{$lang->delete}</a>";
    ?>
  </nav>
</div>
<?php include "../../common/view/m.footer.html.php"; ?>
