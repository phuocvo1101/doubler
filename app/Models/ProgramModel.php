<?php
namespace Models;

use GuzzleHttp\Client;

class ProgramModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }
    public function listProductProgram($search='')
    {
        $client = new Client([]);
        $strsearch="";
        if($search != ""){
            $strsearch= ";q=".$search;
        }
        $url='http://api.tradedoubler.com/1.0/productFeeds.json'.$strsearch.'?token=BFDFD4A24D6DBD5F9D0B091D9714B5460891B53B';
        $response = $client->get($url);
        $stream = $response->getBody(true);
        $content = $stream->getContents();
        $feeds = json_decode($content,true);
        $arrProduct = array();
        foreach($feeds['feeds'] as $item)
        {
            $urlProduct='http://api.tradedoubler.com/1.0/products.json;fid='.$item['feedId'].';limit=1?token=BFDFD4A24D6DBD5F9D0B091D9714B5460891B53B';
            $response = $client->get($urlProduct);
            $stream = $response->getBody(true);
            $content = $stream->getContents();
            $product = json_decode($content,true);
            if($product['products']!==array()){
                $arrProduct[] = $product['products'];
            }
        }

        return $arrProduct;

    }
}