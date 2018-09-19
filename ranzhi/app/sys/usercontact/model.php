<?php
/**
 * The model file of usercontact module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Gang Liu <liugang@cnezsoft.com>
 * @package     usercontact
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
class usercontactModel extends model
{
    /**
     * Get a contact group by id.
     *
     * @param  int    $id
     * @access public
     * @return object
     */
    public function getById($id)
    {
        return $this->dao->select('*')->from(TABLE_USERCONTACT)->where('account')->eq($this->app->user->account)->andWhere('id')->eq($id)->fetch();
    }

    /**
     * Get contact group list.
     *
     * @access public
     * @return array
     */
    public function getList()
    {
        $contacts = $this->dao->select('*')->from(TABLE_USERCONTACT)->where('account')->eq($this->app->user->account)->orWhere('public')->eq('1')->fetchAll('id');
        foreach($contacts as $contact)
        {
            $contact->member = explode(',', trim($contact->member, ','));
        }

        return $contacts;
    }

    /**
     * Get contact pairs.
     *
     * @access public
     * @return array
     */
    public function getPairs()
    {
        return $this->dao->select('id, name')->from(TABLE_USERCONTACT)->where('account')->eq($this->app->user->account)->orWhere('public')->eq('1')->fetchPairs();
    }

    /**
     * Create a contact group.
     *
     * @access public
     * @return int
     */
    public function create()
    {
        $contact = fixer::input('post')->join('member', ',')->add('account', $this->app->user->account)->get();

        $this->dao->insert(TABLE_USERCONTACT)->data($contact)->batchCheck($this->config->usercontact->require->create, 'notempty')->exec();

        return $this->dao->lastInsertId();
    }

    /**
     * Update a contact group.
     *
     * @param  int    $id
     * @access public
     * @return bool | array
     */
    public function update($id)
    {
        $oldContact = $this->getById($id);

        $contact = fixer::input('post')->join('member', ',')->setDefault('public', '0')->get();

        $this->dao->update(TABLE_USERCONTACT)->data($contact)
            ->batchCheck($this->config->usercontact->require->edit, 'notempty')
            ->where('account')->eq($this->app->user->account)
            ->andWhere('id')->eq($id)
            ->exec();

        if(dao::isError()) return false;

        return commonModel::createChanges($contact, $oldContact);
    }

    /**
     * Delete a contact group.
     *
     * @param  int    $id
     * @param  int    $null
     * @access public
     * @return bool
     */
    public function delete($id, $null = null)
    {
        $this->dao->delete()->from(TABLE_USERCONTACT)->where('account')->eq($this->app->user->account)->andWhere('id')->eq($id)->exec();

        return dao::isError();
    }
}
