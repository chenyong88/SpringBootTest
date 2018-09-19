<?php
if(!isset($lang->wechat)) $lang->wechat = new stdclass();
$lang->wechat->common         = '企業微信';
$lang->wechat->corpID         = 'CorpID';
$lang->wechat->agent          = '企業應用';
$lang->wechat->agentName      = '應用名稱';
$lang->wechat->agentID        = '應用ID';
$lang->wechat->secret         = 'Secret';
$lang->wechat->contact        = '通訊錄同步';
$lang->wechat->sendMessage    = '發送消息';
$lang->wechat->scan           = '掃瞄功能';
$lang->wechat->chooseImage    = '選擇圖片';
$lang->wechat->apply          = '我的申請';
$lang->wechat->review         = '我的審批';

$lang->wechat->admin       = '微信管理';
$lang->wechat->createAgent = '新增應用';
$lang->wechat->editAgent   = '編輯應用';
$lang->wechat->deleteAgent = '刪除應用';
$lang->wechat->viewAgent   = '應用詳情';
$lang->wechat->setting     = '設置';

$lang->wechat->applys['attend']   = '考勤補錄';
$lang->wechat->applys['leave']    = '請假申請';
$lang->wechat->applys['overtime'] = '加班申請';
$lang->wechat->applys['lieu']     = '調休申請';
$lang->wechat->applys['refund']   = '報銷申請';

$lang->wechat->reviews['attend']   = '考勤審批';
$lang->wechat->reviews['leave']    = '請假審批';
$lang->wechat->reviews['overtime'] = '加班審批';
$lang->wechat->reviews['lieu']     = '調休審批';
$lang->wechat->reviews['refund']   = '報銷審批';

$lang->wechat->userFields['name']       = '姓名';
$lang->wechat->userFields['userid']     = '帳號';
$lang->wechat->userFields['mobile']     = '手機號';
$lang->wechat->userFields['email']      = '郵箱';
$lang->wechat->userFields['department'] = '所在部門';
$lang->wechat->userFields['position']   = '職位';

$lang->wechat->deptFields['name']     = '部門名稱';
$lang->wechat->deptFields['id']       = '部門ID';
$lang->wechat->deptFields['parentid'] = '父部門ID';
$lang->wechat->deptFields['order']    = '排序';

$lang->wechat->sendMessageList['open']  = '開啟';
$lang->wechat->sendMessageList['close'] = '禁用';

$lang->wechat->chooseImageList['open']  = '開啟';
$lang->wechat->chooseImageList['close'] = '禁用';

$lang->wechat->scanList['open']  = '開啟';
$lang->wechat->scanList['close'] = '禁用';

$lang->wechat->syncUserToSystem = '同步用戶到然之';
$lang->wechat->syncDeptToSystem = '同步部門到然之';
$lang->wechat->syncUserToWechat = '同步用戶到微信';
$lang->wechat->syncDeptToWechat = '同步部門到微信';
$lang->wechat->bindUser         = '綁定企業微信用戶';
$lang->wechat->selectUser       = '選擇企業微信用戶';

$lang->wechat->note = 'corpID在企業微信後台 <strong>我的企業</strong> 菜單下 <strong>企業信息</strong> 中查看（需要有管理員權限），應用ID和secret在微信後台 <strong>企業應用</strong> 菜單下該應用詳情中查看，通訊錄同步secret在 <strong>管理工具</strong> 菜單下選擇 <strong>通訊錄同步</strong> 並開啟 <strong>API介面同步</strong> 後查看。';

$lang->wechat->emptyContactSecret = '沒有設置通訊錄同步secret，不能使用同步功能。';
