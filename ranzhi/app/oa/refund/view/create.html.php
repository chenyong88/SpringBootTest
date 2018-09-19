<?php
/**
 * The create view file of refund module of Ranzhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      chujilu <chujilu@cnezsoft.com>
 * @package     refund
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php include '../../../sys/common/view/datepicker.html.php';?>
<?php include '../../../sys/common/view/chosen.html.php';?>
<form id='ajaxForm' method='post' action="<?php echo $this->createLink('oa.refund', 'create')?>">
  <div class='panel'>
    <div class='panel-heading'>
      <?php echo $lang->refund->create;?>
    </div>
    <div class='panel-body'>
      <table class='table table-form w-p70'>
        <tr>
          <th class='w-100px'><?php echo $lang->refund->name?></th>
          <td class='w-500px'><?php echo html::input('name', '', "class='form-control'")?></td>
          <td></td>
        </tr>
        <tr>
          <th><?php echo $lang->refund->dept?></th>
          <td><?php echo html::select('dept', $deptList, $this->app->user->dept, "class='form-control chosen'")?></td>
        </tr>
        <tr>
          <th><?php echo $lang->refund->category?></th>
          <td>
            <div class='input-group'>
              <?php echo html::select('category', $categories, '', "class='form-control chosen'");?>
              <span class='input-group-addon'>
                <?php echo html::checkbox('objectType', $lang->refund->objectTypeList);?> 
              </span>
            </div>
          </td>
          <td></td>
        </tr>
        <tr>
          <th><?php echo $lang->refund->customer;?></th>
          <td>
            <div class='required required-wrapper'></div>
            <?php echo html::select('customer', $customers, '', "class='form-control chosen' data-no_results_text='" . $lang->searchMore . "'");?>
          </td>
          <td></td>
        </tr>
        <tr>
          <th><?php echo $lang->refund->order;?></th>
          <td>
            <div class='required required-wrapper'></div>
            <?php echo html::select('order', $orders, '', "class='form-control chosen'");?>
          </td>
          <td></td>
        </tr>
        <tr>
          <th><?php echo $lang->refund->contract;?></th>
          <td>
            <div class='required required-wrapper'></div>
            <?php echo html::select('contract', $contracts, '', "class='form-control chosen'");?>
          </td>
          <td></td>
        </tr>
        <tr>
          <th><?php echo $lang->refund->project;?></th>
          <td>
            <div class='required required-wrapper'></div>
            <?php echo html::select('project', $projects, '', "class='form-control chosen'");?>
          </td>
          <td></td>
        </tr>
        <tr>
          <th><?php echo $lang->refund->money?></th>
          <td>
            <div class='input-group'>
              <div class='input-group-btn w-90px'><?php echo html::select('currency', $currencyList, '', "class='form-control'")?></div>
              <?php echo html::input('money', '', "class='form-control'")?>
              <div class='input-group-btn'><?php echo html::a("javascript:void(0)", "<i class='icon-double-angle-down'></i> " . $lang->refund->detail, "class='btn detail'")?></div>
            </div>
          </td>
          <td></td>
        </tr>
        <tr id='refund-date'>
          <th><?php echo $lang->refund->date?></th>
          <td><?php echo html::input('date', '', "class='form-control form-date'")?></td>
          <td></td>
        </tr>
        <tr id='refund-related'>
          <th><?php echo $lang->refund->related?></th>
          <td><?php echo html::select('related[]', $users, $this->app->user->account, "class='form-control chosen' multiple")?></td>
          <td></td>
        </tr>
        <tr id='refund-detail' class='hidden'>
          <th><?php echo $lang->refund->detail?></th>
          <td colspan='2' id='detailBox'>
            <table class='table table-detail'>
              <tr>
                <td class='w-100px'><?php echo html::input('dateList[1]', '', "class='form-control form-date' placeholder='{$lang->refund->date}'")?></td>
                <?php if($categories):?>
                <td class='w-160px'><?php echo html::select('categoryList[1]', $categories, '', "class='form-control chosen' placeholder='{$lang->refund->category}'")?></td>
                <?php endif;?>
                <td class='w-100px'><?php echo html::input('moneyList[1]', '', "class='form-control' placeholder='{$lang->refund->money}'")?></td>
                <td class='w-200px'><?php echo html::select('relatedList[1][]', $users, '', "class='form-control chosen' multiple data-placeholder='{$lang->refund->related}'")?></td>
                <td><?php echo html::textarea('descList[1]', '', "class='form-control' style='height:32px;' placeholder='{$lang->refund->desc}'")?></td>
                <td class='w-70px'><i class='btn btn-mini icon-plus'></i>&nbsp;&nbsp;<i class='btn btn-mini icon-remove'></i></td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <th><?php echo $lang->refund->desc?></th>
          <td colspan='2'><?php echo html::textarea('desc', '', "class='form-control'")?></td>
        </tr>
        <?php if(commonModel::hasPriv('file', 'upload')):?>
        <tr>
          <th><?php echo $lang->refund->files;?></th>
          <td colspan='2'><?php echo $this->fetch('file', 'buildForm')?></td>
        </tr>
        <?php endif;?>
        <tr><th></th><td colspan='2'><?php echo html::submitButton() . '&nbsp;&nbsp;' . html::backButton();?></td></tr>
      </table>
    </div>
  </div>
</form>
<script type='text/template' id='detailTpl'>
<tr>
  <td class='w-100px'><?php echo html::input('dateList[key]', '', "class='form-control form-date' placeholder='{$lang->refund->date}'")?></td>
  <?php if($categories):?>
  <td class='w-160px'><?php echo html::select('categoryList[key]', $categories, '', "class='form-control chosen' placeholder='{$lang->refund->category}'")?></td>
  <?php endif;?>
  <td class='w-100px'><?php echo html::input('moneyList[key]', '', "class='form-control' placeholder='{$lang->refund->money}'")?></td>
  <td class='w-200px'><?php echo html::select('relatedList[key][]', $users, '', "class='form-control chosen' multiple data-placeholder='{$lang->refund->related}'")?></td>
  <td><?php echo html::textarea('descList[key]', '', "class='form-control' style='height:32px;' placeholder='{$lang->refund->desc}'")?></td>
  <td class='w-70px'><i class='btn btn-mini icon-plus'></i>&nbsp;&nbsp;<i class='btn btn-mini icon-remove'></i></td>
</tr>
</script>
<?php js::set('key', 2)?>
<script>
<?php helper::import('../js/searchcustomer.js');?>
</script>
<?php include '../../common/view/footer.html.php';?>
