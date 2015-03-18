<?php
/**
 * Created by PhpStorm.
 * User: danielschreurs
 */

namespace Models;

class Help extends Model implements HelpRepositoryInterface
{
    protected $table='help';

    function __construct()
    {
        parent::__construct($this->table);
    }
    function getAllQuestions(){
        $sql='
            SELECT
            question,
            answer,
            first_name as user_first_name,
            last_name as user_last_name

            FROM questions
            JOIN answers ON answer_id=answers.id
            JOIN users ON questions.user_id= users.id';
        $pdost=$this->cx->query($sql);
        return $pdost->fetchAll();
    }
}