<?php

namespace mapper;

interface PlayListMapper
{
    public static function queryAll(): ?array;
    public static function queryPlayListByUserId($userId): ?array;
    public static function insert($postData, $userId): bool;
    public static function update($postData): bool;
    public static function deleteById($id): bool;
    public static function queryMyCollection($id): ?array;
    public static function queryMyCreate($id): ?array;
    public static function insertMyCollection($postData): bool;
    public static function delMyCreate($postData): bool;
    public static function queryCreator($id): ?array;

}