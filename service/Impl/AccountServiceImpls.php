<?php

namespace service\Impl;

use mapper\Impl\AccountMapperImpls;

include "./../../mapper/Impl/AccountMapperImpls.php";

class AccountServiceImpls
{
    public static function login($username, $password): ?array
    {
        // TODO: Implement login() method.
        $conn = getMysqli();
        $sql = "SELECT * FROM account where user_name = '$username' and user_password = '$password'";
        return getOne($sql,$conn);
//        return AccountMapperImpls::login($username, $password);
    }
    public static function register($username, $password, $email): bool
    {
        // TODO: Implement login() method.
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
//        return AccountMapperImpls::register($username, $password, $email);
    }
}