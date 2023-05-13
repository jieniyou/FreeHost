<?php

namespace vo;
/**
 * 封装统一状态
 */
class CommonVo
{
    public static int $SUCCESS_CODE = 200;
    public static int $NOTFOUND_CODE = 400;
    public static int $ERROR_CODE = 500;

    public static string $SUCCESS_MSG = "请求成功";
    public static string $NOTFOUND_MSG = "请求不存在";
    public static string $ERROR_MSG = "服务器异常,请联系管理员";

    /**
     * 目前可写可不写
     */
    public function __construct()
    {
    }
}