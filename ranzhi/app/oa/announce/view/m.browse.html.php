<?php
/**
 * The browse mobile view file of announce module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     announce 
 * @version     $Id
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}
$moduleMenu = false;
include "../../common/view/m.header.html.php";
?>

<div class='heading'>
  <div class='title'><i class='icon icon-list'></i> <?php echo $lang->announce->list;?></div>
  <nav class='nav'>
    <a class='btn primary' data-display='modal' data-placement='bottom' data-remote='<?php echo $this->createLink('announce', 'create') ?>'>
      <i class='icon icon-plus'></i> &nbsp;&nbsp;<?php echo $lang->announce->create;?>
    </a>
  </nav>
</div>

<section id='page' class='section list-with-pager'>
  <?php $refreshUrl = $this->createLink('announce', 'browse');?>
  <div class='has-padding-h' data-page='<?php echo $pager->pageID;?>' data-refresh-url='<?php echo $refreshUrl;?>'>
    <table class='table no-margin'>
      <?php foreach($announces as $announce):?>
      <tr data-url='<?php echo inlink('view', "announceID={$announce->id}");?>' data-id='<?php echo $announce->id;?>'>
        <td class='w-100px'><?php echo substr($announce->createdDate, 0, 10);?></td>
        <td><?php echo $announce->title;?></td>
        <td class='w-80px text-center'><?php echo zget($users, $announce->author);?></td>
      </tr>
      <?php endforeach;?>
    </table>
  </div>

  <nav class='nav justify pager'>
    <?php $pager->show($align = 'justify');?>
  </nav>
</section>
<?php include "../../common/view/m.footer.html.php"; ?>
