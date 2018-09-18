<?php
/**
 * The edit mobile view file of customer module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     customer 
 * @version     $Id: index.html.php 3830 2016-05-18 09:34:17Z liugang $
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>

<div class='heading divider'>
  <div class='title'><i class='icon-pencil muted'></i> <strong><?php echo $lang->customer->edit ?></strong></div>
  <nav class='nav'><a data-dismiss='display'><i class='icon-remove muted'></i></a></nav>
</div>

<form class='content box' data-form-refresh='#page' method='post' id='editCustomerForm' action='<?php echo $this->createLink('customer', 'edit', "customerID=$customer->id")?>'>
  <div class='control'>
    <div class='checkbox pull-right'>
      <input type='checkbox' id='public' name='public' value='1' <?php if($customer->public) echo 'checked';?>>
      <label for='public'><?php echo $lang->customer->public;?></label>
    </div>
    <label><?php echo $lang->customer->name;?></label>
    <?php echo html::input('name', $customer->name, "class='input'");?>
  </div>
  <div class='control'>
    <label for='intension'><?php echo $lang->customer->intension;?></label>
    <?php echo html::textarea('intension', $customer->intension, "rows='2' class='textarea'");?>
  </div>
  <div class='control'>
    <label for='desc'><?php echo $lang->customer->desc;?></label>
    <?php echo html::textarea('desc', $customer->desc, "rows='2' class='textarea'");?>
  </div>

  <div class='space'></div>
  <div class='heading gray'>
    <div class='title text-important'><?php echo $lang->basicInfo; ?></div>
  </div>
  <div class='control'>
    <label for='relation'><?php echo $lang->customer->relation;?></label>
    <div class='select'><?php echo html::select('relation', $lang->customer->relationList, $customer->relation);?></div>
  </div>
  <div class='row'>
    <div class='cell-6'>
      <div class='control'>
        <label for='level'><?php echo $lang->customer->level;?></label>
        <div class='select'><?php echo html::select('level', $levelList, $customer->level);?></div>
      </div>
    </div>
    <div class='cell-6'>
      <div class='control'>
        <label for='status'><?php echo $lang->customer->status;?></label>
        <div class='select'><?php echo html::select('status', $lang->customer->statusList, $customer->status);?></div>
      </div>
    </div>
    <div class='cell-6'>
      <div class='control'>
        <label for='size'><?php echo $lang->customer->size;?></label>
        <div class='select'><?php echo html::select('size', $sizeList, $customer->size);?></div>
      </div>
    </div>
    <div class='cell-6'>
      <div class='control'>
        <label for='type'><?php echo $lang->customer->type;?></label>
        <div class='select'><?php echo html::select('type', $lang->customer->typeList, $customer->type);?></div>
      </div>
    </div>
  </div>
  <div class='control'>
    <label for='industry'><?php echo $lang->customer->industry;?></label>
    <div class='select'><?php echo html::select('industry', $industryList, $customer->industry);?></div>
  </div>
  <div class='control'>
    <label for='area'><?php echo $lang->customer->area;?></label>
    <div class='select'><?php echo html::select('area', $areaList, $customer->area);?></div>
  </div>
  <div class='control'>
    <label for='weibo'><?php echo $lang->customer->weibo;?></label>
    <input type='url' value='<?php echo $customer->weibo ? $customer->weibo : 'http://weibo.com/'?>' class='input' id='weibo' name='weibo'>
  </div>
  <div class='control'>
    <label for='weixin'><?php echo $lang->customer->weixin;?></label>
    <?php echo html::input('weixin', $customer->weixin, "class='input'");?>
  </div>
  <div class='control'>
    <label for='site'><?php echo $lang->customer->site;?></label>
    <input type='url' value='<?php echo $customer->site ? $customer->site : 'http://'?>' class='input' id='site' name='site'>
  </div>
</form>

<div class='footer has-padding'>
  <button type='button' data-submit='#editCustomerForm' class='btn primary'><?php echo $lang->save ?></button>
</div>

<script>
$(function()
{
    $('#editCustomerForm').modalForm().listenScroll({container: 'parent'});
});
</script>
