<?php
namespace Dashboard\Controller;

use Think\Controller;

class GoController extends CommonController
{

    public function index()
    {
        redirect(U('Database/Index'));
    }
}