<?php
/**
 * The set reviewer view file of refund module of RanZhi.
 *
 * @copyright   Copyright 2009-2017 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     refund 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../common/view/header.html.php';?>
<?php include '../../../../sys/common/view/chosen.html.php';?>
<?php js::set('turnon', empty($config->refund->multiReviewer) ? 0 : 1);?>
<?php if(!$module):?>
<div class='with-side'>
  <div class='side'>
    <nav class='menu leftmenu affix'>
      <ul class='nav nav-primary'>
        <?php foreach($lang->refund->settings as $setting):?>
        <?php list($label, $module, $method) = explode('|', $setting);?>
        <li><?php commonModel::printLink($module, $method, '', $label);?></li>
        <?php endforeach;?>
      </ul>
    </nav>
  </div>
  <div class='main'>
<?php endif;?>
    <div class='panel'>
      <div class='panel-heading'><strong><?php echo $lang->refund->reviewer;?></strong></div>
      <div class='panel-body'>
        <form id='ajaxForm' method='post'>
          <table class='table table-form table-condensed w-p50'>
            <tr>
              <th class='w-100px'><?php echo $lang->refund->multiReviewer;?></th>
              <td colspan='3'><?php echo html::radio('turnon', $lang->refund->multiReviewerStatusList, !empty($config->refund->multiReviewer));?></td>
            </tr>
            <?php $i = 1;?>
            <?php if(!empty($config->refund->multiReviewer)):?>
            <?php foreach($config->refund->multiReviewer as $reviewer):?>
            <?php $reviewer = json_decode($reviewer);?>
            <tr>
              <th><?php echo $i++;?></th>
              <td><?php echo html::select('multiReviewer[]', $users, $reviewer->reviewer, "class='form-control chosen multiReviewer'")?></td>
              <td class='w-150px nopaddingleft'><?php echo html::input('reviewerMoney[]', $reviewer->money, "class='form-control' placeholder='{$lang->refund->money}'");?></td>
              <td class='nopaddingleft'>
                <a class='btn addItem'><i class='icon icon-plus'></i></a>
                <a class='btn delItem'><i class='icon icon-remove'></i></a>
              </td>
            </tr>
            <?php endforeach;?>
            <?php else:?>
            <tr>
              <th><?php echo $i++;?></th>
              <td><?php echo html::select('multiReviewer[]', $users, '', "class='form-control chosen multiReviewer'")?></td>
              <td class='w-150px nopaddingleft'><?php echo html::input('reviewerMoney[]', '', "class='form-control' placeholder='{$lang->refund->money}'");?></td>
              <td class='nopaddingleft'>
                <a class='btn addItem'><i class='icon icon-plus'></i></a>
                <a class='btn delItem'><i class='icon icon-remove'></i></a>
              </td>
            </tr>
            <?php endif;?>
          <tr>
            <th class='w-100px'><?php echo $lang->refund->firstReviewer;?></th>
            <td colspan='3'><?php echo html::select('firstReviewer', $firstReviewers, $firstReviewer, "class='form-control chosen singleReviewer'")?></td><td></td>
          </tr>
          <tr>
            <th><?php echo $lang->refund->secondReviewer;?></th>
            <td colspan='3'>
              <div class='row'>
                <div class='col-sm-6'><?php echo html::select('secondReviewer', $secondReviewers, $secondReviewer, "class='form-control chosen singleReviewer'")?></div>
                <div class='col-sm-6'>
                  <div class='input-group'>
                    <span class='input-group-addon'><?php echo $lang->refund->money;?></span>
                    <?php echo html::input('money', isset($this->config->refund->money) ? $this->config->refund->money : '', "class='form-control'");?>
                  </div>
                </div>
              </div>
            </td>
            <td class='pd-0'><?php echo html::a('javascript:void(0)', "<i class='icon-question-sign'></i>", "data-original-title='{$lang->refund->moneyTip}' data-toggle='tooltip'");?></td>
          </tr>
          <tr><th></th><td colspan='3'><?php echo html::submitButton();?></td></tr>
          </table>
        </form>
      </div>
    </div>
<?php if(!$module):?>
  </div>
</div>
<?php endif;?>
<?php js::set('index', $i);?>
<?php include '../../../common/view/footer.html.php';?>
