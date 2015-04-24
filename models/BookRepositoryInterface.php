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

    public function getReservedBooksFromUser($user_id);

    public function getReservedInfo($Reserved_id);

    public function getAllLanguages();

    public function delete($book_id);

    public function create($bookObj);

    public function update($book, $book_id);

    public function isDispo($book_id);

    public function reserveBook($obj);

    public function updateReserveBook($obj);

    public function removeOneCopy($book_id);


}