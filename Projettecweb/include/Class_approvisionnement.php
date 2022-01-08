<?php

require_once('dbaccess.php');

class Approvisionnement{
    private $_num;
    private $_date;
    private $_Fournisseurid;
    private $_dba;

    public function __construct(){

    }

    public function getnum(){
        return $this->_num;
    }

    public function setnum($num){
        $this->_num = $num;
    }

    public function getdate(){
        return $this->_date;
    }

    public function setdate($date){
        $this->_date = $date;
    }


    public function getFournisseurid(){
        return $this->_Fournisseurid;
    }

    public function setFournisseurid($Fournisseurid){
        $this->_Fournisseurid = $Fournisseurid;
    }


    public function save(){
        $_dba = new Dbaccess(); 
        $_dba->query("insert into approvisionnement(A_date,F_id) values( '" . $this->_date . "',
                                                            "  . $this->_Fournisseurid . ")");
        $_dba->execute();
        return 0;
    }

    public function delete(){
        $_dba = new Dbaccess();
        $_dba->query("delete from approvisionnement where A_num ='" . $this->_num . "'" );
        $_dba->execute();
        return 0;
    }

    public function update(){
        $_dba = new Dbaccess(); 
        $_dba->query("update approvisionnement set A_num = '" . $this->_num . "',
                                                    A_date = '" . $this->_date . "',
                                                    F_id = '"  . $this->_Fournisseurid . "'
                                                    where A_num = '"  . $this->_num . "'");
        $_dba->execute();
        return 0;
    }

    public static function getOne($req){
        $_dba = new Dbaccess(); 
        $_dba->query("Select * from approvisionnement where ".strval($req)."");
        return $_dba->single();
    }


    public static function count(){
        $_dba = new Dbaccess();
        $_dba->query("Select count(*) as nbr from approvisionnement");
        return $_dba->rowCount();
    }

    public static function getAll(){
        $_dba = new Dbaccess(); 
        $_dba->query("Select * from approvisionnement");
        return $_dba->resultSet();
    }

    public static function getSome($req)
    {
        $_dba = new Dbaccess();
        $sql="SELECT * FROM approvisionnement WHERE ".strval($req)." ;";
        $_dba->query($sql);
        return $_dba->resultSet();
    }

}

?>