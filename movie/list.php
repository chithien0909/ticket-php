<?php

require_once '../lib/config/const.php';
require_once '../lib/config/database.php';
require_once '../lib/model/Movie.php';
require_once '../lib/base/Session.php';

$movie = new Movie();
$today = date('Y-m-d H:i:s', strtotime('-1 days'));
$data = $movie->find(array(
  'conditions' => array(
    'open_date <' => $today,
    'is_public' => 1
  ),
  'joins' => array(
    'movie_category' => array(
      'type' => 'INNER',
      'main_key' => 'category_id',
      'join_key' => 'id'
    )
  )
), 'all');
?>
<!DOCTYPE html>
<title>Movie Showing</title>
<?php include "../templates/css.php"; ?>
<?php include "../templates/js.php"; ?>
</head>
<body>

<?php 

include '../templates/head.php'; 
$user->isAdmin() ? include '../templates/admin_nav.php' : include '../templates/nav.php';


?>

<div class="heading">Movies Showing</div>
<div class="box_list">
	
	<ul class="con_movie">
		<?php if (!empty($data)) :
			$country = unserialize(M_COUNTRY);
		?>
			<?php foreach ($data as $index => $_item) : $item = $_item['Movie']; ?>
				<li class="box_movie <?php echo $index % 2 == 1 ? 'odd' : ''; ?>">
					<div class="detail_l">
						<p>
							<a href="detail.php?id=<?php echo $item['id']; ?>">
								<img alt="Image" src="<?php echo $item['image']; ?>">
							</a>
						</p>
					</div>
					<div class="detail_r">
						<p class="title"><a href="detail.php?id=<?php echo $item['id']; ?>"><?php echo $item['title']; ?></a></p>
						<div class="txt">
							<p class="info"><a href="calendar_view.php?id=<?php echo $item['id']; ?>"><img src="../images/send.png" /> Đặt vé</a></p>
							<p class="info"><span>Khởi chiếu:</span> <?php echo date('Y-m-d', strtotime($item['open_date'])); ?></p>
							<p class="info"><span>Đạo diễn:</span> <?php echo $item['director']; ?></p>
							<p class="info"><span>Diễn viên:</span> <?php echo $item['actor']; ?></p>
							<p class="info"><span>Thời lượng:</span> <?php echo $item['duration']; ?> phút</p>
							<p class="info"><span>Thể loại:</span> <?php echo $_item['movie_category']['title']; ?></p>
							<p class="info"><?php echo $item['description']; ?></p>
							
							<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $item['trial_url'];?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						</div>
					</div>
				</li>
			<?php endforeach; ?>
		<?php else: ?>
			There is no movie at the moment. <a href="create.php">Create a movie</a> now !
		<?php endif; ?>
	</ul>
</div>

</body>
</html>