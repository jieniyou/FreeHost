<?php

namespace controller;
use vo\ResultVo;
use service\Impl\AccountServiceImpls;

include "./../vo/ResultVo.php";
include "./../service/Impl/AccountServiceImpls.php";




class AccountController
{
    function login($username, $password): array
    {
        if ($username === null || $username === '' || $password === null || $password === ''){
            return ResultVo::NOTFOUND_MD("请输入用户名和密码", null);
        }
        $account = AccountServiceImpls::login($username, $password);

        if (null != $account) return ResultVo::SUCCESS_D($account);
        else return ResultVo::NOTFOUND_MD('用户名或密码不正确',null);

    }
}