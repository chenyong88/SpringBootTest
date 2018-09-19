<?php
/**
 * The view mobile view file of product module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     product 
 * @version     $Id: index.html.php 3830 2016-05-18 09:34:17Z liugang $
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}

$moduleMenu = false;
$bodyClass  = 'with-nav-bottom';
$browseLink = !empty($this->session->productList) ? $this->session->productList : inlink('browse'); 
include "../../common/view/m.header.html.php";
?>

<div id='page' class='list-with-actions'>
  <div class='section no-margin'>
    <div class='heading gray'>
      <div class='title'><i class='icon-calendar'> </i><?php echo $lang->product->view;?></div>
      <nav class='nav'><a class='btn primary' href='<?php echo $browseLink;?>'><?php echo $lang->goback ?></a></nav>
    </div>
    <div class='box'>
      <table class='table bordered table-detail'>
        <tr>
          <td class='w-80px'><?php echo $lang->product->name;?></td>
          <td><?php echo $product->name;?></td>
        </tr>
        <tr>
          <td><?php echo $lang->product->code;?></td>
          <td><?php echo $product->code;?></td>
        </tr>
        <tr>
          <td><?php echo $lang->product->category;?></td>
          <td><?php echo zget($categories, $product->category);?></td>
        </tr>
        <tr>
          <td><?php echo $lang->product->type;?></td>
          <td><?php echo $lang->product->typeList[$product->type];?></td>
        </tr>
        <tr>
          <td><?php echo $lang->product->status;?></td>
          <td><?php echo zget($lang->product->statusList, $product->status);?></td>
        </tr>
        <tr>
          <td><?php echo $lang->product->createdBy;?></td>
          <td><?php echo zget($users, $product->createdBy) . $lang->at . $product->createdDate;?></td>
        </tr>
        <?php if($product->editedBy):?>
        <tr>
          <td><?php echo $lang->product->editedBy;?></td>
          <td><?php echo zget($users, $product->editedBy) . $lang->at . $product->editedDate;?></td>
        </tr>
        <?php endif;?>
      </table>
    </div>
  </div>

  <div class='section' id='history'>
    <?php echo $this->fetch('action', 'history', "objectType=product&objectID={$product->id}");?>
  </div>

  <nav class='nav affix dock-bottom nav-auto footer-actions'>
  <?php
    $canEdit   = commonModel::hasPriv('product', 'edit');
    $canDelete = commonModel::hasPriv('product', 'delete');

    if($canEdit) echo "<a data-remote='{$this->createLink('crm.product', 'edit', "productID={$product->id}")}' class='primary' data-display='modal' data-placement='bottom'>{$lang->edit}</a>";

    if($canDelete) echo "<a data-remote='{$this->createLink('crm.product', 'delete', "productID=$product->id")}' class='danger' data-display='ajaxAction' data-ajax-delete='true' data-locate='{$this->createLink('crm.product', 'browse')}'>{$lang->delete}</a>";
  ?>
  </nav>
</div>

<?php include "../../common/view/m.footer.html.php"; ?>
