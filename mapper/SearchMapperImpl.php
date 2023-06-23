<?php

namespace mapper;
include "SearchMapper.php";

class SearchMapperImpl implements SearchMapper
{

    const ALIASForASS = " ass.id AS assId, ass.account_id AS assUId, ass.songs_id AS assSongId";
    const COMMONLEFTJOIN = " LEFT JOIN account_songs ass ON ass.songs_id = s.id AND ass.account_id = ?";
    public static function queryAll($postData): ?array
    {


        // TODO: Implement queryAll() method.
        $conn = getMysqli();
        $sql = "SELECT s.*, ".self::ALIASForASS." FROM songs s ".self::COMMONLEFTJOIN." WHERE s.name LIKE ? OR s.artist LIKE ?";
        $stmt = $conn->prepare($sql);
        $query = "%".$postData['query']."%";
        $stmt->bind_param('iss', $postData['userId'], $query, $query);
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

    public static function queryMusicArtist($postData): ?array
    {
        // TODO: Implement queryMusicArtist() method.
        $conn = getMysqli();
        $sql = "SELECT s.*, ".self::ALIASForASS." FROM songs s ".self::COMMONLEFTJOIN." WHERE s.artist LIKE ?";
        $stmt = $conn->prepare($sql);
        $musicArtist = "%".$postData['musicArtist']."%";
        $stmt->bind_param('is', $postData['userId'], $musicArtist);
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

    public static function queryMusicName($postData): ?array
    {
        // TODO: Implement queryMusicName() method.
        $conn = getMysqli();
        $sql = "SELECT s.*, ".self::ALIASForASS." FROM songs s ".self::COMMONLEFTJOIN." WHERE s.name LIKE ?";
        $stmt = $conn->prepare($sql);
        $musicName = "%".$postData['musicName']."%";
        $stmt->bind_param('is', $postData['userId'], $musicName);
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

    public static function queryPlaylistName($postData): ?array
    {
        // TODO: Implement queryPlaylistName() method.
        $conn = getMysqli();
        $sql = "SELECT s.*, ".self::ALIASForASS." FROM playlist p ".self::COMMONLEFTJOIN." WHERE p.playlist_name LIKE ? ";
        $stmt = $conn->prepare($sql);
        $playlistName = "%".$postData['playlistName']."%";
        $stmt->bind_param('is', $postData['userId'], $playlistName);
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