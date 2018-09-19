<?php
/**
 * The zh-tw lang file of order module of Ranzhi.
 *
 * @copyright   Copyright 2009-2016 青島易軟天創網絡科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商業軟件，非開源軟件
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     order
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */
$lang->order->common           = '訂單';
$lang->order->browse           = '訂單列表';
$lang->order->create           = '創建訂單';
$lang->order->createRefund     = '創建退貨單';
$lang->order->edit             = '編輯訂單';
$lang->order->editRefund       = '編輯退貨單';
$lang->order->cancel           = '取消訂單';
$lang->order->activate         = '激活訂單';
$lang->order->finish           = '完成訂單';
$lang->order->detail           = '訂單詳情';
$lang->order->view             = '訂單詳情';
$lang->order->assignToPick     = '通知配貨';
$lang->order->assignToPurchase = '通知採購';
$lang->order->purchase         = '採購需求';
$lang->order->printOrder       = '打印';
$lang->order->sale             = '銷售';
$lang->order->history          = '歷史訂單';
$lang->order->setOrderNo       = '單據編號';
$lang->order->sendMail         = '郵件通知';

$lang->order->common       = '訂單';
$lang->order->id           = '編號';
$lang->order->refundNo     = '退貨單號';
$lang->order->money        = '金額';
$lang->order->taxed        = '是否含稅';
$lang->order->finishedDate = '交付日期';
$lang->order->desc         = '備註';
$lang->order->createdBy    = '下單人員';
$lang->order->createdDate  = '下單日期';
$lang->order->status       = '訂單狀態';
$lang->order->refundStatus = '退貨單狀態';
$lang->order->type         = '訂單類型';
$lang->order->contract     = '銷售合同';
$lang->order->settlement   = '結款方式';
$lang->order->assignedTo   = '指派給';
$lang->order->assignedBy   = '由誰指派';
$lang->order->assignedDate = '指派日期';
$lang->order->page         = '第    %s    頁    共    %s    頁';

$lang->order->typeList = array();
$lang->order->typeList['sale']           = '銷售';
$lang->order->typeList['purchase']       = '採購';
//$lang->order->typeList['saleRefund']     = '銷售退貨';
//$lang->order->typeList['purchaseRefund'] = '採購退貨';
$lang->order->typeList['out']            = '倉庫出庫';
$lang->order->typeList['in']             = '倉庫入庫';

$lang->order->orderAmount    = '訂單數量';
$lang->order->storeAmount    = '庫存數量';
$lang->order->purchaseAmount = '採購數量';
$lang->order->showProducts   = '顯示產品詳情';
$lang->order->createTrader   = '新建';
$lang->order->createBuyOrder = '創建採購訂單';
$lang->order->createProduct  = '新增庫存產品';

$lang->order->all          = '所有訂單';
$lang->order->assignedToMe = '指派給我';
$lang->order->canceled     = '已取消';
$lang->order->finished     = '已完成';
$lang->order->titleLBL     = '%s : %s';

$lang->order->batchNumber  = '批次編號：<strong> %s </strong>';

$lang->order->exportOrder             = array();
$lang->order->exportOrder['purchase'] = '採購單列表';
$lang->order->exportOrder['sale']     = '銷售單列表';
$lang->order->exportOrder['default']  = '訂單列表';

$lang->order->trader['sale']           = '客戶';
$lang->order->trader['purchase']       = '供應商';
$lang->order->trader['saleRefund']     = $lang->order->trader['sale'];
$lang->order->trader['purchaseRefund'] = $lang->order->trader['purchase'];

$lang->order->batch['sale']           = '發貨';
$lang->order->batch['purchase']       = '收貨';
$lang->order->batch['saleRefund']     = $lang->order->batch['purchase'];
$lang->order->batch['purchaseRefund'] = $lang->order->batch['sale'];

$lang->order->product        = '產品';
$lang->order->total          = '合計';
$lang->order->subtotal       = '小計';
$lang->order->canceledReason = '取消原因';
$lang->order->canceledTips   = '取消訂單將刪除收/發貨記錄。';
$lang->order->pick           = '通知配貨';
$lang->order->moneyInWords   = '大寫金額';

$lang->order->mail = new stdclass();
$lang->order->mail->send       = '發送';
$lang->order->mail->sendMail   = '發送郵件';
$lang->order->mail->endnote    = "本郵件由<a href='http://www.ranzhi.org'>然之協同</a>自動生成";
$lang->order->mail->choseUser  = '請選擇收件人';

