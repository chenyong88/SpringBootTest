<?php
/**
 * The transform mobile view file of leads module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     leads 
 * @version     $Id: index.html.php 3830 2016-05-18 09:34:17Z liugang $
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}?>

<div class='heading divider'>
  <div class='title'><strong><?php echo $lang->leads->transform ?></strong></div>
  <nav class='nav'><a data-dismiss='display'><i class='icon-remove muted'></i></a></nav>
</div>

<form class='content box' data-form-refresh='#page' method='post' id='transformLeadsForm' action='<?php echo $this->createLink('leads', 'transform', "contactID={$contact->id}&status=normal")?>'>
  <div class='control'>
    <div class='checkbox pull-right'>
      <input type='checkbox' name='selectCustomer' id='selectCustomer' value='1'/>
      <label for='selectCustomer'><?php echo $lang->contact->selectCustomer;?></label>
    </div>
    <label for='customer'><?php echo $lang->contact->customer;?></label>
    <?php echo html::input('name', $contact->company ? $contact->company : '', "class='input'");?>
    <div class='select hidden'><?php echo html::select('customer', $customers);?></div>
  </div>
</form>

<div class='footer has-padding'>
  <button type='button' data-submit='#transformLeadsForm' class='btn primary'><?php echo $lang->save ?></button>
</div>

<script>
$(function()
{
    $('#transformLeadsForm').modalForm().listenScroll({container: 'parent'});

    $('#selectCustomer').on('change', function()
    {
        var checked = $(this).is(':checked');
        $('#name').toggleClass('hidden', checked);
        $('#customer').parent().toggleClass('hidden', !checked);
    });
});
</script>
