<?php

namespace service;

interface CollectService
{
    public static function addCollectPM($postData): ?bool;

    public static function delCollectPM($postData): ?bool;
    public static function queryCollectPByMU($postData): ?array;
    public static function queryAllCollectForAS(): ?array;

    public static function queryAllCollectForAP(): ?array;

    public static function deleteASCollectById($id): bool;

    public static function deleteAPCollectById($id): bool;
}