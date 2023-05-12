<?php

namespace mapper\Impl;

include "./../AccountMapper.php";
include_once "./../../util/mysqlUtil.php";
include_once "./../../util/consoleUtil.php";

use mapper\AccountMapper;

class AccountMapperImpl implements AccountMapper
{
    static function login($username, $password): ?array
    {
        // TODO: Implement login() method.
        $conn = getMysqli();
        $sql = "SELECT * FROM account where user_name = '$username' and user_password = '$password'";
        return getOne($sql,$conn);
    }
}