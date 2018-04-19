<?php

class Author
{
    private $conn;

    public $authorId;
    public $name;

    public function __construct($db)
    {
        $this->conn = $db;
    }
}
