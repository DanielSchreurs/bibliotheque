<?php

/**
 *
 */
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
}