<?php
namespace Models;

use GuzzleHttp\Client;
class ProductModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }
    public function listProduct($page,$limit,$count=0,$search='')
    {
        $arrSearch=array();
        $result = array();
        $client = new Client([]);
        $strsearch="";
        if($search != ""){
            $strsearch= ";q=".$search;
        }
        //echo $page."-".$limit;die();
        $url= 'http://api.tradedoubler.com/1.0/products.json'.$strsearch.'?token=BFDFD4A24D6DBD5F9D0B091D9714B5460891B53B';
        $urllimit = 'http://api.tradedoubler.com/1.0/products.json;page='.$page.';limit='.$limit.$strsearch.'?token=BFDFD4A24D6DBD5F9D0B091D9714B5460891B53B';
       // echo  $url;die();
        if($count==1){
           // echo 'dggdg';die();
            $response = $client->get($url);
            $stream = $response->getBody(true);
            $content = $stream->getContents();
            $result = json_decode($content,true);
            return count($result['products']);

        }

        $response = $client->get($urllimit);
        $code = $response->getStatusCode(); // 200
        $reason = $response->getReasonPhrase(); // OK
        $stream = $response->getBody(true);
        $content = $stream->getContents();
        $result = json_decode($content,true);
//echo '<pre>'.print_r($result,true).'</pre>';die();
          if(isset($result['products'])) {
            //  echo '<pre>'.print_r($result['products'],true).'</pre>';die();
              return $result['products'];
          }
        return $result;
    }
}