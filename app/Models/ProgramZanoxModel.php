<?php
namespace Models;

use GuzzleHttp\Client;

class ProgramZanoxModel extends BaseModel
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getPrograms($params = array())
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

        $modelData = new \Models\GetDataModel();
    
        $programs = $modelData->getPrograms($network,$params);
        $data = json_decode($programs,true);
      return $data;
//         $result = array_map(function($obj) {
//             return $obj['@id'];
//         }, $data['programItems']['programItem']);
//         return $result;
    
    }
    
    public function listPrograms($page,$limit,$search='')
    {
    
        
        $params = array(
            'partnership' => 'INDIRECT',
            'items' => $limit,
            'page' => $page-1
        );
        
        if($search != ""){
            $params['q'] = $search;
        }
        
        $result = $this->getPrograms($params);
   
       
        return array(
            'total' => $result['total'],
            'programs' => isset($result['programItems']['programItem'])? $result['programItems']['programItem'] : []
        );
    }
    
//     public function listProductProgram($search='')
//     {
        
//         $programs = $this->getPrograms();
      
//         $arrProduct = array();
//         $productModel = new ProductZanoxModel();
//         foreach($programs as $item)
//         {
//             $params = array(
//                 'programs' => $item,
//                 'items' => 1
//              //   'programs' => $item
//             );
//             if($search!='') {
//                 $params['q']=$search;
//             }
//             $product = $productModel->getData($params);
//             echo '<pre>'.print_r($product,true).'</pre>';
//            die();
//             if($product['total'] ==0) {
//                 continue;
//             }
          
//             $arrProduct[] = $product['productItems']['productItem'][0];
//         }
       
//         return $arrProduct;

//     }
}