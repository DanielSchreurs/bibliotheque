<?php

/**
 *
 */
class Author extends Model
{
    protected $table = 'authors';

    function __construct()
    {
        parent::__construct($this->table);
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