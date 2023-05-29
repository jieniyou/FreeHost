<?php

namespace controller;
use entity\SongsEntity;
use vo\ResultVo;
use service\SongsServiceImpl;

include "./../vo/ResultVo.php";
include "./../service/SongsServiceImpl.php";

class SongsController
{
    function insert($postData): array
    {
        if ($postData === null || $postData === ''){
            return ResultVo::NOTFOUND_MD("请输入完整数据", null);
        }
        $status = SongsServiceImpl::insert($postData);

        if (null != $status) return ResultVo::SUCCESS_MD('更新成功', null);
        else return ResultVo::NOTFOUND_MD('插入数据失败,请联系管理员',null);

    }

    public function update(array $postData): array
    {
        if (empty($postData)) {
            return ResultVo::NOTFOUND_MD("请输入完整数据", null);
        }
        $status = SongsServiceImpl::update($postData);

        if (null != $status) return ResultVo::SUCCESS_MD('更新成功', null);
        else return ResultVo::NOTFOUND_MD('更新数据失败,请联系管理员',null);
    }
}