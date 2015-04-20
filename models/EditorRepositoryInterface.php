<?php
/**
 * Created by PhpStorm.
 * User: danielschreurs
 */
namespace Models;


interface EditorRepositoryInterface
{
    public function all();

    public function getSimpleInfoOffAll();

    public function getSimpleInfoOffOne($editor_id);

    public function find($id_editors);

    public function delete($editor_id);

    public function update($bookObj, $editor_id);
    public function create($bookObj);
}
