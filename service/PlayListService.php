<?php

namespace service;

interface PlayListService
{
    public static function queryAll(): ?array;
    public static function queryPlayListByUserId($userId): ?array;
    public static function insert($postData): bool;
    public static function update($postData): bool;
    public static function deleteById($id): bool;
}