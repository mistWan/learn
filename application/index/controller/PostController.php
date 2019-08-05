<?php

namespace app\index\controller;

use app\http\exception\ParameterException;
use app\http\validate\PostValidate;
use think\Controller;
use think\Request;

class PostController extends Controller
{
    public function add(Request $request, PostValidate $postValidate)
    {
        $request = $request->only(['title', 'content']);
        $validate = $postValidate->scene('edit')->batch()->check($request);
        if(!$validate) {
//            return json($postValidate->getError());
            throw new ParameterException([
                'msg' => $postValidate->getError(),
                'errorCode' => 10010
            ]);
        }
    }
}

