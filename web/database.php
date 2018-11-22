<?php
$host = '127.0.0.1';
$db = 'task';
$user = 'root';
$pass = 'root';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    \PDO::ATTR_EMULATE_PREPARES => false,
];

$parameters = array();
array_push($parameters, ['dns' => $dsn, 'user' => $user, 'pass' => $pass, 'opt' => $opt]);
return $parameters;