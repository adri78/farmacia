<?php

$DBhost = "localhost";
$DBuser = "root";
$DBpass = "";
$DBname = "farmadb";

/*
$DBhost = "localhost";
$DBuser = "priedad_user";
$DBpass = "Opendb_1";
$DBname = "priedad_bdm";

*/


	try{

        $DBcon = new PDO("mysql:host=$DBhost;dbname=$DBname;",$DBuser,$DBpass);
        $DBcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $DBcon-> exec("SET CHARACTER SET utf8");

    }catch(PDOException $ex){
        die($ex->getMessage());
    }