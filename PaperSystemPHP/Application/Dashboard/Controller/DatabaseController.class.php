<?php
namespace Dashboard\Controller;

use Think\Controller;

class DatabaseController extends CommonController
{

    public function index()
    {
        $obj = M('Database');
        $this->list = $obj->where(array('status'=>1))->select();
        $this->display();
    }


    public function Recovery()
    {

        $dm=M('Database');
        $db = $dm->where(array('id'=>I('get.id')))->select()[0];
        $file_name = '.'.$db['path'];
        $fp = @fopen($file_name, "r") or die("不能打开SQL文件 $file_name");//打开文件


        $result = mysql_query("SHOW tables");
        while ($currow=mysql_fetch_array($result))
        {
            mysql_query("drop TABLE IF EXISTS $currow[0]");
        }


        while($SQL=$this->GetNextSQL()){
            if (!mysql_query($SQL)){
                echo 'ERR.105826';
            }
        }
    }
private function GetNextSQL() {
global $fp;
$sql="";
while ($line = @fgets($fp, 40960)) {
$line = trim($line);
    //以下三句在高版本php中不需要，在部分低版本中也许需要修改
$line = str_replace("////","//",$line);
$line = str_replace("/’","’",$line);
$line = str_replace("//r//n",chr(13).chr(10),$line);
//                        $line = stripcslashes($line);
if (strlen($line)>1) {
if ($line[0]=="-" && $line[1]=="-") {
continue;
}
}
$sql.=$line.chr(13).chr(10);
if (strlen($line)>0){
    if ($line[strlen($line)-1]==";"){
        break;
    }
}
}
return $sql;
}
    public function bak()
    {
        $savePath = '/database/';
        $fielName = date('Y_m_dHis').'.sql';
        $tmpFile = '.'.$savePath.$fielName;
        $this->db_dump($tmpFile,C('DB_HOST'),C('DB_USER'),C('DB_PWD'),C('DB_NAME'));
        $db_path = $savePath.$fielName;

        $dm = M('Database');
        $dm->create();
        $dm->created = time();
        $dm->path = $db_path;
        $dm->add();
        redirect(U('Database/Index'));
    }

