<?php

namespace controller;
use entity\AccountEntity;
use vo\ResultVo;
use service\AccountServiceImpl;

include "./../vo/ResultVo.php";
include "./../service/AccountServiceImpl.php";

class AccountController
{
    function login($username, $password): array
    {
        if (empty($username) || empty($password)){
            return ResultVo::NOTFOUND_MD("请输入用户名和密码", null);
        }
        $account = AccountServiceImpl::login($username, $password);

        if (null != $account) return ResultVo::SUCCESS_D($account);
        else return ResultVo::NOTFOUND_MD('用户名或密码不正确',null);

    }

    function queryUserByName(AccountEntity $accountEntity)
    {
        echo $accountEntity;
    }
    function register($username, $password, $email): array
    {
        if (empty($username) || empty($password) || empty($email)) return ResultVo::NOTFOUND_MD("请输入用户名和密码", null);
        $status = AccountServiceImpl::register($username, $password, $email);
        if ($status) return ResultVo::SUCCESS_MD("注册成功",null);
        else return ResultVo::NOTFOUND_MD('用户名已存在',null);
    }

    function queryAll(): array
    {
        $users = AccountServiceImpl::queryAll();
        if (empty($users)) return ResultVo::NOTFOUND_MD('查询失败', null);
        else return ResultVo::SUCCESS_MD('查询成功', $users);
    }

    function insert($PostData): array
    {
        if (empty($PostData)) return ResultVo::NOTFOUND_MD('参数异常',null);
        $status = AccountServiceImpl::insert($PostData);
        if (empty($status)) return ResultVo::NOTFOUND_MD('插入失败', null);
        else return ResultVo::SUCCESS_MD('插入成功', null);
    }

    function update($PostData): array
    {
        if (empty($PostData)) return ResultVo::NOTFOUND_MD('参数异常',null);
        $status = AccountServiceImpl::update($PostData);
        if (empty($status)) return ResultVo::NOTFOUND_MD('更新失败', null);
        else return ResultVo::SUCCESS_MD('更新成功', null);
    }

    function deleteById($id): array
    {
        if (empty($id)) return ResultVo::NOTFOUND_MD('参数异常',null);
        $status = AccountServiceImpl::deleteById($id);
        if (empty($status)) return ResultVo::NOTFOUND_MD('删除失败', null);
        else return ResultVo::SUCCESS_MD('删除成功', null);
    }
}