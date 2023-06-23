<?php

namespace service;

use mapper\CollectMapperImpl;

include "./../mapper/CollectMapperImpl.php";
include "CollectService.php";

class CollectServiceImpl implements CollectService
{
    public static function addCollectPM($postData): ?bool
    {
        // TODO: Implement addCollectPM() method.
        return CollectMapperImpl::addCollectPM($postData);
    }

    public static function delCollectPM($postData): ?bool
    {
        // TODO: Implement delCollectPM() method.
        return CollectMapperImpl::delCollectPM($postData);
    }

    public static function queryCollectPByMU($postData): ?array
    {
        // TODO: Implement queryCollectPByMU() method.
        return CollectMapperImpl::queryCollectPByMU($postData);
    }


    public static function queryAllCollectForAS(): ?array
    {
        // TODO: Implement queryAllCollectForAS() method.
        return CollectMapperImpl::queryAllCollectForAS();
    }

    public static function queryAllCollectForAP(): ?array
    {
        // TODO: Implement queryAllCollectForAP() method.
        return CollectMapperImpl::queryAllCollectForAP();
    }

    public static function deleteASCollectById($id): bool
    {
        // TODO: Implement deleteASCollectById() method.
        return CollectMapperImpl::deleteASCollectById($id);
    }

    public static function deleteAPCollectById($id): bool
    {
        // TODO: Implement deleteAPCollectById() method.
        return CollectMapperImpl::deleteAPCollectById($id);
    }
}