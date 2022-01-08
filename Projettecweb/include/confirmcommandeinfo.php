<?php
session_start(); 
 $icm = $_SESSION['icm'];
require_once("dbaccess.php");
require_once("Class_commande.php");
require_once("Class_commandeinfo.php");
require_once("Class_produit.php");

    if(isset($_POST['AP'])){
                $a = new Commandeinfo();
                $db = new Dbaccess();
                $db->query("select * from produit where P_reference = '".$_POST['ref']."'");
                $product = $db->single();
        if(strcmp($product->P_reference,NULL)==0){
            header("Location: ../addcommandeinfo.php?err=ref");
        }
        elseif(count(Commandeinfo::getSome("commande_num = '$icm' AND P_reference = '".$_POST['ref']."'"))>0){
            header("Location: ../addcommandeinfo.php?err=pr");
        }
        else{
                $p = new Produit();
                $p->setReference($_POST['ref']);
                $t = $p->deletestock($_POST['stck']);
                if($t == 1){
                    header("Location: ../addcommandeinfo.php?err=stck");
                }
                else{
                    $a->setcommandenum($icm);
                    $a->setProduitref($_POST['ref']);
                    $a->setcommandequantite($_POST['stck']);
                    $a->save();
                    header("Location: ../gestioncommandeinfo.php"); 
                }
                
        }

                
            
    }

    



?>