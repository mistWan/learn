<?php
/**
 * Created by PhpStorm.
 * User: twos
 * Date: 2019/7/19
 * Time: 13:15
 */

namespace app\http\validate;


use think\Validate;

class PostValidate extends Validate
{
    protected $rule = [
        'title'  =>  'require|max:25',
        'content' =>  'require|chsAlphaNum|min:10',
        'category' => 'require'
    ];
    protected $message  =   [
        'title.require' => '名称必须',
        'title.max'     => '名称最多不能超过25个字符',
        'content.number'   => '内容必须',
        'content.chsAlphaNum'  => '内容只能是汉字、字母和数字',
        'content.min'        => '内容最少10个字符',
    ];

    protected $scene = [
        'edit'  =>  ['title','content'],
    ];

}