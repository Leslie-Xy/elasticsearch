use Leslie\elasticsearch\Repository\ElasticSearch\ElasticSearchModel;

$this->model = with(new ElasticSearchModel($this->index, $this->type));

## get()
$sessionData = $this->model->get();

## where()
$this->model->where['query']['bool']['filter'][] = ['range' => [$field => $data]];
$this->model->where['query']['bool']['filter'][] = ['term' => [$field => $data]];
$this->model->where['query']['bool']['filter'][] = ['terms' => [$field => $data]];
`script: Two-field computation where` 
<br>
$this->model->where['query']['bool']['filter'][] = ['script' => ['script' => ['inline' => "(doc['start_talking_at_es'].value - doc['created_at_es'].value) < 30", 'lang' => 'painless']]];

## field()
$this->model->field['_source'] = ['includes' => $field];

## group()
$this->model->group = ['aggs' => [$aggsName => ['terms'=> ['field' => $aggsName, 'size' => $size]]]];
        if (!empty($aggsArr)){
            $this->model->group['aggs'][$aggsName]['aggregations'] = $aggsArr;
        }
<br>
`aggs原生`
<br>
$this->model->group['aggs'] = ['esim_ids' => ['terms' => ['field' => 'esim_id', 'size' => 10000, 'order' => ['max_time' => 'desc']], 'aggs' => ['max_time' => ['max' => ['field' => 'create_time']]]]];

## paginate()
$obuVideo['list'] = $this->model->paginate($page);
$obuVideo['page_count'] = $this->model->page_count;
$obuVideo['page'] = $page;

## create()
`插入数据`<br>
$this->model->create($insertData, 'id');

## saveModel()
`修改数据`<br>
$this->model->saveModel($updateData, 'id');

## delete()
`删除数据`<br>
$this->model->delete($deleteId);

## createTable()
`创建索引`<br>
$model = with(new ElasticSearchModel('saas', 'knowledge_base'));
$field = [
    'id' => ['type' => 'integer'],
    'title' => ['type' => 'text'],
    'problem_id' => ['type' => 'integer'],
    'content' => ['type' => 'text'],
    'engineer_code' => ['type' => 'text'],
    'updated_at' => ['type' => 'text'],
    'created_at' => ['type' => 'text'],
];
$model->createTable('saas', 'knowledge_base', $field);