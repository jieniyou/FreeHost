<?php

namespace service;

interface AccountService
{
    public static function login($username, $password): ?array;
    public static function register($username, $password, $email): bool;

    public static function queryAll(): ?array;

    public static function insert($PostData): bool;

    public static function update($PostData): bool;

    public static function deleteById($id): bool;
}