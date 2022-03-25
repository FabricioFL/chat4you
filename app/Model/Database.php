<?php

namespace App\Model;

use PDO;

use App\Model\User;

class Database
{
    private $db;

    private function start()
    {
        $this->db = new pdo('mysql:host=localhost;dbname=chat4you', 'dev', '');
        $query = $this->db->prepare('CREATE TABLE IF NOT EXISTS users (
            _id varchar(256) primary key unique not null,
            _username varchar(256) not null unique,
            _email varchar(256) not null unique,
            _password varchar(256) not null
        )')->execute();
    }

    public function appendUser(string $username, string $email, string $password)
    {
        $this->start();
        $query = $this->db->prepare('INSERT IGNORE INTO users
         (_id, _username, _email, _password) VALUES
         (:_id, :_username, :_email, :_password)');
         $query->bindValue(':_id', hash('sha256', time()));
         $query->bindValue(':_username', $username);
         $query->bindValue(':_email', $email);
         $query->bindValue(':_password', $password);
         $query->execute();
    }

    public function checkUser(string $email, string $password)
    {
        $this->start();
        $query = $this->db->prepare('SELECT * FROM users WHERE _email = :_email AND _password = :_password');
         $query->bindValue(':_email', $email);
         $query->bindValue(':_password', $password);
         $query->execute();
         $data = $query->fetch(PDO::FETCH_ASSOC);
         return $data;
    }
}