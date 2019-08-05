<?php
/**
 * Created by PhpStorm.
 * User: twos
 * Date: 2019/7/19
 * Time: 13:39
 */

namespace app\http\exception;


use think\Exception;


class BaseException extends Exception
{
    public $code = 400;
    public $msg = 'Bad Request';
    public $errorCode = '999';

    public function __construct($params = [])
    {
        if (!is_array($params)) {
            return;
        }

        if (array_key_exists('code', $params)) {
            $this->code = $params['code'];
        }

        if (array_key_exists('msg', $params)) {
            $this->msg = $params['msg'];
        }

        if (array_key_exists('errorCode', $params)) {
            $this->errorCode = $params['errorCode'];
        }
    }
}


