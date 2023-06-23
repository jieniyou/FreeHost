<?php

include './../config/CorsConfig.php';
setCorsHeaders();

include_once './../controller/CollectController.php';
use controller\CollectController;

include_once "./../util/mysqlUtil.php";
require_once "./../util/consoleUtil.php";

$method = $_POST['method'];

$postData = [
    'id' => $_POST['id'],
    'playlistId' => $_POST['playlistId'],
    'songId' => $_POST['songId'],
    'userId' => $_POST['userId'],
];

$collectController = new CollectController();


function addCollectPM(CollectController $collectController, $postData)
{
    $result = $collectController->addCollectPM($postData);
    echo  json_encode($result, JSON_UNESCAPED_UNICODE);
}

function delCollectPM(CollectController $collectController, $postData)
{
    $result = $collectController->delCollectPM($postData);
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}

function queryCollectPByMU(CollectController $collectController, $postData)
{
    $result = $collectController->queryCollectPByMU($postData);
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}

function queryAllCollectForAS(CollectController $collectController)
{
    $result = $collectController->queryAllCollectForAS();
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}

function queryAllCollectForAP(CollectController $collectController)
{
    $result = $collectController->queryAllCollectForAP();
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}

function deleteASCollectById(CollectController $collectController, $postData)
{
    $result = $collectController->deleteASCollectById($postData);
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}

function deleteAPCollectById(CollectController $collectController, $postData)
{
    $result = $collectController->deleteAPCollectById($postData);
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}

switch ($method) {
    case 'addCollectPM':
        addCollectPM($collectController, $postData);
        break;
    case 'delCollectPM':
        delCollectPM($collectController, $postData);
        break;
    case 'queryCollectPByMU':
        queryCollectPByMU($collectController, $postData);
        break;
    case 'queryAllCollectForAS':
        queryAllCollectForAS($collectController);
        break;
    case 'queryAllCollectForAP':
        queryAllCollectForAP($collectController);
        break;
    case 'deleteASCollectById':
        deleteASCollectById($collectController, $postData);
        break;
    case 'deleteAPCollectById':
        deleteAPCollectById($collectController, $postData);
        break;
}
