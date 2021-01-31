<?php  
session_start();

if(array_key_exists('email',$_SESSION)){
 
 // Supression des variables de session et de la session
    session_destroy();


 // Supression des cookies"
    setcookie('email', '');
    setcookie('password', '');
    header("Location:../index.php");
    
}
?>