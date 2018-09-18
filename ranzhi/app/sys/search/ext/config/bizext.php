<?php
$config->search->objectApps['todo']     = 'sys';
$config->search->objectApps['effort']   = 'sys';
$config->search->objectApps['order']    = 'crm';
$config->search->objectApps['contract'] = 'crm';
$config->search->objectApps['customer'] = 'crm';
$config->search->objectApps['provider'] = 'crm';
$config->search->objectApps['contact']  = 'crm';
$config->search->objectApps['product']  = 'crm';
$config->search->objectApps['feedback'] = 'crm';
$config->search->objectApps['project']  = 'proj';
$config->search->objectApps['task']     = 'proj';
$config->search->objectApps['doc']      = 'doc';
$config->search->objectApps['announce'] = 'oa';
$config->search->objectApps['blog']     = 'team';
$config->search->objectApps['thread']   = 'team';
$config->search->objectApps['reply']    = 'team';

$config->search->fields = new stdclass();
$config->search->fields->todo = new stdclass();
$config->search->fields->todo->id         = 'id';
$config->search->fields->todo->title      = 'name';
$config->search->fields->todo->content    = 'desc';
$config->search->fields->todo->addedDate  = 'assignedDate';
$config->search->fields->todo->editedDate = 'finishedDate';

$config->search->fields->effort = new stdclass();
$config->search->fields->effort->id         = 'id';
$config->search->fields->effort->title      = 'work';
$config->search->fields->effort->content    = '';
$config->search->fields->effort->addedDate  = 'date';
$config->search->fields->effort->editedDate = 'date';

$config->search->fields->order = new stdclass();
$config->search->fields->order->id         = 'id';
$config->search->fields->order->title      = 'title';
$config->search->fields->order->content    = '';
$config->search->fields->order->addedDate  = 'createdDate';
$config->search->fields->order->editedDate = 'editedDate';

$config->search->fields->contract = new stdclass();
$config->search->fields->contract->id         = 'id';
$config->search->fields->contract->title      = 'name';
$config->search->fields->contract->content    = '';
$config->search->fields->contract->addedDate  = 'createdDate';
$config->search->fields->contract->editedDate = 'editedDate';

$config->search->fields->customer = new stdclass();
$config->search->fields->customer->id         = 'id';
$config->search->fields->customer->title      = 'name';
$config->search->fields->customer->content    = 'desc';
$config->search->fields->customer->addedDate  = 'createdDate';
$config->search->fields->customer->editedDate = 'editedDate';

$config->search->fields->provider = new stdclass();
$config->search->fields->provider->id         = 'id';
$config->search->fields->provider->title      = 'name';
$config->search->fields->provider->content    = 'desc';
$config->search->fields->provider->addedDate  = 'createdDate';
$config->search->fields->provider->editedDate = 'editedDate';

$config->search->fields->contact = new stdclass();
$config->search->fields->contact->id         = 'id';
$config->search->fields->contact->title      = 'realname';
$config->search->fields->contact->content    = 'nickname,email,skype,qq,yahoo,gtalk,wangwang,site,mobile,phone,company,fax,weibo,weixin,desc';
$config->search->fields->contact->addedDate  = 'createdDate';
$config->search->fields->contact->editedDate = 'editedDate';

$config->search->fields->product = new stdclass();
$config->search->fields->product->id         = 'id';
$config->search->fields->product->title      = 'name';
$config->search->fields->product->content    = 'code,desc';
$config->search->fields->product->addedDate  = 'createdDate';
$config->search->fields->product->editedDate = 'editedDate';

$config->search->fields->feedback = new stdclass();
$config->search->fields->feedback->id         = 'id';
$config->search->fields->feedback->title      = 'title';
$config->search->fields->feedback->content    = 'desc';
$config->search->fields->feedback->addedDate  = 'addedDate';
$config->search->fields->feedback->editedDate = 'editedDate';

$config->search->fields->project = new stdclass();
$config->search->fields->project->id         = 'id';
$config->search->fields->project->title      = 'name';
$config->search->fields->project->content    = 'desc';
$config->search->fields->project->addedDate  = 'createdDate';
$config->search->fields->project->editedDate = 'editedDate';

$config->search->fields->task = new stdclass();
$config->search->fields->task->id         = 'id';
$config->search->fields->task->title      = 'name';
$config->search->fields->task->content    = 'desc';
$config->search->fields->task->addedDate  = 'createdDate';
$config->search->fields->task->editedDate = 'editedDate';

$config->search->fields->doc = new stdclass();
$config->search->fields->doc->id         = 'id';
$config->search->fields->doc->title      = 'title';
$config->search->fields->doc->content    = 'digest,keywords,content';
$config->search->fields->doc->addedDate  = 'createdDate';
$config->search->fields->doc->editedDate = 'editedDate';

$config->search->fields->announce = new stdclass();
$config->search->fields->announce->id         = 'id';
$config->search->fields->announce->title      = 'title';
$config->search->fields->announce->content    = 'summary,content';
$config->search->fields->announce->addedDate  = 'createdDate';
$config->search->fields->announce->editedDate = 'editedDate';

$config->search->fields->blog = new stdclass();
$config->search->fields->blog->id         = 'id';
$config->search->fields->blog->title      = 'title';
$config->search->fields->blog->content    = 'summary,content';
$config->search->fields->blog->addedDate  = 'createdDate';
$config->search->fields->blog->editedDate = 'editedDate';

$config->search->fields->thread = new stdclass();
$config->search->fields->thread->id         = 'id';
$config->search->fields->thread->title      = 'title';
$config->search->fields->thread->content    = 'content';
$config->search->fields->thread->addedDate  = 'createdDate';
$config->search->fields->thread->editedDate = 'editedDate';

$config->search->fields->reply = new stdclass();
$config->search->fields->reply->id         = 'id';
$config->search->fields->reply->title      = 'content';
$config->search->fields->reply->content    = '';
$config->search->fields->reply->addedDate  = 'createdDate';
$config->search->fields->reply->editedDate = 'editedDate';

/* Set the recPerPage of search. */
$config->search->recPerPage = 10;

/* Set the length of summary of search results. */
$config->search->summaryLength = 120;
