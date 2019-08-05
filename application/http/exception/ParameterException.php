<?php
/**
 * Created by PhpStorm.
 * User: twos
 * Date: 2019/7/19
 * Time: 14:57
 */

namespace app\http\exception;


class ParameterException extends BaseException
{
//    public $code = 401;
    public $msg = 'Parameter Error';
    public $errorCode = '1000';
}