<?php
namespace App\Models;

use Elasticsearch\Client;


class ElasticsearchArticlesRepository
{
    private $client;

    public function __construct(Client $client) {
        $this->client = $client;
    }

    public function search($q = "")
    {
        $instance = new Article;

        $items = $this->client->search([
            'index' => $instance->getTable(),
            'body' => [
                'query' => [
                    'multi_match' => [
                        'fields'=>['title','tags'],
                        'query' => $q,

                    ] ,
                ],
                "highlight" => [
                    "fields" => [
                        "title"=>new \stdClass(),
                    ],
                ],
//                'sort' => [
//                    ['time' => ['order' => 'desc']],
//                    ['popularity' => ['order' => 'desc']]
//                ]
            ],

        ]);

        return $this->mapToModel($items['hits']['hits']);
    }

    public function mapToModel($articles)
    {
        $items = array_map(function ($item) {
            $article = new Article;
            $article->id=$item["_id"];
            $article->title=$item['_source']['title'];
            $article->tags=$item['_source']['tags'];
            return $article;
        }, $articles);

        return $items;
    }
}
