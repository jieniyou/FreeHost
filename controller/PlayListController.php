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

    function insert($postData): array
    {
        if (empty($postData)) return ResultVo::NOTFOUND_MD("请输入完整数据", null);
        $status = PlayListServiceImpl::insert($postData);

        if (null != $status) return ResultVo::SUCCESS_MD('更新成功', null);
        else return ResultVo::NOTFOUND_MD('插入数据失败,请联系管理员',null);

    }

    public function update($postData): array
    {
        if (empty($postData)) return ResultVo::NOTFOUND_MD("请输入完整数据", null);
        $status = PlayListServiceImpl::update($postData);

        if (null != $status) return ResultVo::SUCCESS_MD('更新成功', null);
        else return ResultVo::NOTFOUND_MD('更新数据失败,请联系管理员',null);
    }

    public function deleteById($id): array
    {
        $status = PlayListServiceImpl::deleteById($id);

        if (null!= $status) return ResultVo::SUCCESS_MD('删除成功', null);
        else return ResultVo::NOTFOUND_MD('删除数据失败,请联系管理员',null);
    }
}