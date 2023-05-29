<?php

namespace service;

interface SongsService
{
    public static function insert($postData): bool;
    public static function update(array $postData): bool;
}