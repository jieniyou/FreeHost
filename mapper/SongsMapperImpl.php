<?php

namespace mapper;

include "SongsMapper.php";
class SongsMapperImpl implements SongsMapper
{
    const ALIASForASS = " ass.id AS assId, ass.account_id AS assUId, ass.songs_id AS assSongId";
    const COMMONLEFTJOIN = " LEFT JOIN account_songs ass ON ass.songs_id = s.id AND ass.account_id = ?";
    public static function queryAll($userId): ?array
    {
        // TODO: Implement queryAll() method.
        $conn = getMysqli();
        $sql = "SELECT s.*, ".self::ALIASForASS." FROM songs s ".self::COMMONLEFTJOIN." ORDER BY s.id;";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $userId);
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

    public static function queryByPlayListId($playListId, $userId): ?array
    {
        // TODO: Implement queryByPlayListId() method.
        $conn = getMysqli();
//        $sql = "SELECT s.* ".self::ALIASForASS." FROM songs s ".self::COMMONLEFTJOIN." where id in (select songs_id from playlist_songs where playlist_id = ?)";
        $sql = "SELECT s.*, ass.id AS assId, ass.account_id AS assUId, ass.songs_id AS assSongId 
                FROM playlist_songs ps 
                JOIN songs s ON ps.songs_id = s.id 
                LEFT JOIN account_songs ass ON ass.songs_id = s.id AND ass.account_id = ? 
                WHERE ps.playlist_id = ? 
                ORDER BY s.id;";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ii', $userId, $playListId);
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
}