<?php
require_once('dbaccess.php');

class Fournisseur{

    private  $_fournisseurid;
    private  $_fournisseurnom;
    private  $_fournisseuremail;
    private  $_fournisseurtel;
    private  $_fournisseuraddresse;
    private  $_dba;

    public function __construct(){  

    }

    public function getfournisseurid(){
        return $this->_fournisseurid;
    }

    public function setfournisseurid($fournisseurid){
        $this->_fournisseurid = $fournisseurid;
    }

    public function getfournisseurnom(){
        return $this->_fournisseurnom;
    }

    public function setfournisseurnom($fournisseurnom){
        $this->_fournisseurnom = $fournisseurnom;
    }
    
    public function getfournisseuremail(){
        return $this->_fournisseuremail ;
    }

    public function setfournisseuremail($fournisseuremail){
        $this->_fournisseuremail = $fournisseuremail;
    }

    public function getfournisseurtel(){
        return $this->_fournisseurtel ;
    }

    public function setfournisseurtel($fournisseurtel){
        $this->_fournisseurtel = $fournisseurtel;
    }

    public function getfournisseuraddresse(){
        return $this->_fournisseuraddresse ;
    }

    public function setfournisseuraddresse($fournisseuraddresse){
        $this->_fournisseuraddresse = $fournisseuraddresse;
    }

    

    public function save(){
        $_dba = new Dbaccess(); 
        $_dba->query("insert into fournisseur(F_nom,F_email,F_tel,F_addresse) values('" . $this->_fournisseurnom . "',
                                                '"  . $this->_fournisseuremail . "',
                                                '"  . $this->_fournisseurtel . "',
                                                '"  . $this->_fournisseuraddresse . "')");
        $_dba->execute();
        return 0;
    }

    public function delete(){
        $_dba = new Dbaccess();
        $_dba->query("delete from fournisseur where F_id ='" . $this->_fournisseurid . "'" );
        $_dba->execute();
        return 0;
    }

    public function update(){
        $_dba = new Dbaccess(); 
        $_dba->query("update fournisseur set F_id = '" . $this->_fournisseurid . "',
                                                    F_nom = '" . $this->_fournisseurnom . "',
                                                    F_email = '"  . $this->_fournisseuremail . "',
                                                    F_tel = '"  . $this->_fournisseurtel . "',
                                                    F_addresse	 = '"  . $this->_fournisseuraddresse . "'
                                                    where F_id = '"  . $this->_fournisseurid . "'");
        $_dba->execute();
        return 0;
    }

    public static function getAll(){
        $_dba = new Dbaccess(); 
        $_dba->query("Select * from fournisseur");
        return $_dba->resultSet();
    }

    public static function getOne($req){
        $_dba = new Dbaccess(); 
        $_dba->query("Select * from fournisseur where ".strval($req)."");
        return $_dba->single();
    }

    public static function getSome($req)
    {
        $_dba = new Dbaccess();
        $sql="SELECT * FROM fournisseur WHERE ".strval($req)." ;";
        $_dba->query($sql);
        return $_dba->resultSet();
    }


    public static function count(){
        $_dba = new Dbaccess();
        $_dba->query("Select count(*) as nbr from fournisseur");
        return $_dba->rowCount();
    }
};

?>