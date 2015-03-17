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
            $this->cx = new \PDO(DSN, USERNAME, PASSWORD, $options);
            $this->cx->query('SET CHARACTER SET UTF8');
            $this->cx->query('SET NAMES UTF8');
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
        $this->table = $table;
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
}
