<?php

require_once('dbaccess.php');

class Categorie{
    private $_reference;
    private $_description;
    private $_dba;

    public function __construct(){

    }

    public function getReference(){
        return $this->_reference;
    }

    public function setReference($ref){
        $this->_reference = $ref;
    }

    public function getDescription(){
        return $this->_description;
    }

    public function setDescription($desc){
        $this->_description = $desc;
    }

    public function save(){
        $_dba = new Dbaccess(); 
        $_dba->query("insert into categorie values('" . $this->_reference . "',
                                                '"  . $this->_description . "')");
        $_dba->execute();
        return 0;
    }

    public function delete(){
        $_dba = new Dbaccess();
        $_dba->query("delete from categorie where C_reference ='" . $this->_reference . "'" );
        $_dba->execute();
        return 0;
    }

    public function update($req){
        $_dba = new Dbaccess(); 
        $_dba->query("update categorie set C_reference = '" . $this->_reference . "',
                                        C_description = '" . $this->_description . "'
                                        where " .strval($req). "");
        $_dba->execute();
        return 0;
    }

    public static function getOne($req){
        $_dba = new Dbaccess(); 
        $_dba->query("Select * from categorie where " .strval($req). ";");
        return $_dba->single();
    }


    public static function count(){
        $_dba = new Dbaccess();
        $_dba->query("Select count(*) as nbr from categorie");
        return $_dba->rowCount();
    }

    public static function getAll(){
        $_dba = new Dbaccess(); 
        $_dba->query("Select * from categorie");
        return $_dba->resultSet();
    }

    public static function getSome($req){
        $_dba = new Dbaccess();
        $sql="SELECT * FROM Categorie WHERE ".strval($req)." ;";
        $_dba->query($sql);
        return $_dba->resultSet();
    }

}

?>