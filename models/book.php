<?php

namespace Models;

class Book extends Model implements BookRepositoryInterface
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
    {

        $sql = '
                 SELECT
                books.id AS book_id,
                genres.id AS genre_id,
                editors.id AS editor_id,
                librarys.id AS library_id,
                authors.id as author_id,
                books.datepub as book_date,
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
                JOIN author_book on book_id=books.id
                JOIN authors on author_id=authors.id
                ORDER BY book_id';
        $pdost = $this->cx->query($sql);
        return $pdost->fetchAll();
    }

    public function paginate($page)
    {

        $page = NBR_BOOKS * ($page - 1);

        $sql = '
                 SELECT
                books.id AS book_id,
                genres.id AS genre_id,
                editors.id AS editor_id,
                librarys.id AS library_id,
                authors.id as author_id,
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
                JOIN author_book on book_id=books.id
                JOIN authors on author_id=authors.id
                ORDER BY book_id
                LIMIT ' . NBR_BOOKS . ' OFFSET ' . $page;
        $pdost = $this->cx->query($sql);
        return $pdost->fetchAll();
    }



    public function getBookFromYear($year_book)
    {
        $sql = '  SELECT
                books.id AS book_id,
                genres.id AS genre_id,
                editors.id AS editor_id,
                librarys.id AS library_id,
                authors.id as author_id,
                title, front_cover, summary,
                authors.first_name AS author_first_name,
                authors.last_name AS author_last_name,
                editors.name AS editor_name,
                genres.name AS genre_name,
                datepub,
                librarys.name AS
                library_name FROM books
                JOIN genres ON genre_id=genres.id
                JOIN editors on editor_id=editors.id
                JOIN librarys on library_id=librarys.id
                JOIN author_book on book_id=books.id
                JOIN authors on author_id=authors.id
                where YEAR(datepub)=:year_book';
        $pdost = $this->cx->prepare($sql);
        $pdost->execute([':year_book' => $year_book]);
        return $pdost->fetchAll();
    }

    public function find($book_id)
    {
        $sql = 'SELECT
                DISTINCT
                books.id AS book_id,
                genres.id AS genre_id,
                editors.id AS editor_id,
                librarys.id AS library_id,
                authors.id as author_id,
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
                JOIN author_book on book_id=books.id
                JOIN authors on author_id=authors.id
                where book_id=:book_id';
        $pdost = $this->cx->prepare($sql);
        $pdost->execute([':book_id' => $book_id]);
        return $pdost->fetch();
    }
    public function getLatestBook($limit)
    {
        $sql = 'SELECT
                DISTINCT
                books.id AS book_id,
                genres.id AS genre_id,
                editors.id AS editor_id,
                librarys.id AS library_id,
                authors.id as author_id,
                title,
                front_cover,
                presentation_cover,
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
                JOIN author_book on book_id=books.id
                JOIN authors on author_id=authors.id
                ORDER BY book_id
                LIMIT '.$limit;
        $pdost = $this->cx->query($sql);
        return $pdost->fetchAll();
    }

    public function getAllLanguages()
    {
        $sql='SELECT
            full_name as language,
            id as language_id
            FROM languages
            ';
        $pdost=$this->cx->query($sql);
        return $pdost->fetchAll();
    }
    public function delete($book_id)
    {
        die('je suis dans le model et il faut supprimer');
        return true;
    }
}
