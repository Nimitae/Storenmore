<?php

class DBConfig
{
    public static $DB_CONNSTRING;
    public static $DB_USERNAME;
    public static $DB_PASSWORD;
    public static $DB_ADMIN_EMAIL;

    public function __construct()
    {
        self::$DB_CONNSTRING = "mysql:host=127.0.0.1;dbname=storenmore";
        self::$DB_USERNAME = "storenmore";
        self::$DB_PASSWORD = "passwordx";
    }
}

new DBConfig();