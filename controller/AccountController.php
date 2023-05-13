<?php

namespace controller;
use vo\ResultVo;
use service\AccountServiceImpl;

include "./../vo/ResultVo.php";
include "./../service/AccountServiceImpl.php";

class AccountController
{
    function login($username, $password): array
    {
        if ($username === null || $username === '' || $password === null || $password === ''){
            return ResultVo::NOTFOUND_MD("请输入用户名和密码", null);
        }
        $account = AccountServiceImpl::login($username, $password);

        if (null != $account) return ResultVo::SUCCESS_D($account);
        else return ResultVo::NOTFOUND_MD('用户名或密码不正确',null);

    }
    static function register($username, $password, $email): array
    {
        if ($username === null || $username === '' || $password === null || $password === '' || $email === null || $email === '' ){
            return ResultVo::NOTFOUND_MD("请输入用户名和密码", null);
        }
        $status = AccountServiceImpl::register($username, $password, $email);
        if ($status) return ResultVo::SUCCESS_MD("注册成功",null);
        else return ResultVo::NOTFOUND_MD('用户名已存在',null);
    }
}