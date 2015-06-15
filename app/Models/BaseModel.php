<?php
/**
 * Created by PhpStorm.
 * User: Tam Tran
 * Date: 5/30/2015
 * Time: 11:30 AM
 */

namespace Models;


//use Libraries\Database;

use Libraries\Database;

class BaseModel {
    protected $database;
    public function __construct()
    {
        $this->database = new Database();
    }
    public function listReportId()
    {
        $querylimit="SELECT * FROM transactions AS tr JOIN users AS u  ON tr.epi=u.id WHERE u.`id`=?";
        $this->database->setQuery($querylimit);
        $arr= array(
            array($_SESSION['user_id'],\PDO::PARAM_INT)
        );
        $result= $this->database->loadRow($arr);
       // var_dump($result);die();
        if(!$result){
            return array();
        }
        return $result;
    }
    public function sumCommissionReport($epi='')
    {
        if($epi!=''){
            $querySum="SELECT SUM(commission) AS TotalCommission FROM transactions WHERE `epi`=?";
        }else{
            $querySum="SELECT SUM(commission) AS TotalCommission FROM transactions";
        }
        $this->database->setQuery($querySum);
        if($epi!=''){
            $arr= array(
                array($epi,\PDO::PARAM_INT)
            );
        }else{
            $arr=array();
        }
        $result= $this->database->loadRow($arr);
        return $result->TotalCommission;
    }
} 