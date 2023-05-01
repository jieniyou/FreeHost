<?php

namespace mapper;

interface AccountMapper
{
    static function login($username, $password): ?array;
}