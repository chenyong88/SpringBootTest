<?php
include '../../control.php';
class myLeads extends leads
{
    public function batchSendMail
    {
        if($this->post->content)
        {
        }

        $this->view->title         = '';
        $this->view->contactIDList = $this->post->contactIDList;
        $this->view->contactList   = $this->loadModel('contact', 'crm')->getPairs();
        $this->display();
    }
public function __construct($moduleName = '', $methodName = '')
{
    parent::__construct($moduleName, $methodName);
    if(function_exists('ioncube_license_properties')) $properties = ioncube_license_properties();
$user = $this->dao->select("COUNT('*') as count")->from(TABLE_USER)->where('deleted')->eq(0)->andWhere('locked')->lt(helper::now())->fetch();
if(!empty($properties['user']) and $properties['user']['value'] < $user->count) die("<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dli'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
  <title>Error</title>
</head>
<body>
<h2 style='color:red;text-align:center'>人数超出限制</h2>
您版本的用户数是{$properties['user']['value']}，您目前系统中已有{$user->count}人，已经超过了限制，请联系我们增加人数授权。<br>
Email：<a href='mailto:co@zentao.net'>co@zentao.net</a><br>
电话：4008 320078<br />
网址：<a href='https://www.ranzhi.org/'>www.ranzhi.org</a><br />
<br /><br /><br />
<h2 style='color:red;text-align:center'>Accounts has exceed the limit.</h2>
The accounts has exceed the limit of {$properties['user']['value']} peoples, please contact us to buy more licenses.<br />
Email : <a href='mailto:Max@easysoft.ltd'>Max@easysoft.ltd</a><br />
Site : <a href='http://www.zdoo.org/'>http://www.zdoo.org/</a><br />
</body>
</html>");

if(!empty($properties['domain']))
{
    $host    = $_SERVER['HTTP_HOST'];
    $portPos = strpos($host, ':');
    if($portPos !== false) $host = substr($host, 0, $portPos);
    $host .= $_SERVER['REQUEST_URI'];

    $checkHost  = false;
    $allowHosts = explode(',', $properties['domain']['value']);
    foreach($allowHosts as $allowHost)
    {
        if(strpos($host, $allowHost) !== false)
        {
            $checkHost = true;
            break;
        }
    }
    if(!$checkHost) die("<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dli'>
<html xmlns='http://www.w3.org/1999/xhtml'>
<head>
  <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
  <title>Error</title>
</head>
<body>
<h2 style='color:red;text-align:center'>绑定域名访问错误</h2>
您版本绑定的域名是{$properties['domain']['value']}，您目前访问的域名是{$_SERVER['HTTP_HOST']}，如果有问题，请联系我们修改绑定域名。<br>
Email：<a href='mailto:co@zentao.net'>co@zentao.net</a><br>
电话：4008 320078<br />
网址：<a href='https://www.ranzhi.org/'>www.ranzhi.org</a><br />
<br /><br /><br />
<h2 style='color:red;text-align:center'>Accounts has exceed the limit.</h2>
The binding domain is {$properties['domain']['value']}, please contact us to change binding domain.<br />
Email : <a href='mailto:Max@easysoft.ltd'>Max@easysoft.ltd</a><br />
Site : <a href='http://www.zdoo.org/'>http://www.zdoo.org/</a><br />
</body>
</html>");
};
}
}
