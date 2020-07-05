<?php 



/*==========================================================================================================================================
 
    ==============         This page For public people not Admin
   
  
  ========================================================================================================================================== */ 


        $nonavbar = '';
        $publicnavbar = '';

        // Starting The session
        session_start();
        
    
        // i check if we have an session as if we have an admin 
        // has registered if we found an admin and session we include 
        // the page init.php that have the header and paths

        if(isset($_SESSION['username_public'])){

        include 'init.php';
        // include 'design_pub.php';

        }

        // if we don't have an admin or session we forwared him 
        // to the index form again 
        else{
            
            echo "you are not allow " ;
            header("Location:dashboard_public.php");
            
        }
?>

        <!-- This is an css page that we make in it a some edit about this page only -->
      
        <link rel="stylesheet" href="<?php echo $css;?>dashboard_admin.css">


        
<?php     
        // we make an variable to check what is the page the user chosen 
        $do = '';

        // if we have do we assigned it to the variable $do 
        if(isset($_GET['do'])){

        $do = $_GET['do'] ;
        
        }
        // else we make the user in the manage page 
        else{

            $do = 'dashboard_public.php' ;
        }

        // manage page
    
        if($do == 'dashboard'){




        }


/*==========================================================================================================================================
 
    ==============         Lecture  Pade  for public people
    ==============         Show The lecture table from Database
  
  ========================================================================================================================================== */ 
        elseif($do == 'lecture'){


            $stmt = $con->prepare("SELECT * FROM lecture") ;

            $stmt->execute();
            
            $row = $stmt->fetchALL();
            
            // $count = $stmt->rowCount();
            // if we don't have an admin or session we forwared him 
            // to the index form again 
      
            $rr = '𝓛𝓮𝓬𝓽𝓾𝓻𝓮';
            
?>
         
         
            <title>Lectures</title>
            <div class="undernavbar">

                <h1 class="text-center">𝓣𝓱𝓮 <?php  if(isset($rr)) echo $rr;?></h1>

            </div>
                        
                <h1 class="text-center pubmemh_1">   </h1>
                <div class="container">
                    <div class="table-responsive">
                        <table class="main-table text-center table table-bordered">
                                <tr>
                                    <td> Doctor Name </td>
                                    <td> Group Name </td>
                                    <td> Subject </td>
                                    <td> Duration </td>
                                    
                                </tr>
                            <?php
                            foreach($row as $data){
                
                                echo "<tr>" ;
                                echo "<td>" . $data['DrName'] ."</td>" ;
                                echo "<td>" . $data['GroupName'] ."</td>" ;
                                echo "<td>" . $data['Subject'] ."</td>" ;
                                echo "<td>" . $data['Duration'] ."</td>" ;
                                
                                echo "</tr>";
                            
                            }
                            ?>
            
                        </table>
                           
                    </div>
                    <a href="dashboard_public.php" class="btn btn-primary btn_lec">Back To Home</a>
                </div>
            
<?php     } 


/*==========================================================================================================================================
 
    ==============         section  Pade  for public people
    ==============         Show The section table from Database
  
  ========================================================================================================================================== */ 

            elseif($do == 'section'){


                        $stmt = $con->prepare("SELECT * FROM Section") ;

                        $stmt->execute();
                        
                        $row = $stmt->fetchALL();
                        
                        // $count = $stmt->rowCount();
                        // if we don't have an admin or session we forwared him 
                        // to the index form again 
                        $rr = '𝓼𝓮𝓬𝓽𝓲𝓸𝓷';
                        
?>
                        
                        
                        
            <title>Sections</title>
            <div class="undernavbar">

             <h1 class="text-center">𝓣𝓱𝓮 <?php  if(isset($rr)) echo $rr;?></h1>

            </div>

            <h1 class="text-center pubmemh_1">   </h1>
                    <div class="container">
                        <div class="table-responsive">
                                <table class="main-table text-center table table-bordered">
                                    <tr>
                                        <td> Doctor Name </td>
                                        <td> Group Name </td>
                                        <td> Subject </td>
                                        <td> Duration </td>
                                    </tr>
                                    <?php
                                    foreach($row as $data){

                                        echo "<tr>" ;
                                        echo "<td>" . $data['DrName'] ."</td>" ;
                                        echo "<td>" . $data['GroupName'] ."</td>" ;
                                        echo "<td>" . $data['Subject'] ."</td>" ;
                                        echo "<td>" . $data['Duration'] ."</td>" ;
                                        echo "</tr>";
                                    
                                    }
                                    ?>

                                </table>
                        
                        </div>
                        <a href="dashboard_public.php" class="btn btn-primary btn_lec">Back To Home</a>
                    </div>
            
 <?php     } 


/*==========================================================================================================================================
 
    ==============         holiday and party  Pade  for public people
    ==============         Show The holiday and party table from Database
  
  ========================================================================================================================================== */ 

            elseif($do == 'holiday'){


                $stmt = $con->prepare("SELECT * FROM occasion") ;
                
                $stmt->execute();
                
                $row = $stmt->fetchALL();
                
                // $count = $stmt->rowCount();
                // if we don't have an admin or session we forwared him 
                // to the index form again 
                
                $rr = '𝓸𝓬𝓬𝓪𝓼𝓲𝓸𝓷';
                ?>
                
                
                <title>Occasions</title>
                <div class="undernavbar">

                  <h1 class="text-center">𝓣𝓱𝓮 <?php  if(isset($rr)) echo $rr;?></h1>

                </div>
                
                <h1 class="text-center pubmemh_1">   </h1>
                <div class="container">
                    <div class="table-responsive">
                        <table class="main-table text-center table table-bordered">
                                <tr>
                                    <td> Day </td>
                                    <td> Date </td>
                                    <td> Place </td>
                                    <td> Occasions </td>
                                    <td> Description </td>
                                
                                </tr>
                                <?php
                                foreach($row as $data){
                    
                                    echo "<tr>" ;
                                    echo "<td>" . $data['DAY'] ."</td>" ;
                                    echo "<td>" . $data['DATE'] ."</td>" ;
                                    echo "<td>" . $data['PLACE'] ."</td>" ;
                                    echo "<td>" . $data['OCCASIONS'] ."</td>" ;
                                    echo "<td>" . $data['DESCRIPTION'] ."</td>" ;
                                    echo "</tr>";
                                
                                }
                                ?>
                
                        </table>
                            
                    </div>
                    <a href="dashboard_public.php" class="btn btn-primary btn_lec">Back To Home</a>
                </div>

 <?php } ?>
            
            


 <?php include $tpl . 'footer.php'; ?>