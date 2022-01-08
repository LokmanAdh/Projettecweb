<?php

session_start();

if(isset($_POST['login'])){
    if($_POST['username']=="admin" && $_POST['password']=="admin" ){
        $_SESSION['username'] = $_POST['username'];
        header('location: /projettecweb/home.php');
    }else{
        header('location:../login.php?errornum=1');
    }
}


if(isset($_POST['username'])){

$name = $_POST['username'];

$pass = $_POST['password'];

$s = " select access from usertable where name = '$name' && password = '$pass' "; 

$result = mysqli_query($con , $s);

$num = mysqli_num_rows($result);

$row = mysqli_fetch_assoc($result);

$access = $row['access'];

$_SESSION['access'] = $access ;


    if($num == 1 ){
        $_SESSION['username'] = $name ;
        //Redirection vers la page de login
        if(strcmp($name,"lokman") == 0){
            header('location:../homead.php');
        }else if($access == 1){
            header('location:../home.php');
        }else if($access == 0){
            header('location:../homenon.php');
        }
        

    }else{

            header('location:../login.php?errornum=1');

        }

}





        if(isset($_GET['buttonh'])){
           if($_SESSION['username'] == "lokman"){
                header('location:../homead.php');
           }else{
                header('location:../home.php');
           }
            
        }

    


?>