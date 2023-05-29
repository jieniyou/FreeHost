<?php

namespace entity;

class AccountEntity
{
    private $id;
    private $username;
    private $nickname;
    private $password;
    private $tel;
    private $email;

    /**
     * @param $id
     * @param $username
     * @param $nickname
     * @param $password
     * @param $tel
     * @param $email
     */
    public function __construct($id, $username, $nickname, $password, $tel, $email)
    {
        $this->id = $id;
        $this->username = $username;
        $this->nickname = $nickname;
        $this->password = $password;
        $this->tel = $tel;
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getNickname()
    {
        return $this->nickname;
    }

    /**
     * @param mixed $nickname
     */
    public function setNickname($nickname): void
    {
        $this->nickname = $nickname;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param mixed $tel
     */
    public function setTel($tel): void
    {
        $this->tel = $tel;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): void
    {
        $this->email = $email;
    }

    public function __toString()
    {
        return json_encode([
            'id' => $this->id,
            'username' => $this->username,
            'nickname' => $this->nickname,
            'password' => $this->password,
            'tel' => $this->tel,
            'email' => $this->email,
        ]);
    }


}