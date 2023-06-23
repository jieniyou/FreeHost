<?php

namespace service;

use mapper\SearchMapperImpl;

include "./../mapper/SearchMapperImpl.php";
include "SearchService.php";

class SearchServiceImpl implements SearchService
{


    public static function queryAll($postData): ?array
    {
        // TODO: Implement queryAll() method.
        return SearchMapperImpl::queryAll($postData);
    }

    public static function queryMusicArtist($postData): ?array
    {
        // TODO: Implement queryMusicArtist() method.
        return SearchMapperImpl::queryMusicArtist($postData);
    }

    public static function queryMusicName($postData): ?array
    {
        // TODO: Implement queryMusicName() method.
        return SearchMapperImpl::queryMusicName($postData);
    }

    public static function queryPlaylistName($postData): ?array
    {
        // TODO: Implement queryPlaylistName() method.
        return SearchMapperImpl::queryPlaylistName($postData);
    }
}