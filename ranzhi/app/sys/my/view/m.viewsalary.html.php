<?php
/**
 * The salary view mobile view file of task module of RanZhi.
 *
 * @copyright   Copyright 2009-2016 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Tingting Dai <daitingting@xirangit.com>
 * @package     my 
 * @version     $Id
 * @link        http://www.ranzhico.com
 */

if($extView = $this->getExtViewFile(__FILE__)){include $extView; return helper::cd();}

$moduleMenu = false;
$bodyClass  = 'with-nav-bottom';
$browseLink = !empty($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : inlink('salary', "type=personal");

include "../../common/view/m.header.html.php";
?>
<style>
.align-middle {vertical-align: middle!important;}
</style>


<div id='page' class='list-with-actions'>
  <div class='heading'>
    <div class='title'>
      <a href='<?php echo $browseLink;?>' class='muted' title='<?php echo $lang->goback ?>'><i class='icon-arrow-left'> </i></a>
      <?php echo $lang->salary->common . $lang->detail;?>
    </div>
  </div>
  <div class='section'>
    <table class='table bordered table-detail'> 
      <tr>
        <td class='w-120px'><?php echo $lang->salary->account;?></td>
        <td colspan='2'><?php echo zget($users, $salary->account);?></td>
      </tr>
      <tr>
        <td><?php echo $lang->salary->deserved;?></td>
        <td colspan='2'><?php echo $salary->deserved;?></td>
      </tr>
      <tr>
        <td><?php echo $lang->salary->actual;?></td>
        <td colspan='2'><?php echo $salary->actual;?></td>
      </tr>
      <?php if($salary->basic):?>
      <tr>
        <td><?php echo $lang->salary->basic;?></td>
        <td colspan='2'><?php echo $salary->basic;?></td>
      </tr>
      <?php endif;?>
      <?php if($salary->benefit):?>
      <tr>
        <td><?php echo $lang->salary->benefit;?></td>
        <td colspan='2'><?php echo $salary->benefit;?></td>
      </tr>
      <?php endif;?>
      <?php if($salary->bonusList):?>
      <tr>
        <td class='align-middle' rowspan='<?php echo count($salary->bonusList) + 1;?>'><?php echo $lang->salary->bonus;?></td>
      </tr>
      <?php foreach($salary->bonusList as $bonus):?>
      <tr>
        <td class='w-100px'><?php echo $bonus->type;?></td>
        <td><?php echo formatMoney($bonus->amount);?> </td>
      </tr>
      <?php endforeach;?>
      <?php endif;?>

      <?php if($salary->allowanceList):?>
      <tr>
        <td class='align-middle' rowspan='<?php echo count($salary->allowanceList) + 1;?>'><?php echo $lang->salary->allowance;?></td>
      </tr>
      <?php foreach($salary->allowanceList as $allowance):?>
      <tr>
        <td class='w-100px'><?php echo $allowance->type;?></td>
        <td><?php echo formatMoney($allowance->amount);?> </td>
      </tr>
      <?php endforeach;?>
      <?php endif;?>

      <?php if($salary->deductionList):?>
      <tr>
        <td class='align-middle' rowspan='<?php echo count($salary->deductionList) + 1;?>'><?php echo $lang->salary->deduction;?></td>
      </tr>
      <?php foreach($salary->deductionList as $deduction):?>
      <tr>
        <td class='w-100px'><?php echo $deduction->type;?></td>
        <td><?php echo formatMoney($deduction->amount);?> </td>
      </tr>
      <?php endforeach;?>
      <?php endif;?>

      <?php if($salary->companySSF):?>
      <tr>
        <td><?php echo $lang->salary->companySSF;?></td>
        <td colspan='2'><?php echo $salary->companySSF;?></td>
      </tr>
      <?php endif;?>
      <?php if($salary->companyHPF):?>
      <tr>
        <td><?php echo $lang->salary->companyHPF;?></td>
        <td colspan='2'><?php echo $salary->companyHPF;?></td>
      </tr>
      <?php endif;?>
    </table>
  </div>
</div>
<?php include "../../common/view/m.footer.html.php"; ?>
