<?php
require_once '../lib/config/const.php';
require_once '../lib/config/database.php';
require_once '../lib/model/User.php';

$user = new User();

$data = $user->findAll();
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
?>

<?php

$user->isAdmin() ? include '../templates/admin_nav.php' : include '../templates/nav.php';
?>
<h1 class="heading">User Management</h1>
<div class="box_table">
    <table>
		<colgroup>
			<col width="25%">
			<col width="20%">
			<col width="20%">
			<col width="35%">
		</colgroup>
		<thead>
			<tr>
				<th>ID</th>
				<th>Email</th>
				<th>Full name</th>
				<th>Address</th>
			</tr>
		</thead>
		<tbody>
			<?php if (!empty($data)) : ?>
				<?php foreach ($data as $item) : $item = $item['User']; ?>
					<tr>
						<td class="center">
							<?php echo date('Y/m/d H:i:s', strtotime($item['created'])); ?>
						</td>
						<td>
							<?php echo $item['email']; ?>
						</td>
						<td>
							<?php echo $item['fullname']; ?>
						</td>
						<td>
							<?php echo $item['address']; ?>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>

</table>
</div>

</body>
</html>

