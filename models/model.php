<?php
namespace Models;

class model implements ModelRepositoryInterface
{
    protected $cx = null;
    protected $table = '';

    public function __construct($table)
    {
        global $options;
        //Je me connecte au SGBD
        try {
            $this->cx= new \PDO(DSN,USERNAME,PASSWORD,$options);
            $this->cx->query('SET CHARACTER SET UTF8');
            $this->cx->query('SET NAMES UTF8');
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
        $this->table = $table;
    }

    public function search($table, $get, Array $where, $what)
    {
        $params = [];
        $sql = 'SELECT ' . $get . ' FROM ' . $table . ' WHERE ';
        foreach ($where as $coll) {
            $params[] = $coll . ' LIKE ' . "'%" . $what . "%'";
        }

        $sql .= implode(' OR ', $params);
        $pdost = $this->cx->query($sql);
        return $pdost->fetchAll();

    }

    public function searchAll(Array $research)
    {
        foreach ($research as $table => $info) {
            $resultats[$table] = $this->search($table, $info['get'], $info['where'], $info['what']);
        }
        return $resultats;
    }

    public function all()
    {
        $sql = 'SELECT * FROM %s';
        return $this->cx->query(sprintf($sql, $this->table));
    }

    public function find($id)
    {
        $sql = 'SELECT * FROM %s WHERE id = :id';
        $pds = $this->cx->prepare(sprintf($sql, $this->table));
        $pds->execute([':id' => $id]);

        return $pds->fetch();
    }

    public function attach($key1, $key2, $value1, $value2, $table)
    {
        $sql = 'INSERT INTO %s (%s, %s) VALUES (:value1,:value2)';
        $sql = sprintf($sql, $table, $key1, $key2);
        $pds = $this->cx->prepare($sql);
        $pds->execute([':value1' => $value1, ':value2' => $value2]);
    }

    public function detach($key1, $key2, $value1, $value2, $table)
    {
        $sql = 'DELETE FROM %s WHERE %s =:value1 AND %s=:value2';
        $sql = sprintf($sql, $table, $key1, $key2);
        $pds = $this->cx->prepare($sql);
        $pds->execute([':value1' => $value1, ':value2' => $value2]);
    }

    public function resetManyToManyRelationshipForKey($table, $key, $value)
    {
        $sql = 'DELETE FROM %s WHERE %s=:value';
        $sql = sprintf($sql, $table, $key);
        $pds = $this->cx->prepare($sql);
        $pds->execute([':value' => $value]);
    }

    public function manyToManyRelationshipExists($table, $key1, $key2, $value1, $value2)
    {
        $sql = 'SELECT * FROM %s WHERE %s = :value1 AND %s = :value2';
        $sql = sprintf($sql, $table, $key1, $key2);
        $pds = $this->cx->prepare($sql);
        $pds->execute([':value1' => $value1, ':value2' => $value2]);

        return $pds->fetch();
    }

    public function getNbrelements()
    {
        $sql = 'SELECT COUNT(id) as count FROM ' . $this->table;
        return $this->cx->query($sql)->fetch()->count;

    }


}
