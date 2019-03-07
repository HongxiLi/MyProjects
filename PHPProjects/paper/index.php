<?php
error_reporting(0);
header('location:admin.php');exit();
header('content-type:text/html;charset=utf8');
//include('dashboard/include/config.inc.php');
define('DB_NAME','stscore');
mysql_connect('localhost','root','');
mysql_select_db(DB_NAME);
$sql = 'SHOW TABLES FROM '.DB_NAME;
$res = mysql_query($sql);
//$res = mysql_fetch_assoc($res);

while($table = mysql_fetch_assoc($res))
{
   // var_dump($table);
    $tname = $table['Tables_in_stscore'];
	mysql_query('UPDATE '.$tname.' SET created='.time());
}