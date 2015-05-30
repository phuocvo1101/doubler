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
            $strLike = ' WHERE (network like ?)';
        }

        $query="SELECT count(*) AS total FROM reports "." ".$strLike.' ORDER BY Date desc';

        $querylimit = "SELECT * FROM reports "." ".$strLike.' ORDER BY Date desc  LIMIT ?, ?';
        //echo $query;die();
        if(!empty($search)) {
            $arrSearch[] = array('%'.$search.'%',\PDO::PARAM_STR);
        }
        $this->database->setQuery($query);
        $total = $this->database->loadRow($arrSearch);

        if($count==1) {
            return $total->total;
        }

        $arrSearch[] =array($start,\PDO::PARAM_INT);
        $arrSearch[] =array($limit,\PDO::PARAM_INT);


        $this->database->setQuery($querylimit);
        $result = $this->database->loadAllRows($arrSearch);
        return $result;
    }

} 