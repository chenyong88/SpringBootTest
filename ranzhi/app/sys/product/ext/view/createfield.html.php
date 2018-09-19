<?php 
/**
 * The create field view file of product module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     product 
 * @version     $Id $
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../common/view/header.html.php';?>
<?php include '../../../common/view/chosen.html.php';?>
<?php include 'bread.html.php';?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><i class="icon-plus"></i> <?php echo $lang->product->field->create;?></strong>
  </div>
  <div class='panel-body'>
    <form method='post' id='ajaxForm'>
      <table class='table table-form w-p60'>
        <tr>
          <th class='w-100px'><?php echo $lang->product->field->name;?></th>
          <td><?php echo html::input('name', '', "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->product->field->field;?></th>
          <td><?php echo html::input('field', '', "class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->product->field->control;?></th>
          <td><?php echo html::select("control", $lang->product->field->controlTypeList, '', "class='form-control select-3'");?></td>
        </tr>
        <tr id='optionTR'>
          <th><?php echo $lang->product->field->options;?></th>
          <td>
            <div class="input-group">
              <?php echo html::input('options[value][]', '', "class='form-control' placeholder={$lang->product->field->optionValue}");?>
              <span class='input-group-addon'>:</span>
              <?php echo html::input('options[text][]', '', "class='form-control' placeholder={$lang->product->field->optionText}");?>
              <div class='input-group-btn'>
                <i class='icon-large icon-plus-sign'></i>
                <i class='icon-large icon-minus-sign'></i>
              </div>
            </div> 
          </td>
        </tr>
        <tr>
          <th><?php echo $lang->product->field->default;?></th>
          <td><?php echo html::textarea('default', '', "rows='2' placeholder='{$lang->product->field->optionsPlaceholder}' class='form-control'");?></td>
        </tr>
        <tr>
          <th><?php echo $lang->product->field->rules;?></th>
          <td><?php echo html::select('rules[]', $lang->product->field->rulesList, '', "multiple class='chosen form-control'");?></td>
        </tr>
        <tr>
          <th></th>
          <td><?php echo html::submitButton() . ' ' . html::backButton();?></td>
        </tr>
      </table>
    </form>
  </div>
</div>

<div id='optionGroup' class='hide'>
  <div class="input-group">
    <?php echo html::input('options[value][]', '', "class='form-control' placeholder={$lang->product->field->optionValue}");?>
    <span class='input-group-addon'>:</span>
    <?php echo html::input('options[text][]', '', "class='form-control' placeholder={$lang->product->field->optionText}");?>
    <div class='input-group-btn'>
      <i class='icon-large icon-plus-sign'></i>
      <i class='icon-large icon-minus-sign'></i>
    </div>
  </div> 
</div>

<?php include '../../../common/view/footer.html.php';?>
