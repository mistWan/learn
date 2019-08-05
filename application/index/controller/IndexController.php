<?php
/**
 * Created by PhpStorm.
 * User: twos
 * Date: 2019/7/19
 * Time: 12:31
 */

namespace app\index\controller;


use think\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return \think\facade\Request::url();
    }

    public function hello()
    {
        return 'hello';
    }

    public function edit($name)
    {
        return json(['name' => $name]);
    }
}