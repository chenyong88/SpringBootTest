<?php
/**
 * The wechat class file of chanzhiEPS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     商业软件，非开源软件
 * @author      Tingting Dai<daitingting@xirangit.com>
 * @package     lib
 * @version     $Id$
 * @link        http://www.ranzhico.com
 */

if(!defined('CURL_SSLVERSION_TLSv1')) define('CURL_SSLVERSION_TLSv1', 1);

class wechatapi
{
    /**
     * The token.
     * 
     * @var string   
     * @access public
     */
    public $token;

    /**
     * The application id.
     * 
     * @var string   
     * @access public
     */
    public $corpID;

    /**
     * The encodingAESKey.
     * 
     * @var string   
     * @access public
     */
    public $encodingAESKey;

    /**
     * The application secret.
     * 
     * @var string   
     * @access public
     */
    public $secret;

    /**
     * The construct function.
     * 
     * @param  string    $token 
     * @param  string    $corpID 
     * @param  string    $secret 
     * @param  bool      $debug 
     * @access public
     * @return void
     */
    public function __construct($corpID, $secret, $token = '', $encodingAESKey = '', $debug = false)
    {
        $this->setCorpID($corpID);
        $this->setSecret($secret);
        $this->setToken($token);
        $this->setEncodingAESKey($encodingAESKey);
        $this->setState();
        $this->setDebug($debug);
    }

    /**
     * Set debug.
     * 
     * @param  bool    $debug 
     * @access public
     * @return void
     */
    public function setDebug($debug)
    {
        $this->debug = $debug;
    }

    /**
     * Set the corp id.
     * 
     * @param  string    $corpID 
     * @access public
     * @return void
     */
    public function setCorpID($corpID)
    {
        $this->corpID = $corpID;
    }

    /**
     * Set the application secret.
     * 
     * @param  string    $secret 
     * @access public
     * @return void
     */
    public function setSecret($secret)
    {
        $this->secret = $secret;
    }

    /**
     * Set the application token.
     * 
     * @param  string    $token 
     * @access public
     * @return void
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * Set the encodingAESKey.
     * 
     * @param  string    $encodingAESKey 
     * @access public
     * @return void
     */
    public function setEncodingAesKey($encodingAESKey)
    {
        $this->encodingAESKey = $encodingAESKey;
    }

    /**
     * Set the random state string.
     * 
     * @access public
     * @return void
     */
    public function setState()
    {
        if(isset($_SESSION['oauthState'])) return $this->state = $_SESSION['oauthState'];

        $this->state = md5(uniqid(mt_rand()));
        $_SESSION['oauthState'] = $this->state;
    }

    /**
     * Check the signature.
     * 
     * @access public
     * @return void
     */
    public function checkSign()
    {
        if(empty($_GET['msg_signature']) or empty($_GET['timestamp']) or empty($_GET['nonce'])) die('evil');

        $sign    = $_GET['msg_signature'];
        $time    = $_GET['timestamp'];
        $rand    = $_GET['nonce'];    
        $encrypt = $_GET['echostr'];    

        $this->computeSign($time, $rand, $encrypt);
        if($sign != $this->signature) die('signature error');

        $result = $this->decrypt($encrypt);
        if($result) die($result);
    }

    /**
     * Compute the signature.
     * 
     * @param  int    $time 
     * @param  string $rand 
     * @access public
     * @return void
     */
    public function computeSign($time, $rand, $encrypt)
    {
        $sign = array($this->token, $time, $rand, $encrypt);
        sort($sign, SORT_STRING);
        $this->signature = sha1(join($sign));
    }

