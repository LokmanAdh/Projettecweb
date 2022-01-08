<?php

require_once('dbaccess.php');

class Commandeinfo{
    private $_commandenum;
    private $_Produitref;
    private $_commandequantite;
    private $_dba;

    public function __construct(){

    }

    public function getcommandenum(){
        return $this->_commandenum;
    }

    public function setcommandenum($commandenum){
        $this->_commandenum = $commandenum;
    }

    public function getProduitref(){
        return $this->_commandedate;
    }

    public function setProduitref($Produitref){
        $this->_Produitref = $Produitref;
    }

    public function getcommandequantite(){
        return $this->_commandequantite;
    }

    public function setcommandequantite($commandequantite){
        $this->_commandequantite = $commandequantite;
    }

    public function save(){
        $_dba = new Dbaccess(); 
        $_dba->query("insert into commandeinfo values('" . $this->_commandenum . "',
                                                '" . $this->_Produitref . "',
                                                '"  . $this->_commandequantite . "')");
        $_dba->execute();
        return 0;
    }

    public function delete(){
        $_dba = new Dbaccess();
        $_dba->query("delete from commandeinfo where commande_num ='" . $this->_commandenum . "' AND P_reference ='" . $this->_Produitref . "'" );
        $_dba->execute();
        return 0;
    }

    public function update(){
        $_dba = new Dbaccess(); 
        $_dba->query("update commandeinfo set commande_num = '" . $this->_commandenum . "',
                                        P_reference = '" . $this->_Produitref . "',
                                        commande_quantite = '" . $this->_commandequantite . "',
                                        where commande_num = '"  . $this->_commandenum . "'");
        $_dba->execute();
        return 0;
    }

    public function getOne(){
        $_dba = new Dbaccess(); 
        $_dba->query("Select * from commandeinfo where commande_num='" . $this->_commandenum . "'");
        return $_dba->single();
    }

    public static function getSome($req)
    {
        $_dba = new Dbaccess();
        $sql="SELECT * FROM commandeinfo WHERE ".strval($req)." ;";
        $_dba->query($sql);
        return $_dba->resultSet();
    }


    public static function count(){
        $_dba = new Dbaccess();
        $_dba->query("Select count(*) as nbr from commandeinfo");
        return $_dba->rowCount();
    }

    public static function getAll(){
        $_dba = new Dbaccess(); 
        $_dba->query("Select * from commandeinfo");
        return $_dba->resultSet();
    }

}

?>