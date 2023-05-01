<?php

namespace service;

interface AccountService
{
    static function login($username, $password): ?array;
}