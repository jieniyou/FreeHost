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

    public static function insert($postData): bool
    {
        // TODO: Implement insert() method.
        return PlayListMapperImpl::insert($postData);
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
}