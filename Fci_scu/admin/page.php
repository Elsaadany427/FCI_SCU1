<?php

$do = '';

 if(isset($_GET['do'])){
   $do = $_GET['do'] ;
   
 }
 else{
     $do = 'manage' ;
 }

    if($do == 'manage'){

       echo ' welcome u in manage page ';

    }
    else if($do == 'add'){

        
    }
    else 'Error There is No page with this name';


 ?>
 