<?php

namespace App\Model;

class User
{
    private string $Id;

    private string $Username;

    private string $Email;

    private string $Password;

    private bool $IsUserOnline;

    private array $Notifications;

    private string $lastSee;


    public function createUser(string $username, string $email, string $password)
    {
        $this->Id = hash('Bcrypt', time());
        $this->Username = $username;
        $this->Email = $email;
        $this->Password = $password;
    }

    public function getUserId()
    {
        return $this->Id;
    }

    public function getUsername()
    {
        return $this->Username;
    }

    public function getUserEmail()
    {
        return $this->Email;
    }

    public function getUserPassword()
    {
        return $this->Password;
    }

    public function getLastSee()
    {
        return $this->lastSee;
    }

    public function getStatus()
    {
        return $this->IsUserOnline;
    }

    public function setUserStatus(bool $userStatus)
    {
        $this->IsUserOnline = $userStatus;
    }

    public function setLastSee(string $time)
    {
        $this->lastSee = $time;
    }

}