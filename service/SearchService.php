<?php

namespace service;

interface SearchService
{
    public static function queryAll($postData): ?array;

    public static function queryMusicArtist($postData): ?array;

    public static function queryMusicName($postData): ?array;

    public static function queryPlaylistName($postData): ?array;

}