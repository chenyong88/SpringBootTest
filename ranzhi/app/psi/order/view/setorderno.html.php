<?php
/**
 * The set orderNo view file of order module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     order 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php js::set('status', 'setOrderNo');/* To highlight menu */?>
<div class='col-md-2'>
  <ul class="nav nav-primary nav-stacked">
    <?php foreach($lang->order->typeList as $key => $value):?>
    <li class="<?php if($orderType == $key) echo 'active';?>"><?php echo html::a(inlink('setOrderNo', "type=$key"), $value);?></li>
    <?php endforeach;?>
  </ul>
</div>
<div class='col-md-6'>
  <form id='ajaxForm' method='post'>
    <div class='panel'>
      <div class='panel-heading'>
        <strong><?php echo $lang->order->setOrderNo;?></strong>
      </div>
      <div class='panel-body'>
        <?php if(isset($config->order->orderNo->$orderType)):?>
        <?php $orderNoList = json_decode($config->order->orderNo->$orderType);?>
        <?php foreach($orderNoList as $orderNo):?>
        <div class='input-row'>
          <div class='input-group'>
            <?php 
            echo "<span class='input-group-addon'>{$lang->order->orderNo->type}</span>";
            echo html::select('type[]', $lang->order->orderNo->typeList, $orderNo->type, "class='form-control'");

            $style = $orderNo->type == 'fixed' ? '' : "style='display:none'";
            echo "<span class='fixed input-group-addon fix-border fix-padding' $style></span>";
            echo html::input('fixed[]', $orderNo->fixed, "class='fixed form-control' $style placeholder='{$lang->order->orderNo->placeholder->fixed}'");

            $style = $orderNo->type == 'year' ? '' : "style='display:none'";
            echo "<span class='year input-group-addon fix-border' $style>{$lang->order->orderNo->length}</span>";
            echo html::select('yearLength[]', $lang->order->orderNo->yearLength, $orderNo->yearLength, "year class='year form-control' $style");

            $style = $orderNo->type == 'AI' ? '' : "style='display:none'";
            echo "<span class='AI input-group-addon fix-border' $style>{$lang->order->orderNo->length}</span>";
            echo html::select('AILength[]', $lang->order->orderNo->AI['length'], $orderNo->AILength, "class='AI form-control' $style");
            echo "<span class='AI input-group-addon fix-border' $style>{$lang->order->orderNo->clearType}</span>";
            echo html::select('AIClearType[]', $lang->order->orderNo->AI['clearType'], $orderNo->AIClearType, "class='AI form-control' $style");
            ?>
            <span class='input-group-btn'>
              <a href='###' class='btn addType'><i class='icon-plus'></i></a>
              <a href='###' class='btn delType'><i class='icon-remove'></i></a>
            </span>
          </div>
        </div>
        <?php endforeach;?>
        <?php else:?>
        <?php foreach($lang->order->orderNo->typeList as $key => $value):?>
        <div class='input-row'>
          <div class='input-group'>
            <?php 
            echo "<span class='input-group-addon'>{$lang->order->orderNo->type}</span>";
            echo html::select('type[]', $lang->order->orderNo->typeList, $key, "class='form-control'");

            $style = $key == 'fixed' ? '' : "style='display:none'";
            echo "<span class='fixed input-group-addon fix-border fix-padding' $style></span>";
            echo html::input('fixed[]', '', "class='fixed form-control' $style placeholder='{$lang->order->orderNo->placeholder->fixed}'");

            $style = $key == 'year' ? '' : "style='display:none'";
            echo "<span class='year input-group-addon fix-border' $style>{$lang->order->orderNo->length}</span>";
            echo html::select('yearLength[]', $lang->order->orderNo->yearLength, '', "year class='year form-control' $style");

            $style = $key == 'AI' ? '' : "style='display:none'";
            echo "<span class='AI input-group-addon fix-border' $style>{$lang->order->orderNo->length}</span>";
            echo html::select('AILength[]', $lang->order->orderNo->AI['length'], '', "class='AI form-control' $style");
            echo "<span class='AI input-group-addon fix-border' $style>{$lang->order->orderNo->clearType}</span>";
            echo html::select('AIClearType[]', $lang->order->orderNo->AI['clearType'], '', "class='AI form-control' $style");
            ?>
            <span class='input-group-btn'>
              <a href='###' class='btn addType'><i class='icon-plus'></i></a>
              <a href='###' class='btn delType'><i class='icon-remove'></i></a>
            </span>
          </div>
        </div>
        <?php endforeach;?>
        <?php endif;?>
        <div class='input-row'>
          <div class='input-group'>
            <span class='input-group-addon'><?php echo $lang->order->orderNo->preview;?></span>
            <input type='text' id='orderNo' name='orderNo' class='form-control' disabled='disabled'>
          </div>
        </div>
        <div class='input-row text-danger'><strong><?php echo $lang->order->orderNo->tips;?></strong></div>
      </div>
    </div>
    <div><?php echo html::submitButton();?></div>
  </form>
</div>
<?php include '../../common/view/footer.html.php';?>
