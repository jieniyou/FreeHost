<?php

include './../config/CorsConfig.php';
setCorsHeaders();

include_once './../controller/SearchController.php';
use controller\SearchController;

include_once "./../util/mysqlUtil.php";
require_once "./../util/consoleUtil.php";

$type = $_POST['type'];

$userId = $_POST['userId'];
$query = $_POST['query'];
$musicArtist = $_POST['musicArtist'];
$musicName = $_POST['musicName'];
$playlistName = $_POST['playlistName'];

$postData = [
    "userId" => $userId,
    "query" => $query,
    "musicArtist" => $musicArtist,
    "musicName" => $musicName,
    "playlistName" => $playlistName
];

$searchController = new SearchController();

function searchAll($searchController, $postData)
{
    $result = $searchController->queryAll($postData);
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}

function searchMusicArtist($searchController, $postData)
{
    $result = $searchController->queryMusicArtist($postData);
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}

function searchMusicName($searchController, $postData)
{
    $result = $searchController->queryMusicName($postData);
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}

function searchPlaylistName($searchController, $postData)
{
    $result = $searchController->queryPlaylistName($postData);
    echo json_encode($result, JSON_UNESCAPED_UNICODE);
}

switch ($type) {
    case 'all':
        searchAll($searchController, $postData);
        break;
    case 'musicArtist':
        searchMusicArtist($searchController, $postData);
        break;
    case 'musicName':
        searchMusicName($searchController, $postData);
        break;
    case 'playlistName':
        searchPlaylistName($searchController, $postData);
        break;
}