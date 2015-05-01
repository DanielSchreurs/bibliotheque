<?php

namespace Models;

use Carbon\Carbon;
use Components\Validator;
use Helpers\Date;

class Book extends Model implements BookRepositoryInterface
{
    use Validator;
    protected $table = 'books';
    public $validationRules = [
        'create_at' => [
            ['ruleName' => 'isDate'],
            ['ruleName' => 'dateIsPast']
        ],
        'update_at' => [
            ['ruleName' => 'isDate'],
            ['ruleName' => 'dateIsPast']
        ],
        'title' => [
            ['ruleName' => 'notEmpty', 'error' => 'Le titre est obligatoire.']
        ],
        'user_id' => [
            ['ruleName' => 'isValidId']
        ],
        'author_id' => [
            ['ruleName' => 'isValidId']
        ],
        'language_id' => [
            ['ruleName' => 'isValidId']
        ],
        'editor_id' => [
            ['ruleName' => 'isValidId']
        ],
        'genre_id' => [
            ['ruleName' => 'isValidId']
        ],

        'front_cover' => [
            ['ruleName' => 'isEmptyFile','error'=>'La couverture est obligatoire.'],
            ['ruleName' => 'isValidExtension']
        ],
        'front_cover_edit' => [
            ['ruleName' => 'isValidExtension']
        ],
        'front_cover_presentation' => [
            ['ruleName' => 'isEmptyFile','error'=>'La petite couverture est obligatoire.'],
            ['ruleName' => 'isValidExtension']
        ],
        'front_cover_presentation_edit' => [
            ['ruleName' => 'isValidExtension']
        ],
        'summary' => [
            ['ruleName' => 'notEmpty', 'error' => 'Le titre est obligatoire.']
        ],
        'isbn' => [
            ['ruleName' => 'notEmpty', 'error' => 'L’ISBN est obligatoire.'],
            ['ruleName' => 'isValidIsbn','L’ISBN n’est as au bon format.']
        ],
        'nbpages' => [
            ['ruleName' => 'notEmpty', 'error' => 'Le nombre de page est obligatoire.'],
            ['ruleName' => 'isValidNbPage','error'=>'Le nombre de page doit être un entier supérieur à 3.']
        ],
        'nb_copy' => [
            ['ruleName' => 'notEmpty', 'error' => 'Le nombre de copies est obligatoire.'],
            ['ruleName' => 'isValidInt','error'=>'Le nombre de copies doit être un entier positif.']
        ],
        'datepub' => [
            ['ruleName' => 'notEmpty', 'error' => 'La date  de pubication est obligatoire.'],
            ['ruleName' => 'isDate', 'error' => 'La date n’est pas au bon format.'],
            ['ruleName' => 'dateIsPast', 'error' => 'La date doit être dans le passé.']
        ],
        'vedette' => [
            ['ruleName' => 'isValidInt']
        ]
    ];




