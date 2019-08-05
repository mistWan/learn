<?php

namespace app\index\controller;


use think\Controller;
use think\Request;

class Work extends Controller
{
    public function data()
    {
        $batch = [];
        for ($i = 0; $i < 500; $i++) {
            $hours = -500 * 24 + 24 * $i;
            $data = [
                'member' => $i*10 + rand(0, 1000),
                'increment' => $i*2 + rand(0, 100),
                'balance' => $i*100 + rand(0, 5000),
                'transaction' => $i*10 + rand(0, 5000),
                'order' => $i + rand(0, 100),
                'created_at' => date("Y-m-d", strtotime("{$hours} hours"))
            ];
            $batch[] = $data;
        }
        db('work')->insertAll($batch);
    }

    public function today()
    {
        $data = db('work')->field('member,increment,balance,transaction,order')->order('id desc')->limit(1)->find();
        return json($data);
    }

    public function limit(Request $request)
    {
        $day = $request->day +1;
        $data = db('work')->field('transaction,order,created_at')->order('created_at desc')->limit($day)->select();
        $data = rotate(reverse(value($data)));
        return json($data);
    }
}