$lang->order->mail->orderType['purchase']       = '採購單詳情.xls';
$lang->order->mail->orderType['sale']           = '銷售單詳情.xls';
$lang->order->mail->orderType['purchaseRefund'] = '採購退貨單詳情.xls';
$lang->order->mail->orderType['saleRefund']     = '銷售退貨單詳情.xls';

$lang->order->mail->subject['purchase']       = "%s 採購單";
$lang->order->mail->subject['sale']           = "%s 銷售單";
$lang->order->mail->subject['purchaseRefund'] = "%s 採購退貨單";
$lang->order->mail->subject['saleRefund']     = "%s 銷售退貨單";

$lang->order->statusList['']              = '';
$lang->order->statusList['all']           = '所有訂單';
$lang->order->statusList['assignedToMe']  = '指派給我';
$lang->order->statusList['underway']      = '進行中';
$lang->order->statusList['pending']       = '待處理';
$lang->order->statusList['toReceive']     = '待收貨';
$lang->order->statusList['received']      = '已收貨';
$lang->order->statusList['partReceived']  = '部分收貨';
$lang->order->statusList['toPurchase']    = '待採購';
$lang->order->statusList['purchasing']    = '採購中';
$lang->order->statusList['purchased']     = '已採購';
$lang->order->statusList['picking']       = '待配貨';
$lang->order->statusList['toDeliver']     = '待發貨';
$lang->order->statusList['delivered']     = '已發貨';
$lang->order->statusList['partDelivered'] = '部分發貨';
$lang->order->statusList['canceled']      = '已取消';
$lang->order->statusList['finished']      = '已完成';

$lang->order->settlementList[0] = '';
$lang->order->settlementList[1] = '現金';
$lang->order->settlementList[2] = '銀行電匯';
$lang->order->settlementList[3] = '轉賬支票';
$lang->order->settlementList[4] = '承兌匯票';
$lang->order->settlementList[5] = '委託代收貨款';

$lang->order->taxedList[1] = '含稅';
$lang->order->taxedList[0] = '不含稅';

$lang->order->orderNo = new stdclass();
$lang->order->orderNo->common    = '訂單號';
$lang->order->orderNo->type      = '編號類型';
$lang->order->orderNo->length    = '長度';
$lang->order->orderNo->clearType = '清零方式';
$lang->order->orderNo->preview   = '編號預覽';

$lang->order->orderNo->typeList['fixed'] = '固定值';
$lang->order->orderNo->typeList['year']  = '年';
$lang->order->orderNo->typeList['month'] = '月';
$lang->order->orderNo->typeList['day']   = '日';
$lang->order->orderNo->typeList['AI']    = '自增長';

$lang->order->orderNo->yearLength[2] = '兩位';
$lang->order->orderNo->yearLength[4] = '四位';

$lang->order->orderNo->AI['length'][2] = '兩位';
$lang->order->orderNo->AI['length'][3] = '三位';
$lang->order->orderNo->AI['length'][4] = '四位';

$lang->order->orderNo->AI['clearType']['day']   = '按日清零';
$lang->order->orderNo->AI['clearType']['month'] = '按月清零';
$lang->order->orderNo->AI['clearType']['year']  = '按年清零';

$lang->order->orderNo->placeholder = new stdclass();
$lang->order->orderNo->placeholder->fixed = '輸入一個固定值，如SO';

$lang->order->orderNo->tips = '系統正式啟用後請勿修改單據編號規則！';

$lang->order->orderNo->error = new stdclass(); 
$lang->order->orderNo->error->emptyAI = '至少選擇一個編號類型為<strong>自增長</strong>，否則可能會出現重複的單據編號。';

$lang->order->print = new stdclass();
$lang->order->print->common         = '打印';
$lang->order->print->page           = '第%s頁';
$lang->order->print->pageTitle      = '第%s頁/共%s頁';
$lang->order->print->purchase       = '採購訂單';
$lang->order->print->sale           = '銷售訂單';
$lang->order->print->purchaseRefund = '採購退貨單';
$lang->order->print->saleRefund     = '銷售退貨單';
$lang->order->print->pick           = '配貨單';
$lang->order->print->deliver        = '發貨單';
$lang->order->print->contract       = '訂單(合同)號 ';
$lang->order->print->product        = '名稱';
$lang->order->print->tabulation     = '制單：';
$lang->order->print->check          = '審核：';
$lang->order->print->delivery       = '配送：';
$lang->order->print->finishedDate   = '<strong>注意事項</strong>：以上產品交貨日期為%s';
$lang->order->print->hidePrice      = '隱藏單價和金額';
$lang->order->print->tel            = 'TEL：';
$lang->order->print->fax            = 'FAX：';
$lang->order->print->to             = 'T  O：';
$lang->order->print->attn           = 'ATTN：';
$lang->order->print->from           = 'FROM：';
$lang->order->print->settlement     = '二、結款方式：';
$lang->order->print->desc           = '三、備註：';
$lang->order->print->help           = '打印幫助';

