<?php

//Database connexion with sqlite using PDO 
$databasePath = __DIR__ . '/database.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);

echo 'Conected';

// Creating table students...
$pdo->exec("CREATE TABLE students (id INTERGER PRIMARY KEY, name TEXT, birth_date TEXT);");
