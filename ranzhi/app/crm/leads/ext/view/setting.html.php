<?php
/**
 * The setting view file of leads module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     leads 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../common/view/header.html.php';?>
<div class='with-side'>
  <?php include 'side.html.php';?>
  <div class='main'>
    <div class='panel'>
      <div class='panel-heading'>
        <?php if($type == 'sync'):?>
        <strong><i class='icon-wrench'></i> <?php echo $lang->leads->syncSetting;?></strong>
        <?php endif;?>
        <?php if($type == 'apply'):?>
        <strong><i class='icon-exchange'></i> <?php echo $lang->leads->applyRule;?></strong>
        <?php endif;?>
      </div>
      <div class='panel-body'>
        <form id='ajaxForm' method='post'>
          <table class='table table-form table-condensed'>
            <?php if($type == 'sync'):?>
            <tr>
              <th class='w-130px'><?php echo $lang->leads->syncLimit;?></th>
              <td class='w-200px'><?php echo html::select('syncLimit', $config->leads->syncLimitList, $syncLimit, "class='form-control chosen'")?></td>
              <td style='padding-left:5px;'><?php echo html::submitButton();?></td>
            </tr>
            <?php endif;?>
            <?php if($type == 'apply'):?>
            <tr>
              <th class='w-130px'><?php echo $lang->leads->applyLimit;?></th>
              <td class='w-200px'><?php echo html::select('applyLimit', $config->leads->applyLimitList, $applyLimit, "class='form-control chosen'")?></td>
              <td style='padding-left:5px;'></td>
            </tr>
            <tr>
              <th><?php echo $lang->leads->applyRemain;?></th>
              <td><?php echo html::select('applyRemain', $config->leads->applyRemainList, $applyRemain, "class='form-control chosen'")?></td>
              <td style='padding-left:5px;'><a href='javascript:void(0)' data-original-title="<?php echo $lang->leads->tips->applyRemain;?>" data-placement='right' data-toggle='tooltip'><i class='icon icon-question-sign'></i></a></td>
            </tr>
            <tr>
              <th></th>
              <td colspan='2'><?php echo html::submitButton();?></td>
            </tr>
            <?php endif;?>
          </table>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include '../../../common/view/footer.html.php';?>
