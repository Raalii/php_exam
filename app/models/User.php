<?php 


class User {
    private int $id;
    private string $email;
    private string $username;

    public function __construct(int $id, string $email, string $username)
    {
        $this->id = $id;
        $this->email = $email;
        $this->username = $username;
    }

    public function __toString() : string
    {
        return "Id : $this->id, email : $this->email, username : $this->username";
    }

    public function getId() : int {
        return $this->id;
    }


    public function getEmail() : string {
        return $this->email;
    }


    public function getUsername() : string {
        return $this->username;
    }


    public function setId(int $id) : void {
        $this->id = $id;
    }


    public function setEmail(string $email) : void {
        $this->email = $email;
    }


    public function setUsername(string $username) : void {
        $this->username = $username;
    }

}