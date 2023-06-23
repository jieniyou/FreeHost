<?php

namespace controller;

use vo\ResultVo;
use service\SearchServiceImpl;

include "./../vo/ResultVo.php";
include "./../service/SearchServiceImpl.php";
class SearchController
{

    public function queryAll($postData): array
    {
        if (empty($postData['userId'])) $postData['userId'] = -1;
        $result = SearchServiceImpl::queryAll($postData);
        if (empty($result)) return ResultVo::NOTFOUND_MD("没有数据",null);
        return ResultVo::SUCCESS_D($result);
    }

    public function queryMusicArtist($postData): array
    {
        if (empty($postData['userId'])) $postData['userId'] = -1;
        $result = SearchServiceImpl::queryMusicArtist($postData);
        if (empty($result)) return ResultVo::NOTFOUND_MD("没有数据",null);
        return ResultVo::SUCCESS_D($result);
    }

    public function queryMusicName($postData): array
    {
        if (empty($postData['userId'])) $postData['userId'] = -1;
        $result = SearchServiceImpl::queryMusicName($postData);
        if (empty($result)) return ResultVo::NOTFOUND_MD("没有数据",null);
        return ResultVo::SUCCESS_D($result);
    }

    public function queryPlaylistName($postData): array
    {
        if (empty($postData['userId'])) $postData['userId'] = -1;
        $result = SearchServiceImpl::queryPlaylistName($postData);
        if (empty($result)) return ResultVo::NOTFOUND_MD("没有数据",null);
        return ResultVo::SUCCESS_D($result);
    }
}