    /**
     * Get access token.
     *
     * @access public
     * @return void
     */
    public function getAccessToken()
    {
        /* First try to use the token in session. */
        if(isset($_SESSION['qyWxToken'][$this->corpID][$this->secret]))
        {
            if(time() < $_SESSION['qyWxToken'][$this->corpID][$this->secret]->expires) return $_SESSION['qyWxToken'][$this->corpID][$this->secret]->token;
        }

        /* Set params. */
        $time = time();
        $param['corpid']     = $this->corpID;
        $param['corpsecret'] = $this->secret;

        /* Get the token. */
        $url  = 'https://qyapi.weixin.qq.com/cgi-bin/gettoken?' . http_build_query($param);
        $data = $this->get($url);
        $data = json_decode($data);
        if(!empty($data->errcode) or !$data) return false;

        /* Save it to session. */
        $token = new stdclass();
        $token->token   = $data->access_token;
        $token->expires = $time + 7000;
        $_SESSION['qyWxToken'][$this->corpID][$this->secret] = $token;

        return $token->token;
    }

    /** 
     * Get authURL.
     * 
     * @param  string  $redirectURL 
     * @access public
     * @return string
     */
    public function getAuthURL($redirectURL)
    {   
        $redirectURL = urlencode($redirectURL);
        return "https://open.weixin.qq.com/connect/oauth2/authorize?appid=$this->corpID&redirect_uri=$redirectURL&response_type=code&scope=snsapi_base&state={$this->state}#wechat_redirect";
    }   

    /**
     * Get js api ticket.
     * 
     * @access public
     * @return string
     */
    public function getJsApiTicket()
    {      
        if(isset($_SESSION['jsApi'][$this->corpID][$this->secret]))
        {        
            if(time() < $_SESSION['jsApi'][$this->corpID][$this->secret]->expires) return $_SESSION['jsApi'][$this->corpID][$this->secret]->ticket;
        }

        $accessToken = $this->getAccessToken();      
        $url = "https://qyapi.weixin.qq.com/cgi-bin/get_jsapi_ticket?access_token=$accessToken";          

        $time = time();
        $result = json_decode($this->get($url));
        if(!empty($result->errcode) or !$result) return false;

        /* Save it to session. */
        $jsApi = new stdclass();
        $jsApi->ticket  = $result->ticket;
        $jsApi->expires = $time + 7000;
        $_SESSION['jsApi'][$this->corpID][$this->secret] = $jsApi;

        return $jsApi->ticket;
    }

    /**
     * Get signature package.
     * 
     * @access public
     * @return array
     */
    public function getSignPackage()
    {
        $jsApiTicket = $this->getJsApiTicket();
        $protocol    = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $url         = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $timeStamp   = time();
        $nonceStr    = $this->getRandomStr();
        $string      = "jsapi_ticket=$jsApiTicket&noncestr=$nonceStr&timestamp=$timeStamp&url=$url";
        $signature   = sha1($string);
        return  array('appId' => $this->corpID, 'nonceStr' => $nonceStr, 'timestamp' => $timeStamp, 'url' => $url, 'signature' => $signature, 'rawString' => $string);
    }

    /**
     * Get openID.
     * 
     * @param  string    $code 
     * @access public
     * @return void
     */
    public function getOpenID($code)
    {
        $token  = $this->getAccessToken();
        $url    = "https://qyapi.weixin.qq.com/cgi-bin/user/getuserinfo?access_token=$token&code=$code";
        $result = json_decode($this->get($url));    
        if($result->errcode) return false;
        return $result->UserId;
    }

    /**
     * Get message.
     * 
     * @access public
     * @return void
     */
    public function getMessage()
    {   
        $this->rawData = ''; 
        $this->message = new stdclass();
        $post = isset($GLOBALS["HTTP_RAW_POST_DATA"]) ? $GLOBALS["HTTP_RAW_POST_DATA"] : file_get_contents('php://input');
        if($post)
        {   
            $this->rawData = str_replace('&', '&amp;', $post);
            $message = new simpleXMLElement($this->rawData);
            foreach($message as $key => $value)
            {   
                if(function_exists('lcfirst')) 
                {   
                    $key = lcfirst($key);
                }   
                else
                {   
                    $first = strtolower(substr($key, 0, 1));   
                    $key   = $first . substr($key, 1);
                }

                $value = $key == 'event' ? strtolower($value) : $value;
                $this->message->$key = (string)$value;
            }
        }

        return $this->message;
    }

