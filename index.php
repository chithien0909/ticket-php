<?php
require_once "./lib/config/const.php";
require_once "./lib/config/database.php";
require_once "./lib/model/User.php";
$user = new User();

if($user->isLoggedin()) {

    if($user->isAdmin()){
        header('Location: ./');
    }else{
        header('Location ../movie/list.php');
    }
}