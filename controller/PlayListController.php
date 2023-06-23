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

    function insert($postData, $userId): array
    {
        if (empty($postData)) return ResultVo::NOTFOUND_MD("请输入完整数据", null);
        $status = PlayListServiceImpl::insert($postData, $userId);

        if ($status) return ResultVo::SUCCESS_MD('创建成功', null);
        else return ResultVo::NOTFOUND_MD('插入数据失败,请联系管理员',null);

    }

    public function update($postData): array
    {
        if (empty($postData)) return ResultVo::NOTFOUND_MD("请输入完整数据", null);
        $status = PlayListServiceImpl::update($postData);

        if ($status) return ResultVo::SUCCESS_MD('更新成功', null);
        else return ResultVo::NOTFOUND_MD('更新数据失败,请联系管理员',null);
    }

    public function deleteById($id): array
    {
        $status = PlayListServiceImpl::deleteById($id);

        if ($status) return ResultVo::SUCCESS_MD('删除成功', null);
        else return ResultVo::NOTFOUND_MD('删除数据失败,请联系管理员',null);
    }

    public function queryMyCollection($id): array
    {
        if (empty($id)) return ResultVo::NOTFOUND_MD("请先登录",null);
        $playlist = PlayListServiceImpl::queryMyCollection($id);
        return ResultVo::SUCCESS_MD("查询成功",$playlist);
    }

    public function queryMyCreate($id): array
    {
        if (empty($id)) return ResultVo::NOTFOUND_MD("请先登录",null);
        $playlist = PlayListServiceImpl::queryMyCreate($id);
        return ResultVo::SUCCESS_MD("查询成功",$playlist);
    }

    public function insertMyCollection($postData): array
    {
        if (empty($postData['userId'])) return ResultVo::NOTFOUND_MD("请先登录",null);
        $status = PlayListServiceImpl::insertMyCollection($postData);

        if ($status) return ResultVo::SUCCESS_MD('收藏成功', null);
        else return ResultVo::NOTFOUND_MD('收藏失败,请联系管理员',null);
    }

    public function delMyCreate($postData): array
    {
        if (empty($postData['userId'])) return ResultVo::NOTFOUND_MD("请先登录",null);
        $status = PlayListServiceImpl::delMyCreate($postData);

        if ($status) return ResultVo::SUCCESS_MD('删除成功', null);
        else return ResultVo::NOTFOUND_MD('删除失败,请联系管理员',null);
    }

    public function queryCreator($id): array
    {
        if (empty($id)) return ResultVo::NOTFOUND_MD("歌单不存在",null);
        $creator = PlayListServiceImpl::queryCreator($id);
        return ResultVo::SUCCESS_MD("查询成功",$creator);
    }
}