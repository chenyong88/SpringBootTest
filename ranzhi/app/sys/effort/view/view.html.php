<?php
/**
 * The view file of effort module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     effort 
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
?>
<?php include '../../../sys/common/view/header.modal.html.php';?>
<table class='table table-form' id='effort'> 
  <tbody>
    <tr>
      <th class='w-80px'><?php echo $lang->effort->account;?></th>
      <td><?php echo zget($users, $effort->account);?></td>
    </tr>  
    <tr>
      <th class='rowhead'><?php echo $lang->effort->date;?></th>
      <td><?php echo date(DT_DATE1, strtotime($effort->date));?></td>
    </tr>  
    <tr>
      <th class='rowhead'><?php echo $lang->effort->consumed;?></th>
      <td>
        <?php
        if(isset($effort->consumed)) echo $effort->consumed . ' ' . $lang->effort->hour;
        ?>
      </td>
    </tr>  
    <?php if($effort->objectType == 'task'):?>
    <tr>
      <th class='rowhead'><?php echo $lang->effort->left;?></th>
      <td><?php if(isset($effort->consumed)) echo $effort->left . ' ' . $lang->effort->hour;?></td>
    </tr>
    <?php endif;?>
    <tr>
      <th class='rowhead'><?php echo $lang->effort->objectType;?></th>
      <td>
        <?php
        echo $lang->effort->objectTypeList[$effort->objectType];
        if($work)
        {
            $module = ((strpos(',order,customer,contract,', ",$effort->objectType,") !== false) ? 'crm.' : (($effort->objectType == 'task') ? 'oa.' : '')) . $effort->objectType;
            echo html::a($this->createLink($module, 'view', "objectID={$effort->objectID}"), ' #' . $effort->objectID . ' ' .$work[$effort->objectID], "class='objectLink'");
        }
        ?>
      </td>
    </tr>  
    <tr>
      <th class='rowhead'><?php echo $lang->effort->work;?></th>
      <td><?php echo $effort->work;?></td>
    </tr>  
  </tbody>
</table>
<?php echo $this->fetch('action', 'history', "objectType=effort&objectID={$effort->id}");?>
<div class='actions text-center'>
  <div class='btn-group'>
    <?php
    if($this->session->effortList)
    {
        $browseLink = $this->session->effortList;
    }
    elseif($effort->account == $app->user->account)
    {
        $browseLink = $this->createLink('my', 'effort');
    }
    else
    {
        $browseLink = $this->createLink('user', 'effort', "account=$effort->account");
    }
    if($effort->account == $app->user->account)
    {
        commonModel::printLink('effort', 'edit', "effortID=$effort->id", $lang->edit, "class='btn ajaxEdit'");
        commonModel::printLink('effort', 'delete', "effortID=$effort->id", $lang->delete, "class='btn deleter'");
    }
    ?>
    <?php commonModel::printRPN($browseLink);?>
  </div>
</div>
<?php include '../../../sys/common/view/footer.modal.html.php';?>