    /**
     * Get user.
     * 
     * @param  string    $account 
     * @access public
     * @return object
     */
    public function getUser($account)
    {
        $token = $this->getAccessToken();
        $url   = "https://qyapi.weixin.qq.com/cgi-bin/user/get?access_token=$token&userid=$account";
        $user  = json_decode($this->get($url));        

        if($user->errcode) return false;
        return $user;
    }

    /**
     * Create user.
     * 
     * @param  object    $user 
     * @access public
     * @return void
     */
    public function createUser($user)
    {
        $token = $this->getAccessToken();
        $url   = "https://qyapi.weixin.qq.com/cgi-bin/user/create?access_token=$token";
        $result = json_decode($this->post($url, json_encode($user)));        

        if($result->errcode) return array('result' => 'fail', 'message' => $result->errcode . ':' . $result->errmsg);
        return array('result' => 'success');
    }

    /**
     * Update user.
     * 
     * @param  object    $user 
     * @access public
     * @return void
     */
    public function updateUser($user)
    {
        $token = $this->getAccessToken();
        $url   = "https://qyapi.weixin.qq.com/cgi-bin/user/create?access_token=$token";
        $result = json_decode($this->post($url, json_encode($user)));        

        if($result->errcode) return array('result' => 'fail', 'message' => $result->errcode . ':' . $result->errmsg);
        return array('result' => 'success');
    }

    /**
     * Delete user.
     * 
     * @param  string    $account 
     * @access public
     * @return bool
     */
    public function deleteUser($account)
    {
        $token  = $this->getAccessToken();
        $url    = "https://qyapi.weixin.qq.com/cgi-bin/user/delete?access_token=$token&userid=$account";
        $result = json_decode($this->get($url));        

        if($result->errcode) return array('result' => 'fail', 'message' => $result->errcode . ':' . $result->errmsg);
        return array('result' => 'success');
    }

    /**
     * Batch delete users.
     * 
     * @param  array    $userList 
     * @access public
     * @return array
     */
    public function batchDeleteUsers($userList)
    {
        $token  = $this->getAccessToken();
        $url    = "https://qyapi.weixin.qq.com/cgi-bin/user/batchdelete?access_token=$token";
        $result = json_decode($this->post($url, json_encode($userList)));        
        if($result->errcode) return array('result' => 'fail', 'message' => $result->errcode . ':' . $result->errmsg);
        return array('result' => 'success');
    }

    /**
     * Get dept simple of user list.
     * 
     * @param  int    $deptID 
     * @param  bool   $fetchChild 
     * @access public
     * @return bool|array
     */
    public function getDeptUserSimpleList($deptID, $fetchChild = true)
    {
        $token  = $this->getAccessToken();
        $url    = "https://qyapi.weixin.qq.com/cgi-bin/user/simplelist?access_token=$token&department_id=$deptID&fetch_child=$fetchChild";
        $result = json_decode($this->get($url));        
        if($result->errcode) return false;
        return $result->userlist;
    }

    /**
     * Get dept user list.
     * 
     * @access public
     * @return bool|array
     */
    public function getDeptUserList($deptID, $fetchChild = true)
    {
        $token  = $this->getAccessToken();
        $url    = "https://qyapi.weixin.qq.com/cgi-bin/user/list?access_token=$token&department_id=$deptID&fetch_child=$fetchChild";
        $result = json_decode($this->get($url));        
        if($result->errcode) return false;
        return $result->userlist;
    }

    /**
     * Create deptment.
     * 
     * @param  object    $dept 
     * @access public
     * @return array
     */
    public function createDept($dept)
    {
        $token  = $this->getAccessToken();
        $url    = "https://qyapi.weixin.qq.com/cgi-bin/department/create?access_token=$token";
        $result = json_decode($this->post($url, json_encode($dept)));
        if($result->errcode) return array('result' => 'fail', 'message' => $result->errcode . ':' . $result->errmsg);
        return array('result' => 'success');
    }

