<?php

namespace vo;
include "CommonVo.php";
use vo\CommonVo;
/**
 *  封装统一返回结果
 */
class ResultVo
{
    /**
     * 状态码
     * @var int
     */
    private int $code;
    /**
     * 返回消息
     * @var string
     */
    private string $message;
    /**
     * 返回数据
     * @var ?object
     */
    private ?object $data;

    /**
     * 统一封装返回类型
     * @param $code
     * @param $message
     * @param $data
     * @return array
     */
    public static function result($code, $message, $data): array
    {
        return [
            "code" => $code,
            "message" => $message,
            "data" => $data,
        ];
    }

    /**
     * 无参构造方法
     * @return void
     */
    public function __construct()
    {
        $this->code = 0;
        $this->message = '';
        $this->data = null;
    }

    /**
     * SUCCESS_*成功
     * @return array
     */
    public static function SUCCESS(): array
    {
        return self::result(CommonVo::$SUCCESS_CODE, CommonVo::$SUCCESS_MSG, null);
    }
    public static function SUCCESS_D($data): array
    {
        return self::result(CommonVo::$SUCCESS_CODE, CommonVo::$SUCCESS_MSG, $data);
    }
    public static function SUCCESS_MD($msg, $data): array
    {
        return self::result(CommonVo::$SUCCESS_CODE, $msg, $data);
    }
    /**
     * NOTFOUND*失败未找到
     * @return array
     */
    public static function NOTFOUND(): array
    {
        return self::result(CommonVo::$NOTFOUND_CODE, CommonVo::$NOTFOUND_MSG, null);
    }
    public static function NOTFOUND_D($data): array
    {
        return self::result(CommonVo::$NOTFOUND_CODE, CommonVo::$NOTFOUND_MSG, $data);
    }
    public static function NOTFOUND_MD($msg, $data): array
    {
        return self::result(CommonVo::$NOTFOUND_CODE, $msg, $data);
    }
    /**
     * ERROR*失败后端
     * @return array
     */
    public static function ERROR(): array
    {
        return self::result(CommonVo::$ERROR_CODE, CommonVo::$ERROR_MSG, null);
    }
    public static function ERROR_D($data): array
    {
        return self::result(CommonVo::$ERROR_CODE, CommonVo::$ERROR_MSG, $data);
    }
    public static function ERROR_MD($msg, $data): array
    {
        return self::result(CommonVo::$ERROR_CODE, $msg, $data);
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

}