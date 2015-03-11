<?php

namespace Models;

class Author extends Model
{
    protected $table = 'authors';

    function __construct()
    {
        parent::__construct($this->table);
    }

    public function all()
    {
        $sql = 'SELECT
                author_id,
                book_id,
                first_name,
                last_name,
                logo,
                bio_text,
                title as book_title
                FROM
                authors
                JOIN author_book on authors.id=author_id
                JOIN books on book_id=books.id';
        $pdost = $this->cx->query($sql);
        return $pdost->fetchAll();
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

    public function find($id){
    die('Je suis dans le models Author et je j’affiche un livre d’un auteur');
        //$sql='SELECT'
    }
}