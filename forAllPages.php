<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');

define("UPLOADED_UNLISTED", 1);
define("UPLOADED_LISTED", 2);
define("UPLOADED_DELETED", 3);