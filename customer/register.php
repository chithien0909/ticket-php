<?php
require_once '../lib/config/const.php';
require_once '../lib/config/database.php';
require_once '../lib/model/User.php';

$user = new User();

if ($_POST) {
    $data = $_POST['data'];
    print_r($data);
    $data['User']['created'] = date('Y-m-d H:i:s');
    $data['User']['modified'] = date('Y-m-d H:i:s');

    if ($user->saveLogin($data)) {
        echo "Okkkkkkkkkk";
//        Helper::redirect('movie');
    }
}

?>
<!DOCTYPE html>
<title>User Management</title>
<?php include "../templates/css.php"; ?>
<?php include "../templates/js.php"; ?>
</head>
<body>

<?php include '../templates/head.php'; ?>
<?php include '../templates/nav.php'; ?>

<div class="heading">Customer Register</div>
<form action="" class="form" method="post">
    <div class="form-group">
        <dl>
            <label>
                Email
            </label>
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
    <div class="form-group">
        <dl>
            <label>
                Fullname
            </label>
            <dd>
                <?php echo $user->form->input('fullname'); ?>
                <?php echo $user->form->error('fullname'); ?>
            </dd>
        </dl>
    </div>
    <div class="form-group">
        <dl>
            <lable>
                Address
            </lable>
            <dd>
                <?php echo $user->form->input('address'); ?>
                <?php echo $user->form->error('address'); ?>
            </dd>
        </dl>
    </div>
    <div class="form-group">
        <dl>
            <dd>
                <input class="btn btn-success" type="submit" name="submit" value="Register">
            </dd>
        </dl>
    </div>
</form>

</body>
</html>