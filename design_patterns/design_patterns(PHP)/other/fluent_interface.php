<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/3/15
 * Time: 19:27
 */

// 流接口模式
class Sql
{
    private $fields = [];
    private $from = [];
    private $where = [];

    public function select($fields)
    {
        $this->fields = $fields;
        return $this;
    }

    public function from($table, $alias)
    {
        $this->from[] = $table.' AS '.$alias;
        return $this;
    }

    public function where($condition)
    {
        $this->where[] = $condition;
        return $this;
    }

    public function __toString()
    {
        return sprintf(
            'SELECT %s FROM %s WHERE %s',
            join(', ', $this->fields),
            join(', ', $this->from),
            join(' AND ', $this->where)
        );
    }
}