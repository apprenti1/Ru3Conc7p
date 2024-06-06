<link rel="stylesheet" href="<?= $baseurl ?>assets/css/login.css">
<div class="container d-flex justify-content-center align-items-center h-100">
        <form action="<?= $baseurl ?>/admin" method="POST">
            <?php
            if (isset($error)){
            ?>
            <div class="alert alert-danger m-0 p-2 text-center">
                <strong>
                    <?= $error ?>
                </strong>
            </div>
            <?php
            }
            ?>
            <div class="form login">
                <input type="text" name="login" id="login" value="<?= (isset($_POST['login']))?$_POST['login']:'' ?>" required>
                <label for="login">E-mail:</label>
                <i></i>
            </div>
            <div class="form pwd">
                <input type="password" name="pwd" id="pwd" value="<?= (isset($_POST['pwd']))?$_POST['pwd']:'' ?>" required>
                <label for="pwd">Mot de passe:</label>
                <i></i>
            </div>
            <div class="signup">
                <input type="submit" value="Connexion">
                <a href="signup.php">Oubli...</a>
            </div>
        </form>
    </div>