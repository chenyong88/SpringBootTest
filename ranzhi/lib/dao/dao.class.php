<?php
/**
 * ZenTaoPHP的dao和sql类。
 * The dao and sql class file of ZenTaoPHP framework.
 *
 * The author disclaims copyright to this source code.  In place of
 * a legal notice, here is a blessing:
 * 
 *  May you do good and not evil.
 *  May you find forgiveness for yourself and forgive others.
 *  May you share freely, never taking more than you give.
 */

helper::import(dirname(dirname(__FILE__)) . '/base/dao/dao.class.php');
/**
 * DAO类。
 * DAO, data access object.
 * 
 * @package framework
 */
class dao extends baseDAO
{
    /**
     * 检查字段是否满足条件。
     * Check a filed is satisfied with the check rule.
     * 
     * @param  string $fieldName    the field to check
     * @param  string $funcName     the check rule
     * @param  string $condition     the condition
     * @access public
     * @return object the dao object self.
     */
    public function check($fieldName, $funcName, $condition = '')
    {
        /* 
         * 如果没数据中没有该字段，直接返回。
         * If no this field in the data, return.
         **/
        if(!isset($this->sqlobj->data->$fieldName)) return $this;

        /* 设置字段值。 */
        /* Set the field label and value. */
        global $lang, $config, $app;
        $table = strtolower(substr($this->table, strrpos($this->table, '_') + 1));
        $table = str_replace('`', '', $table);

        $fieldLabel = isset($lang->$table->$fieldName) ? $lang->$table->$fieldName : $fieldName;
        $value = isset($this->sqlobj->data->$fieldName) ? $this->sqlobj->data->$fieldName : null;

        /* 
         * 检查唯一性。
         * Check unique.
         **/
        if($funcName == 'unique')
        {
            $args = func_get_args();
            $sql  = "SELECT COUNT(*) AS count FROM $this->table WHERE `$fieldName` = " . $this->sqlobj->quote($value); 
            if($condition) $sql .= ' AND ' . $condition;
            try
            {
                $row = $this->dbh->query($sql)->fetch();
                if($row->count != 0) $this->logError($funcName, $fieldName, $fieldLabel, array($value));
            }
            catch (PDOException $e) 
            {
                $this->sqlError($e);
            }
        }
        else
        {
            /* 
             * 创建参数。
             * Create the params.
             **/
            $funcArgs = func_get_args();
            unset($funcArgs[0]);
            unset($funcArgs[1]);

            for($i = 0; $i < VALIDATER::MAX_ARGS; $i ++)
            {
                ${"arg$i"} = isset($funcArgs[$i + 2]) ? $funcArgs[$i + 2] : null;
            }
            $checkFunc = 'check' . $funcName;
            if(validater::$checkFunc($value, $arg0, $arg1, $arg2) === false)
            {
                $this->logError($funcName, $fieldName, $fieldLabel, $funcArgs);
            }
        }

        return $this;
    }

    /**
     * 获取查询记录条数。
     * The count method, call sql::select() and from().
     * use as $this->dao->select()->from(TABLE_BUG)->where()->count();
     *
     * @param  string $distinctField
     * @access public
     * @return void
     */
    public function count($distinctField = '')
    {
        /* 获得SELECT，FROM的位置，使用count(*)替换其字段。 */
        /* Get the SELECT, FROM position, thus get the fields, replace it by count(*). */
        $sql        = $this->get();
        $selectPOS  = strpos($sql, 'SELECT') + strlen('SELECT');
        $fromPOS    = strpos($sql, 'FROM');
        $fields     = substr($sql, $selectPOS, $fromPOS - $selectPOS);
        $countField = $distinctField ? 'distinct ' . $distinctField : '*';
        $sql        = str_replace($fields, " COUNT($countField) AS recTotal ", substr($sql, 0, $fromPOS)) . substr($sql, $fromPOS);

        /*
         * 去掉SQL语句中group, order和limit之后的部分。
         * Remove the part after group, order and limit.
         **/
        $subLength = strlen($sql);
        $groupPOS  = strripos($sql, 'group by');
        $orderPOS  = strripos($sql, 'order by');
        $limitPOS  = strripos($sql, 'limit');
        if($limitPOS) $subLength = $limitPOS;
        if($orderPOS) $subLength = $orderPOS;
        if($groupPOS) $subLength = $groupPOS;
        $sql = substr($sql, 0, $subLength);
        self::$querys[] = $sql;

        /*
         * 获取记录数。
         * Get the records count.
         **/
        try
        {
            $row = $this->dbh->query($sql)->fetch(PDO::FETCH_OBJ);
        }
        catch (PDOException $e)
        {
            $this->sqlError($e);
        }

        return is_object($row) ? $row->recTotal : 0;
    }
}

/**
 * SQL类。
 * The SQL class.
 * 
 * @package framework
 */
class sql extends baseSQL
{
    /**
     * 创建ORDER BY部分。
     * Create the order by part.
     * 
     * @param  string $order 
     * @access public
     * @return object the sql object.
     */
    public function orderBy($order)
    {
        if(strpos($order, 'convert(') !== false)
        {
            if($this->inCondition and !$this->conditionIsTrue) return $this;

            $order = str_replace(array('|', '', '_'), ' ', $order);
            $this->sql .= ' ' . DAO::ORDERBY . " $order";
            return $this;
        }
        else
        {
            return parent::orderBy($order);
        }
    }

    /**
     * 创建GROUP BY部分。
     * Create the groupby part.
     *
     * @param  string $groupBy
     * @access public
     * @return object the sql object.
     */
    public function groupBy($groupBy)
    {
        if($this->inCondition and !$this->conditionIsTrue) return $this;
        if(!preg_match('/^\w+[a-zA-Z0-9_`.,\s]+$/', $groupBy))
        {
            $groupBy = htmlspecialchars($groupBy);
            die("Group is bad query, The group is $groupBy");
        }
        $this->sql .= ' ' . DAO::GROUPBY . " $groupBy";
        return $this;
    }
}
