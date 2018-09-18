<?php
/**
 * The create view file of rule module of Ranzhi.
 *
 * @copyright   Copyright 2009-2017 青岛易软天创网络科技有限公司 
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     rule 
 * @version     $Id$
 * @link        http://www.ranzhi.org 
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php include '../../../sys/common/view/chosen.html.php';?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><?php echo $lang->rule->create;?></strong>
  </div>
  <div class='panel-body'>
    <form id='ajaxForm' method='post'>
      <table class='table table-form'>
        <tr>
          <th class='w-80px'><?php echo $lang->rule->from;?></th>
          <td class='w-220px'><?php echo html::select('from', $deptList, '', "class='form-control chosen'");?></td>
          <td></td>
          <td></td>
          <td></td>
          <td class='w-120px'></td>
          <td class='w-100px'></td>
        </tr>
        <tr>
          <th><?php echo $lang->rule->product;?></th>
          <td><?php echo html::select('product', $productList, '', "class='form-control chosen'");?></td>
          <td colspan='5'></td>
        </tr>
        <tr>
          <th><?php echo $lang->rule->category;?></th>
          <td><?php echo html::select('category', $categoryList, '', "class='form-control chosen'");?></td>
          <td colspan='5'></td>
        </tr>
        <tr>
          <th><?php echo $lang->rule->sharedRules;?></th>
          <td class='nopaddingleft' colspan='6'>
            <table class='table table-form tableRules'>
              <tr>
                <td><?php echo html::select('shareRules[fromCategory][]', $expenseList, '', "class='form-control chosen' data-placeholder='{$lang->rule->fromCategory}'");?></td>
                <td class='fixpadding'><?php echo html::select('shareRules[to][]', $deptList, '', "class='form-control chosen' data-placeholder='{$lang->rule->to}'");?></td>
                <td class='fixpadding'><?php echo html::select('shareRules[toCategory][]', $incomeList, '', "class='form-control chosen' data-placeholder='{$lang->rule->toCategory}'");?></td>
                <td class='w-120px fixpadding'>
                  <div class='input-group'>
                    <?php echo html::input('shareRules[rate][]', '', "class='form-control' placeholder='{$lang->rule->rate}'");?>
                    <span class='input-group-addon'>%</span>
                  </div>
                </td>
                <td class='w-100px action'>
                  <a class='btn btn-xs addItem'><i class='icon icon-plus'></i></a>
                  <a class='btn btn-xs delItem'><i class='icon icon-remove'></i></a>
                </td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <th><?php echo $lang->rule->total;?></th>
          <td colspan='4'></td>
          <td class='text-center fixpadding' id='totalRate'></td>
          <td></td>
        </tr>
        <tr>
          <th><?php echo $lang->rule->desc;?></th>
          <td colspan='5'><?php echo html::textarea('desc', '', "rows='3' class='form-control'");?></td>
          <td></td>
        </tr>
        <tr>
          <th></th>
          <td colspan='6'>
            <?php echo html::submitButton();?>
            <?php echo html::backButton();?>
            <span class='text-danger shareTips'><strong><?php echo $lang->rule->shareTips;?></strong></span>
          </td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
