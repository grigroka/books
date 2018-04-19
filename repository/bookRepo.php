<?php
/**
 * Created by PhpStorm.
 * User: mac3c970e3fc144
 * Date: 4/19/18
 * Time: 6:22 PM
 */

include_once($_SERVER['DOCUMENT_ROOT'] . "database.php");
include_once($_SERVER['DOCUMENT_ROOT'] . "models/Book.php");

class bookRepo
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAll()
    {
        $query = "SELECT `bookId`, `title`, `Authors`.`name`, `year`  FROM `Books` LEFT JOIN `Authors` ON `Books`.`authorId` = `Authors`.`authorId` ORDER BY `title` ASC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $books=[];
        while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
            $obj = new Book();
            $obj->setBookId($row->bookId);
            $obj->setAuthorId($row->name);
            $obj->setTitle($row->title);
            $obj->setYear($row->year);
            $books[] = $obj;
        }
        return $books;
    }

    public function getOne($id)
    {
        $query = "SELECT `bookId`, `title`, `Authors`.`name`, `year`  FROM `Books` LEFT JOIN `Authors` ON `Books`.`authorId` = `Authors`.`authorId` WHERE bookId = ? LIMIT 0,1";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $book = new Book();

        $book->bookId = $row['bookId'];
        $book->authorId = $row['name'];
        $book->title = $row['title'];
        $book->year = $row['year'];

        return $book;
    }
}