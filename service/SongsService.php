<?php

namespace service;

interface SongsService
{
    public static function queryAll($userId): ?array;
    public static function insert($postData): bool;
    public static function update($postData): bool;
    public static function deleteById($id): bool;
    public static function queryByPlayListId($playListId, $userId): ?array;
}