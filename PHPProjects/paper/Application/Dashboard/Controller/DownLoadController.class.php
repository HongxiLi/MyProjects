<?php
namespace Dashboard\Controller;

use Think\Controller;

class DownLoadController extends CommonController
{

    public function StImportTpl()
    {
        $f = 'Public/StImpTpl.xlsx';
       // echo $f;
        $this->download_file($f);
        die();
    }

    function download_file($file){
        if(is_file($file)){
            $length = filesize($file);
            $type = mime_content_type($file);
            $showname =  ltrim(strrchr($file,'/'),'/');
            header("Content-Description: File Transfer");
            header('Content-type: ' . $type);
            header('Content-Length:' . $length);
            if (preg_match('/MSIE/', $_SERVER['HTTP_USER_AGENT'])) { //for IE
                header('Content-Disposition: attachment; filename="' . rawurlencode($showname) . '"');
            } else {
                header('Content-Disposition: attachment; filename="' . $showname . '"');
            }
            readfile($file);
            exit;
        } else {
            exit('文件已被删除！');
        }
    }


}