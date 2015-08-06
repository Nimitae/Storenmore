<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');

define("UPLOADED_UNLISTED", 1);
define("UPLOADED_LISTED", 2);
define("UPLOADED_DELETED", 3);

define("BUY_ORDER_TYPE", 1);
define("SELL_ORDER_TYPE", 2);

define("TAG_TYPE_SET", 1);
define("TAG_TYPE_CLASS", 2);
define("TAG_TYPE_WEAPON", 3);
define("TAG_TYPE_ARMORS", 4);

define("CONTACT_TYPE_EMAIL",1);
define("CONTACT_TYPE_PHONE",2);
define("CONTACT_TYPE_IGN",3);

