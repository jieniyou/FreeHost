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

    public static function queryAll(): ?array
    {
        // TODO: Implement queryAll() method.
        return AccountMapperImpl::queryAll();
    }

    public static function insert($PostData): bool
    {
        // TODO: Implement insert() method.
        return AccountMapperImpl::insert($PostData);
    }

    public static function update($PostData): bool
    {
        // TODO: Implement update() method.
        return AccountMapperImpl::update($PostData);
    }

    public static function deleteById($id): bool
    {
        // TODO: Implement deleteById() method.
        return AccountMapperImpl::deleteById($id);
    }
}