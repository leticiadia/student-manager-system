<?php

namespace Alura\Pdo\Domain\Model;

use DomainException;

class Student
{
    private ?int $id;
    private string $name;
    private \DateTimeInterface $birthDate;

    public function __construct(?int $id, string $name, \DateTimeInterface $birthDate)
    {
        $this->id = $id;
        $this->name = $name;
        $this->birthDate = $birthDate;
    }

    // If a student is created without an identification (id), we can define his id once.
    public function defineId(int $id): void
    {
        if(!is_null($this->id)){
            throw new DomainException("You can only set one id at a time");
        }

        $this->$id = $id;
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    //Here we have the possibility to change the student's name...
    public function changeName(string $newName): void
    {
        $this->name = $newName; 
    }

    public function birthDate(): \DateTimeInterface
    {
        return $this->birthDate;
    }

    public function age(): int
    {
        return $this->birthDate->diff(new \DateTimeImmutable())->y;
    }
}