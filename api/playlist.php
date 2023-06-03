<?php

include './../config/CorsConfig.php';
setCorsHeaders();

include_once './../controller/PlayListController.php';
use controller\PlayListController;

include_once "./../util/mysqlUtil.php";
require_once "./../util/consoleUtil.php";

$method = $_POST['method'];

$userId = $_POST['userId'];

$id = $_POST['id'];
$description = $_POST['playlist_description'];
$introduction = $_POST['playlist_introduction'];
$name = $_POST['playlist_name'];
$pic = $_POST['playlist_pic'];

$postData = [
    'id' => $id,
    'description' => $description,
    'introduction' => $introduction,
    'name' => $name,
    'pic' => $pic
];

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

function addPlaylist($playlistController, $postData) {
    $result = $playlistController->insert($postData);
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}

function editPlaylist($playlistController, $postData) {
    $result = $playlistController->update($postData);
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}
function deletePlaylist($playlistController, $postData) {
    $result = $playlistController->deleteById($postData['id']);
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}

switch ($method) {
    case 'list':
        listPlaylists($playlistController);
        break;
    case 'listByUserId':
        playlistByUserId($playlistController, $userId);
        break;
    case 'add':
        addPlaylist($playlistController, $postData);
        break;
    case 'edit':
        editPlaylist($playlistController, $postData);
        break;
    case 'delete':
        deletePlaylist($playlistController, $postData);
        break;
}
