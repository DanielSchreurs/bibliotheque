<?php
/**
 * Created by PhpStorm.
 * User: danielschreurs
 */

namespace Models;

class Help extends Model
{
    protected $table='help';

    function __construct()
    {
        parent::__construct($this->table);
    }
    function getAllQuestions(){
        return[];
    }
}