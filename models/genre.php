<?php

/**
 *
 */
class Genre extends Model
{
    protected $table = 'genres';

    function __construct()
    {
        parent::__construct($this->table);
    }
}