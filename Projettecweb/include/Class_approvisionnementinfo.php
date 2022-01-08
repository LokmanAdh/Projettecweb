<?php

require_once('dbaccess.php');

class Approvisionnementinfo{
    private $_produitref;
    private $_anum;
    private $_quantite;
    private $_dba;

    public function __construct(){

    }

    public function getproduitref(){
        return $this->_produitref;
    }

    public function setproduitref($produitref){
        $this->_produitref = $produitref;
    }

    public function getanum(){
        return $this->_anum;
    }

    public function setanum($anum){
        $this->_anum = $anum;
    }


    public function getquantite(){
        return $this->_quantite;
    }

    public function setquantite($quantite){
        $this->_quantite = $quantite;
    }


    public function save(){
        $_dba = new Dbaccess(); 
        $_dba->query("insert into approvisionnementinfo values( '" . $this->_produitref . "',
                                                            '" . $this->_anum . "',
                                                            "  . $this->_quantite . ")");
        $_dba->execute();
        return 0;
    }

    public function delete(){
        $_dba = new Dbaccess();
        $_dba->query("delete from approvisionnementinfo where P_reference ='" . $this->_produitref . "' AND A_num = '" . $this->_anum . "'" );
        $_dba->execute();
        return 0;
    }

    public function update($ref){
        $_dba = new Dbaccess(); 
        $_dba->query("update approvisionnementinfo set  F_reference = '" . $this->_produitref . "',
                                                    approvisionnement_quantite = '"  . $this->_quantite . "'
                                                    where A_num = '"  . $this->_num . "' AND F_refrence = '$ref'");
        $_dba->execute();
        return 0;
    }

    public static function getOne($req){
        $_dba = new Dbaccess(); 
        $_dba->query("Select * from approvisionnementinfo where ".strval($req)."");
        return $_dba->single();
    }


    public static function count(){
        $_dba = new Dbaccess();
        $_dba->query("Select count(*) as nbr from approvisionnementinfo");
        return $_dba->rowCount();
    }

    public static function getAll(){
        $_dba = new Dbaccess(); 
        $_dba->query("Select * from approvisionnementinfo");
        return $_dba->resultSet();
    }

    public static function getSome($req)
    {
        $_dba = new Dbaccess();
        $sql="SELECT * FROM approvisionnementinfo WHERE ".strval($req)." ;";
        $_dba->query($sql);
        return $_dba->resultSet();
    }

}

?>