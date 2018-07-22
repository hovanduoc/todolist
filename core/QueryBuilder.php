<?php

namespace App\Core;

use \PDO;

class QueryBuilder
{
    protected $conn;

    public function __construct(PDO $conn)
    {
        $this->conn = $conn;
    }

    public function find(string $table, $id){
        $sql = 'SELECT * FROM ' . $table . ' WHERE id=' . $id;
        $query = $this->conn->prepare($sql);
        $query->execute();

        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function selectAll(string $table, string $fetchClass = null)
    {
        $query = $this->conn->prepare("select * from {$table};");
        $query->execute();

        if ($fetchClass) {
            return $query->fetchAll(PDO::FETCH_CLASS, $fetchClass);
        }

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function insert(string $table, array $parameters)
    {
        $sql = sprintf(
            'INSERT INTO %s (%s) VALUES (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );
        $query = $this->conn->prepare($sql);

        return $query->execute($parameters);
    }

    public function update(string $table, array $parameters, $id)
    {
        $query = "UPDATE " . $table . " SET ";
        $values = [];
        unset($parameters['id']);
        foreach ($parameters as $key => $value) {

            $values[] = $key . '=' . $this->escape($value);
        }
        $query .= (is_array($parameters) ? implode(',', $values) : $parameters);

        $query .= " WHERE id=" . $id;

        $query = $this->conn->prepare($query);

        return $query->execute($parameters);
    }

    public function delete(string $table, $id)
    {
        $sql = 'DELETE FROM ' . $table . ' WHERE id=' . $id;
        $query = $this->conn->prepare($sql);

        return $query->execute();
    }

    public function escape($data)
    {
        if($data === NULL)
          return 'NULL';
        if(is_null($data))
          return null;
        return $this->conn->quote(trim($data));
    }
}