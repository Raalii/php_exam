<?php


class User
{
    private int $id;
    private string $email;
    private string $username;
    private string $type;

    public function __construct(int $id, string $email, string $username, string $type)
    {
        $this->id = $id;
        $this->email = $email;
        $this->username = $username;
        $this->type = $type;
    }

    public function __toString(): string
    {
        return "Id : $this->id, email : $this->email, username : $this->username, type : $this->type";
    }

    public function getId(): int
    {
        return $this->id;
    }


    public function getEmail(): string
    {
        return $this->email;
    }


    public function getUsername(): string
    {
        return $this->username;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }


    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }


    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }


    public function setUsername(string $username): self
    {
        $this->username = $username;
        return $this;
    }
}
