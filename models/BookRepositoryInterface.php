<?php
/**
 * Created by PhpStorm.
 * User: danielschreurs
 */

namespace Models;


interface BookRepositoryInterface
{


    public function all();

    function authors($id);

    function update($datas);

    function attachAuthors($book_id, $author_id);

    function detachAuthors($book_id, $author_id);

    function bookHasAuthor($author_id, $book_id);

    function resetAuthors($book_id);

    function create();

    public function getBookFromYear($year_book);

    public function find($book_id);


}