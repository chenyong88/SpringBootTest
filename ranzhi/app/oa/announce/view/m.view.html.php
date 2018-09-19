<?php
/**
 * The view mobile view file of contract module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     contract 
 * @version     $Id: index.html.php 3830 2016-05-18 09:34:17Z liugang $
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}

$moduleMenu = false;
$bodyClass  = 'with-nav-bottom';
$browseLink = inlink('browse');
include "../../common/view/m.header.html.php";
?>

<div id='page' class='list-with-actions'>
  <div class='section'>
    <div class='heading gray'>
      <div class='title'><i class='icon-calendar'> </i><?php echo $lang->announce->view;?></div>
      <nav class='nav'><a class='btn primary' href='<?php echo $browseLink;?>'><?php echo $lang->goback ?></a></nav>
    </div>
    <div class='box'>
      <table class='table bordered table-detail'>
        <tr>
          <td class='w-80px'><?php echo $lang->article->title;?></td>
          <td><?php echo $announce->title;?></td>
        </tr>
        <tr>
          <td><?php echo $lang->article->content;?></td>
          <td><?php echo $announce->content;?></td>
        </tr>
        <tr>
          <td><?php echo $lang->article->category;?></td>
          <td><?php echo $category->name;?></td>
        </tr>
        <tr>
          <td><?php echo $lang->article->author?></td>
          <td><?php echo zget($users, $announce->author);?></td>
        </tr>
        <tr>
          <td><?php echo $lang->article->createdDate?></td>
          <td><?php echo formatTime($announce->createdDate);?></td>
        </tr>
        <tfoot>
          <td colspan='2' class='text-left'>
            <strong><?php printf($lang->article->lblReaders, count($readers));?></strong>
            <?php echo ' ' . implode(', ', $readers);?>
          </td>
        </tfoot>
      </table>
    </div>
  </div>
  <nav class='nav affix dock-bottom nav-auto footer-actions'>
    <?php
    if(commonModel::hasPriv('announce', 'edit')) echo "<a data-remote='{$this->createLink('announce', 'edit', "announceID=$announce->id")}' class='primary' data-display='modal' data-placement='bottom'>{$lang->edit}</a>";
    if(commonModel::hasPriv('announce', 'delete')) echo "<a data-remote='{$this->createLink('announce', 'delete', "announceID=$announce->id")}' class='danger' data-display='ajaxAction' data-ajax-delete='true' data-locate='{$this->createLink('oa.announce', 'browse')}'>{$lang->delete}</a>";
    ?>
  </nav>
</div>
<?php include "../../common/view/m.footer.html.php"; ?>
