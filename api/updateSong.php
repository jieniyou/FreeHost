<?php

use controller\SongsController;

include_once './../controller/SongsController.php';
include_once "./../util/consoleUtil.php";
include_once "./../util/mysqlUtil.php";

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

$songsController = new SongsController();
$result = $songsController->update($postData);
echo json_encode($result, JSON_UNESCAPED_UNICODE);