<?php
/**
 * The replace department to system view file of wechat module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     wechat 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../common/view/header.html.php';?>
<div class='panel'>
  <div class='panel-heading'>
    <strong><i class='icon-link'></i> <?php echo $lang->wechat->syncDeptToSystem;?></strong>
  </div>
  <div class='panel-body'>
    <form id='ajaxForm' method='post'>
      <table class='table table-form w-p50'>
        <?php $i=1;?>
        <?php foreach($wechatDeptList as $wechatDept):?>
        <tr>
          <th class='w-100px'><?php echo html::input("wechatDepts[$i]", $wechatDept->id, "class='hide'");?> <?php echo $wechatDept->name;?></th>
          <td>
            <?php if(!empty($bindDeptList[$wechatDept->id])):?>
            <?php echo html::select("systemDepts[$i]", $systemDeptList, $bindDeptList[$wechatDept->id], "class='form-control'");?>
            <?php else:?>
            <div class='input-group'>
              <?php echo html::select("systemDepts[$i]", $systemDeptList, '', "class='form-control'");?>
              <span class='input-group-addon'>
                <label class='checkbox-inline'><input type='checkbox' name="createDepts[<?php echo $i;?>]" id='createdepts' value='1' /> <?php echo $lang->create;?></label>
              </span>
            </div>
            <?php endif;?>
          </td>
        </tr>
        <?php $i++;?> 
        <?php endforeach;?>
        <tr>
          <th></th><td><?php echo html::submitButton() . html::a($this->createLink('wechat', 'setting'), $lang->goback, "class='btn'");?></td>
        </tr>
      </table>
    </form>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
