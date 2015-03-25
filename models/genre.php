<?php

namespace Models;

class Genre extends Model implements GenreRepositoryInterface
{
    protected $table = 'genres';

    function __construct()
    {
        parent::__construct($this->table);
    }

    public function all()
    {
        $sql = '
               SELECT
              name,
              id
              FROM genres
              ORDER BY name';
        $pdost = $this->cx->query($sql);
        return $pdost->fetchAll();
    }

    public function find($id_genre)
    {
        $sql = '
              SELECT
              name AS genre_name,
              genres.id AS genre_id,
              books.id AS book_id,
              summary,
              title AS book_title,
              logo AS book_cover
              FROM genres
              LEFT JOIN books on genres.id=genre_id
              WHERE genres.id=:id_genre';
        $pdost = $this->cx->prepare($sql);
        $pdost->execute(['id_genre' => $id_genre]);
        return $pdost->fetchAll();
    }
}