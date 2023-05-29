<?php

namespace mapper;

interface SongsMapper
{
    public static function insert($postData): bool;
    public static function update(array $postData): bool;
}