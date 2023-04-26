<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Vedmant\FeedReader\Facades\FeedReader;
use willvincent\Feeds\Facades\FeedsFacade;


class NoticiasController extends Controller
{
    public function feedsHome(){

        $url = array("http://api.motorpress-iberica.es/rss/motociclismo",
            "http://www.formulamoto.es/elementosInt/rss/144",
            "http://www.formulamoto.es/elementosInt/rss/171",
            "http://www.formulamoto.es/elementosInt/rss/162",
            "http://www.formulamoto.es/elementosInt/rss/187"
        ); // url to parse
        $feed = FeedsFacade::make(($url[rand(0,4)])); // XML parser

        $initialFeed = collect($feed->data['child'][""]["rss"][0]["child"][""]["channel"][0]["child"][""]);

        $endFeed = [];

        $endFeed["title"] = $initialFeed["title"][0];
        $endFeed["link"] = $initialFeed["link"][0];
        $endFeed["description"] = $initialFeed["description"][0];
        $endFeed["image"] = $initialFeed["image"][0]["child"][""];
        $endFeed["items"] = $initialFeed["item"];

        $itemsNoticias = [];

        $rgx = '~'                  // REGEX DELIMITER
            . 'src="'              // SRC INSIDE IMAGE TAG
            . '('                  // START CAPTURE GROUP
            . '[^"]*'              // ANYTHING UP TO END
            . ')'                  // ENDOF CAPTURE GROUP
            . '"'                  // END OF SRC ATTRIBUTE
            . '~'                  // REGEX DELIMITER
            . 'i'                  // FLAG: CASE INSENSITIVE
            . 's'                  // FLAG: SINGLE LINE
        ;

        foreach ($endFeed["items"] as $item){

            $content = $item["child"][""]["description"][0]["data"];


            preg_match_all($rgx, $content, $match);
            $node = $match[0];


            $src = $node[0];
            if(count($node) > 1) {

                $src = $node[1];

            }

            $src = str_replace('src=', '',$src);

            $src = str_replace(array('"', '\"'), '', $src);

            $xmlnode= new \DOMDocument();
            $xmlnode->loadHTML($content);


            $item["child"][""]["title"] = $item["child"][""]["title"][0];
            $item["child"][""]["link"] = $item["child"][""]["link"][0];
            $item["child"][""]["description"] = utf8_decode($xmlnode->textContent);
            $item["child"][""]["guid"] = $item["child"][""]["guid"][0];
            $item["child"][""]["pubDate"] = $item["child"][""]["pubDate"][0];

            $item["child"] = $item["child"][""];
            $item["child"]["img"] = $src;
            $itemsNoticias[] = $item;



        }


        $endFeed["items"] = $itemsNoticias;

        return $this->showMessage($endFeed);
    }
}
