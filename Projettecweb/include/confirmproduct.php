<?php
session_start(); 
require_once("dbaccess.php");
require_once("Class_produit.php");
require_once("Class_categorie.php");

    if(isset($_POST['AP'])){

        $file = $_FILES['file'];

        $filename = $file['name'];
        $filetmpname = $file['tmp_name'];
        $filesize = $file['size'];
        $filetype = $file['type'];


        $filext = explode(".",$filename);
        $fileExt = end($filext);

        $validetypes = array("jpg","jpeg");

        if(!in_array(strtolower($fileExt),$validetypes))
        {
            header("Location: ../addproduct.php?err=f_type");
        }
        elseif($filesize>625000)
        {
            header("Location: ../addproduct.php?err=too_big");
        }
        elseif(count(Produit::getSome("P_reference='".strval($_POST['ref'])."'"))>0)
        {
            header("Location: ../addproduct.php?err=dup_ref");
        }
        else
        {
            $filenewname=strval($_POST['ref']).".".$fileExt;

            move_uploaded_file($filetmpname,$_SERVER['DOCUMENT_ROOT']."/projettecweb/img/products/".$filenewname);

            $p = new Produit();

            $p->setimage($filenewname);
            $p->setReference($_POST['ref']);
            $p->setdescription($_POST['descr']);
            $p->setLibelle($_POST['lib']);
            $p->setQuantiteStock(0);
            $p->setprixunitaire($_POST['pv']);
            $p->setPrixAchat($_POST['pa']);
            $p->setCategorieRef($_POST['catid']);
            $p->save();

            header("Location: ../gestionproduits.php");
        }


    }

    if(isset($_POST['MP'])){
        $ref = $_SESSION['uref'];
        $file = $_FILES['file'];

        $filename = $file['name'];
        $filetmpname = $file['tmp_name'];
        $filesize = $file['size'];
        $filetype = $file['type'];


        $filext = explode(".",$filename);
        $fileExt = end($filext);

        $validetypes = array("jpg","jpeg");

        if(!in_array(strtolower($fileExt),$validetypes))
        {
            header("Location: ../updateproduct.php?err=f_type");
        }
        elseif($filesize>625000)
        {
            header("Location: ../updateproduct.php?err=too_big");
        }
        elseif(count(Produit::getSome("P_reference != '$ref' AND P_reference='".strval($_POST['refe'])."'"))>0)
        {
            header("Location: ../updateproduct.php?err=dup_ref");
        }
        else
        {
            $filenewname=strval($ref).".".$fileExt;

            move_uploaded_file($filetmpname,$_SERVER['DOCUMENT_ROOT']."/projettecweb/img/products/".$filenewname);

            $pr = new Produit();

            $pr->setimage($filenewname);
            $pr->setReference($_POST['refe']);
            $pr->setLibelle($_POST['lib']);
            $pr->setdescription($_POST['descr']);
            $pr->setprixunitaire($_POST['pv']);
            $pr->setPrixAchat($_POST['pa']);
            $pr->setCategorieRef($_POST['catid']);
            $pr->update("P_reference ='$ref'");
            $pr->setPrixVente();

            header("Location: ../gestionproduits.php");
        }


    }





?>