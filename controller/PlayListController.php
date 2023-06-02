<?php

namespace controller;

use entity\PlayListEntity;
use vo\ResultVo;
use service\PlayListServiceImpl;

include "./../vo/ResultVo.php";
include "./../service/PlayListServiceImpl.php";

class PlayListController
{
    function queryAll(): array
    {
        $playlist = PlayListServiceImpl::queryAll();
        if (empty($playlist)) return ResultVo::NOTFOUND_MD("没有数据",null);
        return ResultVo::SUCCESS_D($playlist);
    }

    function queryPlayListByUserId($userId): array
    {
        if (empty($userId)) return ResultVo::NOTFOUND_MD("查询失败,id为空",null);
        $playlist = PlayListServiceImpl::queryPlayListByUserId($userId);
        if (empty($playlist)) return ResultVo::NOTFOUND_MD("没有数据",null);
        return ResultVo::SUCCESS_D($playlist);
    }
}