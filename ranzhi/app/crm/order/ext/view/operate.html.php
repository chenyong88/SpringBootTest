<?php 
/**
 * The operate view file of order module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Xiying Guan <guanxiying@xirangit.com>
 * @package     order 
 * @version     $Id $
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../common/view/header.html.php';?>
<?php include '../../../common/view/datepicker.html.php';?>
<div class='panel'>
  <div class='panel-heading'><?php echo $action->name;?></div>
  <div class='panel-body'>
    <form method='post' id='ajaxForm'>
      <table class='table table-form'>
        <?php foreach($action->inputs as $field => $input):?>
        <?php $value = empty($order->$field) ? (isset($input->default) ? $input->default : '') : $order->$field;?>
        <tr>
          <th class='w-100px'><?php echo isset($fields[$field]->name) ? $fields[$field]->name : $lang->order->{$field};?></th>
          <td><?php echo $this->product->buildControl($fields[$field], $value);?></td>
        </tr>
        <?php endforeach;?>
        <tr>
          <th></th>
          <td><?php echo html::submitButton();?></td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?php include '../../../common/view/footer.html.php';?>
