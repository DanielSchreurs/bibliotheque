<?php
/**
 * Created by PhpStorm.
 * User: danielschreurs
 */

namespace Models;


interface ModelRepositoryInterface
{


    public function all();

    public function find($id);

    public function attach($key1, $key2, $value1, $value2, $table);

    public function detach($key1, $key2, $value1, $value2, $table);

    public function resetManyToManyRelationshipForKey($table, $key, $value);

    public function manyToManyRelationshipExists($table, $key1, $key2, $value1, $value2);
}