    /**
     * Update deptment.
     * 
     * @param  object    $dept 
     * @access public
     * @return void
     */
    public function updateDept($dept)
    {
        $token  = $this->getAccessToken();
        $url    = "https://qyapi.weixin.qq.com/cgi-bin/department/update?access_token=$token";
        $result = json_decode($this->post($url, json_encode($dept)));
        if($result->errcode) return array('result' => 'fail', 'message' => $result->errcode . ':' . $result->errmsg);
        return array('result' => 'success');
    }

    /**
     * Delete deptment.
     * 
     * @param  int    $deptID 
     * @access public
     * @return void
     */
    public function deleteDept($deptID)
    {
        $token  = $this->getAccessToken();
        $url    = "https://qyapi.weixin.qq.com/cgi-bin/department/delete?access_token=$token&id=$deptID";
        $result = json_decode($this->get($url));
        if($result->errcode) return array('result' => 'fail', 'message' => $result->errcode . ':' . $result->errmsg);
        return array('result' => 'success');
    }

    /**
     * Get department list.
     * 
     * @param  string  $deptID 
     * @access public
     * @return void
     */
    public function getDeptList($deptID = '')
    {
        $token  = $this->getAccessToken();
        $url    = "https://qyapi.weixin.qq.com/cgi-bin/department/list?access_token=$token&id=$deptID";
        $result = json_decode($this->get($url));
        if($result->errcode) return false;
        return $result->department;
    }

    /**
     * Upload media.
     * 
     * @param  string    $type 
     * @param  string    $file 
     * @access public
     * @return bool|int
     */
    public function uploadMedia($type, $file)
    {
        $fields['media'] = '@' . $file;
        $token = $this->getAccessToken();
        $url   = "https://qyapi.weixin.qq.com/cgi-bin/media/upload?access_token=$token&type=$type";

        $result = $this->post($url, $fields, true);
        $result = json_decode($result);

        if(isset($result->media_id)) return $result->media_id;
        return false;
    }

    /**
     * Get a media file.
     * 
     * @param  string    $id 
     * @access public
     * @return binary
     */
    public function getMedia($id)
    {
        $token  = $this->getAccessToken();
        $url    = "https://qyapi.weixin.qq.com/cgi-bin/media/get?access_token=$token&media_id=$id";
        $result = $this->get($url, $file = true);

        $error = !is_array($result) ? json_decode($result) : ''; 
        if(!empty($error->errcode)) return false;
        return $result;
    }

    /**
     * Sync user.
     * 
     * @param  object    $media 
     * @access public
     * @return void
     */
    public function syncUser($media)
    {
        $token  = $this->getAccessToken();
        $url    = "https://qyapi.weixin.qq.com/cgi-bin/batch/syncuser?access_token=$token";
        $result = json_decode($this->post($url, json_encode($media)));

        if($result->errcode) return array('result' => 'fail', 'message' => $result->errcode . ':' . $result->errmsg);
        return $result->jobid;
    }

    /**
     * Replace user.
     * 
     * @param  object    $media 
     * @access public
     * @return void
     */
    public function replaceUser($media)
    {
        $token  = $this->getAccessToken();
        $url    = "https://qyapi.weixin.qq.com/cgi-bin/batch/replaceuser?access_token=$token";
        $result = json_decode($this->post($url, json_encode($media)));

        if($result->errcode) return array('result' => 'fail', 'message' => $result->errcode . ':' . $result->errmsg);
        return $result->jobid;
    }

    /**
     * Replace department.
     * 
     * @param  object    $media 
     * @access public
     * @return void
     */
    public function replaceDepartment($media)
    {
        $token  = $this->getAccessToken();
        $url    = "https://qyapi.weixin.qq.com/cgi-bin/batch/replaceparty?access_token=$token";
        $result = json_decode($this->post($url, json_encode($media)));

        if($result->errcode) return array('result' => 'fail', 'message' => $result->errcode . ':' . $result->errmsg);
        return $result->jobid;
    }

