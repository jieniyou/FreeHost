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
}