<?php

namespace Leslie\elasticsearch\Repository\ElasticSearch;

use Leslie\elasticsearch\Repository\Repository;
use Leslie\elasticsearch\Repositorys\RepositoryInterface;
use Leslie\elasticsearch\Exceptions\RepositoryException;

class ElasticSearchModel extends Repository
{
    public $esUrl;

    public $url;

    public $field = [];

    public $orderBy = [];

    public $group = [];

    public $where = [];

    public $size = [];

    public $from = [];

    public $params = [];

    public $page_count;

    public function __construct($index, $type)
    {
        $this->esUrl = config('elasticsearch.elasticsearch_host');
        $this->url = $this->esUrl . $index . '/' . $type;
        $this->model();
    }

    public function model()
    {
        if(! $this instanceof RepositoryInterface) {
            throw new RepositoryException([
                'msg' => "Class {" . self::class . "} must be an instance of Leslie\\elasticsearch\\Repositorys\\RepositoryInterface"
            ]);
        }
    }

    public function create(array $data, string $index)
    {
        $url = $this->url . '/' . $data[$index];
        $result = SendRequest($url, 'POST', $data);
        return $result;
    }

    public function saveModel(array $data, string $index)
    {
        $updateData['doc'] = $data;
        $url = $this->url .  '/' . $data[$index] . '/_update?pretty';
        $result = SendRequest($url, 'POST', $updateData);
        return $result;
    }

    public function delete($id)
    {
        $url = $this->url .  '/' . $id . '/?pretty';
        $result = SendRequest($url, 'DELETE');
        return $result;
    }

    public function get()
    {
        $url = $this->url . '/_search';
        $this->merge();
        $result = SendRequest($url, 'POST', $this->params);
        $data['hits'] = !empty(array_column($result['hits']['hits'], '_source')) ? array_column($result['hits']['hits'], '_source') : [];
        $data['aggregations'] = !empty($result['aggregations']) && !empty($this->group) ? $result['aggregations'] : [];
        $this->unset;
        return $data;
    }

    public function count()
    {
        $url = $this->url . '/_search';
        $this->merge();
        $result = !empty($this->params) ? SendRequest($url,'POST', $this->params) : SendRequest($url);
        $count = !empty($result['hits']) ? $result['hits']['total'] : 0;
        return $count;
    }

    public function paginate($perPage = 1, $columns = array('*'))
    {
        $this->merge();
        $count = $this->count();
        $this->page_count = $this->SetOffset($count,$perPage,$this->limit);
        $this->size = ['size' => $this->limit];
        $this->from = ['from' => $this->offset];
        return $this->get();
    }

    public function createTable($index, $type, $data)
    {
        $this->params = ['mappings' => [$type => ['properties' => $data]]];
        SendRequest($this->esUrl . $index, 'PUT', $this->params);
    }

    public function merge()
    {
        $this->params = array_merge($this->field, $this->orderBy, $this->where, $this->size, $this->from, $this->group);
    }

    public function __get($arguments)
    {
        $this->field = $this->orderBy =$this->where = $this->size = $this->from = $this->group = [];
    }

    public $limit;
    private $offset;
    /**
     * 分页设置
     * @param int $count 总条数
     * @param int $page 当前页数
     * @return int $page_count 总页数
     */
    protected function SetOffset($count, $page, $limit = 10)
    {
        $this->limit = $limit;
        $page_count = ceil($count / $limit);
        $this->offset = ($page - 1) * $limit;
        return $page_count;
    }
}