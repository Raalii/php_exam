<?php


// Double inherit is not possible in php
class Post_User extends Post
{
    private string $email;
    private string $username;
    private string $type;

    
    public function __construct(int $idArticle, string $title, string $description, string $dateOfPost, int $idUser, string $image, string $email, string $username, string $type)
    {
        parent::__construct($idArticle, $title, $description, $dateOfPost, $idUser, $image);
        $this->username = $username;
        $this->email = $email;
        $this->type = $type;
    }


    public function __toString(): string
    {
        return parent::__toString() . ", fait par : $this->username, grade : $this->type, email : $this->email, ID_USER : $this->idUser ";
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
