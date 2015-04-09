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

    public function getName($genre_id)
    {
        $sql = '
               SELECT
              name,
              id
              FROM genres
              WHERE id=:genre_id';
        $pdost = $this->cx->prepare($sql);
        $pdost->execute(
            [':genre_id'=>$genre_id]
        );
        return $pdost->fetch();
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

    public function delete($genre_id)
    {
        $sql = '
               DELETE
              FROM genres
              WHERE id=:genre_id';
        $pdost = $this->cx->prepare($sql);
        $pdost->execute(
            [':genre_id'=>$genre_id]
        );

    }

    public function update($genreObj,$genre_id)
    {
        $sql='UPDATE genres SET
                name=:name,
                 update_at=:update_at
                 WHERE id=:genre_id';
        $pdost=$this->cx->prepare($sql);
        $pdost->execute([':genre_id'=>$genre_id,':name'=>$genreObj->name,':update_at'=>$genreObj->update_at]);
    }
    public function create($genreObj)
    {
        $sql='INSERT INTO genres (name,create_at,update_at) VALUES (:name,:create_at,:update_at) ';
        $pdost=$this->cx->prepare($sql);
        $pdost->execute([':name'=>$genreObj->name,':create_at'=>$genreObj->create_at,':update_at'=>$genreObj->create_at]);
    }
}