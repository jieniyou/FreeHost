<?php

namespace mapper;

include "SongsMapper.php";
class SongsMapperImpl implements SongsMapper
{
    public static function queryAll(): ?array
    {
        // TODO: Implement queryAll() method.
        $conn = getMysqli();
        $sql = "SELECT * FROM songs";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

        if ($result->num_rows === 0) return null;

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    }

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
        $stmt->bind_param('ssssss', $artist, $lrc, $name, $pic, $url, $showlrc);
        $stmt->execute();

        $result = $stmt->affected_rows;
        $stmt->close();

        if ($result > 0) {
            return true;
        } else {
            return false;
        }
    }

    public static function update($postData): bool
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

        $result = $stmt->affected_rows;

        $stmt->close();

        if ($result > 0) {
            return true;
        } else {
            return false;
        }
    }

    public static function deleteById($id): bool
    {
        $conn = getMysqli();
        $stmt = $conn->prepare("DELETE FROM songs WHERE id=?");
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $result = $stmt->affected_rows;

        $stmt->close();

        if ($result > 0) {
            return true;
        } else {
            return false;
        }
    }
}