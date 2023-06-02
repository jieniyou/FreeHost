<?php

include './../config/CorsConfig.php';
setCorsHeaders();

include_once './../controller/PlayListController.php';
use controller\PlayListController;

include_once "./../util/mysqlUtil.php";
require_once "./../util/consoleUtil.php";

$method = $_POST['method'];

$userId = $_POST['userId'];

$playlistController = new PlayListController();

function listPlaylists($playlistController)
{
    $playlist = $playlistController->queryAll();
    echo json_encode($playlist, JSON_UNESCAPED_UNICODE);
}

function playlistByUserId($playlistController, $userId)
{
    $playlist = $playlistController->queryPlayListByUserId($userId);
    echo json_encode($playlist, JSON_UNESCAPED_UNICODE);
}

switch ($method) {
    case 'list':
        listPlaylists($playlistController);
        break;
    case 'listByUserId':
        playlistByUserId($playlistController, $userId);
        break;
}
