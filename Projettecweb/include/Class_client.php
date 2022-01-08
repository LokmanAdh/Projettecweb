<?php
require_once('dbaccess.php');

class Client{

    private  $_clientid;
    private  $_clientnom;
    private  $_clientprenom;
    private  $_clientemail;
    private  $_clienttel;
    private  $_clientaddresse;
    private  $_clientusername ;
    private  $_clientpassword ;
    private  $_dba;

    public function __construct(){  

    }

    public function getclientid(){
        return $this->_clientid;
    }

    public function setclientid($clientid){
        $this->_clientid = $clientid;
    }

    public function getclientnom(){
        return $this->_clientnom;
    }

    public function setclientnom($clientnom){
        $this->_clientnom = $clientnom;
    }

    public function getclientprenom(){
        return $this->_clientprenom;
    }

    public function setclientprenom($clientprenom){
        $this->_clientprenom = $clientprenom;
    }
    
    public function getclientemail(){
        return $this->_clientemail ;
    }

    public function setclientemail($clientemail){
        $this->_clientemail = $clientemail;
    }

    public function getclienttel(){
        return $this->_clienttel ;
    }

    public function setclienttel($clienttel){
        $this->_clienttel = $clienttel;
    }

    public function getclientaddresse(){
        return $this->_clientaddresse ;
    }

    public function setclientaddresse($clientaddresse){
        $this->_clientaddresse = $clientaddresse;
    }

    public function getclientusername(){
        return $this->_clientusername ;
    }

    public function setclientusername($clientusername){
        $this->_clientusername = $clientusername;
    }

    public function getclientpassword(){
        return $this->_clientpassword ;
    }

    public function setclientpassword($clientpassword){
        $this->_clientpassword = $clientpassword;
    }

    

    public function asave(){
        $_dba = new Dbaccess(); 
        $_dba->query("insert into client(client_nom,client_prenom,client_email,client_tel,client_addresse) values('" . $this->_clientnom . "',
                                                '"  . $this->_clientprenom. "',
                                                '"  . $this->_clientemail . "',
                                                '"  . $this->_clienttel . "',
                                                '"  . $this->_clientaddresse . "')");
        $_dba->execute();
        return 0;
    }

    public function save(){
        $_dba = new Dbaccess(); 
        $_dba->query("insert into client(client_nom,client_prenom,client_email,client_tel,client_addresse,client_username,client_password) values('" . $this->_clientnom . "',
                                                '"  . $this->_clientprenom. "',
                                                '"  . $this->_clientemail . "',
                                                '"  . $this->_clienttel . "',
                                                '"  . $this->_clientaddresse . "',
                                                '"  . $this->_clientusername . "',
                                                '"  . $this->_clientpassword . "')");
        $_dba->execute();
        return 0;
    }


    public function delete(){
        $_dba = new Dbaccess();
        $_dba->query("delete from client where client_id ='" . $this->_clientid . "'" );
        $_dba->execute();
        return 0;
    }

    public function aupdate(){
        $_dba = new Dbaccess(); 
        $_dba->query("update client set client_id = '" . $this->_clientid . "',
                                                    client_nom = '" . $this->_clientnom . "',
                                                    client_prenom = '"  . $this->_clientprenom. "',
                                                    client_email = '"  . $this->_clientemail . "',
                                                    client_tel = '"  . $this->_clienttel . "',
                                                    client_addresse = '"  . $this->_clientaddresse . "'
                                                    where client_id = '"  . $this->_clientid . "'");
        $_dba->execute();
        return 0;
    }

    public function update(){
        $_dba = new Dbaccess(); 
        $_dba->query("update client set client_id = '" . $this->_clientid . "',
                                                    client_nom = '" . $this->_clientnom . "',
                                                    client_prenom = '"  . $this->_clientprenom. "',
                                                    client_email = '"  . $this->_clientemail . "',
                                                    client_tel = '"  . $this->_clienttel . "',
                                                    client_addresse = '"  . $this->_clientaddresse . "',
                                                    client_username = '"  . $this->_clientusername . "',
                                                    client_password = '"  . $this->_clientpassword . "'
                                                    where client_id = '"  . $this->_clientid . "'");
        $_dba->execute();
        return 0;
    }

    public static function getAll(){
        $_dba = new Dbaccess(); 
        $_dba->query("Select * from client");
        return $_dba->resultSet();
    }

    public function getOne(){
        $_dba = new Dbaccess(); 
        $_dba->query("Select * from client where client_id='" . $this->_clientid . "'");
        return $_dba->single();
    }

    public static function getSome($req)
    {
        $_dba = new Dbaccess();
        $sql="SELECT * FROM client WHERE ".strval($req)." ;";
        $_dba->query($sql);
        return $_dba->resultSet();
    }


    public static function count(){
        $_dba = new Dbaccess();
        $_dba->query("Select count(*) as nbr from client");
        return $_dba->rowCount();
    }
};

?>