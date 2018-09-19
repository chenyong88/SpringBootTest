<?php
if(!isset($lang->salary)) $lang->salary = new stdclass();

$lang->salary->common          = 'Salary';
$lang->salary->personal        = 'My Salary';
$lang->salary->company         = 'All';
$lang->salary->browse          = 'Browse';
$lang->salary->batchCreate     = 'Create';
$lang->salary->export          = 'Export';
$lang->salary->edit            = 'Edit';
$lang->salary->batchEdit       = 'Batch Edit';
$lang->salary->view            = 'View';
$lang->salary->confirm         = 'Confirm';
$lang->salary->batchConfirm    = 'Batch Confirm';
$lang->salary->delete          = 'Delete';
$lang->salary->batchDelete     = 'Batch Delete';
$lang->salary->viewCommissions = 'Commission Details';
$lang->salary->exportBasic     = 'Basic Data';
$lang->salary->exportDetail    = 'Detail Data';

$lang->salary->id          = 'ID';
$lang->salary->month       = 'Month';
$lang->salary->year        = 'Year';
$lang->salary->account     = 'Account';
$lang->salary->basic       = 'Base';
$lang->salary->benefit     = 'Subsidy';
$lang->salary->exemption   = 'Exemption';
$lang->salary->bonus       = 'Bonus';
$lang->salary->allowance   = 'Welfare';
$lang->salary->deduction   = 'Withhold';
$lang->salary->deserved    = 'Gross Pay';
$lang->salary->actual      = 'Net Pay';
$lang->salary->companySSF  = 'Social Security of Company';
$lang->salary->companyHPF  = 'Housing Provident of Company';
$lang->salary->createdBy   = 'Created By';
$lang->salary->createdDate = 'Created Date';
$lang->salary->editedBy    = 'Edited By';
$lang->salary->editedDate  = 'Edited Date';
$lang->salary->desc        = 'Desc';
$lang->salary->status      = 'Status';
$lang->salary->realname    = 'Name';
$lang->salary->item        = 'Item';

$lang->salary->dept   = 'Dept';
$lang->salary->user   = 'User';
$lang->salary->begin  = 'Begin';
$lang->salary->end    = 'End';
$lang->salary->search = 'Search';

$lang->salary->lineList    = 'Lines';
$lang->salary->commission  = 'Commission';
$lang->salary->detail      = 'Detail';
$lang->salary->companyPay  = 'Company Paid';
$lang->salary->title       = "%s's salary of %s-%s";
$lang->salary->totalSalary = 'Deserved %s，Actual %s，Company Paid %s .';
$lang->salary->name        = 'Name';
$lang->salary->amount      = 'Amount';
$lang->salary->rule        = 'Rule';
$lang->salary->total       = 'Total';
$lang->salary->average     = 'Average';

$lang->salary->base         = 'Base';
$lang->salary->personalRate = 'Personal';
$lang->salary->companyRate  = 'Company';

$lang->salary->totalAmount  = 'Total Income';
$lang->salary->rate         = 'Percentage';

$lang->salary->SSF          = 'Social Security';
$lang->salary->HPF          = 'Housing Provident';
$lang->salary->tax          = 'Tax';
$lang->salary->absence      = 'Absence';
$lang->salary->others       = 'Others';

$lang->salary->setBasic      = 'Base';
$lang->salary->setBonus      = 'Bonus';
$lang->salary->setAllowance  = 'Welfare';
$lang->salary->setExemption  = 'Exemption';
$lang->salary->setSSF        = 'Social Security and Housing Provident';
$lang->salary->setCommission = 'Commission';
$lang->salary->setting       = 'Settings';
$lang->salary->defaultSSF    = 'Default';
$lang->salary->personalSSF   = 'Personal';

$lang->salary->bonusList['commission'] = 'Commission';
$lang->salary->bonusList['noabsence']  = 'Full Attendence Bonus';

$lang->salary->bonusRuleList['commission'] = 'commission';
$lang->salary->bonusRuleList['noabsence']  = 'noabsence';

$lang->salary->allowanceList['living']  = 'Housing Allowance';
$lang->salary->allowanceList['eating']  = 'Meal Allowance';
$lang->salary->allowanceList['moving']  = 'Communte Allowance';
$lang->salary->allowanceList['calling'] = 'Phone Allowance';
$lang->salary->allowanceList['trip']    = 'Travel Allowance';

$lang->salary->allowanceRuleList['living']  = 'bymonth';
$lang->salary->allowanceRuleList['eating']  = 'relateAttendDay';
$lang->salary->allowanceRuleList['moving']  = 'relateAttendDay';
$lang->salary->allowanceRuleList['calling'] = 'bymonth';
$lang->salary->allowanceRuleList['trip']    = 'relateTrip';

$lang->salary->exemptionList['basic']   = 'Basic';
$lang->salary->exemptionList['invoice'] = 'Invoice';

$lang->salary->deductionList['absence'] = 'Absence';

$lang->salary->SSFList['endowment']    = 'Endowment';
$lang->salary->SSFList['medical']      = 'Medical';
$lang->salary->SSFList['unemployment'] = 'Unemployment';
$lang->salary->SSFList['injury']       = 'Injury';
$lang->salary->SSFList['maternity']    = 'Maternity';

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
$lang->salary->ruleList['commission']       = 'Actual Commission';
$lang->salary->ruleList['noabsence']        = 'Full Attendence';
$lang->salary->ruleList['bymonth']          = 'Every Month';
$lang->salary->ruleList['relateAttendRate'] = 'Attendence * Amount';
$lang->salary->ruleList['relateAttendDay']  = 'Attendence Days * Amount';
$lang->salary->ruleList['relateTrip']       = 'Travel Days * Amount';

$lang->salary->statusList['wait']      = 'Wait';
$lang->salary->statusList['confirmed'] = 'Confirmed';

$lang->salary->placeholder = new stdclass();
$lang->salary->placeholder->basicExemption = 'Exemption set in basic.';

$lang->salary->error = new stdclass();
$lang->salary->error->noAttendStat = 'No attendence record.';
$lang->salary->error->notFound     = 'Not found.';

$lang->excel->title->basic  = 'Salary Statement';
$lang->excel->title->detail = 'Detailed Salary Statement';

$lang->salary->report = new stdclass();
$lang->salary->report->common     = ' Salary Summary';
$lang->salary->report->selectYear = 'Year: ';
$lang->salary->report->item       = 'Item';
