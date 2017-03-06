<?php
    /*
        Editable Area Start
        Only edit lines 7,9,10,11
    */
    
    $SQL_DATABASE_NAME     = "blankbox";
    
    $USER_TABLE_ADMINNAME  = "zac";
    $USER_TABLE_ADMINPASS  = "zac";
    $USER_TABLE_ADMINEMAIL = "zac@test.com";
    
    /*
        Editable Area Finish
        Do NOT edit anything after this line
    */
    require_once("utilities/connect.php");
    global $connection;
    
    if ($SQL_DATABASE_NAME != "") {
        $SQL_DATABASE_QUERY_DEC = "CREATE DATABASE ".$SQL_DATABASE_NAME.";";
        $SQL_DATABASE_QUERY = $connection->query($SQL_DATABASE_QUERY_DEC);
    }
    $SQL_QUERY_USE_DB_DEC = "USE ".$SQL_DATABASE_NAME.";";
    $SQL_QUERY_USE_DB = $connection->query($SQL_QUERY_USE_DB_DEC);
    
    $SQL_QUERY_CREATE_USER_TABLE_DEC = "CREATE TABLE USERS(UserID int AUTO_INCREMENT PRIMARY KEY, Username varchar(64) NOT NULL, UserPassword varchar(32) NOT NULL, UserEmail varchar(64) NOT NULL);";
    $SQL_QUERY_CREATE_USER_TABLE = $connection->query($SQL_QUERY_CREATE_USER_TABLE_DEC);
    
    if(($USER_TABLE_ADMINNAME != "")
    && ($USER_TABLE_ADMINPASS != ""
    && ($USER_TABLE_ADMINEMAIL != ""))) {
        $USER_TABLE_ADMINNAME = strtolower($USER_TABLE_ADMINNAME);
        $SQL_QUERY_INSERT_DATA_DEC = "INSERT INTO USERS (Username, UserPassword, UserEmail) VALUES ('$USER_TABLE_ADMINNAME','".md5($USER_TABLE_ADMINPASS)."','".$USER_TABLE_ADMINEMAIL."');";
        $SQL_QUERY_INSERT_DATA = $connection->query($SQL_QUERY_INSERT_DATA_DEC);
        if($SQL_QUERY_INSERT_DATA) {
            echo "Installation Successful. Refer back to the README for the next step.";
        }
    }
?>
