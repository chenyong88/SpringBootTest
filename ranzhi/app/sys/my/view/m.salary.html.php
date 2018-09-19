<?php
/**
 * The order browse mobile view file of my module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Hao Sun <sunhao@cnezsoft.com>
 * @package     my
 * @version     $Id: index.html.php 3830 2016-05-18 09:34:17Z liugang $
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}
?>
<?php $moduleMenu = $this->my->createModuleMenu($this->methodName);?>

<?php $viewable = $this->session->viewlimit > time() || empty($this->config->salary->password->{$this->app->user->account});?>
<?php include '../../common/view/m.header.html.php';?>
<?php js::set('type', $type);?>
<?php js::set('viewable', $viewable);?>
<style>
.align-middle {vertical-align: middle!important;}
</style>

<a data-display='modal' data-placement='bottom' data-remote='<?php echo $this->createLink('my', 'checkPassword');?>' class='checkPassword hidden'></a>

<?php if($viewable):?>
<div class='heading'>
  <div class='title'>
    <a data-display='dropdown' data-placement='beside-bottom-start'><i class='icon-bars'></i> &nbsp; <?php echo $lang->salary->year;?></a>
    <div class='list dropdown-menu'>
      <?php foreach($yearList as $year):?>    
      <a class='item item-year' href='<?php echo inlink('salary', "type=personal&month={$year}");?>'><?php echo $year;?></a>
      <?php endforeach;?>
    </div>
  </div>
  <nav>
    <a class='btn primary pull-right'><?php echo $currentYear;?></a>
  </nav>
</div>
<section id='page' class='section list-with-pager'>
  <?php $refreshUrl = $this->createLink('my', 'salary', "type=personal&month=$currentYear&orderBy=$orderBy&recTotal={$pager->recTotal}&recPerPage={$pager->recPerPage}&pageID={$pager->pageID}");?>
  <div class='box' data-page='<?php echo $pager->pageID ?>' data-refresh-url='<?php echo $refreshUrl ?>'>
    <table class='table compact bordered no-margin'>
      <thead>
        <tr>
          <th class='text-center align-middle'><?php echo $lang->salary->month;?></th>
          <th class='text-center align-middle'><?php echo $lang->salary->basic;?></th>
          <th class='text-center align-middle'><?php echo $lang->salary->allowance;?></th>
          <th class='text-center align-middle'><?php echo $lang->salary->bonus;?></th>
          <th class='text-center align-middle'><?php echo $lang->salary->deduction;?></th>
          <th class='text-center align-middle'><?php echo $lang->salary->actual;?></th>
        </tr>
      </thead>
      <?php foreach($salaryList as $salary):?>
      <tr class='text-center' data-url='<?php echo $this->createLink('my', 'viewSalary', "id={$salary->id}&type={$type}");?>' data-id='<?php echo $salary->id;?>'>
        <td><?php echo (int)substr($salary->month, 4, 2) . $lang->month;?></td>
        <td><?php echo formatMoney($salary->basic + $salary->benefit);?></td>
        <td><?php echo formatMoney($salary->allowance);?></td>
        <td><?php echo formatMoney($salary->bonus);?></td>
        <td><?php echo formatMoney($salary->deduction);?></td>
        <td><?php echo formatMoney($salary->actual);?></td>
      </tr>
      <?php endforeach;?>
    </table>
  </div>
  <nav class='nav justify pager'>
    <?php $pager->show($align = 'justify');?>
  </nav>
</section>
<?php endif;?>

<script>
$(function()
{
    if(v.viewable)
    {
        $(window).on('blur', function(){location.reload();});
        setTimeout(function(){location.reload();}, 10 * 60 * 1000);
    }
    else
    {
        $('.checkPassword').trigger('tap');
        $('.checkPassword').trigger('click');
        $('.modal').height('100%');
    }
})
</script>
<?php include $app->getModuleRoot() . "common/view/m.footer.html.php"; ?>
