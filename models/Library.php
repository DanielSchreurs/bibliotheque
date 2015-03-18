<?php
/**
 * Created by PhpStorm.
 * User: danielschreurs
 */

namespace Models;

class Library extends Model implements LibraryRepositoryInterface
{
    protected $table = 'librarys';

    function __construct()
    {
        parent::__construct($this->table);
    }

    public function all()
    {
        $sql = 'SELECT id,logo,slogan,name,phone FROM librarys';
        $pdost = $this->cx->query($sql);
        return $pdost->fetchAll();
    }

    public function view($id_library)
    {
        $sql='
              SELECT
              id as library_id,
              name,
              phone,
              logo,
              slogan
              FROM librarys where id=1';
        $pdost=$this->cx->query($sql);
        return $pdost->fetch();
    }
}