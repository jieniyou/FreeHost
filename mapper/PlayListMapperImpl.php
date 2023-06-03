<?php

namespace mapper;

include "PlayListMapper.php";

class PlayListMapperImpl implements PlayListMapper
{

    public static function queryAll(): ?array
    {
        // TODO: Implement queryAll() method.
        $conn = getMysqli();
        $sql = "SELECT * FROM playlist";
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

    public static function queryPlayListByUserId($userId): ?array
    {
        // TODO: Implement queryPlayListById() method.
        $conn = getMysqli();
        $sql = "SELECT * FROM playlist WHERE id in (select playlist_id from account_playlist where account_id = ?)";
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
        // TODO: Implement insert() method.
        $description = $postData['description'];
        $introduction = $postData['introduction'];
        $name = $postData['name'];
        $pic = $postData['pic'];

        $conn = getMysqli();
        $sql = "INSERT INTO playlist (playlist_description, playlist_introduction, playlist_name, playlist_pic) VALUES (?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssss', $description, $introduction, $name, $pic);
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
        // TODO: Implement update() method.

        $id = $postData['id'];
        $description = $postData['description'];
        $introduction = $postData['introduction'];
        $name = $postData['name'];
        $pic = $postData['pic'];

        $conn = getMysqli();
        $sql = "UPDATE playlist SET playlist_description =?, playlist_introduction =?, playlist_name =?, playlist_pic =? WHERE id =?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssssi', $description, $introduction, $name, $pic, $id);
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
        // TODO: Implement deleteById() method.
        $conn = getMysqli();
        $sql = "DELETE FROM playlist WHERE id =?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        return $stmt->execute();
    }
}