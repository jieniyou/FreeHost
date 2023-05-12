<?php

namespace service\Impl;

include "./../AccountService.php";
include "./../../mapper/AccountMapper.php";
include "./../../util/consoleUtil.php";

use mapper\Impl\AccountMapperImpl;
use service\AccountService;

class AccountServiceImpl implements AccountService
{
    static function login($username, $password): ?array
    {
        write_to_console("测试2", "456");
        $accountMapperImpl = new AccountMapperImpl();
        // TODO: Implement login() method.
        return $accountMapperImpl::login($username, $password);
    }
}