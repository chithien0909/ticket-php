<?php
require_once '../lib/config/const.php';
require_once '../lib/config/database.php';
require_once '../lib/model/User.php';

if(!isset($user)){
    $user = new User();
}
?>
<header>
    <div class="logo">
        <img src="../images/film.png" width="45" alt="Logo">
        <h1 class="title">
            Platinum Cineplex
        </h1>
    </div>
    <nav>
        <ul>
            <?php if ($user->isLoggedin()):?>
                <li>
                    <a href="<?php echo BASE_URL; ?>user/logout.php" src="../images/logout.png" width="25">Logout</a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</header>

