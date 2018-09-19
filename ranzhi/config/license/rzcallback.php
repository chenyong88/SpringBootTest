<?php
function ioncube_event_handler($err_code, $params) 
{
    $expiredate = "2018-11-14";
    $domain     = "";
    $ip         = "";
    $mac        = "";
    $users      = "3";
    $account    = "";
    $version    = "";
    $licenseNotFound = "
        <html>
        <head>
        <meta http-equiv='content-type' content='text/html; charset=utf-8' />
        <title>error</title>
        </head>
        <body>
        <h2 style='color:red;text-align:center'>未找到授权文件</h2>
        <p>未找到授权文件，请使用我们提供的授权文件。</p>
        <p>电话：4008 320078</p>
        <p>QQ：co@zentao.net(1492153927)</p>
        <p>Email：co@zentao.net</p>
        <p>网站：<a href='https://www.ranzhi.org' target='_blank'>https://www.ranzhi.org</a></p>
        <br /> <br /> <br />
        <h2 style='color:red;text-align:center'>License not found</h2>
        <p>License not found. Please use the license we supported.</p>
        <p>Email : Max@easysoft.ltd</p>
        <p>Site : <a href='http://www.zdoo.org/' target='_blank'>http://www.zdoo.org/</a></p>
        </body>
        </html>
        ";
    $licenseCorrupt = "
        <html>
        <head>
        <meta http-equiv='content-type' content='text/html; charset=utf-8' />
        <title>error</title>
        </head>
        <body>
        <h2 style='color:red;text-align:center'>错误的授权文件或源码</h2>
        <p>该授权文件适用于{$version}版本。您使用的授权文件和源码不匹配，请使用最初的授权文件和源码。</p>
        <p>电话：4008 320078</p>
        <p>QQ：co@zentao.net(1492153927)</p>
        <p>Email：co@zentao.net</p>
        <p>网站：<a href='https://www.ranzhi.org' target='_blank'>https://www.ranzhi.org</a></p>
        <br /> <br /> <br />
        <h2 style='color:red;text-align:center'>Wrong license or code</h2>
        <p>The license is applicable to the {$version} edition. Your edition and license does not match. Please use the correct license.</p>
        <p>Email : Max@easysoft.ltd</p>
        <p>Site : <a href='http://www.zdoo.org/' target='_blank'>http://www.zdoo.org/</a></p>
        </body>
        </html>
        ";
    $expired = "
        <html>
        <head>
        <meta http-equiv='content-type' content='text/html; charset=utf-8' />
        <title>error</title>
        </head>
        <body>
        <h2 style='color:red;text-align:center'>您使用的版本已经过期</h2>
        <p>您当前使用的版本截止日期是{$expiredate}，已经过期，请联系我们购买授权。</p>
        <p>电话：4008 320078</p>
        <p>QQ：co@zentao.net(1492153927)</p>
        <p>Email：co@zentao.net</p>
        <p>网站：<a href='https://www.ranzhi.org' target='_blank'>https://www.ranzhi.org</a></p>
        <br /> <br /> <br />
        <h2 style='color:red;text-align:center'>The edition has been out of date.</h2>
        <p>The edition's end date is $expiredate, has been out of date now, please contact us to renew your license.</p>
        <p>Email : Max@easysoft.ltd</p>
        <p>Site : <a href='http://www.zdoo.org/' target='_blank'>http://www.zdoo.org/</a></p>
        </body>
        </html>
        ";
    $server = "
        <html>
        <head>
        <meta http-equiv='content-type' content='text/html; charset=utf-8' />
        <title>error</title>
        </head>
        <body>
        <h2 style='color:red;text-align:center'>错误的IP地址或MAC地址，或错误的域名访问</h2>
        <p>软件授权的IP地址或MAC地址和当前系统的IP地址或MAC地址不一致，请使用最初授权的服务器。或你访问的域名与绑定的域名不一致。</p>
        <p>电话：4008 320078</p>
        <p>QQ：co@zentao.net(1492153927)</p>
        <p>Email：co@zentao.net</p>
        <p>网站：<a href='https://www.ranzhi.org' target='_blank'>https://www.ranzhi.org</a></p>
        <br /> <br /> <br />
        <h2 style='color:red;text-align:center'>Wrong ip address or mac address,，or error domain</h2>
        <p>The ip or mac address or domain of current server is wrong. Please run ranzhi on the server we licensed.</p>
        <p>Email : Max@easysoft.ltd</p>
        <p>Site : <a href='http://www.zdoo.org/' target='_blank'>http://www.zdoo.org/</a></p>
        </body>
        </html>
        ";
    if($err_code == ION_LICENSE_EXPIRED)
    {
        echo $expired;
    }
    elseif($err_code == ION_LICENSE_SERVER_INVALID)
    {
        echo $server;
    }
    elseif($err_code == ION_LICENSE_NOT_FOUND)
    {
        echo $licenseNotFound;
    }
    elseif($err_code == ION_LICENSE_CORRUPT)
    {
        echo $licenseCorrupt;
    }
    echo $err_code;
    exit;
}
