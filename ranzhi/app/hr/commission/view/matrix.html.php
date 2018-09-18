<?php
/**
 * The matrix report view file of commission module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     commission 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<table class='table table-bordered table-fixed datatable' data-fixed-left-width='500'>
  <?php $titles = isset($commissionList['title']) ? $commissionList['title'] : array();?>
  <?php unset($commissionList['title']);?>
  <thead>
    <tr>
      <?php foreach($titles as $key => $title):?>
      <?php $attr = strpos(',id,money,commission,amount,', ",$key,") !== false ? "data-flex='false' data-width='100'" : "data-flex='true' data-width='80'";?>
      <?php echo "<th class='text-center' $attr>" . $title . "</th>";?>
      <?php endforeach;?>
    </tr>
  </thead>
  <?php foreach($commissionList as $rowKey => $row):?>
  <tr class='text-center'>
    <?php foreach($titles as $key => $title):?>
    <?php if(empty($row[$key])):?>
    <td></td>
    <?php elseif($key == 'id' && !empty($row['isTrade'])):?>
    <td><?php if(!commonModel::printLink('commission', 'create', "type=commissioned&tradeID={$row[$key]}", $lang->commission->modeList['sale'] . $row[$key])) echo $row[$key];?></td>
    <?php else:?>
    <td>
      <?php if(strpos(',id,money,commission,amount,', ",$key,") !== false or $rowKey == 'total'):?>
      <?php echo $row[$key] ? $row[$key] : '';?>
      <?php else:?>
      <span class='amount'><?php echo $row[$key] ? $row[$key] : '';?></span>
      <span class='rate hide'><?php echo $row[$key] ? round($row[$key] / $row['commission'] * 100, 2) . '%' : '';?></span>
      <?php endif;?>
    </td>
    <?php endif;?>
    <?php endforeach;?>
  </tr>
  <?php endforeach;?>
</table>
