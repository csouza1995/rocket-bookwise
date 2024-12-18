<?php

class User
{
    public ?int $id;
    public ?string $name;
    public ?string $surname;
    public ?string $email;
    public ?string $password;

    // fullname
    public function getFullname(): string
    {
        return "$this->name $this->surname";
    }
}
