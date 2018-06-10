<?php

interface DAO {

    public function save($object);

    public function findAll();

    public function update($object);

    public function remove($object);

    public function findOneById($id);

}