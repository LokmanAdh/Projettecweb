<?php
session_start(); 
require_once("dbaccess.php");
require_once("Class_categorie.php");

    if(isset($_POST['AC'])){
                $c = new Categorie();
                $db = new Dbaccess();
                $db->query("select * from categorie where C_reference = '".$_POST['ref']."'");
                $categorie = $db->single();
                $dba = new Dbaccess();
                $dba->query("select * from categorie where C_description = '".$_POST['nom']."'");
                $categorie1 = $dba->single();
        if(strcmp($categorie->C_reference,NULL)!=0){
            header("Location: ../addcategorie.php?err=ref");
        }elseif(strcmp($categorie1->C_description,NULL)!=0){
            header("Location: ../addcategorie.php?err=nom");
        }
        else{

                $c->setReference($_POST['ref']);
                $c->setDescription($_POST['nom']);
                $c->save();

                header("Location: ../gestioncategories.php"); 
        }

                
            
    }

    if(isset($_POST['MC'])){
        $ct = $_SESSION['uct'];
       $c = new Categorie();
                $db = new Dbaccess();
                $db->query("select * from categorie where C_reference != '$ct' AND C_reference = '".$_POST['ref']."'");
                $categorie = $db->single();
                $dba = new Dbaccess();
                $dba->query("select * from categorie where C_reference != '$ct' AND C_description = '".$_POST['nom']."'");
                $categorie1 = $dba->single();
        if(strcmp($categorie->C_reference,NULL)!=0){
            header("Location: ../updatecategorie.php?err=ref");
        }elseif(strcmp($categorie1->C_description,NULL)!=0){
            header("Location: ../updatecategorie.php?err=nom");
        }
        else{

                $c->setReference($_POST['ref']);
                $c->setDescription($_POST['nom']);
                $c->update("C_reference ='$ct'");

                header("Location: ../gestioncategories.php"); 
        }


           


    }





?>