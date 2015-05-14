<?php
/**
 * Created by PhpStorm.
 * User: danielschreurs
 */

namespace Models;

use Components\Sanitize;
use Components\Validator;

class Help extends Model implements HelpRepositoryInterface
{
    use Validator;
    use Sanitize;
    public $validationRules = [
        'create_at' => [
            ['ruleName' => 'isDate'],
            ['ruleName' => 'dateIsPast']
        ],
        'update_at' => [
            ['ruleName' => 'isDate'],
            ['ruleName' => 'dateIsPast']
        ],
        'question' => [
            ['ruleName' => 'notEmpty', 'error' => 'La question est obligatoire.']
        ],
        'answer' => [
            ['ruleName' => 'notEmpty', 'error' => 'La réponse est obligatoire.']
        ],
        'user_id' => [
            ['ruleName' => 'isValidId']
        ],
        'question_id' => [
            ['ruleName' => 'isValidId']
        ],
        'm' => [
            ['ruleName' => 'notEmpty']
        ],
        'a' => [
            ['ruleName' => 'notEmpty']
        ],
        'search' => [
            ['ruleName' => 'notEmpty']
        ]
    ];
    public $sanitizeRule=[
        'search'=>[
            ['ruleName'=>'string']
        ]
    ];
    protected $table = 'help';

    function __construct()
    {
        parent::__construct($this->table);
    }

    function getAllQuestions()
    {
        $sql = '
            SELECT
            questions.id as question_id,
            questions.question,
            answers.answer,
            first_name as user_first_name,
            last_name as user_last_name,
            role,
            answers.update_at as answers_update_at
            FROM questions
            LEFT JOIN answers ON questions.id=answers.question_id
            JOIN users ON questions.user_id= users.id
            ORDER BY question_id DESC';
        $pdost = $this->cx->query($sql);
        return $pdost->fetchAll();
    }

    function getQuestionAndAnswer($question_id)
    {
        $sql = '
            SELECT
            questions.id as question_id,
            questions.question,
            answers.answer,
            first_name as user_first_name,
            last_name as user_last_name,
            role,
            answers.update_at as answers_update_at
            FROM questions
            LEFT JOIN answers ON questions.id=answers.question_id
            JOIN users ON questions.user_id= users.id
            WHERE  questions.id=:question_id
            ORDER BY question_id DESC';
        $pdost = $this->cx->prepare($sql);
        $pdost->execute([':question_id' => $question_id]);
        return $pdost->fetch();
    }

    public function getQuestion($id_question)
    {
        $sql = '
              SELECT
              question,
              user_id,
              id as question_id
              FROM questions
              WHERE id=:id_question';
        $pdost = $this->cx->prepare($sql);
        $pdost->execute(['id_question' => $id_question]);
        return $pdost->fetch();
    }

    public function getAnswer($id_question)
    {
        $sql = '
              SELECT
              answer,
              user_id,
              create_at,
              update_at,
              role,
              first_name,
              last_name,
              users.id as user_id
              FROM answers
              JOIN users ON user_id=users.id
              WHERE question_id=:id_question';
        $pdost = $this->cx->prepare($sql);
        $pdost->execute(['id_question' => $id_question]);
        return $pdost->fetch();
    }

    public function createAnwser($oAnwser)
    {
        $sql = 'INSERT INTO answers
                (answer,user_id,question_id,create_at,update_at)
                VALUES (:answer,:user_id,:question_id,:create_at,:update_at)';
        $pdost = $this->cx->prepare($sql);
        $pdost->execute(
            [
                ':answer' => $oAnwser->answer,
                ':user_id' => $oAnwser->user_id,
                ':question_id' => $oAnwser->question_id,
                ':create_at' => $oAnwser->create_at,
                ':update_at' => $oAnwser->create_at
            ]
        );
    }

    public function createQuestion($oQuestion)
    {
        $sql = 'INSERT INTO questions
                (question,user_id,create_at,update_at)
                VALUES (:question,:user_id,:create_at,:update_at)';
        $pdost = $this->cx->prepare($sql);
        $pdost->execute(
            [
                ':question' => $oQuestion->question,
                ':user_id' => $oQuestion->user_id,
                ':create_at' => $oQuestion->create_at,
                ':update_at' => $oQuestion->create_at
            ]
        );
    }

    public function updateQuestion($oQuestion)
    {
        $sql = 'UPDATE questions
                SET question=:question,user_id=:user_id,update_at=:update_at
                WHERE id=:question_id';
        $pdost = $this->cx->prepare($sql);

        $pdost->execute(
            [
                ':question' => $oQuestion->question,
                ':user_id' => $oQuestion->user_id,
                ':update_at' => $oQuestion->create_at,
                ':question_id' => $oQuestion->question_id
            ]
        );
    }

    public function updateAnswer($oAnswer)
    {

        $sql = 'UPDATE answers
                SET answer=:answer,user_id=:user_id,question_id=:question_id,update_at=:update_at
                WHERE question_id=:question_id';
        $pdost = $this->cx->prepare($sql);

        $pdost->execute(
            [
                ':answer' => $oAnswer->answer,
                ':user_id' => $oAnswer->user_id,
                ':question_id' => $oAnswer->question_id,
                ':update_at' => $oAnswer->create_at,
                ':question_id' => $oAnswer->question_id
            ]
        );
    }

    public function deleteQuestion($question_id)
    {
        $this->deleteAnswer($question_id);
        $sql = 'DELETE FROM questions
                WHERE id=:question_id';
        $pdost = $this->cx->prepare($sql);
        $pdost->execute(
            [
                ':question_id' => $question_id
            ]
        );
    }

    public function deleteAnswer($question_id)
    {

        $sql = 'DELETE FROM answers
                WHERE question_id=:question_id';

        $pdost = $this->cx->prepare($sql);
        $pdost->execute(
            [
                ':question_id' => $question_id
            ]
        );
    }

}