<?php
session_start(); 
require_once("dbaccess.php");
require_once("Class_client.php");

    if(isset($_POST['AC'])){

            if(count(Client::getSome("client_email='".$_POST['em']."'"))>0){
                header("Location: ../addclient.php?err=em");
            }
            elseif(count(Client::getSome("client_tel='".$_POST['tl']."'"))>0){
                header("Location: ../addclient.php?err=tl");
            }
            else{
                $c = new Client();

                $c->setclientnom($_POST['nm']);
                $c->setclientprenom($_POST['pnm']);
                $c->setclientemail($_POST['em']);
                $c->setclienttel($_POST['tl']);
                $c->setclientaddresse($_POST['addr']);
                $c->asave();

                header("Location: ../gestionclients.php");

            }

        

            

    }

    if(isset($_POST['MC'])){

        $ci = $_SESSION['ucid'];

            if(count(Client::getSome("client_id !='$ci' AND client_email='".$_POST['em']."'"))>0)
            {
                header("Location: ../updateclient.php?err=em");
            }
            elseif(count(Client::getSome("client_id !='$ci' AND client_tel='".$_POST['tl']."'"))>0)
            {
                header("Location: ../updateclient.php?err=tl");
            }
            else{
                $c = new Client();
                $c->setclientid($ci);
                $c->setclientnom($_POST['nm']);
                $c->setclientprenom($_POST['pnm']);
                $c->setclientemail($_POST['em']);
                $c->setclienttel($_POST['tl']);
                $c->setclientaddresse($_POST['addr']);
                $c->aupdate();

                header("Location: ../gestionclients.php");
            }


           


    }





?>