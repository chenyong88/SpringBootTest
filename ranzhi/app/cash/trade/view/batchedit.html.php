<?php
/**
 * The batch edit trade view of trade module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     trade
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include $app->getModuleRoot() . 'common/view/header.html.php';?>
<?php include '../../../sys/common/view/datepicker.html.php';?>
<?php include '../../../sys/common/view/chosen.html.php';?>
<?php js::set('modeType', $mode);?>
<form id='ajaxForm' method='post' action="<?php echo inlink('batchedit', "step=save&mode=$mode");?>">
  <div class='panel'>
    <div class='panel-heading'><strong><?php echo $lang->trade->batchEdit;?></strong></div>
    <table class='table table-condensed table-hover'>
      <thead>
        <tr class='text-center'>
          <?php $categoryRequired = $config->trade->settings->category ? 'required' : '';?>
          <th class='w-150px <?php echo $categoryRequired;?>'><?php echo $lang->trade->category;?></th> 
          <th class='w-50px'><?php echo $lang->ditto;?></th> 
          <?php if($requireTrader):?>
          <th class='w-200px required'><?php echo $lang->trade->trader;?></th> 
          <?php else:?>
          <th class='w-200px'><?php echo $lang->trade->trader;?></th> 
          <?php endif;?>
          <th class='w-120px required'><?php echo $lang->trade->money;?></th>
          <?php $deptRequired = $config->trade->settings->dept ? 'required' : '';?>
          <th class='w-150px <?php echo $deptRequired;?>'><?php echo $lang->trade->dept;?></th>
          <th class='w-50px'><?php echo $lang->ditto;?></th> 
          <th class='w-130px required'><?php echo $lang->trade->handlers;?></th>
          <?php $productRequired = $config->trade->settings->product ? 'required' : '';?>
          <th class='w-140px <?php echo $productRequired;?>'><?php echo $lang->trade->product;?></th>
          <th class='w-100px'><?php echo $lang->trade->date;?></th>
          <th><?php echo $lang->trade->desc;?></th>
        </tr>
      </thead>
      <tbody>
        <?php $i = 1;?>
        <?php foreach($trades as $id => $trade):?>
        <tr>
          <td colspan='2'>
            <?php $disabledVar  = 'disabled' . $i;?>
            <?php $$disabledVar = isset($disabledCategories[$trade->category]) ? 'disabled' : '';?>
            <div class='input-group'>
              <?php if($trade->type == 'in'):?>
              <?php $title = zget($incomeTypes, $trade->category, '');?>
              <?php echo html::select("category[$id]", $incomeTypes, $trade->category, "class='form-control in chosen' id='category{$id}' title='{$title}' {$$disabledVar}");?>
              <?php endif;?>
              <?php if($trade->type == 'out'):?>
              <?php $title = zget($expenseTypes, $trade->category, '');?>
              <?php echo html::select("category[$id]", $expenseTypes, $trade->category, "class='form-control in chosen' id='category{$id}' title='{$title}' {$$disabledVar}");?>
              <?php endif;?>
              <?php if(in_array($trade->type, array_keys($lang->trade->categoryList))):?>
              <?php $title = zget($lang->trade->categoryList, $trade->category, '');?>
              <?php echo html::select("category[$id]", $lang->trade->categoryList, $trade->category, "class='form-control' title='{$title}' disabled");?>
              <?php endif;?>
              <?php echo html::hidden("categoryDisabled[$id]", $$disabledVar);?>
              <span class='input-group-addon'>
                <?php $curDisabledVar = 'disabled' . $i;?>
                <?php $preDisabledVar = 'disabled' . ($i-1);?>
                <?php $disabled = ($i == 1 || $$curDisabledVar == 'disabled' || (isset($$preDisabledVar) && $$preDisabledVar == 'disabled')) ? "disabled='disabled'" : '';?>
                <label class='checkbox-inline'>
                    <input type='checkbox' name="categoryDitto[<?php echo $id;?>]" id="categoryDitto[<?php echo $id;?>]" value='1' <?php echo $disabled;?> />
                </label>
              </span>
            </div>
          </td>
          <td>
            <?php if($trade->type == 'in' and !isset($disabledCategories[$trade->category])):?>
            <?php $title = zget($customerList, $trade->trader, '');?>
            <?php echo html::select("trader[{$id}]", $customerList, $trade->trader, "class='form-control chosen' title='{$title}' data-no_results_text='" . $lang->searchMore . "'");?>
            <?php endif;?>
            <?php if($trade->type == 'out' and !isset($disabledCategories[$trade->category])):?>
            <?php $title = zget($traderList, $trade->trader, '');?>
            <?php echo html::select("trader[{$id}]", $traderList, $trade->trader, "class='form-control chosen' title='{$title}' data-no_results_text='" . $lang->searchMore . "'");?>
            <?php endif;?>
            <?php if(in_array($trade->type, array_keys($lang->trade->categoryList)) or isset($disabledCategories[$trade->category])) echo html::hidden("trader[$id]", 0);?>
          </td>
          <td><?php echo html::input("money[$id]", $trade->money, "class='form-control' id='money{$id}' title='{$trade->money}'");?></td>
          <td colspan='2'>
            <div class='input-group'>
              <?php $title = zget($deptList, $trade->dept, '');?>
              <?php echo html::select("dept[$id]", $deptList, $trade->dept, "class='form-control chosen' id='dept{$id}' title='{$title}'");?>
              <span class='input-group-addon'>
                <?php $disabled = $i == 1 ? "disabled='disabled'" : '';?>
                <label class='checkbox-inline'>
                    <input type='checkbox' name="deptDitto[<?php echo $id;?>]" id="deptDitto[<?php echo $id;?>]" value='1' <?php echo $disabled;?> />
                </label>
              </span>
            </div>
          </td>
          <td><?php echo html::select("handlers[$id][]", $users, $trade->handlers, "class='form-control chosen' id='handlers{$id}' title='{$lang->trade->handlers}' multiple");?></td>
          <td>
            <?php $title = zget($productList, $trade->product, '');?>
            <?php echo html::select("product[$id]", $productList, $trade->product, "class='form-control chosen' id='product{$id}' title='{$title}'");?>
          </td>
          <td><?php echo html::input("date[$id]", $trade->date, "class='form-control form-date' id='date{$id}' title='{$trade->date}'");?></td>
          <td><?php echo html::textarea("desc[$id]", $trade->desc, "rows='1' class='form-control' title='{$trade->desc}'");?></td>
        </tr>
        <?php $i++;?>
        <?php endforeach;?>
      </tbody>
      <tfoot>
        <tr>
          <td colspan='10' class='text-center'>
            <?php echo html::submitButton() . ' ' . html::backButton();?>
            <strong><span class='text-danger'><?php echo $lang->trade->emptyData;?></span></strong>
          </td>
        </tr>
      </tfoot>
    </table>
  </div>
</form>
<script>
<?php helper::import('../js/batchsearchcustomer.js');?>
</script>
<?php include $app->getModuleRoot() . 'common/view/footer.html.php';?>
