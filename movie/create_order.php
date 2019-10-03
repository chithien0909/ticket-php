<?php
require_once '../lib/config/const.php';
require_once '../lib/config/database.php';
require_once '../lib/base/Helper.php';
require_once '../lib/model/Movie.php';
require_once '../lib/model/Calendar.php';
require_once '../lib/model/Booking.php';
require_once '../lib/model/User.php';

$booking = new Booking();
$calendar = new Calendar();
$movie = new Movie();
$user = new User();
$id = isset($_GET['id']) ? intval($_GET['id']) : null;
$date = isset($_GET['date']) ? $_GET['date'] : null;
$time = isset($_GET['time']) ? $_GET['time'] : null;
$seats = isset($_GET['seats']) ? $_GET['seats'] : null;
$id_user = $user->getId();
if (empty($id)) {
	Helper::redirect('movie');
}

$code = $booking->verifyCode();
$data = array(
	'Booking' => array(
		'user_id' => $id_user,
		'movie_id' => $id,
		'day' => $date,
		'time' => $time,
		'seat' => $seats,
		'code' => $code,
		'created' => date('Y-m-d H:i:s')
	)
);
$booking->save($data);

echo 'Your confirm code: <b>' . $code . '</b>';