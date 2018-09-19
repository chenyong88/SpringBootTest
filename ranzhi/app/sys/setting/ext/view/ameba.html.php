<?php
/**
 * The ameba view file of setting module of RanZhi.
 *
 * @copyright   Copyright 2009-2017 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     setting 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../common/view/header.html.php';?>
<?php include '../../../common/view/chosen.html.php';?>
<?php include '../../../common/view/datepicker.html.php';?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><?php echo $lang->ameba->settings;?></strong>
  </div>
  <form id='amebaForm' method='post'>
    <table class='tabel table-form'>
      <tr>
        <th class='w-100px'><?php echo $lang->ameba->status;?></th>
        <td class='w-200px'><?php echo html::radio('turnon', $lang->ameba->turnonList, $config->ameba->turnon);?></td>
        <td></td>
      </tr>
      <tr>
        <th><?php echo $lang->ameba->period;?></th>
        <td>
          <?php echo html::select('period', $lang->ameba->periodList, $config->ameba->period, "class='form-control'");?>
        </td>
        <td></td>
      </tr>
      <tr>
        <th><?php echo $lang->ameba->beginDate;?></th>
        <td><?php echo html::input('beginDate', $config->ameba->beginDate, "class='form-control form-date'");?></td>
        <td></td>
      </tr>
      <tr>
        <th><?php echo $lang->ameba->taxRate;?></th>
        <td>
          <div class='input-group'>
            <?php echo html::input('taxRate', $config->ameba->taxRate, "class='form-control'");?>
            <span class='input-group-addon'>%</span>
          </div>
        </td>
        <td></td>
      </tr>
      <tr>
        <th><?php echo $lang->ameba->shareDepts;?></th>
        <td colspan='2'><?php echo html::select('shareDepts[]', $depts, $config->ameba->shareDepts, "class='form-control chosen' multiple");?></td>
      </tr>
      <tr>
        <th><?php echo $lang->ameba->excludeCategory;?></th>
        <td colspan='2'><?php echo html::select('excludeCategories[]', $categories, $config->ameba->excludeCategories, "class='form-control chosen' multiple");?></td>
      </tr>
      <tr>
        <th></th>
        <td><?php echo html::submitButton();?></td>
      </tr>
    </table>
  </form>
</div>
<?php include '../../../common/view/footer.html.php';?>
