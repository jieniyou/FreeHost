<?php

namespace mapper;

interface PlayListMapper
{
    public static function queryAll(): ?array;
    public static function queryPlayListByUserId($userId): ?array;

}