<?php

    include 'connect.php';

    // Routes
    $tpl = 'include/templete/'; 
    $css = 'layout/css/';
    $js  = 'layout/js/';

    //Include the important files
    include $tpl . 'header.php'; 


    if(!isset($nonavbar))
    include $tpl . 'navbar.php'; 
    if(isset($publicnavbar))
    include $tpl . 'navbarpublic.php'; 
  
?>