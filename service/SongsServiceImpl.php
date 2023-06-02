<?php

namespace service;

use mapper\SongsMapperImpl;

include "./../mapper/SongsMapperImpl.php";
include "SongsService.php";

class SongsServiceImpl implements SongsService
{
    public static function queryAll(): ?array
    {
        // TODO: Implement queryAll() method.
        return SongsMapperImpl::queryAll();
    }
    public static function insert($postData): bool
    {
        // TODO: Implement insert() method.
        return SongsMapperImpl::insert($postData);
    }

    public static function update($postData): bool
    {
        // TODO: Implement update() method.
        return SongsMapperImpl::update($postData);
    }

    public static function deleteById($id): bool
    {
        // TODO: Implement deleteById() method.
        return SongsMapperImpl::deleteById($id);
    }
}