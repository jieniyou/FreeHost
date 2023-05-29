<?php

include_once './../controller/SongsController.php';
use controller\SongsController;

include_once "./../util/mysqlUtil.php";
require_once "./../util/consoleUtil.php";

$artist = $_POST['artist'];
$lrc = $_POST['lrc'];
$name = $_POST['name'];
$pic = $_POST['pic'];
$url = $_POST['url'];
$showlrc = $_POST['showlrc'];

$postData = [
    "artist" => $artist,
    "lrc" => $lrc,
    "name" => $name,
    "pic" => $pic,
    "url" => $url,
    "showlrc" => $showlrc
];

$songsController = new SongsController;
$result = $songsController->insert($postData);
echo json_encode($result, JSON_UNESCAPED_UNICODE);