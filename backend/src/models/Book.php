<?php

class Book implements JsonSerializable {

    private $id;
    private $name;
    private $author;
    private $year_published;

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }
    
    public function jsonSerialize()
    {
        $vars = get_object_vars($this);
        return $vars;
    }

}