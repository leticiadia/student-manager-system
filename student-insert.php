<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;

require_once 'vendor/autoload.php';

//Database connexion with sqlite using PDO 
$pdo = ConnectionCreator::createConnection();

//Database inserting datas in the students table
$student = new Student(
    null, 
    'Tiago Fernandes', 
    new \DateTimeImmutable('1989-07-05')
);

$sqlInsert = "INSERT INTO students (name, birth_date) VALUES (:name, :birth_date);";
$statement = $pdo->prepare($sqlInsert);
$statement->bindValue(':name', $student->name());
$statement->bindValue(':birth_date', $student->birthDate()->format('Y-m-d'));

if($statement->execute()){
    echo "Include student"; 
}
