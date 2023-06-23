<?php

include './../config/CorsConfig.php';
setCorsHeaders();

include_once './../controller/SongsController.php';
use controller\SongsController;

include_once "./../util/mysqlUtil.php";
require_once "./../util/consoleUtil.php";

$method = $_POST['method'];

$userId = $_POST['userId'];

$id = $_POST['id'];
$artist = $_POST['artist'];
$lrc = $_POST['lrc'];
$name = $_POST['name'];
$pic = $_POST['pic'];
$url = $_POST['url'];
$showlrc = $_POST['showlrc'];

$postData = [
    'id' => $id,
    'artist' => $artist,
    'lrc' => $lrc,
    'name' => $name,
    'pic' => $pic,
    'showlrc' => $showlrc,
    'url' => $url,
];

$playListId = $_POST['playListId'];

$songsController = new SongsController();

function addSong($songsController, $postData)
{
    $result = $songsController->insert($postData);
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}

function deleteSong($songsController, $postData)
{
    $result = $songsController->deleteById($postData['id']);
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}

function editSong($songsController, $postData)
{
    $result = $songsController->update($postData);
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}

function listSongs($songsController, $userId)
{
    $songs = $songsController->queryAll($userId);
    echo json_encode($songs, JSON_UNESCAPED_UNICODE);
}

function listByplayListSongs($songsController, $playListId, $userId)
{
    $songs = $songsController->queryByPlayListId($playListId, $userId);
    echo json_encode($songs, JSON_UNESCAPED_UNICODE);
}

switch ($method) {
    case 'add':
        addSong($songsController, $postData);
        break;
    case 'delete':
        deleteSong($songsController, $postData);
        break;
    case 'edit':
        editSong($songsController, $postData);
        break;
    case 'list':
        listSongs($songsController, $userId);
        break;
    case 'listByplayListId':
        listByplayListSongs($songsController, $playListId, $userId);
        break;
}