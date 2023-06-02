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
}