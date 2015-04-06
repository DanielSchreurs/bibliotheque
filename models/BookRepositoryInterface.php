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

    public function getBestBook();


}