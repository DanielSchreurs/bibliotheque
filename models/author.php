<?php

namespace Models;

class Author extends Model implements AuthorRepositoryInterface
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
                authors.logo,
                bio_text,
                title as book_title
                FROM
                authors
                JOIN author_book on authors.id=author_id
                JOIN books on book_id=books.id';
        $pdost = $this->cx->query($sql);
        return $pdost->fetchAll();
    }

    function find($id)
    {
        $sql = '
                SELECT
                DISTINCT
                author_id,
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
                JOIN author_book ON authors.id=author_id
                JOIN books ON book_id=books.id
                WHERE author_id=:id';
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


}