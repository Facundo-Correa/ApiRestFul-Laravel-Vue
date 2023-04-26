<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Elasticsearch\Client;

class ElasticController extends Controller
{
    public function createIndex(Client $elasticsearch){
        $params=['index'=>'article',
            'body'=> [
                "settings"=> [
                    'index.max_ngram_diff'=>2,
                    "analysis"=> [
                        "analyzer"=> [
                            "analyzer_spanish"=> [
                                "type" =>"custom",
                                /*"char_filter"=> [
                                     "my_char_filter"
                                 ],*/
                                "stopwords"=> '_latin_',
                                'tokenizer' => 'lowercase',
                                'filter'=>['asciifolding','title_ngram'],
                            ],
                        ],
                        /*"char_filter"=> [
                           "my_char_filter"=> [
                                "type"=> "mapping",
                               "mappings"=> [
                                    "´ => ",
                                    "los => ",
                                    "٢ => 2",
                                    "٣ => 3",
                                   "٤ => 4",
                                   "٥ => 5",
                                   "٦ => 6",
                                   "٧ => 7",
                                   "٨ => 8",
                                   "٩ => 9"
                               ]
                            ]
                       ],*/
                        "filter" => [
                            'lowercase',
                            "title_ngram" =>[
                                "type" => "nGram",
                                "min_gram" => 3,
                                "max_gram" => 5
                            ]
                        ],
                    ],
                ],
                'mappings'=>[
                    "properties"=> [
                        "title"=> [
                            "type"=> "text",
                            "analyzer"=> "analyzer_spanish",
                            "boost"=>10,
                        ],
                        "tags"=>[
                            "type"=> "text",
                        ],
                    ],
                ],

            ],
        ];
        $elasticsearch->indices()->create($params);
        return view('welcome');
    }
}
