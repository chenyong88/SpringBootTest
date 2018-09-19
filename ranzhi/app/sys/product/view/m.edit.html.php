<?php
/**
 * The edit mobile view file of product module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     product 
 * @version     $Id: index.html.php 3830 2016-05-18 09:34:17Z liugang $
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>

<div class='heading divider'>
  <div class='title'><i class='icon-pencil muted'></i> <strong><?php echo $lang->product->edit ?></strong></div>
  <nav class='nav'><a data-dismiss='display'><i class='icon-remove muted'></i></a></nav>
</div>

<form class='content box' data-form-refresh='#page' method='post' id='editProductForm' action='<?php echo $this->createLink('product', 'edit', "productID=$product->id")?>'>
  <div class='control'>
    <label for='name'><?php echo $lang->product->name;?></label>
    <?php echo html::input('name', $product->name, "class='input' placeholder='{$lang->required}'");?>
  </div>
  <div class='control'>
    <label for='code'><?php echo $lang->product->code;?></label>
    <?php echo html::input('code', $product->code, "class='input' placeholder='{$lang->required}'");?>
  </div>
  <div class='control'>
    <label for='category'><?php echo $lang->product->category;?></label>
    <div class='select'><?php echo html::select('category', $categories, $product->category);?></div>
  </div>
  <div class='row'>
    <div class='cell-6'>
      <div class='control'>
        <label for='type'><?php echo $lang->product->type;?></label>
        <div class='select'><?php echo html::select('type', $lang->product->typeList, $product->type);?></div>
      </div>
    </div>
    <div class='cell-6'>
      <div class='control'>
        <label for='status'><?php echo $lang->product->status;?></label>
        <div class='select'><?php echo html::select('status', $lang->product->statusList, $product->status);?></div>
      </div>
    </div>
  </div>
</form>

<div class='footer has-padding'>
  <button type='button' data-submit='#editProductForm' class='btn primary'><?php echo $lang->save ?></button>
</div>

<script>
$(function()
{
    $('#editProductForm').modalForm().listenScroll({container: 'parent'});
});
</script>
