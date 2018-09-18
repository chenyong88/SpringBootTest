<?php
/**
 * The export2csv view file of file module of RanZhi.
 *
 * @copyright   Copyright 2009-2018 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     file 
 * @version     $Id$
 * @link        http://www.ranzhi.org
 */
?>
<?php
$count = count($fields);
echo '"'. implode('","', $fields) . '"' . "\n";
foreach($rows as $row)
{
    echo '"';
    $i = 0;
    foreach($fields as $fieldName => $fieldLabel)
    {
        isset($row->$fieldName) ? print(str_replace('",', '"，', strip_tags($row->$fieldName))) : print('');
        if(++$i < $count) echo '","';
    }
    echo '"' . "\n";
}
