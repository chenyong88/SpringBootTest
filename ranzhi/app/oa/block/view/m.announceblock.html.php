<?php
/**
 * The announce block mobile view file of block module of RanZhi.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<table class='table'>
  <?php foreach($announces as $announce):?>
  <tr>
    <td class='w-100px'><?php echo substr($announce->createdDate, 0, 10);?></td>
    <td><?php echo html::a($this->createLink('oa.announce', 'view', "announceID=$announce->id"), $announce->title);?></td>
  </tr>
  <?php endforeach;?>
</table>
