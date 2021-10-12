<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;
use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;

require_once 'vendor/autoload.php';

$connection = ConnectionCreator::createConnection();
$studentRepository = new PdoStudentRepository($connection);


$connection->beginTransaction();

$aStudent = new Student(
    null, 
    'Rafael Garcia', 
    new DateTimeImmutable('1999-10-23')
);

$studentRepository->save($aStudent);

$anotherStudent = new Student(
    null, 
    'Fernanda Dias', 
    new DateTimeImmutable('2000-12-21')
);

$studentRepository->save($anotherStudent);

// commit is used for finished the programmer...
$connection->commit();