    function __construct()
    {
        parent::__construct($this->table);
    }


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
                nb_copy,
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
                nb_copy,
                front_cover,
                presentation_cover,
                books.logo,
                summary,
                authors.first_name AS author_first_name,
                authors.last_name AS author_last_name,
                editors.name AS editor_name,
                genres.name AS genre_name,
                datepub,
                librarys.name AS library_name,
                language_id,
                isbn,
                nbpages
                FROM
                books
                JOIN genres ON genre_id=genres.id
                JOIN editors on editor_id=editors.id
                JOIN librarys on library_id=librarys.id
                JOIN author_book on book_id=books.id
                JOIN authors on author_id=authors.id
                JOIN languages ON language_id=languages.id
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
                ORDER BY book_id DESC
                LIMIT ' . $limit;
        $pdost = $this->cx->query($sql);
        return $pdost->fetchAll();
    }

    public function getReservedBooksFromUser($user_id)
    {

        $sql = 'SELECT
                DISTINCT
                books.id AS book_id,
                book_reserved.id as book_reserved_id,
                title,
                presentation_cover,
                summary,
                reserved_from,
                reserved_to
                FROM
                book_reserved
                JOIN books on books.id=book_id
                WHERE book_reserved.user_id=:user_id';
        $pdost = $this->cx->prepare($sql);
        $pdost->execute(['user_id' => $user_id]);
        return $pdost->fetchAll();
    }

    public function getAllLanguages()
    {
        $sql = 'SELECT
            full_name as language,
            id as language_id
            FROM languages
            ';
        $pdost = $this->cx->query($sql);
        return $pdost->fetchAll();
    }

    public function delete($book_id)
    {
        $sqk = 'DELETE FROM books WHERE id=:book_id';
        $pdost = $this->cx->prepare($sqk);
        $pdost->execute(
            [':book_id' => $book_id]
        );
        $this->detachAuthorFromBook($book_id);
    }

    private function updateAuthorFromBook($author_id, $book_id)
    {
        $sql = "UPDATE author_book
                SET author_id = $author_id
                WHERE book_id = $book_id";
        $this->cx->query($sql);
    }

    private function detachAuthorFromBook($book_id)
    {
        $sql = 'DELETE FROM author_book
                WHERE book_id = ' . $book_id;
        $this->cx->query($sql);
    }

    public function update($bookObj, $book_id)
    {

        $sql = 'UPDATE books
                SET
                logo = :logo,
                presentation_cover = :presentation_cover,
                title = :title,
                front_cover = :front_cover,
                summary = :summary,
                isbn = :isbn,
                nbpages = :nbpages,
                datepub=:datepub,
                language_id = :language_id,
                library_id = :library_id,
                editor_id=:editor_id,
                update_at=:update_at,
                nb_copy=:nb_copy,
                vedette=:vedette
                WHERE books.id = :book_id';
        $pdost = $this->cx->prepare($sql);
        $pdost->execute(
            [
                ':logo' => $bookObj->logo,
                ':presentation_cover' => $bookObj->presentation_cover,
                ':title' => $bookObj->title,
                ':front_cover' => $bookObj->front_cover,
                ':summary' => $bookObj->summary,
                ':isbn' => $bookObj->isbn,
                ':nbpages' => $bookObj->nbpages,
                ':datepub' => $bookObj->datepub,
                ':language_id' => $bookObj->language_id,
                ':library_id' => 1,
                ':editor_id' => $bookObj->editor_id,
                ':update_at' => $bookObj->update_at,
                ':nb_copy'=>$bookObj->nb_copy,
                ':vedette' => $bookObj->vedette,
                ':book_id' => $book_id
            ]
        );
        $this->updateAuthorFromBook($bookObj->author_id, $book_id);
    }

    public function create($bookObj)
    {
        $sql = 'INSERT INTO books
                (title,front_cover,logo,summary,isbn,presentation_cover,nbpages,datepub,genre_id,language_id,library_id,editor_id,creat_at,update_at,nb_copy,vedette)
        VALUES  (:title,:front_cover,:logo,:summary,:isbn,:presentation_cover,:nbpages,:datepub,:genre_id,:language_id,:library_id,:editor_id,:create_at,:update_at,:nb_copy,:vedette)

        ';

        $pdost = $this->cx->prepare($sql);
        $pdost->execute(
            [
                ':title' => $bookObj->title,
                ':front_cover' => $bookObj->front_cover,
                ':logo' => $bookObj->logo,
                ':summary' => $bookObj->summary,
                ':isbn' => $bookObj->isbn,
                ':presentation_cover' => $bookObj->presentation_cover,
                ':nbpages' => $bookObj->nbpages,
                ':datepub' => $bookObj->datepub,
                ':genre_id' => $bookObj->genre_id,
                ':language_id' => $bookObj->language_id,
                ':library_id' => 1,
                ':editor_id' => $bookObj->editor_id,
                ':create_at' => $bookObj->create_at,
                ':update_at' => $bookObj->create_at,
                ':nb_copy' => $bookObj->nb_copy,
                ':vedette' => $bookObj->vedette
            ]
        );
        $this->newAuthorBook($bookObj->author_id, $this->cx->lastInsertId());
    }

    public function isDispo($book_id, $to = 'todayAnd15days')
    {
        $maxCopy = $this->getNbCopyOfCopyOfBook($book_id)->nb_copy;
        $reserved_info = $this->getReservedInfoFromBooks($book_id);
        $try = 0;
        if ($maxCopy > count($reserved_info)) {
            return true;
        } else {
            if ($to === 'todayAnd15days') {
                $to = Carbon::now()->addDay(15);
            } else {
                $toArray = explode('-', $to);
                $to = Carbon::createFromDate($toArray[0], $toArray[1], $toArray[2]);
            }
            foreach ($reserved_info as $singleReserved_info) {
                $reserved_from = explode('-', $singleReserved_info->reserved_from);
                $reserved_to = explode('-', $singleReserved_info->reserved_to);
                if ($to->between(Carbon::createFromDate($reserved_from[0], $reserved_from[1], $reserved_from[2]),
                    Carbon::createFromDate($reserved_to[0], $reserved_to[1], $reserved_to[2]))
                ) {

                    $try++;
                }
            }
            return $try >= $maxCopy ? false : true;
        }

    }

    public function reserveBook($obj)
    {
        $sql = 'INSERT INTO book_reserved
              (book_id,user_id,reserved_from,reserved_to)
              VALUES(:book_id,:user_id,:reserved_from,:reserved_to)';
        $pdost = $this->cx->prepare($sql);
        $pdost->execute([
            ':book_id' => $obj->book_id,
            ':user_id' => $obj->user_id,
            ':reserved_from' => $obj->from,
            ':reserved_to' => $obj->to
        ]);
    }

    public function updateReserveBook($obj)
    {
        $sql = 'UPDATE book_reserved
                SET reserved_from=:reserved_from,
                reserved_to=:reserved_to
                WHERE id=:reserved_id';
        $pdost = $this->cx->prepare($sql);
        $pdost->execute([
            ':reserved_from' => $obj->from,
            ':reserved_to' => $obj->to,
            ':reserved_id' => $obj->reserved_id
        ]);
    }

    public function removeOneCopy($book_id)
    {
        $nbCopy = ($this->getNbCopyOfCopyOfBook($book_id)->nb_copy) - 1;
        $sql = 'UPDATE books
                SET nb_copy=:nb_copy
                WHERE id=:book_id';
        $pdost = $this->cx->prepare($sql);
        $pdost->execute([
            ':nb_copy' => $nbCopy,
            ':book_id' => $book_id
        ]);

    }

    private function getNbCopyOfCopyOfBook($book_id)
    {
        $sql = 'SELECT nb_copy FROM books WHERE id=:book_id';
        $pdost = $this->cx->prepare($sql);
        $pdost->execute(['book_id' => $book_id]);
        return $pdost->fetch();
    }

    private function getReservedInfoFromBooks($book_id)
    {

        $sql = 'SELECT reserved_from,reserved_to FROM book_reserved WHERE book_id=:book_id';
        $pdost = $this->cx->prepare($sql);
        $pdost->execute(['book_id' => $book_id]);
        return $pdost->fetchAll();
    }

    public function getReservedInfo($Reserved_id)
    {

        $sql = 'SELECT reserved_from,reserved_to,book_id,id as reserved_id FROM book_reserved WHERE id=:Reserved_id';
        $pdost = $this->cx->prepare($sql);
        $pdost->execute([':Reserved_id' => $Reserved_id]);
        return $pdost->fetch();
    }

    private function newAuthorBook($author_id, $book_id)
    {
        $sql = "INSERT INTO author_book(author_id, book_id)
                VALUES (" . $author_id . ' , ' . $book_id . ' )';
        $this->cx->query($sql);

    }


}
