<?php

require_once(dirname(__FILE__).DS. "../base/AppModel.php");
require_once(dirname(__FILE__).DS. "../base/Helper.php");

class Booking extends AppModel{
  protected $table = 'booking';
  protected $alias = 'Booking';

  public function __construct() {
    parent::__construct();
  }
  public function verifyCode() {
    $chars = 'abcdefghijklmnopqrstuv0123456789';
    $length = strlen($chars);
    $code = array();

    for($i = 0;$i< 5;$i++){
      $idx = rand() % $length;
      $code[] = strtoupper($chars[$idx]);
    }
    return implode('', $code);
  }
}