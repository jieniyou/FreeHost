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

    /**
     * @return int
     */
    public static function getSUCCESSCODE(): int
    {
        return self::$SUCCESS_CODE;
    }

    /**
     * @param int $SUCCESS_CODE
     */
    public static function setSUCCESSCODE(int $SUCCESS_CODE): void
    {
        self::$SUCCESS_CODE = $SUCCESS_CODE;
    }

    /**
     * @return int
     */
    public static function getNOTFOUNDCODE(): int
    {
        return self::$NOTFOUND_CODE;
    }

    /**
     * @param int $NOTFOUND_CODE
     */
    public static function setNOTFOUNDCODE(int $NOTFOUND_CODE): void
    {
        self::$NOTFOUND_CODE = $NOTFOUND_CODE;
    }

    /**
     * @return int
     */
    public static function getERRORCODE(): int
    {
        return self::$ERROR_CODE;
    }

    /**
     * @param int $ERROR_CODE
     */
    public static function setERRORCODE(int $ERROR_CODE): void
    {
        self::$ERROR_CODE = $ERROR_CODE;
    }

    /**
     * @return string
     */
    public static function getSUCCESSMSG(): string
    {
        return self::$SUCCESS_MSG;
    }

    /**
     * @param string $SUCCESS_MSG
     */
    public static function setSUCCESSMSG(string $SUCCESS_MSG): void
    {
        self::$SUCCESS_MSG = $SUCCESS_MSG;
    }

    /**
     * @return string
     */
    public static function getNOTFOUNDMSG(): string
    {
        return self::$NOTFOUND_MSG;
    }

    /**
     * @param string $NOTFOUND_MSG
     */
    public static function setNOTFOUNDMSG(string $NOTFOUND_MSG): void
    {
        self::$NOTFOUND_MSG = $NOTFOUND_MSG;
    }

    /**
     * @return string
     */
    public static function getERRORMSG(): string
    {
        return self::$ERROR_MSG;
    }

    /**
     * @param string $ERROR_MSG
     */
    public static function setERRORMSG(string $ERROR_MSG): void
    {
        self::$ERROR_MSG = $ERROR_MSG;
    }

}