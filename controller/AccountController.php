<?php

namespace controller;
include "./../vo/ResultVo.php";
use vo\ResultVo;
include_once './../util/mysqlUtil.php';
include_once './../util/consoleUtil.php';


class AccountController
{
    function login($username, $password): array
    {
        write_to_console("进入了login方法");
        $result = new ResultVo('','','');
        write_to_console($username);
        $conn = getMysqli();
        $sql = "SELECT * FROM account where user_name = '$username' and user_password = '$password'";
        $account = getOne($sql,$conn);
        write_to_console($account);
        if (null != $account) return $result->SUCCESS_D($account);
        else return $result->NOTFOUND_MD('用户名或密码不正确',null);

    }
}