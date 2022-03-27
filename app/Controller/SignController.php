<?php

namespace App\Controller;
require_once __DIR__.'../../../vendor/autoload.php';
use \App\Model\Database;
session_start();

class SignController
{
    public function Append()
    {
        if($_POST['UsernameReg'] != null && $_POST['EmailReg'] != null && $_POST['PasswordReg'] != null)
        {
            $db = new Database();
            $db->appendUser($_POST['UsernameReg'], $_POST['EmailReg'], $_POST['PasswordReg']);
        }
    }

    public function login()
    {
        $db = new Database();
        if($_POST != null)
        {
            $userData = $db->checkUser($_POST['Email']);
            if($userData != null && password_verify($_POST['Password'], $userData['_password']) == true)
            {
                $_SESSION['image'] = '../../images/user-image.png';
                $_SESSION['username'] = $userData['_username'];
                $_SESSION['email'] = $userData['_email'];
                $_SESSION['notifications'] = $db->userHasNotification($userData['_username'])? $db->userHasNotification($userData['_username']): ['nothing now'];
                $_SESSION['messages'] = $db->userHasNotification($userData['_username']) ? $db->userHasNotification($userData['_username']) : ['nothing now'];
                $_SESSION['login'] = true;
                return ;
            }else if($_POST != null && $userData == null)
            {
                echo '<div class="alert alert-danger">Email ou senha incorretos</div>';
            }
            $_SESSION['login'] = false;
        }
    }

    public function redirect()
    {
        if($_SESSION['login'] == true)
        {
            header('location: ../../view/pages/feed.php');
        }
    }
}