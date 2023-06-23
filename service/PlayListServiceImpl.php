<?php

namespace service;

use mapper\PlayListMapperImpl;

include "./../mapper/PlayListMapperImpl.php";
include "PlayListService.php";

class PlayListServiceImpl implements PlayListService
{

    public static function queryAll(): ?array
    {
        // TODO: Implement queryAll() method.
        return PlayListMapperImpl::queryAll();
    }

    public static function queryPlayListByUserId($userId): ?array
    {
        // TODO: Implement queryPlayListById() method.
        return PlayListMapperImpl::queryPlayListByUserId($userId);
    }

    public static function insert($postData, $userId): bool
    {
        // TODO: Implement insert() method.
        return PlayListMapperImpl::insert($postData, $userId);
    }

    public static function update($postData): bool
    {
        // TODO: Implement update() method.
        return PlayListMapperImpl::update($postData);
    }

    public static function deleteById($id): bool
    {
        // TODO: Implement deleteById() method.
        return PlayListMapperImpl::deleteById($id);
    }


    public static function queryMyCollection($id): ?array
    {
        // TODO: Implement queryMyCollection() method.
        return PlayListMapperImpl::queryMyCollection($id);
    }

    public static function queryMyCreate($id): ?array
    {
        // TODO: Implement queryMyCreate() method.
        return PlayListMapperImpl::queryMyCreate($id);
    }

    public static function insertMyCollection($postData): bool
    {
        // TODO: Implement insertMyCollection() method.
        return PlayListMapperImpl::insertMyCollection($postData);
    }

    public static function delMyCreate($postData): bool
    {
        // TODO: Implement delMyCreate() method.
        return PlayListMapperImpl::delMyCreate($postData);
    }


    public static function queryCreator($id): ?array
    {
        // TODO: Implement queryCreator() method.
        return PlayListMapperImpl::queryCreator($id);
    }
}