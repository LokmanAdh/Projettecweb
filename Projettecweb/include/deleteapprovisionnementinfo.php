<?php
session_start();
$dapri = $_SESSION['iap'];
require_once($_SERVER['DOCUMENT_ROOT']."/projettecweb/include/Class_approvisionnementinfo.php");
require_once($_SERVER['DOCUMENT_ROOT']."/projettecweb/include/Class_produit.php");

if(isset($_POST['delete']))
{
    $c = new Approvisionnementinfo();
    $c->setproduitref($_POST['dapri']);
    $c->setanum($dapri);
    $c->delete();
    $p = new Produit();
    $p->setReference($_POST['dapri']);
    $p->deletestock($_POST['dst']);


}


header("Location: ../gestionapprovisionnementinfo.php");


?>