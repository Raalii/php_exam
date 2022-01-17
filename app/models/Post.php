<?php 




class Post {
    protected int $idArticle;
    protected string $title;
    protected string $description;
    protected string $dateOfPost;
    protected int $idUser;

    
    public function __construct(int $idArticle, string $title, string $description, string $dateOfPost, int $idUser)
    {
        $this->idArticle = $idArticle;
        $this->title = $title;
        $this->description = $description;
        $this->dateOfPost = $dateOfPost;
        $this->idUser = $idUser;
    }


    public function __toString() : string
    {
        return "titre : $this->title, descrpition : $this->description, date : $this->dateOfPost";
    }

    /**
     * Get the value of idUser
     */ 
    public function getIdUser() : int
    {
        return $this->idUser;
    }

    /**
     * Set the value of idUser
     *
     * @return  self
     */ 
    public function setIdUser($idUser) : self
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get the value of dateOfPost
     */ 
    public function getDateOfPost() : string
    {
        return $this->dateOfPost;
    }

    /**
     * Set the value of dateOfPost
     *
     * @return  self
     */ 
    public function setDateOfPost($dateOfPost) : self
    {
        $this->dateOfPost = $dateOfPost;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription() : string
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description) : self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of title
     */ 
    public function getTitle() : string
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */ 
    public function setTitle($title) : self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of idArticle
     */ 
    public function getIdArticle() : int
    {
        return $this->idArticle;
    }

    /**
     * Set the value of idArticle
     *
     * @return  self
     */ 
    public function setIdArticle($idArticle) : self
    {
        $this->idArticle = $idArticle;

        return $this;
    }
}