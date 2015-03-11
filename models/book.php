<?php

namespace Models;

class Book extends Model
{
    /**
     * @var string
     */
    protected $table = 'books';

    /**
     *
     */
    function __construct()
    {
        parent::__construct($this->table);
    }


    /**
     * @param $id
     * @return array
     */

    public function all()
    {//j'écrase la method 'all' de Model
        $sql = '
                SELECT
                books.id AS book_id,
                genres.id AS genre_id,
                editors.id AS editor_id,
                librarys.id AS library_id,
                title,
                front_cover,
                summary,
                authors.first_name AS author_first_name,
                authors.last_name AS author_last_name,
                editors.name AS editor_name,
                genres.name AS genre_name,
                datepub,
                librarys.name AS library_name

                FROM

                books
                JOIN genres ON genre_id=genres.id
                JOIN editors on editor_id=editors.id
                JOIN librarys on library_id=librarys.id
                JOIN author_book on book_id=author_book.id
                JOIN authors on author_id=authors.id';
        $pdost=$this->cx->query($sql);
        return $pdost->fetchAll();
    }

    function authors($id)
    {
        $sql = 'SELECT *, authors.id as author_id
                    FROM authors
                    JOIN author_book ON authors.id = author_id 
                    JOIN books ON book_id = books.id 
                    WHERE books.id = :book_id';
        $pds = $this->cx->prepare($sql);
        $pds->execute([':book_id' => $id]);
        return $pds->fetchAll();
    }

    /**
     * @param $datas
     */
    function update($datas)
    {
        $sql = 'UPDATE %s SET title = :title, summary = :summary, front_cover = :front_cover WHERE id = :book_id';
        $sql = sprintf($sql, $this->table);
        $pds = $this->cx->prepare($sql);
        $inputs = [
            ':book_id' => $datas['book_id'],
            ':title' => $datas['title'],
            ':summary' => $datas['summary'],
            ':front_cover' => $datas['front_cover']
        ];
        $pds->execute($inputs);
    }

    /**
     * @param $authors
     */
    function attachAuthors($book_id, $author_id)
    {
        $sql = 'INSERT INTO author_book (author_id, book_id) VALUES (:author_id,:book_id)';
        $pds = $this->cx->prepare($sql);
        $pds->execute([':author_id' => $author_id, ':book_id' => $book_id]);
    }

    /**
     * @param $authors
     */
    function detachAuthors($book_id, $author_id)
    {
        $sql = 'DELETE FROM author_book WHERE author_id=:author_id AND book_id=:book_id';
        $pds = $this->cx->prepare($sql);
        $pds->execute([':author_id' => $author_id, ':book_id' => $book_id]);
    }

    function bookHasAuthor($author_id, $book_id)
    {
        $sql = 'SELECT * FROM author_book WHERE author_id = :author_id AND book_id = :book_id';
        $pds = $this->cx->prepare($sql);
        $pds->execute([':author_id' => $author_id, ':book_id' => $book_id]);
        return $pds->fetch();
    }

    function resetAuthors($book_id)
    {
        $sql = 'DELETE FROM author_book WHERE book_id=:book_id';
        $pds = $this->cx->prepare($sql);
        $pds->execute([':book_id' => $book_id]);
    }

    function create()
    {
        ;
    }


    function getBookfromUser($book_id)
    {
        $sql = 'SELECT * FROM books JOIN author_book ON book_id=books.id JOIN authors ON author_id=authors.id';//atention *
        $pdost = $this->cx->prepare($sql);
        $pdost->execute([':book_id' => $book_id]);
    }
}
