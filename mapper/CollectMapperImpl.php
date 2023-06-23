<?php

namespace mapper;

include "CollectMapper.php";
class CollectMapperImpl implements CollectMapper
{

    public static function addCollectPM($postData): ?bool
    {
        // TODO: Implement addCollectPM() method.
        $conn1 = getMysqli();
        $sql1 = "INSERT INTO account_songs (account_id, songs_id) VALUES(?, ?)";
        $stmt1 = $conn1->prepare($sql1);
        $stmt1->bind_param('ii', $postData['userId'], $postData['songId']);
        $stmt1->execute();
        $result1 = $stmt1->affected_rows;
        $stmt1->close();
        if ($result1 > 0) {
            $conn2 = getMysqli();
            $sql2 = "INSERT INTO playlist_songs (playlist_id, songs_id) VALUES(?, ?)";
            $stmt2 = $conn2->prepare($sql2);
            $stmt2->bind_param('ii', $postData['playlistId'], $postData['songId']);
            $stmt2->execute();

            $result2 = $stmt2->affected_rows;
            $stmt2->close();

            if ($result2 > 0) return true;
            else return false;
        }
        else return false;
    }

    public static function delCollectPM($postData): ?bool
    {
        // TODO: Implement delCollectPM() method.
        $conn = getMysqli();
        $sql = "DELETE FROM playlist_songs WHERE playlist_id = ? and songs_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ii', $postData['playlistId'], $postData['songId']);
        return $stmt->execute();
    }

    public static function queryCollectPByMU($postData): ?array
    {
        // TODO: Implement queryCollectPByMU() method.
        $conn = getMysqli();
        $sql = "SELECT p.* 
            FROM playlist p 
            LEFT JOIN playlist_songs ps ON ps.songs_id = ? 
            LEFT JOIN account_playlist ap ON ap.playlist_id = ps.playlist_id AND ap.create_id = ? AND ap.account_id = ap.create_id
            WHERE p.id in (ap.playlist_id)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ii', $postData['songId'], $postData['userId']);
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

    public static function queryAllCollectForAS(): ?array
    {
        // TODO: Implement queryAllCollectForAS() method.
        $conn = getMysqli();
        $sql = "SELECT * FROM account_songs";
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

    public static function queryAllCollectForAP(): ?array
    {
        // TODO: Implement queryAllCollectForAP() method.
        $conn = getMysqli();
        $sql = "SELECT * FROM account_playlist";
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

    public static function deleteASCollectById($id): bool
    {
        // TODO: Implement deleteASCollectById() method.
        $conn = getMysqli();
        $sql = "DELETE FROM account_songs WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }

    public static function deleteAPCollectById($id): bool
    {
        // TODO: Implement deleteAPCollectById() method.
        $conn = getMysqli();
        $sql = "DELETE FROM account_playlist WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
}