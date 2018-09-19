<?php
if($module == 'api' and $method == 'get')  return true;
if($module == 'api' and $method == 'all')  return true;
if($module == 'api' and $method == 'sync') return true;
if($module == 'wechat' and $method == 'oauthcallback') return true;
