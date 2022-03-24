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
        <a href="/logout" class="btn btn-dark">Sair</a>
    </main>
</body>
</html>