    /**
     * Get result.
     * 
     * @param  int    $jobID 
     * @access public
     * @return void
     */
    public function getResult($jobID)
    {
        $token  = $this->getAccessToken();
        $url    = "https://qyapi.weixin.qq.com/cgi-bin/batch/getresult?access_token=$token&jobid=$jobID";
        $result = json_decode($this->get($url));

        if($result->errcode) return array('result' => 'fail', 'message' => $result->errcode . ':' . $result->errmsg);
        return $result;
    }

    /**
     * Get agent.
     * 
     * @param  int    $agentID 
     * @access public
     * @return void
     */
    public function getAgent($agentID)
    {
        $token  = $this->getAccessToken();
        $url    = "https://qyapi.weixin.qq.com/cgi-bin/agent/get?access_token=$token&agentid=$agentID";
        $result = json_decode($this->get($url));

        if($result->errcode) return array('result' => 'fail', 'message' => $result->errcode . ':' . $result->errmsg);
        return $result;
    }

    /**
     * Set agent.
     * 
     * @param  int    $agent 
     * @access public
     * @return void
     */
    public function setAgent($agent)
    {
        $token  = $this->getAccessToken();
        $url    = "https://qyapi.weixin.qq.com/cgi-bin/agent/set?access_token=$token";
        $result = json_decode($this->post($url, $agent));

        if($result->errcode) return array('result' => 'fail', 'message' => $result->errcode . ':' . $result->errmsg);
        return array('result' => 'success');
    }

    /**
     * Commit menu to wechat agent.
     * 
     * @param  array    $menu 
     * @access public
     * @return bool
     */
    public function commitMenu($agentID, $menu)
    {
        $token  = $this->getAccessToken();
        $url    = "https://qyapi.weixin.qq.com/cgi-bin/menu/create?access_token=$token&agentid=$agentID";
        $menu   = $this->convertMenu2JSON($menu);
        $result = $this->post($url, $menu);
        $result = json_decode($result);

        if(isset($result->errcode) and $result->errcode == 0) return array('result' => 'success');
        return array('result' => 'fail' , 'message' => $result->errcode . ':' . $result->errmsg);
    }

    /**
     * Get menu.
     * 
     * @param  int    $agentID 
     * @access public
     * @return bool|array
     */
    public function getMenu($agentID)
    {
        $token  = $this->getAccessToken();
        $url    = "https://qyapi.weixin.qq.com/cgi-bin/menu/get?access_token=$token&agentid=$agentID";
        $result = $this->get($url);
        $result = json_decode($result);

        if(isset($result->errcode) and $result->errcode != 0) return false;
        return $result;
    }

    /**
     * Delete menu.
     * 
     * @param  int    $agentID 
     * @access public
     * @return array
     */
    public function deleteMenu($agentID)
    {
        $token  = $this->getAccessToken();
        $url    = "https://qyapi.weixin.qq.com/cgi-bin/menu/delete?access_token=$token&agentid=$agentID";
        $result = $this->get($url);
        $result = json_decode($result);

        if(isset($result->errcode) and $result->errcode == 0) return array('result' => 'success');
        return array('result' => 'fail' , 'message' => $result->errcode . ':' . $result->errmsg);
    }

    /**
     * Send a message.
     * 
     * @param  string    $to 
     * @param  string    $type 
     * @param  object    $content 
     * @access public
     * @return void
     */
    public function send($agentID, $toUser, $toParty, $type, $content)
    {
        $message = new stdclass();
        $message->touser  = $toUser;
        $message->toparty = $toParty;
        $message->msgtype = $type;
        $message->agentid = (int)$agentID;
        $message->$type   = $content;
        
        $token = $this->getAccessToken();
        $url   = "https://qyapi.weixin.qq.com/cgi-bin/message/send?access_token=$token";

        $result = $this->post($url, $this->convertMessage2JSON($message));
        $result = json_decode($result);

        if(isset($result->errcode) and $result->errcode == 0) return array('result' => 'success');
        return array('result' => 'fail' , 'message' => $result->errcode . ':' . $result->errmsg);
    }

