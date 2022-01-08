<?php
session_start(); 
 $iapr = $_SESSION['iap'];
require_once("dbaccess.php");
require_once("Class_approvisionnement.php");
require_once("Class_approvisionnementinfo.php");
require_once("Class_produit.php");

    if(isset($_POST['AP'])){
                $a = new Approvisionnementinfo();
                $db = new Dbaccess();
                $db->query("select * from produit where P_reference = '".$_POST['ref']."'");
                $product = $db->single();
        if(strcmp($product->P_reference,NULL)==0){
            header("Location: ../addapprovisionnementinfo.php?err=ref");
        }
        elseif(count(Approvisionnementinfo::getSome("A_num = '$iapr' AND P_reference = '".$_POST['ref']."'"))>0){
            header("Location: ../addapprovisionnementinfo.php?err=pr");
        }
        else{
 
                $a->setanum($iapr);
                $a->setproduitref($_POST['ref']);
                $a->setquantite($_POST['stck']);
                $a->save();
                $p = new Produit();
                $p->setReference($_POST['ref']);
                $p->addstock($_POST['stck']);

                header("Location: ../gestionapprovisionnementinfo.php"); 
        }

                
            
    }







?>