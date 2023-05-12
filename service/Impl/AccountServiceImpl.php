<?php

namespace service\Impl;

include "./../AccountService.php";
include "./../../mapper/AccountMapper.php";
include "./../../util/consoleUtil.php";

use mapper\Impl\AccountMapperImpl;
use service\AccountService;

class AccountServiceImpl implements AccountService
{
    public static function login($username, $password): ?array
    {
        // TODO: Implement login() method.
        return AccountMapperImpl::login($username, $password);
    }

    public static function register($username, $password, $email): bool
    {
        // TODO: Implement register() method.
        return AccountMapperImpl::register($username, $password, $email);
    }
}