    /**
     * Response a message.
     * 
     * @param  object    $response 
     * @access public
     * @return void
     */
    public function response($response)
    {
        $response->toUserName = $this->corpID;
        $response->createTime = time();
        $this->response = $this->convertResponse2XML($response);
        echo $this->response;
    }

    /**
     * Convert a response object to a xml message.
     * 
     * @param  object    $response 
     * @access public
     * @return string
     */
    public function convertResponse2XML($response)
    {
        /* Split the articles if the message is news. */
        $msgType = ucfirst($response->msgType);
        if($msgType == 'News') 
        {
            $articles = $response->articles;
            unset($response->articles);
        }

        /* Join other fields. */
        $xml = "<xml>\n";
        foreach($response as $key => $value)
        {
            $key = ucfirst($key);
            if($key == 'MediaId') $xml .= "<$msgType><$key><![CDATA[$value]]></$key></$msgType>";
            if($key != 'MediaId') $xml .= "<$key><![CDATA[$value]]></$key>\n";
        }
        if(!isset($articles)) return $xml . '</xml>';

        /* Join articles. */
        $xml .= '<ArticleCount>' . count($articles) . "</ArticleCount>\n<Articles>\n";
        foreach($articles as $article)
        {
            $xml .= "<item>\n";
            foreach($article as $key => $value)
            {
                $key = ucfirst($key);
                $xml .= "<$key><![CDATA[$value]]></$key>\n";
            }
            $xml .= "</item>\n";
        }
        $xml .= "</Articles>\n</xml>";
        return $xml;
    }

    /**
     * Convert menu array into json format.
     * 
     * @param  array    $menu 
     * @access public
     * @return void
     */
    public function convertMenu2JSON($menu)
    {
        foreach($menu['button'] as $button)
        {
            if(isset($button->name)) $button->name = urlencode($button->name);
            if(isset($button->url))  $button->url  = urlencode($button->url);
            if(isset($button->sub_button)) 
            {
                foreach($button->sub_button as $subButton)
                {
                    if(isset($subButton->name)) $subButton->name = urlencode($subButton->name);
                    if(isset($subButton->url))  $subButton->url  = urlencode($subButton->url);
                }
            }
        }

        return urldecode(json_encode($menu));
    }

    /**
     * Convert a message object to json.
     * 
     * @param   object    $message 
     * @access public
     * @return json
     */
    public function convertMessage2JSON($message)
    {
        if(isset($message->text->content)) $message->text->content = urlencode($message->text->content);
        return urldecode(json_encode($message));
    }

    /** 
     * Make a http get request and fetch the contents.
     * 
     * @param  string    $url 
     * @access public
     * @return string
     */
    public function get($url, $file = false)
    {   
        if(!function_exists('curl_init')) die('I can\'t fetch anything, please set allow_url_fopen to ture or install curl extension');

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1);

