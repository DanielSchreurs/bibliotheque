<?php
/**
 * Created by PhpStorm.
 * User: danielschreurs
 */

namespace Models;
class Year extends Model
{

    protected $table = 'books';

    function __construct()
    {
        parent::__construct($this->table);
    }

    public function all()
    {
        $sql='SELECT DISTINCT YEAR(datepub) as year FROM books';
        $pdost=$this->cx->query($sql);
         return $pdost->fetchAll();
    }
}