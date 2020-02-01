<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="assets/css/comum.css">
    <link rel="stylesheet" href="assets/css/icofont.min.css">
    <link rel="stylesheet" href="assets/css/bootstrap/css/bootstrap.min.css">
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
                <div class="form-group">
                    <label for="#email"> Email:
                        <input id="email" type="email" name="email" placeholder="username@email.com" class="form-control" autofocus value = <?= $email ?>>
                    </label>
                </div>
                <div class="form-group">
                    <label for="#password"> Password:
                        <input id="password" type="password" name="password" placeholder="*******" class="form-control">
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