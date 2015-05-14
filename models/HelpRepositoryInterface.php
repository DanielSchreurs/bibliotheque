<?php
/**
 * Created by PhpStorm.
 * User: danielschreurs
 */

namespace Models;


interface HelpRepositoryInterface
{

    function getAllQuestions();

    function getQuestionAndAnswer($question_id);

    public function getQuestion($id_question);

    public function getAnswer($id_question);

    public function createAnwser($oAnwser);

    public function createQuestion($oQuestion);

    public function updateQuestion($oQuestion);

    public function updateAnswer($oAnswer);

    public function deleteQuestion($question_id);

    public function deleteAnswer($question_id);


}