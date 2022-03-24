<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/custom.css">
    <link rel="icon" type="image/png" href="../../images/google-chat.png">
    <script src="https://js.hcaptcha.com/1/api.js" async defer></script>
    <script src="../../js/sign.js" defer></script>
    <script src="../../js/formValidation.js" defer></script>
    <?php
        include_once '../../../app/Controller/auth.php';
    ?>
</head>
<body>
    <main>
        <section class="container mt-5" id="signin">
        <h2 class="display-6 mt-5 mb-5">Sign in</h2>
        <form method="POST">
            <div class="mb-3">
                <label for="Email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="Email" id="Email" required>
            </div>
            <div class="mb-3">
                <label for="Password" class="form-label">Password</label>
                <input type="password" class="form-control" name="Password" id="Password" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember me</label>
            </div>
            <div>
                <button type="submit" class="btn btn-dark">Sign in</button>
                <button class="btn btn-dark" type="button" onclick="switchFormStatus()">don't have a account yet? click here</button>
            </div>
        </form>
        </section>
        <section class="container mt-5" id="signup">
            <h2 class="display-6 mt-5 mb-5">Sign up</h2>
            <form method="POST">
                <div class="mb-3">
                    <label for="UsernameReg" class="form-label">Username</label>
                    <input type="text" class="form-control" id="UsernameReg" name="UsernameReg" required>
                </div>
                <div class="mb-3">
                    <label for="EmailReg" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="EmailReg" name="EmailReg" required>
                </div>
                <div class="mb-3">
                    <label for="PasswordReg" class="form-label">Password</label>
                    <input type="password" class="form-control" id="PasswordReg" name="PasswordReg" required>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="acceptPrivacyTerms">
                    <label class="form-check-label" for="exampleCheck1">I accept the privacy terms</label>
                </div>
                <div class="h-captcha" data-sitekey="800b4d14-972e-48ac-92c9-4863ed6ce51c"></div>
                <div>
                    <button type="submit" class="btn btn-dark">Sign up</button>
                    <button class="btn btn-dark" type="button" onclick="switchFormStatus()">already have an account? click here</button>
                </div>
            </form>
        </section>
        <section class="container d-flex justify-content-start mt-5">
            <a href="/"><button class="btn btn-dark">Back to home</button></a>
        </section>
    </main>
</body>
</html>