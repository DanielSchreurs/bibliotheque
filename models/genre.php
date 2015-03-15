<?php

namespace Models;

class Genre extends Model
{
    protected $table = 'genres';

    function __construct()
    {
        parent::__construct($this->table);
    }

    public function all()
    {
        $sql = '
              SELECT
              name,
              id
              FROM genres';
        $pdost=$this->cx->query($sql);
        return $pdost->fetchAll();
    }
}