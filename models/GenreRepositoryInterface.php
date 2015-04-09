<?php
/**
 * Created by PhpStorm.
 * User: danielschreurs
 */

namespace Models;


interface GenreRepositoryInterface
{

    public function all();

    public function getName($genre_id);

    public function find($id_genre);

    public function delete($genre_id);

    public function update($genreObj, $genre_id);

    public function create($genreObj);

}