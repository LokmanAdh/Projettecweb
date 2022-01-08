<?php

require_once($_SERVER['DOCUMENT_ROOT']."/projettecweb/include/Class_fournisseur.php");

if(isset($_POST['delete']))
{
    $c = new Fournisseur();
    $c->setfournisseurid($_POST['dfid']);
    $c->delete();

}


header("Location: ../gestionfournisseurs.php");


?>