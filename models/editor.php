<?php
namespace Models;
class Editor extends Model
{
    protected $table = 'editors';

    function __construct()
    {
        parent::__construct($this->table);
    }

    function books($id)
    {
        $sql = 'SELECT * FROM books WHERE editor_id = :editor_id';
        $pds = $this->cx->prepare($sql);
        $pds->execute([':editor_id' => $id]);
        return $pds->fetchAll();
    }
    public function all(){
       $sql='
              SELECT
              editor_id,
              books.id as book_id,
              name as editor_name,
              bio_text,
              editors.logo as editor_logo,
              title as book_title,
              books.logo as book_logo,
              summary FROM editors JOIN books on editors.id=editor_id';
        $pdost=$this->cx->query($sql);
        return $pdost->fetchAll();
    }
}