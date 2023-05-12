<?php

namespace service;

interface AccountService
{
    public static function login($username, $password): ?array;
    public static function register($username, $password, $email): bool;
}