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
            _id varchar(256) unique not null,
            _username varchar(256) not null unique,
            _email varchar(256) not null unique,
            _password varchar(256) not null,
            _image text,
            primary key (_id)
        )')->execute();

        $notifications = $this->db->prepare('CREATE TABLE IF NOT EXISTS notifications (
            _id bigint auto_increment,
            _owner varchar(256) not null,
            _title varchar(256) not null,
            _content text not null,
            primary key (_id),
            foreign key (_owner) references users(_username)
          )')->execute();

        $messages = $this->db->prepare('CREATE TABLE IF NOT EXISTS messages (
            _id bigint auto_increment,
            _author varchar(256) not null,
            _receiver varchar(256) not null,
            _content text not null,
            primary key (_id),
            foreign key (_author) references users(_username)
          )')->execute();

        $posts = $this->db->prepare('CREATE TABLE IF NOT EXISTS posts (
            _id bigint auto_increment,
            _owner varchar(256) not null,
            _title varchar(256) not null,
            _content text not null,
            primary key (_id),
            foreign key (_owner) references users(_username)
        )')->execute();

        $comments = $this->db->prepare('CREATE TABLE IF NOT EXISTS comments (
            _id bigint auto_increment,
            _author varchar(256) not null,
            _replyto varchar(256),
            _content text not null,
            primary key (_id),
            foreign key (_author) references users(_username)
        )')->execute();

        $friends = $this->db->prepare('CREATE TABLE IF NOT EXISTS friends (
            _id bigint auto_increment,
            _owner varchar(256) not null unique,
            _relation text not null,
            _status boolean,
            _lastsee varchar(256) not null,
            primary key (_id),
            foreign key (_owner) references users(_username)
        )')->execute();

        $stories = $this->db->prepare('CREATE TABLE IF NOT EXISTS stories (
            _id bigint auto_increment,
            _owner varchar(256) not null unique,
            _content text not null,
            _seecount bigint,
            primary key (_id),
            foreign key (_owner) references users(_username)
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
         $query->bindValue(':_password', password_hash($password, PASSWORD_ARGON2I));
         $query->execute();
    }

    public function checkUser(string $email)
    {
        $this->start();
        $query = $this->db->prepare('SELECT * FROM users WHERE _email = :_email');
         $query->bindValue(':_email', $email);
         $query->execute();
         $data = $query->fetch(PDO::FETCH_ASSOC);
         return $data;
    }

    public function userHasNotification(string $username)
    {
        $query = $this->db->prepare('SELECT * FROM notifications INNER JOIN users ON notifications._owner = users._username
        where users._username = :_username');
        $query->bindValue(':_username', $username);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        if($data != null)
        {
            return $data;
        }
        return false;
    }

    public function userHasmessage(string $username)
    {
        $query = $this->db->prepare('SELECT * FROM messages INNER JOIN users ON messages._author = users._username
        where users._username = :_username');
        $query->bindValue(':_username', $username);
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_ASSOC);
        if($data != null)
        {
            return $data;
        }
        return false;
    }

    public function setUserStatus()
    {
        //
    }

    public function setUserStories()
    {
        //
    }

    public function addRelationship()
    {
        //
    }
}