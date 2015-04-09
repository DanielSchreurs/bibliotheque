<?php
namespace Models;

class Editor extends Model implements EditorRepositoryInterface
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

    public function all()
    {
        $sql = '
              SELECT
              editor_id,
              books.id as book_id,
              name as editor_name,
              bio_text,
              website as author_website,
              editors.logo as editor_logo,
              title as book_title,
              books.logo as book_logo,
              summary FROM editors JOIN books on editors.id=editor_id
              ORDER BY name';
        $pdost = $this->cx->query($sql);
        return $pdost->fetchAll();
    }

    public function getSimpleInfoOffAll()
    {
        $sql = '
              SELECT
              id,
              name as editor_name,
              bio_text,
              logo,
              website as author_website
              FROM editors
              ORDER BY name';
        $pdost = $this->cx->query($sql);
        return $pdost->fetchAll();
    }

    public function getSimpleInfoOffOne($editor_id)
    {
        $sql = '
              SELECT
              id,
              name as editor_name,
              bio_text,
              logo,
              website as author_website
              FROM editors
              WHERE id=:editor_id';
        $pdost = $this->cx->prepare($sql);
        $pdost->execute([':editor_id' => $editor_id]);
        return $pdost->fetch();
    }

    public function find($id_editors)
    {

        $sql = '
              SELECT
              editor_id,
              books.id as book_id,
              name as editor_name,
              bio_text,
              books.logo as book_cover,
              editors.logo as editor_logo,
              title as book_title,
              books.logo as book_logo,
              summary FROM editors JOIN books on editors.id=editor_id
              WHERE editor_id=:id_editors';
        $pdost = $this->cx->prepare($sql);
        $pdost->execute(['id_editors' => $id_editors]);
        return $pdost->fetchAll();
    }

    public function delete($editor_id)
    {
        $sql = '
               DELETE
              FROM editors
              WHERE id=:editor_id';
        $pdost = $this->cx->prepare($sql);
        $pdost->execute(
            [':editor_id' => $editor_id]
        );

    }

    public function update($bookObj, $editor_id)
    {

        $sql = 'UPDATE editors
                SET
                name = :name,
                logo = :logo,
                bio_text = :bio_text,
                website = :website,
                update_at=:update_at
                WHERE editors.id = :editor_id';
        $pdost = $this->cx->prepare($sql);
        $pdost->execute(
            [
                ':name' => $bookObj->name,
                ':logo' => $bookObj->logo,
                ':bio_text' => $bookObj->bio_text,
                ':website' => $bookObj->website,
                ':update_at' => $bookObj->update_at,
                ':editor_id' => $editor_id
            ]
        );
    }

    public function create($bookObj)
    {

        $sql = 'INSERT INTO editors
                (name,logo,bio_text,website,update_at,create_at)
                VALUES (:name,:logo,:bio_text,:website,:update_at,:create_at)';
        $pdost = $this->cx->prepare($sql);
        $pdost->execute(
            [
                ':name' => $bookObj->name,
                ':logo' => $bookObj->logo,
                ':bio_text' => $bookObj->bio_text,
                ':website' => $bookObj->website,
                ':update_at' => $bookObj->create_at,
                ':create_at' => $bookObj->create_at
            ]
        );

    }
}