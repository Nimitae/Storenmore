<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');

define("ALL_CLASS", 1);
define("WARRIOR_CLASS", 2);
define("THIEF_CLASS", 3);
define("MAGICIAN_CLASS", 4);
define("PIRATE_CLASS", 5);
define("BOWMAN_CLASS", 6);

define("AVAILABLE", 1);
define("SOLD", 2);

define("UNLISTED", 1);
define("INSTOCK", 2);
define("NOSTOCK", 3);