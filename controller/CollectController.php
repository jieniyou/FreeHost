<?php

namespace controller;

namespace controller;
use vo\ResultVo;
use service\CollectServiceImpl;

include "./../vo/ResultVo.php";
include "./../service/CollectServiceImpl.php";
class CollectController
{

    public function addCollectPM($postData): array
    {
        if (empty($postData['userId'])) return ResultVo::NOTFOUND_MD('请先登录', null);
        $status = CollectServiceImpl::addCollectPM($postData);
        if ($status) return ResultVo::SUCCESS_MD('收藏成功', null);
        return ResultVo::NOTFOUND_MD('收藏失败', null);
    }

    public function delCollectPM($postData): array
    {
        if (empty($postData['userId'])) return ResultVo::NOTFOUND_MD('请先登录', null);
        $status = CollectServiceImpl::delCollectPM($postData);
        if ($status) return ResultVo::SUCCESS_MD('取消成功', null);
        return ResultVo::NOTFOUND_MD('取消失败', null);
    }

    public function queryCollectPByMU($postData): array
    {
        if (empty($postData['userId'])) return ResultVo::NOTFOUND_MD('请先登录', null);
        $result = CollectServiceImpl::queryCollectPByMU($postData);
        if ($result) return ResultVo::SUCCESS_MD('加载成功', $result);
        return ResultVo::NOTFOUND_MD('已仅在默认歌单中', null);
    }

    public function queryAllCollectForAS(): array
    {
        $result = CollectServiceImpl::queryAllCollectForAS();
        if ($result) return ResultVo::SUCCESS_MD('加载成功', $result);
        return ResultVo::NOTFOUND_MD('无信息', null);
    }

    public function queryAllCollectForAP(): array
    {
        $result = CollectServiceImpl::queryAllCollectForAP();
        if ($result) return ResultVo::SUCCESS_MD('加载成功', $result);
        return ResultVo::NOTFOUND_MD('无信息', null);
    }

    public function deleteASCollectById($postData): array
    {
        if (empty($postData['id'])) return ResultVo::NOTFOUND_MD('无 id 信息', null);
        $result = CollectServiceImpl::deleteASCollectById($postData['id']);
        if ($result) return ResultVo::SUCCESS_MD('删除成功', $result);
        return ResultVo::NOTFOUND_MD('删除失败', null);
    }

    public function deleteAPCollectById($postData): array
    {
        if (empty($postData['id'])) return ResultVo::NOTFOUND_MD('无 id 信息', null);
        $result = CollectServiceImpl::deleteAPCollectById($postData['id']);
        if ($result) return ResultVo::SUCCESS_MD('删除成功', $result);
        return ResultVo::NOTFOUND_MD('删除失败', null);
    }
}