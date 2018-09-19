<?php
/**
 * The index mobile view file of forum module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     forum 
 * @version     $Id
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}
include "../../common/view/m.header.html.php";
?>
<section id='page' class='section list-with-pager'>
  <div class='heading gray'>
    <div class='title'><i class='icon-list'> </i><?php echo $lang->forum->threadList;?></div>
    <nav class='nav'>
      <a title='<?php echo $lang->forum->post;?>' data-display='modal' data-placement='bottom' data-remote='<?php echo $this->createLink('thread', 'post', "boardID=$board->id");?>' class='btn primary'><i class='icon icon-plus'></i>&nbsp;&nbsp; <?php echo $lang->forum->post;?></a>
    </nav>
  </div>
  <div class='box'>
    <table class='table bordered'>
      <thead>
        <tr>
          <th class='w-70px'><?php echo $lang->thread->author;?></th>
          <th><?php echo $lang->thread->title;?></th>
          <th class='w-70px'><?php echo $lang->thread->postedDate;?></th>
        </tr>
      </thead>
      <?php foreach($threads as $id => $thread):?>
      <tr data-id='<?php echo $id?>' data-url='<?php echo $this->createLink('team.thread', 'view', "id=$thread->id"); ?>'>
        <td><?php echo $thread->authorRealname;?></td>
        <td><?php echo $thread->title;?></td>
        <td><?php echo substr($thread->createdDate, 5, 5);?></td>
      </tr>
      <?php endforeach;?>
    </table>
  </div>
</section>
<?php include "../../common/view/m.footer.html.php"; ?>
