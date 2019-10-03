<?php
require_once '../lib/config/const.php';
require_once '../lib/config/database.php';
require_once '../lib/model/User.php';
$user = new User();

if($_POST){
    $data = $_POST['data'];
    if($user->login($data)){
        if($user->isAdmin()){
            header('Location: ./');
        }else{
            header('Location ../movie/list.php');
        }
    }else{
        $login = false;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
        include '../templates/css.php';
        include '../templates/js.php';
    ?>
    <title>Login</title>
</head>
<body>
<?php
    include '../templates/head.php';
    include '../templates/nav.php';
?>
<h1 class="heading">User Login</h1>
<?php if(isset($login) && !$login): ?>
    <p class="err">Login failed! Please check your email and password!</p>
<?php endif; ?>
<form action="" class="form" method="post">
    <div class="form-group">
        <dl>
            <label>Email</label>
            <dd>
                <?php echo $user->form->input('email'); ?>
                <?php echo $user->form->error('email'); ?>
            </dd>
        </dl>
    </div>
    <div class="form-group">
        <dl>
            <label>
                Password
            </label>
            <dd>
                <?php echo $user->form->input('password'); ?>
                <?php echo $user->form->error('password'); ?>
            </dd>
        </dl>
    </div>
    <section>
        <dl>
            <dd>
                <input class="btn btn-success" type="submit" name="submit" value="Login"><br><br>
                <a class="btn btn-primary" href="../customer/register.php">Register</a>
            </dd>
        </dl>
    </section>
</form>
</body>
</html>
