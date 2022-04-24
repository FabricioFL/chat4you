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
            <?php
                echo '
                <section class="d-flex justify-content-center pt-3" id="alert-welcome">
                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <p class="lead">Welcome '.$_SESSION['username'].' 🖤</p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </section>';
            ?>
        <aside class="left-panel">
            <img src="<?php echo $_SESSION['image']; ?>" class="rounded-circle w-50 mx-auto mt-3" alt="Profile">
            <h2 class="lead text-light mx-auto mt-3"><?php echo $_SESSION['username']; ?></h2>
            <button type="button" class="btn-transparent" data-bs-toggle="modal" data-bs-target="#notificationsModal"
            ><img src="../../images/notify.png" class="mx-auto my-3 menu-option" title="Notifications"></button>
            <button type="button" class="btn-transparent" data-bs-toggle="modal" data-bs-target="#messagesModal"
            ><img src="../../images/message.png" class="mx-auto my-3 menu-option" title="Messages"></button>
            <a href="/logout" class="btn btn-secondary text-center btn-logout">Logout</a>
        </aside>
        <?php
            $_SESSION['notificationsIndexes'] = [];
            for($i = 0; $i <= count($_SESSION['notifications']); $i++)
            {
                if(count($_SESSION['notifications']) != 1)
                {
                echo '
                    <div class="modal" id="notificationsModal">
                        <div class="modal-dialog modal-fullscreen">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="notificationTitle">Notifications</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                            <div class="modal-body">
                                <div class="row p-3"><button class="col mx-auto lead notification-title btn-transparent" data-bs-toggle="modal" data-bs-target="#notificationsOnModal">'.$_SESSION['notifications'][$i]['_title'].'</button></div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    ';
                echo '<div class="modal" id="notificationsOnModal">
                        <div class="modal-dialog modal-fullscreen">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="notificationOnTitle">'.$_SESSION['notifications'][$i]['_title'].'</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                            <div class="modal-body">
                                <p class="lead">'.$_SESSION['notifications'][$i]['_content'].'</p>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#notificationsModal">Back</button>
                                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>';
                    }
            }
            if($_SESSION['notifications'] != null && count($_SESSION['notifications']) <= 1)
            {
                echo '                    
                <div class="modal" id="notificationsModal">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="notificationTitle">Notifications</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                    <div class="modal-body">
                            <p class="lead text-center">Nothing here!</p>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
            }
        ?>
                <?php
            $_SESSION['notificationsIndexes'] = [];
            for($i = 0; $i <= count($_SESSION['messages']); $i++)
            {
                if(count($_SESSION['messages']) != 1)
                {
                echo '
                    <div class="modal" id="messagesModal">
                        <div class="modal-dialog modal-fullscreen">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="messageTitle">Messages</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                            <div class="modal-body">
                                <div class="row p-3">
                                    <button class="col mx-auto lead notification-title btn-transparent" data-bs-toggle="modal" data-bs-target="#messagesOnModal">'.$_SESSION['messages'][$i]['_content'].'</button>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    ';
                echo '<div class="modal" id="notificationsOnModal">
                        <div class="modal-dialog modal-fullscreen">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="notificationOnTitle">'.$_SESSION['notifications'][$i]['_title'].'</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                            <div class="modal-body">
                                <p class="lead">'.$_SESSION['notifications'][$i]['_content'].'</p>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#notificationsModal">Back</button>
                                            <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>';
                    }
            }
            if($_SESSION['notifications'] != null && count($_SESSION['notifications']) <= 1)
            {
                echo '                    
                <div class="modal" id="notificationsModal">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="notificationTitle">Notifications</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                    <div class="modal-body">
                            <p class="lead text-center">Nothing here!</p>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';
            }
        ?>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>