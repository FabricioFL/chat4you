<?php
        require_once 'SignController.php';
        require_once __DIR__.'../../../vendor/autoload.php';
        use \App\Controller\SignController;
        $sign = new SignController();
        $sign->Append();
        if($_POST['UsernameReg'] == null && $_POST['EmailReg'] == null && $_POST['PasswordReg'] == null)
        {
            $sign->login();
        }
        $sign->redirect();