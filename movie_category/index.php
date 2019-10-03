<?php
require_once '../lib/config/const.php';
require_once '../lib/config/database.php';
require_once '../lib/model/MovieCategory.php';
require_once '../lib/model/User.php';

$category = new MovieCategory();

$data= $category->findAll();
?>
<!DOCTYPE html>
<title>Movie Category Management</title>
<?php include "../templates/css.php"; ?>
<?php include "../templates/js.php"; ?>
</head>
<body>

<?php include '../templates/head.php'; ?>
<?php

$user->isAdmin() ? include '../templates/admin_nav.php' : include '../templates/nav.php';
?>

<div class="heading">Movie Categories Management</div>
<div class="box_table">
	<table>
		<colgroup>
			<col width="10%">
			<col width="70%">
			<col width="20%">
		</colgroup>
		<thead>
			<tr>
				<th>ID</th>
				<th>Title</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php if (!empty($data)) : ?>
				<?php foreach ($data as $item) : $item = $item['MovieCategory']; ?>
					<tr>
						<td class="center">
							<?php echo $item['id']; ?>
						</td>
						<td>
							<?php echo $item['title']; ?>
						</td>
						<td class="center">
							<a href="edit.php?id=<?php echo $item['id']; ?>" class="popup active">Edit</a>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>
</div>

</body>
</html>