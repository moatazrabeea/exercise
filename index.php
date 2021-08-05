<?php

require 'vendor/autoload.php';
require_once __DIR__ . '/app/Exercise.php';
\App\Exercise::handleRequest();

//require 'vendor/autoload.php';
//
//use App\SQLiteConnection;
//
//$pdo = (new SQLiteConnection())->connect();
//
//if ($pdo != null)
//    echo "Connected to the SQLite database successfully!";
//else
//    echo "Whoops, could not connect to the SQLite database!";
//
