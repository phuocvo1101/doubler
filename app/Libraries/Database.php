<?php
/**
 * Created by PhpStorm.
 * User: Tam Tran
 * Date: 5/30/2015
 * Time: 3:24 AM
 */
namespace Libraries;


class Database extends \PDO {
    private $_dbh;
    private $_sql;
    private $_cursor;
    protected  $host='localhost';
    protected $user='root';
    protected $pass='';
    protected $db='tradedoubler';
    //khoi tao lop ket noi den CSDL

    public function __construct()
    {
        parent::__construct('mysql:host='.$this->host.';dbname='.$this->db, $this->user, $this->pass);
        $this->_dbh =  new \PDO('mysql:host='.$this->host.';dbname='.$this->db, $this->user, $this->pass);
        $this->_dbh->query('set name "utf8"');
    }


    //thiet lap cau lenh truy van
    public function setQuery($sql)
    {
        $this->_sql = $sql;
    }

    public function execquery()
    {
        return $this->exec($this->_sql);
    }

    //thuc thi cau lenh truy van
    public function execute($options=array(),$excute=0)
    {

        $this->_cursor = $this->_dbh->prepare($this->_sql);
        if($options) {
            for($i=0;$i<count($options);$i++) {
                $this->_cursor->bindParam($i+1, $options[$i][0],$options[$i][1]);
            }
        }

        $result = $this->_cursor->execute();
        if($excute==1) {
            return $result;
        }

        return $this->_cursor;
    }
    //lay gia tri trong bang va gan vao mang doi tuong
    public function loadAllRows($options=array())
    {
        if(!$options) {
            if(!$result = $this->execute()) {
                return array();
            }
        } else {
            if(!$result = $this->execute($options)) {
                return array();
            }
        }

        return  $result->fetchAll(\PDO::FETCH_OBJ);
    }
    //lay 1 dong trong bang va gang vao doi tuong
    public function loadRow($options=array())
    {
        if(!$options) {
            if(!$result = $this->execute()) {
                return false;
            }
        } else {
            if(!$result = $this->execute($options)) {
                return false;
            }
        }

        return  $result->fetch(\PDO::FETCH_OBJ);
    }
    //dem so dong ket qua
    public function loadRecord($options=array())
    {
        if(!$options) {
            if(!$result = $this->execute()) {
                return false;
            }
        } else {
            if(!$result = $this->execute($options)) {
                return false;
            }
        }

        return  $result->fetch(\PDO::FETCH_COLUMN);
    }
    //Tim id cuoi cung trong bang
    public function getLastId()
    {
        return $this->_dbh->lastInsertId();
    }
    //ngat ket noi
    public function disconnect()
    {
        $this->_dbh = NULL;
    }
} 