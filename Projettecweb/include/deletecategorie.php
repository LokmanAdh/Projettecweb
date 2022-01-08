<?php

require_once($_SERVER['DOCUMENT_ROOT']."/projettecweb/include/Class_categorie.php");


if(isset($_POST['delete']))
{
    $c = new Categorie();
    $c->setReference($_POST['dct']);
    $c->delete();

}


header("Location: ../gestioncategories.php");


?>