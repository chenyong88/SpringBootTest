<?php
if(!isset($lang->salary)) $lang->salary = new stdclass();

$lang->salary->common          = '工資';
$lang->salary->personal        = '我的工資';
$lang->salary->company         = '所有工資';
$lang->salary->browse          = '工資列表';
$lang->salary->batchCreate     = '生成工資';
$lang->salary->export          = '導出工資';
$lang->salary->edit            = '編輯工資';
$lang->salary->batchEdit       = '批量編輯';
$lang->salary->view            = '查看詳情';
$lang->salary->confirm         = '確認';
$lang->salary->batchConfirm    = '批量確認';
$lang->salary->delete          = '刪除';
$lang->salary->batchDelete     = '批量刪除';
$lang->salary->viewCommissions = '提成明細';
$lang->salary->exportBasic     = '基礎數據';
$lang->salary->exportDetail    = '明細數據';

$lang->salary->id          = '編號';
$lang->salary->month       = '月份';
$lang->salary->year        = '年份';
$lang->salary->account     = '姓名';
$lang->salary->basic       = '基本工資';
$lang->salary->benefit     = '崗位津貼';
$lang->salary->exemption   = '抵稅額';
$lang->salary->bonus       = '績效';
$lang->salary->allowance   = '福利';
$lang->salary->deduction   = '扣款';
$lang->salary->deserved    = '應發工資';
$lang->salary->actual      = '實發工資';
$lang->salary->companySSF  = '公司繳納社保';
$lang->salary->companyHPF  = '公司繳納公積金';
$lang->salary->createdBy   = '由誰創建';
$lang->salary->createdDate = '創建日期';
$lang->salary->editedBy    = '由誰編輯';
$lang->salary->editedDate  = '編輯日期';
$lang->salary->desc        = '備註';
$lang->salary->status      = '狀態';
$lang->salary->realname    = '姓名';
$lang->salary->item        = '明細項目';

$lang->salary->dept    = '部門';
$lang->salary->user    = '用戶';
$lang->salary->begin   = '開始';
$lang->salary->end     = '截止';
$lang->salary->search  = '搜索';

$lang->salary->lineList    = '產品綫';
$lang->salary->commission  = '提成';
$lang->salary->detail      = '詳情';
$lang->salary->companyPay  = '公司繳納';
$lang->salary->title       = '%s - %s年%s月工資條';
$lang->salary->totalSalary = '應發工資 %s，實發工資 %s，公司繳納 %s .';
$lang->salary->name        = '名稱';
$lang->salary->amount      = '金額';
$lang->salary->rule        = '規則';
$lang->salary->total       = '合計';
$lang->salary->average     = '平均';

$lang->salary->base         = '基數';
$lang->salary->personalRate = '個人繳納比例';
$lang->salary->companyRate  = '企業繳納比例';

$lang->salary->totalAmount  = '總收入';
$lang->salary->rate         = '提成比例';

$lang->salary->SSF     = '社保';
$lang->salary->HPF     = '公積金';
$lang->salary->tax     = '個人所得稅';
$lang->salary->absence = '缺勤';
$lang->salary->others  = '其它';

$lang->salary->setBasic      = '基礎設置';
$lang->salary->setBonus      = '績效獎金';
$lang->salary->setAllowance  = '福利';
$lang->salary->setExemption  = '抵稅項';
$lang->salary->setSSF        = '五險一金';
$lang->salary->setCommission = '設置提成';
$lang->salary->setting       = '設置';
$lang->salary->defaultSSF    = '五險一金（預設）';
$lang->salary->personalSSF   = '五險一金（個人）';

$lang->salary->bonusList['commission'] = '提成';
$lang->salary->bonusList['noabsence']  = '全勤獎';

$lang->salary->bonusRuleList['commission'] = 'commission';
$lang->salary->bonusRuleList['noabsence']  = 'noabsence';

$lang->salary->allowanceList['living']  = '房補';
$lang->salary->allowanceList['eating']  = '餐補';
$lang->salary->allowanceList['moving']  = '交通補助';
$lang->salary->allowanceList['calling'] = '通訊補助';
$lang->salary->allowanceList['trip']    = '出差補助';

$lang->salary->allowanceRuleList['living']  = 'bymonth';
$lang->salary->allowanceRuleList['eating']  = 'relateAttendDay';
$lang->salary->allowanceRuleList['moving']  = 'relateAttendDay';
$lang->salary->allowanceRuleList['calling'] = 'bymonth';
$lang->salary->allowanceRuleList['trip']    = 'relateTrip';

$lang->salary->exemptionList['basic']   = '基礎抵稅額';
$lang->salary->exemptionList['invoice'] = '發票';

$lang->salary->deductionList['absence'] = '缺勤';

$lang->salary->SSFList['endowment']    = '養老保險';
$lang->salary->SSFList['medical']      = '醫療保險';
$lang->salary->SSFList['unemployment'] = '失業保險';
$lang->salary->SSFList['injury']       = '工傷保險';
$lang->salary->SSFList['maternity']    = '生育保險';

$lang->salary->SSFParams = new stdclass();
$lang->salary->SSFParams->base['endowment']    = 2423;
$lang->salary->SSFParams->base['medical']      = 2423;
$lang->salary->SSFParams->base['unemployment'] = 2423;
$lang->salary->SSFParams->base['injury']       = 2423;
$lang->salary->SSFParams->base['maternity']    = 2423;
$lang->salary->SSFParams->base['HPF']          = 2000;

$lang->salary->SSFParams->personalRate['endowment']    = 8;
$lang->salary->SSFParams->personalRate['medical']      = 2;
$lang->salary->SSFParams->personalRate['unemployment'] = 0.5;
$lang->salary->SSFParams->personalRate['injury']       = 0;
$lang->salary->SSFParams->personalRate['maternity']    = 0;
$lang->salary->SSFParams->personalRate['HPF']          = 5;

$lang->salary->SSFParams->companyRate['endowment']    = 18;
$lang->salary->SSFParams->companyRate['medical']      = 9;
$lang->salary->SSFParams->companyRate['unemployment'] = 1;
$lang->salary->SSFParams->companyRate['injury']       = 1;
$lang->salary->SSFParams->companyRate['maternity']    = 0.7;
$lang->salary->SSFParams->companyRate['HPF']          = 5;

$lang->salary->ruleList['norule']           = '';
$lang->salary->ruleList['commission']       = '按當月實際提成發放';
$lang->salary->ruleList['noabsence']        = '當月全勤發放';
$lang->salary->ruleList['bymonth']          = '按月發放';
$lang->salary->ruleList['relateAttendRate'] = '出勤率 * 金額';
$lang->salary->ruleList['relateAttendDay']  = '出勤天數 * 金額';
$lang->salary->ruleList['relateTrip']       = '出差天數 * 金額';

$lang->salary->statusList['wait']      = '待處理';
$lang->salary->statusList['confirmed'] = '已確認';

$lang->salary->placeholder = new stdclass();
$lang->salary->placeholder->basicExemption = '基礎設置中的抵稅額';

$lang->salary->error = new stdclass();
$lang->salary->error->noAttendStat = '上月沒有考勤記錄。';
$lang->salary->error->notFound     = '該工資條未找到';

$lang->excel->title->basic  = '工資表';
$lang->excel->title->detail = '工資明細表';

$lang->salary->report = new stdclass();
$lang->salary->report->common     = '工資彙總表';
$lang->salary->report->selectYear = '選擇年份：';
$lang->salary->report->item       = '項目';
