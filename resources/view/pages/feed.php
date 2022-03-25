<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat 4you | feed</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/custom.css">
    <link rel="icon" type="image/png" href="../../images/google-chat.png">
    <script src="https://js.hcaptcha.com/1/api.js" async defer></script>
    <?php
        session_start();
        if($_SESSION['login'] != true)
        {
            header('location: signin.php');
        }
    ?>
</head>
<body>
    <main>
        <aside class="left-panel">
            <img src="<?php echo $_SESSION['image']; ?>" class="rounded-circle w-50 mx-auto mt-3" alt="Profile">
            <h2 class="lead text-light mx-auto mt-3"><?php echo $_SESSION['username']; ?></h2>
            <img src="../../images/notify.png" class="mx-auto my-3 menu-option" title="Notificações">
            <img src="../../images/message.png" class="mx-auto my-3 menu-option" title="Mensagens">
            <a href="/logout" class="btn btn-secondary text-center btn-logout">Sair</a>
        </aside>
        <?php
            echo '
            <section class="d-flex justify-content-center pt-3">
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <p class="lead">Bem-vindo(a) '.$_SESSION['username'].' 🖤</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </section>';
        ?>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>