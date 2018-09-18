<?php
/**
 * The blog block mobile view file of block module of RanZhi.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
include "../../../sys/common/view/m.avatar.html.php";
?>
<table class='table bordered compact no-margin'>
  <?php foreach($blogs as $blog):?>
  <tr data-id='<?php echo $blog->id;?>' data-url='<?php echo $this->createLink('team.blog', 'view', "id=$blog->id"); ?>'>
    <td><?php echo $blog->title;?></td>
    <td class='w-70px'><?php echo zget($users, $blog->author);?></td>
    <td class='w-60px'><?php echo substr($blog->createdDate, 5, 5);?></td>
  </tr>
  <?php endforeach;?>
</table>
