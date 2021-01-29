<?php

class DbUtils
{
    public static function getDB()
    {
        static $dbConnection = null;
        if($dbConnection === null){
            $dbConnection = new PDO(getenv("DB_DNS").";", getenv("DB_USER"), getenv("DB_PASS"));
        }
        return $dbConnection;
    }
}