$lang->order->print->sign['sale']           = '客戶簽收：';
$lang->order->print->sign['purchase']       = '供方簽收：';
$lang->order->print->sign['saleRefund']     = $lang->order->print->sign['sale'];
$lang->order->print->sign['purchaseRefund'] = $lang->order->print->sign['purchase'];

$lang->order->print->taxedList[0] = '一、報價不含稅';
$lang->order->print->taxedList[1] = '一、報價含稅（17%增值稅）';

$lang->order->print->trader['sale']           = '購貨單位 ';
$lang->order->print->trader['purchase']       = '送貨單位 ';
$lang->order->print->trader['saleRefund']     = '退貨單位 ';
$lang->order->print->trader['purchaseRefund'] = '退貨單位 ';

$lang->order->print->orderNo['sale']           = '銷售單號 ';
$lang->order->print->orderNo['purchase']       = '採購單號 ';
//$lang->order->print->orderNo['saleRefund']     = '退貨單號 ';
//$lang->order->print->orderNo['purchaseRefund'] = '退貨單號 ';

$lang->order->error = new stdclass();
$lang->order->error->noRecord    = '請錄入有效的產品信息。';
$lang->order->error->notSelected = '請選擇要採購的產品。';
$lang->order->error->notFinished = '產品未完成%s，訂單不能完成。';
$lang->order->error->hasSent     = '產品已%s，不能刪除。';
$lang->order->error->errorAmount = '產品已%s%s，訂單數量不能小於已發貨數量。';
$lang->order->error->cantChange  = '產品已%s，不能更改品名。';

/* item */
$lang->order->pickedBy      = '配貨人';
$lang->order->expressedBy   = '發貨人';
$lang->order->receivedBy    = '收貨人';
$lang->order->express       = '快遞';
$lang->order->waybill       = '運單號';
$lang->order->expressedDate = '發貨日期';
$lang->order->pickedDate    = '配貨日期';
$lang->order->receivedDate  = '收貨日期';

$lang->orderProduct = new stdclass();
$lang->orderProduct->product    = '名稱';
$lang->orderProduct->amount     = '數量';
$lang->orderProduct->model      = '規格';
$lang->orderProduct->unit       = '單位';
$lang->orderProduct->price      = '單價';
$lang->orderProduct->totalPrice = '總價';

$lang->order->deny = '您沒有創建%s的權限。';

$lang->order->report = new stdclass();
$lang->order->report->common   = '報表';
$lang->order->report->sale     = '銷售報表';
$lang->order->report->purchase = '採購報表';
$lang->order->report->showDesc = '顯示備註';
$lang->order->report->noDesc   = '沒有備註';
$lang->order->report->money    = '金額總計：%s，本頁金額合計：%s。';
$lang->order->report->noPriv   = '沒有可用的報表，請聯繫管理員獲取權限。';
$lang->order->report->search   = '搜索';

$lang->order->report->date['thismonth'] = '本月';
$lang->order->report->date['lastmonth'] = '上月';
$lang->order->report->date['thisyear']  = '本年';
$lang->order->report->date['lastyear']  = '上年';
$lang->order->report->date['all']       = '所有';

$lang->order->report->select['orderNo']  = '--請輸入訂單號--';
$lang->order->report->select['customer'] = '--請選擇客戶--';
$lang->order->report->select['provider'] = '--請選擇供應商--';
$lang->order->report->select['product']  = '--請選擇產品--';
$lang->order->report->select['category'] = '--請選擇類目--';
$lang->order->report->select['model']    = '--請選擇規格--';
$lang->order->report->select['begin']    = '--請選擇起始日期--';
$lang->order->report->select['end']      = '--請選擇截止日期--';

$lang->psiorder = $lang->order;
foreach($lang->orderProduct as $key => $value)
{
    $lang->psiorder->$key = $value;
}
