<?php
namespace Libraries;

class Pagination {
    public $limit = '';
    protected $_baseUrl;


    public function __construct($limit,$base_url)//$base_url
    {
        $this->_baseUrl = $base_url;
        $this->limit = $limit;
    }

    public function start(){
        if(isset($_REQUEST['start'])){
            $start = $_REQUEST['start'];
        }else{
            $start = 0;
        }
        return $start;
    }


    public function totalPages($totalRecord){
        if(isset($_REQUEST['pages']) && !empty($_REQUEST['pages'])){
            $totalPages = $_REQUEST['pages'];
        }else{

            $totalPages = ceil($totalRecord/$this->limit);

        }
        return $totalPages;
    }


    public function listPages($totalPages){
        $start = $this->start();
        $limit = $this->limit;
        $listPage = '';

        if($totalPages > 1){
            $current = ($start/$limit) + 1;
            if($current != 1){
                $newstart = $start - $limit;
                $listPage .= "<a href='".$this->_baseUrl."&pages=".$totalPages."&start=".$newstart."&limit=".$limit."'>Prev</a>";
            }

            $cursor = $current;

            if($cursor<4) {
                $cursor = $cursor+4;
            }


            for($i=$cursor-4;$i<=$cursor+5;$i++){
                $newstart = ($i - 1)*$limit;
                if($i == $current){
                    $listPage .= "<span class='current'>".$i."</span>";
                }else{
                    $listPage .= "<a href='".$this->_baseUrl."&pages=".$totalPages."&start=".$newstart."&limit=".$limit."'>".$i."</a>";
                }
            }

            if($current != $totalPages){
                $newstart = $start + $limit;
                $listPage .= "<a href='".$this->_baseUrl."&pages=".$totalPages."&start=".$newstart."&limit=".$limit."'>Next</a>";
            }
        }

        return $listPage;
    }
} 