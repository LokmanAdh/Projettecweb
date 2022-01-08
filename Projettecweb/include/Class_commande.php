<?php

require_once('dbaccess.php');

class Commande{
    private $_commandenum;
    private $_commandedate;
    private $_clientid;
    private $_dba;

    public function __construct(){

    }

    public function getcommandenum(){
        return $this->_commandenum;
    }

    public function setcommandenum($commandenum){
        $this->_commandenum = $commandenum;
    }

    public function getcommandedate(){
        return $this->_commandedate;
    }

    public function setcommandedate($commandedate){
        $this->_commandedate = $commandedate;
    }

    public function getclientid(){
        return $this->_clientid;
    }

    public function setclientid($clientid){
        $this->_clientid = $clientid;
    }

    public function save(){
        $_dba = new Dbaccess(); 
        $_dba->query("insert into commande(commande_date,client_id) values('" . $this->_commandedate . "',
                                                '"  . $this->_clientid . "')");
        $_dba->execute();
        return 0;
    }

    public function delete(){
        $_dba = new Dbaccess();
        $_dba->query("delete from commande where commande_num ='" . $this->_commandenum . "'" );
        $_dba->execute();
        return 0;
    }

    public function update(){
        $_dba = new Dbaccess(); 
        $_dba->query("update commande set commande_num = '" . $this->_commandenum . "',
                                        commande_date = '" . $this->_commandedate . "',
                                        client_id = '" . $this->_clientid . "'
                                        where commande_num = '"  . $this->_commandenum . "'");
        $_dba->execute();
        return 0;
    }

    public function getOne(){
        $_dba = new Dbaccess(); 
        $_dba->query("Select * from commande where commande_num='" . $this->_commandenum . "'");
        return $_dba->single();
    }

    public static function getSome($req)
    {
        $_dba = new Dbaccess();
        $sql="SELECT * FROM commande WHERE ".strval($req)." ;";
        $_dbadb->query($sql);
        return $_dba->resultSet();
    }


    public static function count(){
        $_dba = new Dbaccess();
        $_dba->query("Select count(*) as nbr from commande");
        return $_dba->rowCount();
    }

    public static function getAll(){
        $_dba = new Dbaccess(); 
        $_dba->query("Select * from commande");
        return $_dba->resultSet();
    }

}

?>