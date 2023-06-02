<?php

namespace controller;
use entity\SongsEntity;
use vo\ResultVo;
use service\SongsServiceImpl;

include "./../vo/ResultVo.php";
include "./../service/SongsServiceImpl.php";

class SongsController
{
    public function queryAll(): array
    {
        $songs = SongsServiceImpl::queryAll();
        if (empty($songs)) return ResultVo::NOTFOUND_MD("无数据", null);
        else return ResultVo::SUCCESS_D($songs);
    }

    function insert($postData): array
    {
        if (empty($postData)) return ResultVo::NOTFOUND_MD("请输入完整数据", null);
        $status = SongsServiceImpl::insert($postData);

        if (null != $status) return ResultVo::SUCCESS_MD('更新成功', null);
        else return ResultVo::NOTFOUND_MD('插入数据失败,请联系管理员',null);

    }

    public function update($postData): array
    {
        if (empty($postData)) return ResultVo::NOTFOUND_MD("请输入完整数据", null);
        $status = SongsServiceImpl::update($postData);

        if (null != $status) return ResultVo::SUCCESS_MD('更新成功', null);
        else return ResultVo::NOTFOUND_MD('更新数据失败,请联系管理员',null);
    }

    public function deleteById($id): array
    {
        $status = SongsServiceImpl::deleteById($id);

        if (null!= $status) return ResultVo::SUCCESS_MD('删除成功', null);
        else return ResultVo::NOTFOUND_MD('删除数据失败,请联系管理员',null);
    }

}