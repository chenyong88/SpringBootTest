<?php
/**
 * The index mobile view file of blog module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     blog 
 * @version     $Id
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}
include "../../common/view/m.header.html.php";
?>
<div class='heading'>
  <div class='title'> <i class='icon icon-list'></i> <?php echo $lang->blog->list;?></div>
  <nav class='nav'>
    <a class='btn primary' data-display='modal' data-placement='bottom' data-remote='<?php echo $this->createLink('blog', 'create') ?>'>
      <i class='icon icon-plus'></i> &nbsp;&nbsp;<?php echo $lang->blog->create;?>
    </a>
  </nav>
</div>
<section id='page' class='section list-with-pager'>
  <?php $refreshUrl = $category ? $this->createLink('blog', 'index', "categoryID={$category->id}") : $this->createLink('blog', 'index');?>
  <div class='box' data-page='<?php echo $pager->pageID ?>' data-refresh-url='<?php echo $refreshUrl ?>'>
    <table class='table no-margin'>
    <?php foreach($articles as $article):?>
    <tr data-id='<?php echo $article->id;?>' data-url='<?php echo inlink('view', "articleID=$article->id"); ?>'>
      <td><?php echo $article->title;?></td>
      <td class='w-100px'><?php echo substr($article->createdDate, 0, 10);?></td>
    </tr>
    <?php endforeach;?>
    </table>
  </div>

  <nav class='nav justify pager'>
    <?php $pager->show($align = 'justify');?>
  </nav>
</section>

<?php include "../../common/view/m.footer.html.php"; ?>
