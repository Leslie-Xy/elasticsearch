<?php

namespace Leslie\elasticsearch\Repository;

use Leslie\elasticsearch\Repositorys\RepositoryInterface;

abstract class Repository implements RepositoryInterface
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public abstract function model();

    /**
     * @param array $columns
     * @return mixed
     */
    public function all($columns = array('*'))
    {

    }
    /**
     * @param $perPage
     * @param array $columns
     * @return mixed
     */
    public function paginate($perPage = 1, $columns = array('*'))
    {

    }
    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data, string $index)
    {

    }
    /**
     * @param array $data
     * @return bool
     */
    public function saveModel(array $data, string $index)
    {

    }
    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function update(array $data, $id)
    {

    }
    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {

    }
    /**
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function find($id, $columns = array('*'))
    {

    }
    /**
     * @param $field
     * @param $value
     * @param array $columns
     * @return mixed
     */
    public function first($field, $value, $columns = array('*'))
    {

    }
    /**
     * @param $field
     * @param $value
     * @param array $columns
     * @return mixed
     */
    public function findAllBy($field, $value, $columns = array('*'))
    {

    }
    /**
     * @param $where
     * @param array $columns
     * @return mixed
     */
    public function findWhere($where, $columns = array('*'))
    {

    }
}