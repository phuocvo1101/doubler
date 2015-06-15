<?php
namespace Models;

use GuzzleHttp\Client;

class ProductModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }
    public function listProduct($page,$limit,$search='')
    {

        $client = new Client([]);
        $strsearch="";
        if($search != ""){
            $strsearch= ";q=".$search;
        }
        $pagelimit = ($limit*$page)+$limit;
        $urllimit = 'http://api.tradedoubler.com/1.0/products.json;page='.$page.';pageSize='.$limit.$strsearch.';limit='.$pagelimit.'?token=BFDFD4A24D6DBD5F9D0B091D9714B5460891B53B';
        $response = $client->get($urllimit);
        $stream = $response->getBody(true);
        $content = $stream->getContents();
        $result = json_decode($content,true);
        if(!isset($result['products'])) {
            return array(
                'total' => 0,
                'products' => array()
            );
        }

        return array(
            'total' => $result['productHeader']['totalHits'],
            'products' => $result['products']
        );
    }
}