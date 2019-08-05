<?php
/**
 * Created by PhpStorm.
 * User: twos
 * Date: 2019/7/19
 * Time: 13:38
 */

namespace app\http\exception;

use Exception;
use think\exception\Handle;
use think\facade\Log;
use think\facade\Request;

class ExceptionHandle extends Handle
{
    private $code;
    private $msg;
    private $errorCode;

    public function render(Exception $e)
    {
        if ($e instanceof BaseException) {
            $this->code = $e->code;
            $this->msg = $e->msg;
            $this->errorCode = $e->errorCode;
        } else {
            if (config('app_debug')) {
                return parent::render($e);
            }
            $this->code = 500;
            $this->msg = 'Internal Server Error';
            Log::save($e);
        }
        $result = [
            'msg' => $this->msg,
            'errorCode' => $this->errorCode,
            'requestUrl' => Request::host() . Request::url()
        ];
        return json($result, $this->code);
    }
}