<?php

namespace service;

use mapper\SongsMapperImpl;

include "./../mapper/SongsMapperImpl.php";
include "SongsService.php";

class SongsServiceImpl implements SongsService
{
    public static function insert($postData): bool
    {
        // TODO: Implement insert() method.
        return SongsMapperImpl::insert($postData);
    }

    public static function update(array $postData): bool
    {
        // TODO: Implement update() method.
        return SongsMapperImpl::update($postData);
    }
}