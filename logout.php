<?php
require_once("forAllPages.php");

session_destroy();
header('Location: login.php');