    private function db_dump($path,$host,$user,$pwd,$db)
    {
        $mysqlconlink = mysql_connect($host,$user,$pwd , true);
        if (!$mysqlconlink)
            echo sprintf('No MySQL connection: %s',mysql_error())."<br/>";
        mysql_set_charset( 'utf8', $mysqlconlink );
        $mysqldblink = mysql_select_db($db,$mysqlconlink);
        if (!$mysqldblink)
            echo sprintf('No MySQL connection to database: %s',mysql_error())."<br/>";
        $tabelstobackup=array();
        $result=mysql_query("SHOW TABLES FROM `$db`");
        if (!$result)
            echo sprintf('Database error %1$s for query %2$s', mysql_error(), "SHOW TABLE STATUS FROM `$db`;")."<br/>";
        while ($data = mysql_fetch_row($result)) {
            $tabelstobackup[]=$data[0];
        }
        if (count($tabelstobackup)>0) {
            $result=mysql_query("SHOW TABLE STATUS FROM `$db`");
            if (!$result)
                echo sprintf('Database error %1$s for query %2$s', mysql_error(), "SHOW TABLE STATUS FROM `$db`;")."<br/>";
            while ($data = mysql_fetch_assoc($result)) {
                $status[$data['Name']]=$data;
            }
            if ($file = fopen($path, 'wb')) {
                fwrite($file, "-- ---------------------------------------------------------\n");
                fwrite($file, "-- Database Name: $db\n");
                fwrite($file, "-- ---------------------------------------------------------\n\n");
                fwrite($file, "/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;\n");
                fwrite($file, "/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;\n");
                fwrite($file, "/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;\n");
                fwrite($file, "/*!40101 SET NAMES '".mysql_client_encoding()."' */;\n");
                fwrite($file, "/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;\n");
                fwrite($file, "/*!40103 SET TIME_ZONE='".mysql_result(mysql_query("SELECT @@time_zone"),0)."' */;\n");
                fwrite($file, "/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;\n");
                fwrite($file, "/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;\n");
                fwrite($file, "/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;\n");
                fwrite($file, "/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;\n\n");
                foreach($tabelstobackup as $table) {
                    // echo sprintf('Dump database table "%s"',$table)."<br/>";
                    $this->need_free_memory(($status[$table]['Data_length']+$status[$table]['Index_length'])*3);
                    $this->_db_dump_table($table,$status[$table],$file);
                }
                fwrite($file, "\n");
                fwrite($file, "/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;\n");
                fwrite($file, "/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;\n");
                fwrite($file, "/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;\n");
                fwrite($file, "/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;\n");
                fwrite($file, "/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;\n");
                fwrite($file, "/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;\n");
                fwrite($file, "/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;\n");
                fwrite($file, "/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;\n");
                fclose($file);
                // echo 'Database dump done!'."<br/>";
            } else {
                echo 'Can not create database dump!'."<br/>";
            }
        } else {
            echo 'No tables to dump'."<br/>";
        }
    }


private function _db_dump_table($table,$status,$file) {
        fwrite($file, "\n");
        fwrite($file, "--\n");
        fwrite($file, "-- Table structure for table $table\n");
        fwrite($file, "--\n\n");
        fwrite($file, "DROP TABLE IF EXISTS `" . $table .  "`;\n");
        fwrite($file, "/*!40101 SET @saved_cs_client     = @@character_set_client */;\n");
        fwrite($file, "/*!40101 SET character_set_client = '".mysql_client_encoding()."' */;\n");
        $result=mysql_query("SHOW CREATE TABLE `".$table."`");
        if (!$result) {
            echo sprintf('Database error %1$s for query %2$s', mysql_error(), "SHOW CREATE TABLE `".$table."`")."<br/>";
            return false;
        }
        $tablestruc=mysql_fetch_assoc($result);
        fwrite($file, $tablestruc['Create Table'].";\n");
        fwrite($file, "/*!40101 SET character_set_client = @saved_cs_client */;\n");
        $result=mysql_query("SELECT * FROM `".$table."`");
        if (!$result) {
            echo sprintf('Database error %1$s for query %2$s', mysql_error(), "SELECT * FROM `".$table."`")."<br/>";
            return false;
        }
        fwrite($file, "--\n");
        fwrite($file, "-- Dumping data for table $table\n");
        fwrite($file, "--\n\n");
        if ($status['Engine']=='MyISAM')
            fwrite($file, "/*!40000 ALTER TABLE `".$table."` DISABLE KEYS */;\n");
        while ($data = mysql_fetch_assoc($result)) {
            $keys = array();
            $values = array();
            foreach($data as $key => $value) {
                if($value === NULL)
                    $value = "NULL";
                elseif($value === "" or $value === false)
                    $value = "''";
                elseif(!is_numeric($value))
                    $value = "'".mysql_real_escape_string($value)."'";
                $values[] = $value;
            }
            fwrite($file, "INSERT INTO `".$table."` VALUES ( ".implode(", ",$values)." );\n");
        }
        if ($status['Engine']=='MyISAM')
            fwrite($file, "/*!40000 ALTER TABLE ".$table." ENABLE KEYS */;\n");
    }
private function need_free_memory($memneed) {
        if (!function_exists('memory_get_usage'))
            return;
        $needmemory=@memory_get_usage(true)+$this->inbytes($memneed);
        if ($needmemory>$this->inbytes(ini_get('memory_limit'))) {
            $newmemory=round($needmemory/1024/1024)+1 .'M';
            if ($needmemory>=1073741824)
                $newmemory=round($needmemory/1024/1024/1024) .'G';
            if ($oldmem=@ini_set('memory_limit', $newmemory))
                echo sprintf(__('Memory increased from %1$s to %2$s','backwpup'),$oldmem,@ini_get('memory_limit'))."<br/>";
            else
                echo sprintf(__('Can not increase memory limit is %1$s','backwpup'),@ini_get('memory_limit'))."<br/>";
        }
    }
    private function inbytes($value) {
        $multi=strtoupper(substr(trim($value),-1));
        $bytes=abs(intval(trim($value)));
        if ($multi=='G')
            $bytes=$bytes*1024*1024*1024;
        if ($multi=='M')
            $bytes=$bytes*1024*1024;
        if ($multi=='K')
            $bytes=$bytes*1024;
        return $bytes;
    }

    public function delete()
    {
        $obj = M('Database');
        $obj->where('id=' . I('get.id'))->save(array('status' => 0));
        redirect(U('Go/Index'),1,'Delete OK.');
    }


}