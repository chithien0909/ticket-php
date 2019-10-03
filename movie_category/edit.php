<?php
require_once '../lib/config/const.php';
require_once '../lib/config/database.php';
require_once '../lib/model/MovieCategory.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : null;
if(empty($id)){
    Helper::redirect('movie_category');
}
$movieCategory = new MovieCategory();
$movieCategory->findById($id);
$success = false;
if($_POST){
    $data = $_POST['data'];
    $data['MovieCategory']['modified'] = date('Y-m-d H:i:s');
    if($movieCategory->save($data)){
        header('Location: index.php');
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include '../templates/css.php'?>
    <?php include '../templates/js.php'?>
    <title>Movie Category</title>
</head>
<body>
<?php include '../templates/head.php'; ?>
<?php include '../templates/nav.php'; ?>
<h1 class="heading">Movie Category Create</h1>
<form action="" class="form" method="post">
    <div class="form-group">

        <?php echo $movieCategory->form->input('id'); ?>
        <dl>
            <dt>
                Title
            </dt>
            <dd>
                <?php echo $movieCategory->form->input('title'); ?>
                <?php echo $movieCategory->form->error('title'); ?>
            </dd>
        </dl>
    </div>
    <section>
        <dl>
            <dd>
                <input  type="submit" name="submit" value="Update" class="btn btn-success">
            </dd>
        </dl>
    </section>
</form>
</body>
</html>
