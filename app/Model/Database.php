<?php

namespace App\Model;

use PDO;

use App\Model\User;

class Database
{
    private static pdo $connect = new pdo('mysql:host = localhost; dbname = chat4you', 'dev', '');

    protected static function __construct()
    {
        $query = self::$connect->prepare('CREATE TABLE IF NOT EXISTS users
        (
            _id varchar(64) primary key not null,
            _username varchar(128) unique not null,
            _email varchar(256) unique not null,
            _password varchar(64) not null,
            _lastsee varchar(15) not null,
        )');
        $query->execute();
    }

    protected function appendUser(string $username, string $email, string $password, string $time)
    {
        $user = new User($username, $email, $password);
        $user->setLastSee($time);
        $query = self::$connect->prepare('INSERT INTO users (_id, _username, _email, _password, _lastsee) VALUES
         (:_id, :_user, :_email, :_password, :_lastsee)');

    }
}