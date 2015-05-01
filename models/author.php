<?php

namespace Models;

use Components\Validator;

class Author extends Model implements AuthorRepositoryInterface
{
    use Validator;
    protected $table = 'authors';
    public $validationRules = [
        'create_at' => [
            ['ruleName' => 'isDate'],
            ['ruleName' => 'dateIsPast']
        ],
        'update_at' => [
            ['ruleName' => 'isDate'],
            ['ruleName' => 'dateIsPast']
        ],
        'last_name' => [
            ['ruleName' => 'notEmpty', 'error' => 'Le nom de famille est obligatoire.']
        ],
        'first_name' => [
            ['ruleName' => 'notEmpty', 'error' => 'Le prénom est obligatoire.']
        ],
        'photo' => [
            ['ruleName' => 'isEmptyFile'],
            ['ruleName' => 'isValidExtension']
        ],
        'photo_edit' => [
            ['ruleName' => 'isValidExtension']
        ],
        'logo' => [
            ['ruleName' => 'isEmptyFile'],
            ['ruleName' => 'isValidExtension']
        ],
        'logo_edit' => [
            ['ruleName' => 'isValidExtension']
        ],
        'bio_text' => [
            ['ruleName' => 'notEmpty', 'error' => 'La biographhie est obligatoire.']
        ],
        'datebirth' => [
            ['ruleName' => 'notEmpty', 'error' => 'La date est obligatoire.'],
            ['ruleName' => 'isDate', 'error' => 'La date n’est pas au bon format.'],
            ['ruleName' => 'dateIsPast', 'error' => 'La date doit être dans le passé.']
        ],
        'datedeath' => [
            ['ruleName' => 'isDate', 'error' => 'La date n’est pas au bon format.'],
            ['ruleName' => 'dateIsPast', 'error' => 'La date doit être dans le passé.']
        ]
    ];

    function __construct()
    {
        parent::__construct($this->table);
    }

    public function all()
    {
        $sql = 'SELECT
                authors.id as author_id,
                book_id,
                first_name,
                last_name,
                authors.logo,
                bio_text,
                title as book_title
                FROM
                authors
                LEFT JOIN author_book on authors.id=author_id
                LEFT JOIN books on book_id=books.id';
        $pdost = $this->cx->query($sql);
        return $pdost->fetchAll();
    }

    public function getAllName()
    {

        $sql = 'SELECT
                id as author_id,
                first_name,
                last_name,
                datebirth,
                datedeath,
                bio_text,
                vedette
                FROM
                authors
                ORDER BY first_name';
        $pdost = $this->cx->query($sql);
        return $pdost->fetchAll();
    }

    function find($id)
    {
        $sql = '
                SELECT
                authors.id as author_id,
                book_id,
                first_name,
                last_name,
                photo as author_photo,
                books.logo as book_cover,
                datebirth,
                datedeath,
                bio_text,
                title as book_title,
                summary
                FROM authors
                LEFT JOIN author_book ON authors.id=author_id
                LEFT JOIN books ON book_id=books.id
                WHERE authors.id=:id';
        $pds = $this->cx->prepare($sql);
        $pds->execute([':id' => $id]);
        return $pds->fetchAll();
    }

    function getAuthor($id)
    {
        $sql = '
                SELECT
                id as author_id,
                first_name,
                last_name,
                photo as author_photo,
                logo,
                datebirth,
                datedeath,
                bio_text,
                vedette
                FROM authors
                WHERE id=:id';
        $pds = $this->cx->prepare($sql);
        $pds->execute([':id' => $id]);
        return $pds->fetch();
    }

    function books($id)
    {
        $sql = 'SELECT *, books.id as book_id
                    FROM books
                    JOIN author_book ON books.id = book_id
                    JOIN authors ON author_id = authors.id
                    WHERE authors.id = :author_id';
        $pds = $this->cx->prepare($sql);
        $pds->execute([':author_id' => $id]);
        return $pds->fetchAll();
    }

    public function getAuthorMonth()
    {
        $sql = 'SELECT
                first_name,
                id as author_id,
                last_name,
                photo,
                bio_text
                FROM authors
                WHERE vedette=1';
        $pdost = $this->cx->query($sql);
        return $pdost->fetch();
    }

    public function update($authorObj, $author_id)
    {

        $sql = 'UPDATE authors
                SET
                last_name = :last_name,
                first_name = :first_name,
                bio_text = :bio_text,
                datebirth = :datebirth,
                datedeath = :datedeath,
                vedette = :vedette,
                photo = :photo,
                logo=:logo,
                update_at = :update_at
                WHERE id = :author_id';
        $pdost = $this->cx->prepare($sql);
        $pdost->execute(
            [
                ':last_name' => $authorObj->last_name,
                ':first_name' => $authorObj->first_name,
                ':bio_text' => $authorObj->bio_text,
                ':datebirth' => $authorObj->datebirth,
                ':datedeath' => $authorObj->datedeath,
                ':vedette' => $authorObj->vedette,
                ':photo' => $authorObj->photo,
                ':logo' => $authorObj->logo,
                ':update_at' => $authorObj->update_at,
                ':author_id' => $author_id
            ]
        );

    }

    public function create($authorObj)
    {

        $sql = 'INSERT INTO authors
                (last_name,first_name,bio_text,datebirth,datedeath,vedette,photo,logo,create_at,update_at)
                VALUES (:last_name,:first_name,:bio_text,:datebirth,:datedeath, :vedette,:photo,:logo,:create_at,:update_at)';
        $pdost = $this->cx->prepare($sql);
        $pdost->execute(
            [
                ':last_name' => $authorObj->last_name,
                ':first_name' => $authorObj->first_name,
                ':bio_text' => $authorObj->bio_text,
                ':datebirth' => $authorObj->datebirth,
                ':datedeath' => $authorObj->datedeath,
                ':vedette' => $authorObj->vedette,
                ':photo' => $authorObj->photo,
                ':logo' => $authorObj->logo,
                ':create_at' => $authorObj->create_at,
                ':update_at' => $authorObj->create_at,
            ]
        );

    }

    public function delete($author_id)
    {
        $sql = '
               DELETE
              FROM authors
              WHERE id=:author_id';
        $pdost = $this->cx->prepare($sql);
        $pdost->execute(
            [':author_id' => $author_id]
        );
    }

}