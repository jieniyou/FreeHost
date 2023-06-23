<?php

namespace mapper;

include "PlayListMapper.php";

class PlayListMapperImpl implements PlayListMapper
{
    const baseSelect = "SELECT * FROM playlist";

    public static function queryAll(): ?array
    {
        // TODO: Implement queryAll() method.
        $conn = getMysqli();
        $sql = self::baseSelect;
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
        $sql = self::baseSelect." WHERE id in (select playlist_id from account_playlist where account_id = ?)";
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

    public static function insert($postData, $userId): bool
    {
        // TODO: Implement insert() method.

        /**
         * 获取随机 15 位
         */
        $uid = self::getUid();

        $conn = getMysqli();
        $sql = "INSERT INTO playlist (id, playlist_description, playlist_introduction, playlist_name, playlist_pic) VALUES (?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('issss', $uid, $postData['description'], $postData['introduction'], $postData['name'], $postData['pic']);
        $stmt->execute();

        $result = $stmt->affected_rows;
        $stmt->close();

        $data = [
            'uid' => $uid,
           'userId' => $userId,
        ];
        if ($userId !==null) self::insertMyCreate($data);

        if ($result > 0) return true;
        else return false;
    }

    public static function update($postData): bool
    {
        // TODO: Implement update() method.

        $conn = getMysqli();
        $sql = "UPDATE playlist SET playlist_description =?, playlist_introduction =?, playlist_name =?, playlist_pic =? WHERE id =?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssss', $postData['description'], $postData['introduction'], $postData['name'], $postData['pic'], $postData['id']);
        $stmt->execute();

        $result = $stmt->affected_rows;
        $stmt->close();

        if ($result > 0) return true;
        else return false;
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

    const commonMySql = "SELECT * FROM playlist WHERE id in (select playlist_id from account_playlist where account_id = ? and create_id";
    public static function queryMyCollection($id): ?array
    {
        // TODO: Implement queryMyCollection() method.
        $sql = self::commonMySql." != ?)";

        return self::queryCommon($sql, $id);
    }

    public static function queryMyCreate($id): ?array
    {
        // TODO: Implement queryMyCreate() method.
        $sql = self::commonMySql." = ?)";
        return self::queryCommon($sql, $id);

    }

    public static function queryCommon($sql, $userId): ?array
    {
        $conn = getMysqli();
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ii', $userId, $userId);
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

    const commonMyInsertSql = "INSERT INTO account_playlist (account_id, playlist_id, create_id) VALUES (?,?,?)";
    public static function insertMyCreate($data): bool
    {
        $conn = getMysqli();
        $sql = self::commonMyInsertSql;
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('iii', $data['userId'], $data['uid'], $data['userId']);
        $stmt->execute();

        $result = $stmt->affected_rows;
        $stmt->close();

        if ($result > 0) return true;
        else return false;
    }

    public static function insertMyCollection($postData): bool
    {
        // TODO: Implement insertMyCollection() method.
        $conn = getMysqli();
        $sql = self::commonMyInsertSql;
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('iii', $postData['userId'], $postData['id'], $postData['createId']);
        $stmt->execute();

        $result = $stmt->affected_rows;
        $stmt->close();

        if ($result > 0) return true;
        else return false;
    }

    private static function getUid(): string
    {
        $uid = uniqid(); // 生成默认长度为13的ID
        $uid = hexdec(substr(md5($uid . uniqid()), 0, 15)); // 将ID转换为16进制并截取其中15个字符，再转换为10进制整数
        // 将10进制整数转换为无符号整数（unsigned integer）
        return sprintf('%u', $uid);
    }

    public static function delMyCreate($postData): bool
    {
        // TODO: Implement delMyCreate() method.
        $b = self::deleteById($postData['id']);
        if ($b) {
            $conn = getMysqli();
            $sql = "DELETE FROM account_playlist WHERE playlist_id = ? and create_id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ii', $postData['id'], $postData['userId']);
            return $stmt->execute();
        }
        return false;
    }

    public static function queryCreator($id): ?array
    {
        // TODO: Implement queryCreator() method.
        $conn = getMysqli();
        $sql = "SELECT user_nickname FROM account WHERE id = (SELECT create_id FROM account_playlist WHERE playlist_id = ? LIMIT 1)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
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