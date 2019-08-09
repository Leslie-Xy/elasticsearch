## Another example
```php
use Cube\Ccp\Repository\ElasticSearch\ElasticSearchModel;

$this->model = with(new ElasticSearchModel($this->index, $this->type));

## get()
$sessionData = $this->model->get();

## where()
$this->model->where['query']['bool']['filter'][] = ['range' => [$field => $data]];
$this->model->where['query']['bool']['filter'][] = ['term' => [$field => $data]];
$this->model->where['query']['bool']['filter'][] = ['terms' => [$field => $data]];
> script: Two-field computation where
$this->model->where['query']['bool']['filter'][] = ['script' => ['script' => ['inline' => "(doc['start_talking_at_es'].value - doc['created_at_es'].value) < 30", 'lang' => 'painless']]];

## field()
$this->model->field['_source'] = ['includes' => $field];

## group()
$this->model->group = ['aggs' => [$aggsName => ['terms'=> ['field' => $aggsName, 'size' => $size]]]];
        if (!empty($aggsArr)){
            $this->model->group['aggs'][$aggsName]['aggregations'] = $aggsArr;
        }
>aggs原生
$this->model->group['aggs'] = ['esim_ids' => ['terms' => ['field' => 'esim_id', 'size' => 10000, 'order' => ['max_time' => 'desc']], 'aggs' => ['max_time' => ['max' => ['field' => 'create_time']]]]];

## paginate()
$obuVideo['list'] = $this->model->paginate($page);
$obuVideo['page_count'] = $this->model->page_count;
$obuVideo['page'] = $page;