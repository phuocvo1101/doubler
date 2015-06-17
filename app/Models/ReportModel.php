<?php
/**
 * Created by PhpStorm.
 * User: Tam Tran
 * Date: 5/30/2015
 * Time: 11:30 AM
 */

namespace Models;

class ReportModel extends BaseModel {
    public function __construct()
    {
        parent::__construct();

    }

    public function listReport($start,$limit,$count=0,$search='')
    {
        $arrSearch=array();
        $strLike = '';
        if(!empty($search)){
            $strLike = ' WHERE `unique_id_ordernumber` like ?';
        }

        if($_SESSION['type']!='admin'){
            $querylimit="SELECT * FROM transactions AS tr JOIN users AS u  ON tr.epi=u.id".$strLike." AND u.`id`=?";
            $query="SELECT count(*) AS total FROM `transactions` AS tr JOIN users AS u  ON tr.epi=u.id "." ".$strLike.' ORDER BY `date` desc';
        }else{
            $querylimit = "SELECT * FROM `transactions`".$strLike.' ORDER BY `date` desc  LIMIT ?, ?';
            $query="SELECT count(*) AS total FROM `transactions`  ".$strLike.' ORDER BY `date` desc';
        }

        //echo $query;die();
        if(!empty($search)) {     
            $arrSearch[] = array('%'.trim($search).'%',\PDO::PARAM_STR);
        }

        if($count==1) {

            $this->database->setQuery($query);
            $total = $this->database->loadRow($arrSearch);
            return $total->total;
        }
        if($_SESSION['type']=='admin'){
            $arrSearch[] =array($start,\PDO::PARAM_INT);
            $arrSearch[] =array($limit,\PDO::PARAM_INT);
        }
        if($_SESSION['type']!='admin'){
            $arrSearch[] =array($_SESSION['user_id'],\PDO::PARAM_INT);
        }
        

        $this->database->setQuery($querylimit);
        $result = $this->database->loadAllRows($arrSearch);
        
        //echo '<pre>'.print_r($querylimit,true).'</pre>';die();
        return $result;
    }
    public function sumCommission()
    {
        $querySum="SELECT SUM(commission) AS TotalCommission FROM transactions";
        $this->database->setQuery($querySum);
        $result= $this->database->loadRow();
        return $result->TotalCommission;
    }
    public  function getUsers()
    {
        $query= 'SELECT * FROM `users`';
        $this->database->setQuery($query);
        $result=$this->database->loadAllRows();
        if(!$result){
            return false;
        }
        return $result;
    }
    public function getUserId($id)
    {
        $query= "select * from users where id=?";
        $this->database->setQuery($query);
        $arr= array(
            array($id,\PDO::PARAM_INT)
        );
        $result=$this->database->loadRow($arr);
        if(!$result){
            return false;
        }
        return $result;


    }
    public function updatePoint($point,$id)
    {
       // echo $point.'_'.$id;die();
        $query= "update users set `point`=? Where `id`=?";
        //echo $query;die();
        $this->database->setQuery($query);
        $arr= array(
            array($point,\PDO::PARAM_INT),
            array($id,\PDO::PARAM_INT)
        );
        $result=$this->database->execute($arr);
        if(!$result){
            return false;
        }
        return true;
    }

    public function insertReport($transations)
    {
        foreach($transations as $item) {
            $epi= $item['epi'];     
            if(!empty($epi)) {
                $user= $this->getUserId((int)$epi);
                if($user){
                    
                    $point= (int)($user->point)+1;
                    
                    $this->updatePoint((int)$point,(int)$epi);
                }
            }
            $query = 'INSERT INTO `transactions`(merchantId,date,unique_id_ordernumber,programma_name,programa_prepayment_status,
                      time_of_visit,time_in_session,time_last_modified,evento_name,reason,site_name,elem_grafico_name,status,
                      amount,commission,custom_id,epi) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
            $arrData = array(
                array($item['merchantId'],\PDO::PARAM_INT),
                array($item['date'],\PDO::PARAM_STR),
                array($item['unique_id_ordernumber'],\PDO::PARAM_STR),
                array($item['programma_name'],\PDO::PARAM_STR),
                array($item['programa_prepayment_status'],\PDO::PARAM_STR),
                array($item['time_of_visit'],\PDO::PARAM_STR),
                array($item['time_in_session'],\PDO::PARAM_STR),
                array($item['time_last_modified'],\PDO::PARAM_STR),
                array($item['evento_name'],\PDO::PARAM_STR),
                array($item['reason'],\PDO::PARAM_STR),
                array($item['site_name'],\PDO::PARAM_STR),
                array($item['elem_grafico_name'],\PDO::PARAM_STR),
                array($item['status'],\PDO::PARAM_STR),
                array($item['amount'],\PDO::PARAM_STR),
                array($item['commission'],\PDO::PARAM_STR),
                array($item['custom_id'],\PDO::PARAM_STR),
                array($epi,\PDO::PARAM_STR)
            );
            $this->database->setQuery($query);
            $this->database->execute($arrData);
        }

        return true;
    }

} 