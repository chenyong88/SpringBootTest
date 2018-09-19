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
  <?php foreach($boards as $parentBoard):?>
  <div class='heading gray'><div class='title'><?php echo $parentBoard->name;?></div></div>
  <div class='box'>
    <table class='table bordered'>
      <thead>
        <tr>
          <th><?php echo $lang->forum->board;?></th>
          <th class='w-70px'><?php echo $lang->forum->threadCount;?></th>
          <th class='w-70px'><?php echo $lang->forum->postCount;?></th>
          <th class='w-70px text-center'><?php echo $lang->forum->owners;?></th>
        </tr>
      </thead>
      <?php foreach($parentBoard->children as $childBoard):?>
      <tr class='text-center'>
        <td class='text-left'><?php echo html::a($this->createLink('team.forum', 'board', "id=$childBoard->id"), $childBoard->name);?></th>
        <td><?php echo $childBoard->threads;?></th>
        <td><?php echo $childBoard->posts;?></th>
        <td><?php echo trim(implode(',', $childBoard->moderators), ',');?></th>
      </tr>
      <?php endforeach;?>
    </table>
  </div>
  <?php endforeach;?>
</section>
<?php include "../../common/view/m.footer.html.php"; ?>
