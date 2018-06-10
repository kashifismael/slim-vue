<?php

class BookDAO implements DAO {

    private $tablename = "books";
    private $connection;
    
    public function __construct(){
        $this->connection = DB::getInstance();
    }

    public function save($book){
        $sql = "INSERT INTO $this->tablename (name, author, year_published)
                VALUES (:name, :author, :year_published)";
        $stmt = $this->connection->getConnection()->prepare($sql);
        $insert = $stmt->execute([
            ':name' => $book->name,
            ':author' => $book->author,
            ':year_published' => $book->year_published
        ]);
        if($insert === true){
            $book->id = $this->connection->getLastInsertID();
            return $book;
        } else {
            return new Book();
        }
    }

    public function findAll(){
        $sql = "SELECT * FROM $this->tablename";
        $stmt = $this->connection->getConnection()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, "Book");
    }

    public function update($book){
        $sql = "UPDATE $this->tablename SET name = :name, author = :author, 
                year_published = :yearpub WHERE id = :id";
        $stmt = $this->connection->getConnection()->prepare($sql);
        return $stmt->execute([
            ':id' => $book->id,
            ':name' => $book->name,
            ':author' => $book->author,
            ':yearpub' => $book->year_published
        ]);
    }

    public function remove($book){
        $sql = "DELETE FROM $this->tablename WHERE id = ?";
        $stmt = $this->connection->getConnection()->prepare($sql);
        return $stmt->execute([$book->id]);
    }

    public function findOneById($id){
        $sql = "SELECT * FROM $this->tablename WHERE id = ?";
        $stmt = $this->connection->getConnection()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetchObject("Book");
    }

}