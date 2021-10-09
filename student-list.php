<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;

require_once 'vendor/autoload.php';

//Database connexion with sqlite using PDO 
$pdo = ConnectionCreator::createConnection();

//fetch pega apenas uma linha da tabela, já o fetchAll pega todas as linhas da tabela...
$statement = $pdo->query("SELECT * FROM students;");
$studentDataList = $statement->fetchAll(PDO::FETCH_ASSOC);
$studentList = [];

var_dump($studentDataList); exit();

foreach($studentDataList as $studentData){
    $studentList[] = new Student(
        $studentData['id'], 
        $studentData['name'], 
        new \DateTimeImmutable($studentData['birth_date'])
    );
}

var_dump($studentList);
