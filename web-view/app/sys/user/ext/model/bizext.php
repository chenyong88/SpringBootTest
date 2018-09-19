<?php
public function getList($dept = 0, $mode = 'normal', $accountList = '', $search = '', $orderBy = 'id', $pager = null)
{
    return $this->loadExtension('bizext')->getList($dept, $mode, $accountList, $search, $orderBy, $pager);
}

public function getPairs($params = '', $dept = 0)
{
    return $this->loadExtension('bizext')->getPairs($params, $dept);
}

public function checkUserLimit($properties)
{
    return $this->loadExtension('bizext')->checkUserLimit($properties);
}

public function authorize($user)
{
    return $this->loadExtension('bizext')->authorize($user);
}

public function identify($account, $password)
{
    /* If ionCube is not loaded, jump to loader-wizard.php. */
    $user = parent::identify($account, $password);
    if($user and !extension_loaded('ionCube Loader'))
    {
        $user->rights = $this->authorize($user);
        $this->session->set('user', $user);
        $this->app->user = $this->session->user;

        $documentRoot = isset($_SERVER['SCRIPT_FILENAME']) ? dirname($_SERVER['SCRIPT_FILENAME']) : $_SERVER['DOCUMENT_ROOT'];
        $link         = is_file($documentRoot . '/loader-wizard.php') ? 'loader-wizard.php' : 'http://www.ioncube.com/lw/';
        die(js::locate($link, 'parent'));
    }

    return $this->loadExtension('bizext')->identify($account, $password, $user);
}

public function getLDAPUser()
{
    return $this->loadExtension('bizext')->getLDAPUser();
}

public function importLDAP()
{
    return $this->loadExtension('bizext')->importLDAP();
}
public function getByAccount($account)
{
    return $this->loadExtension('bizext')->getByAccount($account);
}

public function getByOpenID($openID, $provider)
{
    return $this->loadExtension('bizext')->getByOpenID($openID, $provider);
}

public function getOpenIDPairs($provider, $account = '')
{
    return $this->loadExtension('bizext')->getOpenIDPairs($provider, $account);
}

public function checkReviewers($account = '')
{
    return $this->loadExtension('bizext')->checkReviewers($account);
}

public function update($account, $from)
{
    return $this->loadExtension('bizext')->update($account, $from);
}