        if($file)
        {
            curl_setopt($curl, CURLOPT_HEADER, 0); 
            curl_setopt($curl, CURLOPT_NOBODY, 0); 

            $result = array();
            $result['header']  = curl_getinfo($curl);
            $result['content'] = curl_exec($curl);
            $errors = curl_error($curl);
            curl_close($curl);

            commonModel::log($url, $data = '', $response, $errors, 'wechat');
            return $result;
        }
        else
        {
            $response = curl_exec($curl);
            $errors   = curl_error($curl);
            curl_close($curl);

            commonModel::log($url, $data = '', $response, $errors, 'wechat');
            return $response;
        }
    }   

    /**
     * Make a http post request.
     * 
     * @param  string    $url 
     * @param  string    $data 
     * @access public
     * @return void
     */
    public function post($url, $data, $file = false)
    {   
        if(!function_exists('curl_init')) die('I can\'t do post action without curl extension.');

        $curl = curl_init();

        if(PHP_VERSION_ID >= 50500 && class_exists('CURLFile'))
        {
            $curlFile = true;
        }
        else
        {
            $curlFile = false;
            if(defined('CURLOPT_SAFE_UPLOAD')) curl_setopt($curl, CURLOPT_SAFE_UPLOAD, false);
        }
    
        if($file)
        {
            if($curlFile)
            {
                foreach($data as $key => $value)
                {                     
                    if(isset($val['tmp_name']))
                    {
                        $data[$key] = new CURLFile(realpath($val['tmp_name']), $val['type'], $val['name']);
                    }
                    elseif(substr($value, 0, 1) == '@')
                    {
                        $data[$key] = new CURLFile(substr($value, 1));                
                    }                           
                }
            }                
        }

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

        $response = curl_exec($curl);
        $errors   = curl_error($curl);
        curl_close($curl);

        commonModel::log($url, $data, $response, $errors, 'wechat');
        return $response;
    }   

    /**
     * Encrypt the text.
     * 
     * @param  string    $text 
     * @access public
     * @return void
     */
	public function encrypt($text)
	{
        //Get 16-bytes random string to pad before the text.
		$random = $this->getRandomStr();
		$text   = $random . pack('N', strlen($text)) . $text . $this->corpID;
		$key    = base64_decode($this->encodingAESKey . "=");

		// 网络字节序
		$size   = mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
		$module = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_CBC, '');
		$iv     = substr($key, 0, 16);

	    //Add character for pading text. 
		$text = $this->encode($text);

        //Encrypt.
		if(mcrypt_generic_init($module, $key, $iv) != -1)
        {
            $encrypted = mcrypt_generic($module, $text);
            mcrypt_generic_deinit($module);
            mcrypt_module_close($module);

            //base64_encode;
            $encrypted = base64_encode($encrypted);
            return $encrypted;
        }
        return false;
	}

    /**
     * Decrypt the message.
     * 
     * @param  string    $encrypt 
     * @param  string    $corpID 
     * @access public
     * @return string
     */
	public function decrypt($encrypt)
	{
        //base64_decode it.
        $encrypt = base64_decode($encrypt);

        $module = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '', MCRYPT_MODE_CBC, '');
		$key    = base64_decode($this->encodingAESKey . "=");
        $iv     = substr($this->encodingAESKey, 0, 16);

        //Decrypt it.
        if(mcrypt_generic_init($module, $key, $iv) != -1)
        {
            $decrypt = mdecrypt_generic($module, $encrypt);
            mcrypt_generic_deinit($module);
            mcrypt_module_close($module);
        }
        else
        {
            return false;
        }

        //Delete the padding character.
		$result = $this->decode($decrypt);
		if (strlen($result) < 16) return false;

        //Remove the 16-bytes random, 4-bytes length of text, corpID.
		$content    = substr($result, 16, strlen($result));
		$lenList    = unpack('N', substr($content, 0, 4));
		$xmlLen     = $lenList[1];
		$xmlContent = substr($content, 4, $xmlLen);
		$fromCorpID = substr($content, $xmlLen + 4);

		if ($fromCorpID != $this->corpID) return false;
		return $xmlContent;
	}

    /**
	 * Add character for length. 
     * 
     * @param  string $text 
     * @access public
     * @return string
     */
	public function encode($text)
	{
        //Compute length to add.
		$pad = 32 - (strlen($text) % 32);
		$pad = $pad ? $pad : 32;

        //Get character to add.
        $padChr = chr($pad);
        for($i = 0; $i < $pad; $i++) $text .= $padChr;
		return $text;
	}

    /**
     * Delete the extra. 
     * 
     * @param  string  $text 
     * @access public
     * @return string
     */
	public function decode($text)
	{
		$pad = ord(substr($text, -1));
        if($pad < 1 || $pad > 32) $pad = 0;
		return substr($text, 0, (strlen($text) - $pad));
	}

    /**
     * Get random string.
     * 
     * @access public
     * @return string
     */
	public function getRandomStr()
	{
		$strPol = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
		$random = '';
        for($i = 0; $i < 16; $i++)
        {
			$random .= $strPol[mt_rand(0, (strlen($strPol) - 1))];
		}
		return $random;
	}
}
