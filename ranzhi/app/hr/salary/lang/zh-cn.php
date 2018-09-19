<?php
if(!isset($lang->salary)) $lang->salary = new stdclass();

$lang->salary->common          = '工资';
$lang->salary->personal        = '我的工资';
$lang->salary->company         = '所有工资';
$lang->salary->browse          = '工资列表';
$lang->salary->batchCreate     = '生成工资';
$lang->salary->export          = '导出工资';
$lang->salary->edit            = '编辑工资';
$lang->salary->batchEdit       = '批量编辑';
$lang->salary->view            = '查看详情';
$lang->salary->confirm         = '确认';
$lang->salary->batchConfirm    = '批量确认';
$lang->salary->delete          = '删除';
$lang->salary->batchDelete     = '批量删除';
$lang->salary->viewCommissions = '提成明细';
$lang->salary->exportBasic     = '基础数据';
$lang->salary->exportDetail    = '明细数据';

$lang->salary->id          = '编号';
$lang->salary->month       = '月份';
$lang->salary->year        = '年份';
$lang->salary->account     = '姓名';
$lang->salary->basic       = '基本工资';
$lang->salary->benefit     = '岗位津贴';
$lang->salary->exemption   = '抵税额';
$lang->salary->bonus       = '绩效';
$lang->salary->allowance   = '福利';
$lang->salary->deduction   = '扣款';
$lang->salary->deserved    = '应发工资';
$lang->salary->actual      = '实发工资';
$lang->salary->companySSF  = '公司缴纳社保';
$lang->salary->companyHPF  = '公司缴纳公积金';
$lang->salary->createdBy   = '由谁创建';
$lang->salary->createdDate = '创建日期';
$lang->salary->editedBy    = '由谁编辑';
$lang->salary->editedDate  = '编辑日期';
$lang->salary->desc        = '备注';
$lang->salary->status      = '状态';
$lang->salary->realname    = '姓名';
$lang->salary->item        = '明细项目';

$lang->salary->dept    = '部门';
$lang->salary->user    = '用户';
$lang->salary->begin   = '开始';
$lang->salary->end     = '截止';
$lang->salary->search  = '搜索';

$lang->salary->lineList    = '产品线';
$lang->salary->commission  = '提成';
$lang->salary->detail      = '详情';
$lang->salary->companyPay  = '公司缴纳';
$lang->salary->title       = '%s - %s年%s月工资条';
$lang->salary->totalSalary = '应发工资 %s，实发工资 %s，公司缴纳 %s .';
$lang->salary->name        = '名称';
$lang->salary->amount      = '金额';
$lang->salary->rule        = '规则';
$lang->salary->total       = '合计';
$lang->salary->average     = '平均';

$lang->salary->base         = '基数';
$lang->salary->personalRate = '个人缴纳比例';
$lang->salary->companyRate  = '企业缴纳比例';

$lang->salary->totalAmount  = '总收入';
$lang->salary->rate         = '提成比例';

$lang->salary->SSF     = '社保';
$lang->salary->HPF     = '公积金';
$lang->salary->tax     = '个人所得税';
$lang->salary->absence = '缺勤';
$lang->salary->others  = '其它';

$lang->salary->setBasic      = '基础设置';
$lang->salary->setBonus      = '绩效奖金';
$lang->salary->setAllowance  = '福利';
$lang->salary->setExemption  = '抵税项';
$lang->salary->setSSF        = '五险一金';
$lang->salary->setCommission = '设置提成';
$lang->salary->setting       = '设置';
$lang->salary->defaultSSF    = '五险一金（默认）';
$lang->salary->personalSSF   = '五险一金（个人）';

$lang->salary->bonusList['commission'] = '提成';
$lang->salary->bonusList['noabsence']  = '全勤奖';

$lang->salary->bonusRuleList['commission'] = 'commission';
$lang->salary->bonusRuleList['noabsence']  = 'noabsence';

$lang->salary->allowanceList['living']  = '房补';
$lang->salary->allowanceList['eating']  = '餐补';
$lang->salary->allowanceList['moving']  = '交通补助';
$lang->salary->allowanceList['calling'] = '通讯补助';
$lang->salary->allowanceList['trip']    = '出差补助';

$lang->salary->allowanceRuleList['living']  = 'bymonth';
$lang->salary->allowanceRuleList['eating']  = 'relateAttendDay';
$lang->salary->allowanceRuleList['moving']  = 'relateAttendDay';
$lang->salary->allowanceRuleList['calling'] = 'bymonth';
$lang->salary->allowanceRuleList['trip']    = 'relateTrip';

$lang->salary->exemptionList['basic']   = '基础抵税额';
$lang->salary->exemptionList['invoice'] = '发票';

$lang->salary->deductionList['absence'] = '缺勤';

$lang->salary->SSFList['endowment']    = '养老保险';
$lang->salary->SSFList['medical']      = '医疗保险';
$lang->salary->SSFList['unemployment'] = '失业保险';
$lang->salary->SSFList['injury']       = '工伤保险';
$lang->salary->SSFList['maternity']    = '生育保险';

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
$lang->salary->ruleList['commission']       = '按当月实际提成发放';
$lang->salary->ruleList['noabsence']        = '当月全勤发放';
$lang->salary->ruleList['bymonth']          = '按月发放';
$lang->salary->ruleList['relateAttendRate'] = '出勤率 * 金额';
$lang->salary->ruleList['relateAttendDay']  = '出勤天数 * 金额';
$lang->salary->ruleList['relateTrip']       = '出差天数 * 金额';

$lang->salary->statusList['wait']      = '待处理';
$lang->salary->statusList['confirmed'] = '已确认';

$lang->salary->placeholder = new stdclass();
$lang->salary->placeholder->basicExemption = '基础设置中的抵税额';

$lang->salary->error = new stdclass();
$lang->salary->error->noAttendStat = '上月没有考勤记录。';
$lang->salary->error->notFound     = '该工资条未找到';

$lang->excel->title->basic  = '工资表';
$lang->excel->title->detail = '工资明细表';

$lang->salary->report = new stdclass();
$lang->salary->report->common     = '工资汇总表';
$lang->salary->report->selectYear = '选择年份：';
$lang->salary->report->item       = '项目';
