<?php
session_start(); 
require_once("dbaccess.php");
require_once("Class_approvisionnement.php");
require_once("Class_fournisseur.php");

    if(isset($_POST['AA'])){
                $a = new Approvisionnement();
                $db = new Dbaccess();
                $db->query("select F_id from fournisseur where F_email = '".$_POST['em']."'");
                $fournisseur = $db->single();
        if(strcmp($fournisseur->F_id,NULL)==0){
            header("Location: ../addapprovisionnement.php?err=em");
        }
        else{
 

                $a->setdate($_POST['date']);
                $a->setFournisseurid($fournisseur->F_id);
                $a->save();

                header("Location: ../gestionapprovisionnements.php"); 
        }

                
            
    }

    if(isset($_POST['MA'])){
        $a = new Approvisionnement();
        $db = new Dbaccess();
        $db->query("select F_id from fournisseur where F_email = '".$_POST['em']."'");
        $fournisseur = $db->single();
        $apr = $_SESSION['uapr'];

            if(strcmp($fournisseur->F_id,NULL)==0)
            {
                header("Location: ../updateapprovisionnement.php?err=em");
            }
            else{
                $a->setnum($apr);
                $a->setdate($_POST['date']);
                $a->setFournisseurid($fournisseur->F_id);
                $a->update();

                header("Location: ../gestionapprovisionnements.php");
            }


           


    }





?>