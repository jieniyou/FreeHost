<?php

namespace service;

use mapper\AccountMapperImpl;

include "./../mapper/AccountMapperImpl.php";
include "AccountService.php";

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