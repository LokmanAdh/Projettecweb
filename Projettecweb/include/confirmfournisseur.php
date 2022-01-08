<?php
session_start(); 
require_once("dbaccess.php");
require_once("Class_fournisseur.php");

    if(isset($_POST['AF'])){
            if(count(Fournisseur::getSome("F_email = '".$_POST['em']."'"))>0){
                header("Location: ../addfournisseur.php?err=em");
            }
            elseif(count(Fournisseur::getSome("F_tel ='".$_POST['tl']."'"))>0){
                header("Location: ../addfournisseur.php?err=tl");
            }
            else{
                $f = new Fournisseur();

                $f->setfournisseurnom($_POST['nm']);
                $f->setfournisseuremail($_POST['em']);
                $f->setfournisseurtel($_POST['tl']);
                $f->setfournisseuraddresse($_POST['addr']);
                $f->save();

                header("Location: ../gestionfournisseurs.php");
            }

            


    }

    if(isset($_POST['MF'])){

        $fi = $_SESSION['ufid'];

            if(count(Fournisseur::getSome("F_id != '$fi' AND F_email = '".$_POST['em']."'"))>0){
                header("Location: ../updatefournisseur.php?err=em");
            }
            elseif(count(Fournisseur::getSome("F_id != '$fi' AND F_tel = '".$_POST['tl']."'"))>0){
                header("Location: ../updatefournisseur.php?err=tl");
            }
            else{
                $f = new Fournisseur();
            $f->setfournisseurid($fi);
            echo $f->getfournisseurid($fi);
            
            $f->setfournisseurnom($_POST['nm']);
            $f->setfournisseuremail($_POST['em']);
            $f->setfournisseurtel($_POST['tl']);
            $f->setfournisseuraddresse($_POST['addr']);
            $f->update();

            header("Location: ../gestionfournisseurs.php");
            }

            


    }





?>