<?php

interface Repository{
    public function findAll() : array;
    public function findById(int $id) : object;
    public function save(object $model) : bool;
    public function delete(int $id) : bool;
}