<?php

namespace mapper;

include "SongsMapper.php";
class SongsMapperImpl implements SongsMapper
{
    public static function insert($postData): bool
    {
        $artist = $postData['artist'];
        $lrc = $postData['lrc'];
        $name = $postData['name'];
        $pic = $postData['pic'];
        $url = $postData['url'];
        $showlrc = $postData['showlrc'];

        $conn = getMysqli();
        $stmt = $conn->prepare("INSERT INTO songs(artist, lrc, name, pic, url, showlrc) 
                            VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('sssssi', $artist, $lrc, $name, $pic, $url, $showlrc);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public static function update(array $postData): bool
    {
        $id = $postData['id'];
        $artist = $postData['artist'];
        $lrc = $postData['lrc'];
        $name = $postData['name'];
        $pic = $postData['pic'];
        $url = $postData['url'];
        $showlrc = $postData['showlrc'];

        $conn = getMysqli();
        $stmt = $conn->prepare("UPDATE songs SET artist=?, lrc=?, name=?, pic=?, url=?, showlrc=? WHERE id=?");
        $stmt->bind_param("ssssssi", $artist, $lrc, $name, $pic, $url, $showlrc, $id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
}