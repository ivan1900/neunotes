
<body class="gray-bg">
<?=\Config\Services::validation()->listErrors();?>

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name"><?= $langMap['enpro']; ?></h1>

            </div>
            <h3><?= $langMap['welcome']; ?></h3>
            <p>
            <?php if($exception != "") :?>
                <div class="alert alert-danger">
                    <?=$exception?>
                </div>
            <?php endif; ?>
            </p>
            <p><?= $langMap['login_do']; ?></p>
            <form class="m-t" role="form" action="/login/signUp" method="post">
                <div class="form-group">
                    <input name="user" type="text" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <input name="pass" type="password" class="form-control" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                <a href="#"><small><?= $langMap['forget_pass']; ?></small></a>

            </form>
            <p class="m-t"> <small><?= $langMap['slogan']; ?></small> </p>
        </div>
    </div>
