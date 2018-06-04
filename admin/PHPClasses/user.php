<?php

/**
 * Created by PhpStorm.
 * User: Marcus Jacobsson
 * Date: 2014-12-18
 * Time: 19:21
 *
 *
 * Se cup.php för kommentarer
 *
 */
class user
{
    var $username;
    var $email;
    var $superAdmin;

    /**
     * @return mixed
     */
    public function getSuperAdmin()
    {
        return $this->superAdmin;
    }

    /**
     * @param mixed $superAdmin
     */
    public function setSuperAdmin($superAdmin)
    {
        $this->superAdmin = $superAdmin;
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
    public function setUsername($username)
    {
        $this->username = $username;
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
    public function setEmail($email)
    {
        $this->email = $email;
    }

}