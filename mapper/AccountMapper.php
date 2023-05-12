<?php

namespace mapper;

interface AccountMapper
{
    public static function login($username, $password): ?array;
    public static function register($username, $password, $email): bool;
}