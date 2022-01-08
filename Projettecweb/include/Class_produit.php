<?php
require_once('dbaccess.php');

class Produit{

    private  $_reference;
    private  $_description;
    private  $_libelle;
    private  $_quantiteStock;
    private  $_prixunitaire;
    private  $_prixAchat;
    private  $_categorieref;
    private  $_prixVente;
    private $_image;
    private  $_dba;

    public function __construct(){  

    }

    public function getprixunitaire(){
        return $this->_prixunitaire;
    }

    public function setprixunitaire($prixunitaire){
        $this->_prixunitaire = $prixunitaire;
    }

    public function getdescription(){
        return $this->_description;
    }

    public function setdescription($description){
        $this->_description = $description;
    }

    public function getimage(){
        return $this->_image;
    }

    public function setimage($image){
        $this->_image = $image;
    }

    public function getReference(){
        return $this->_reference;
    }

    public function setReference($reference){
        $this->_reference = $reference;
    }

    public function getLibelle(){
        return $this->_libelle;
    }

    public function setLibelle($libelle){
        $this->_libelle = $libelle;
    }

    public function getQuantiteStock(){
        return $this->_quantiteStock;
    }

    public function setQuantiteStock($quantiteStock){
        $this->_quantiteStock = $quantiteStock;
    }
    
    public function getPrixAchat(){
        return $this->_prixAchat ;
    }

    public function setPrixAchat($prixAchat){
        $this->_prixAchat = $prixAchat;
    }

    public function getPrixVente(){
        return $this->_prixVente ;
    }

    public function setPrixVente(){
        $_dba = new Dbaccess(); 
        $_dba->query('update produit set P_prix_vente = P_prix_unitaire * P_stock_quantite where P_reference = "'  . $this->_reference . '";');
        $_dba->execute();
    }

    public function getCategorieRef(){
        return $this->_categorieref ;
    }

    public function setCategorieRef($categorieref){
        $this->_categorieref = $categorieref;
    }

    

    public function save(){
        $_dba = new Dbaccess(); 
        $_dba->query('INSERT INTO Produit VALUES("'.strval($this->_reference).'","'.strval($this->_libelle).'","'.strval($this->_description).'",'.strval($this->_quantiteStock).','.strval($this->_prixunitaire).','.strval($this->_prixAchat).',0,"'.strval($this->_image).'","'.strval($this->_categorieref).'");');
        $_dba->execute();
        return 0;
    }

    public function delete(){
        $_dba = new Dbaccess();
        $_dba->query("delete from produit where P_reference ='" . $this->_reference . "'" );
        $_dba->execute();
        return 0;
    }

    public function update($req){
        $_dba = new Dbaccess(); 
        $_dba->query("update produit set P_reference = '" . $this->_reference . "',
                                                    P_description = '".$this->_description."',
                                                    P_libelle = '" . $this->_libelle . "',
                                                    P_prix_unitaire = '"  . $this->_prixunitaire . "',
                                                    P_prix_achat = '"  . $this->_prixAchat . "',
                                                    image = '"  . $this->_image . "',
                                                    C_reference = '"  . $this->_categorieref . "'
                                                    where ".strval($req).";");
        $_dba->execute();
        $this->setPrixVente();
        return 0;
    }

    public static function getAll(){
        $_dba = new Dbaccess(); 
        $_dba->query("Select * from produit");
        return $_dba->resultSet();
    }

    public static function getOne($req){
        $_dba = new Dbaccess(); 
        $_dba->query("select * from produit where" .strval($req). ";");
        return $_dba->single();
    }

    public static function getSome($req)
    {
        $_dba = new Dbaccess();
        $_dba->query("SELECT * FROM produit WHERE ".strval($req)." ;");
        return $_dba->resultSet();
    }


    public static function count(){
        $_dba = new Dbaccess();
        $_dba->query("Select count(*) as nbr from produit");
        return $_dba->rowCount();
    }

    public function addstock($s){
        $_dba = new Dbaccess();
        $_dba->query("update produit set P_stock_quantite = P_stock_quantite + '$s' where P_reference ='" . $this->_reference . "';");
        $_dba->execute();
        $this->setPrixVente();
        return 0;
    }
    public function deletestock($s){
        $_dba = new Dbaccess();
        $db = new Dbaccess();
        $db->query("select P_stock_quantite from produit where P_reference ='" . $this->_reference . "'");
        $stock = $db->single();
        $st = $stock->P_stock_quantite;
        if($st>=$s){
            $_dba->query("update produit set P_stock_quantite = P_stock_quantite - '$s' where P_reference ='" . $this->_reference . "';");
            $_dba->execute();
            $this->setPrixVente();
            return 0;
        }else{
            return 1;
        }
    
    }
};

?>