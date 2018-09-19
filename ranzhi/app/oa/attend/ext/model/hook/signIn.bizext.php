<?php
if($this->config->attend->signInClient == 'mobile' && $this->app->getViewType() != 'mhtml') 
{
    return array('result' => 'fail', 'message' => sprintf($this->lang->attend->signInClientError, $this->lang->attend->clientList[$this->config->attend->signInClient]));
}
