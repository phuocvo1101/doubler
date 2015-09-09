<?php
namespace Models;

use GuzzleHttp\Client;

class ProductZanoxModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getData($params = array())
    {
       
        require_once realpath(dirname(__FILE__)) . '/../../bin/settings.php';
        $networkName = "Zanox"; //Ex: AffiliateWindow
        //Retrieving the credentials for the network
        
      
        
        $configName = strtolower($networkName);
     
        $config = \Zend_Registry::getInstance()->get('credentialsIni');
        
        $configName = strtolower($networkName);
        $credentials = $config->$configName->toArray();
        
        //Path for the cookie located inside of COOKIES_BASE_DIR
        $credentials["cookiesDir"] = "zanox";
        $credentials["cookiesSubDir"] = $networkName;
        $credentials["cookieName"] = "test";
        
        //The name of the network, It should be the same that the class inside Oara/Network
        $credentials['networkName'] = $networkName;
        //Which point of view "Publisher" or "Advertiser"
        $credentials['type'] = "Publisher";
        //The Factory creates the object
        $network = \Oara_Factory::createInstance($credentials,'json');
        //Oara_Test::testNetwork($network);
        
        $data = new \Models\GetDataModel();
       
        $productList = $data->getProducts($network,$params);
        $data = json_decode($productList,true);
       return $data;
        
    }
    
    public function listProduct($page,$limit,$search='')
    {
        $params = array(
            'items' => $limit,
            'page' => $page-1
        );
        $result = $this->getData($params);
       
       
        if($search != ""){
           $params['q'] = $search;
        }
       
        return array(
            'total' => $result['total'],
            'products' => $result['productItems']['productItem']
        );
    }
}