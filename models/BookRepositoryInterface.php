<?php
/**
 * Created by PhpStorm.
 * User: danielschreurs
 */

namespace Models;


interface BookRepositoryInterface
{


    public function all();

    public function paginate($page);

    public function getBookFromYear($year_book);

    public function find($book_id);

    public function getLatestBook($limit);

    public function getAllLanguages();

    public function delete($book_id);

    public function create($bookObj);

    public function update($book, $book_id);

}