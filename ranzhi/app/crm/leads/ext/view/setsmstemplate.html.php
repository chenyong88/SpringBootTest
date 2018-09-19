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
<?php include '../../../../sys/common/view/kindeditor.html.php';?>
<div class='with-side'>
  <?php include 'side.html.php';?>
  <div class='main'>
    <div class='panel'>
      <div class='panel-heading'>
        <strong><i class='icon-wrench'></i> <?php echo $lang->leads->SMSTemplate;?></strong>
      </div>
      <div class='panel-body'>
        <form id='ajaxForm' method='post'>
          <table class='table table-form table-condensed'>
            <tr>
              <td><?php echo html::textarea('content', $content, "class='form-control' rows='20'");?></td>
            </tr>
          </table>
          <div><?php echo html::submitButton();?></div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include '../../../common/view/footer.html.php';?>

