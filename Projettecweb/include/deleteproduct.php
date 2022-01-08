<?php

require_once($_SERVER['DOCUMENT_ROOT']."/projettecweb/include/Class_produit.php");

if(isset($_POST['delete']))
{
    $p = new Produit();
    $p->setReference($_POST['dref']);
    $p->delete();

}


header("Location: ../gestionproduits.php");


?>