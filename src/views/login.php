<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="assets/css/comum.css">
    <link rel="stylesheet" href="assets/css/icofont.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,500,600,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/login.css">

    <title>LUPE</title>

</head>

<body>

    <form class="form-login" action="#" method="POST">
        <div class="login-card card">
            <div class="card-header">
                <i class="icofont-travelling"></i>
                <span class="font-weight-light">Lived</span>
                <span class="font-weight-bold">UP</span>
                <span class="font-weight-light">Ponto Eletrônico</span>
                <i class="icofont-runner-alt-1"></i>
            </div>
            <div class="card-body">
                <?php

                include_once(VIEW_PATH . "/template/messages.php"); ?>
                <div autofocus class="form-group">
                    <label for="#email"> Email:</label>
                    <input id="email" type="email" name="email" placeholder="username@email.com" class="form-control 
                    <?php
                    if ($exception !== null) {
                        if ($exception->get('email') !== null) {
                            echo 'is-invalid';
                        } else {
                            '';
                        }
                    }
                    ?>" value=<?= $email ?>>
                    <div class="invalid-feedback">
                        <?php
                        if ($exception !== null) {
                            echo $exception->get('email');
                        }
                        ?>
                    </div>

                </div>
                <div class="form-group">
                    <label for="#password"> Password:
                        <input id="password" type="password" name="password" placeholder="*******" class="form-control 
                        <?php
                        if ($exception !== null) {
                            if ($exception->get('password') !== null) {
                                echo 'is-invalid';
                            } else {
                                '';
                            }
                        }
                        ?>">
                        <div class="invalid-feedback">
                            <?php
                            if ($exception !== null) {
                                echo $exception->get('password');
                            }
                            ?>
                        </div>
                    </label>
                </div>

            </div>
            <div class="card-footer">
                <button class="btn btn-outline-primary btn-sm">Login</button>
            </div>
        </div>

    </form>

</body>

</html>