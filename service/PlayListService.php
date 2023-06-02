<?php

namespace service;

interface PlayListService
{
    public static function queryAll(): ?array;
    public static function queryPlayListByUserId($userId): ?array;
}