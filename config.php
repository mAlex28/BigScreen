<?php

    $db_user = 'root';
    $db_pass = '';
    $db_name = 'Big_Screen';

    // password reset valid for 300 seconds
    $prvalid = 300;

    $db = new PDO('mysql:host=localhost;dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
