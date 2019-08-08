<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Cube\Ccp\Repository\ElasticSearch\ElasticSearchModel;

class InitializationElasticsearchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //创建chatsession表
        $model = with(new ElasticSearchModel('cube_ccp_chat', 'chat_sessions'));
        $field = [
            'id' => ['type' => 'text'],
            'cube_uid' => ['type' => 'text'],
            'customer_id' => ['type' => 'text'],
            'client_type' => ['type' => 'text'],
            'engineer_code' => ['type' => 'text'],
            'engineer_name' => ['type' => 'text'],
            'engineer_avatar' => ['type' => 'text'],
            'status' => ['type' => 'integer'],
            'type' => ['type' => 'integer'],
            'from' => ['type' => 'integer'],
            'start_talking_at' => ['type' => 'text'],
            'end_talking_at' => ['type' => 'text'],
            'emotion' => ['type' => 'integer'],
            'access_id' => ['type' => 'integer'],
            'access_name' => ['type' => 'text'],
            'business_id' => ['type' => 'integer'],
            'business_name' => ['type' => 'text'],
            'team' => ['type' => 'text'],
            'last_queue_code' => ['type' => 'text'],
            'last_queue_name' => ['type' => 'text'],
            'current_queue_code' => ['type' => 'text'],
            'current_queue_name' => ['type' => 'text'],
            'next_queue_code' => ['type' => 'text'],
            'next_queue_name' => ['type' => 'text'],
            'open_id' => ['type' => 'text'],
            'user_name' => ['type' => 'text'],
            'user_avatar' => ['type' => 'text'],
            'province' => ['type' => 'text'],
            'city' => ['type' => 'text'],
            'address' => ['type' => 'text'],
            'phone' => ['type' => 'text'],
            'phone_conn_id' => ['type' => 'text'],
            'created_at' => ['type' => 'text'],
            'updated_at' => ['type' => 'text'],
            'start_talking_at_es' => ['type' => 'integer'],
            'end_talking_at_es' => ['type' => 'integer'],
            'created_at_es' => ['type' => 'integer'],
            'updated_at_es' => ['type' => 'integer'],
            'time_paragraph' => ['type' => 'integer'],
            'id_es' => ['type' => 'text'],
        ];
        $model->createTable('cube_ccp_chat', 'chat_sessions', $field);
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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
