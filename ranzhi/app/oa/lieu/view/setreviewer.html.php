<?php
/**
 * The set reviewer view file of lieu module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     lieu 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php include '../../common/view/header.html.php';?>
<?php include '../../../sys/common/view/chosen.html.php';?>
<div class='panel'>
  <div class='panel-heading'><strong><?php echo $lang->lieu->setReviewer;?></strong></div>
  <div class='panel-body'>
    <form id='ajaxForm' method='post'>
      <table class='table table-form table-condensed'>
        <tr>
          <th class='w-100px'><?php echo $lang->lieu->reviewedBy;?></th>
          <td class='w-200px'><?php echo html::select('reviewedBy', array('' => $lang->dept->moderators) + $users, $reviewedBy, "class='form-control chosen'")?></td><td></td>
          <td></td>
        </tr>
        <tr>
          <th><?php echo $lang->lieu->checkHours;?></th>
          <td colspan='2'><?php echo html::radio('checkHours', $lang->lieu->checkHoursList, $config->lieu->checkHours);?></td>
        </tr>
        <tr>
          <th></th>
          <td colspan='2'><?php echo html::submitButton();?></td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
