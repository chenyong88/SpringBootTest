<?php
/**
 * The order block view file of block module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Yidong Wang <yidong@cnezsoft.com>
 * @package     block
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<table class='table table-data table-hover block-salary table-fixed'>
  <?php foreach($salaryList as $id => $salary):?>
  <?php $appid = ($this->get->app == 'sys' and isset($_GET['entry'])) ? "class='app-btn' data-id='{$this->get->entry}'" : ''?>
  <tr data-url='<?php echo $this->createLink('hr.salary', 'view', "salaryID=$id"); ?>' <?php echo $appid?>>
    <td><?php echo zget($users, $salary->account);?></td>
    <td class='text-center w-100px'><?php echo $salary->actual;?></td>
    <td class='w-80px'><?php echo $lang->salary->statusList[$salary->status]?></td>
  </tr>
  <?php endforeach;?>
</table>
<script>$('.block-salary').dataTable();</script>
