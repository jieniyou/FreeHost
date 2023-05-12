<?php

namespace mapper\Impl;

class AccountMapperImpls
{
    public static function login($username, $password): ?array
    {
        $conn = getMysqli();
        $sql = "SELECT * FROM account where user_name = '$username' and user_password = '$password'";
        return getOne($sql,$conn);
    }
    public static function register($username, $password, $email): bool
    {
        $conn = getMysqli();
        $sql = "SELECT * FROM account where user_name = '$username'";
        $user = getOne($sql,$conn);
        if ('' != $user) return false;
        else {
            $new_conn = getMysqli();
            $insert_sql = "INSERT INTO account (user_name, user_password, user_email)
                           VALUES ('$username', '$password', '$email')";
            return add($insert_sql, $new_conn);
        }
    }
}