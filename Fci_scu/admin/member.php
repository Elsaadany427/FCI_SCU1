<?php 

        // Starting The session
        session_start();
        
    
        // i check if we have an session as if we have an admin 
        // has registered if we found an admin and session we include 
        // the page init.php that have the header and paths

        if(isset($_SESSION['username'])){

        include 'init.php';

        }

        // if we don't have an admin or session we forwared him 
        // to the index form again 
        else{
            
            echo "you are not allow " ;
            header("Location:dashboard_public.php");
            
        }

        // we make an variable to check what is the page the user chosen 
        $do = '';

        // if we have do we assigned it to the variable $do 
        if(isset($_GET['do'])){

        $do = $_GET['do'] ;
        
        }

        // else we make the user in the manage page 
        else{

            $do = 'dashboard_admin.php' ;
        }

        // manage page it is the default page

        if($do == 'manage'){
            
            //Fetch the data from database
            $stmt = $con->prepare("SELECT * FROM student") ;

            $stmt->execute();

            // Assign the variable
            $row = $stmt->fetchALL() ;

            
?>

            <!-- The Table That is Show the Table of Student -->
            
            <h1 class="text-center"> Manage Member </h1>
             <div class="container">
              <div class="table-responsive">
                <table class="main-table text-center table table-bordered">

                    <tr>
                        <td> ID </td>
                        <td> Student Name </td>
                        <td> Email </td>
                        <td> Phone </td>
                        <td> Level </td>
                        <td> Course Name </td>
                        <td> Control </td>
                    </tr>

                    <?php

                        foreach($row as $data){
                            echo "<tr>" ;
                            echo "<td>" . $data['ID'] ."</td>" ;
                            echo "<td>" . $data['STUDENTNAME'] ."</td>" ;
                            echo "<td>" . $data['EMAIL'] ."</td>" ;
                            echo "<td>" . $data['PHONE'] ."</td>" ;
                            echo "<td>" . $data['LEVEL'] ."</td>" ;
                            echo "<td>" . $data['COURSENAME'] ."</td>" ;
                            echo "<td> 
                                       <a href='member.php?do=Editst&userid=" . $data['ID']. " 'class='btn btn-success'>Edit</a>
                                       <a href='member.php?do=deletest&userid=" . $data['ID']. " 'class='btn btn-danger' onclick=\" return confirm('Are you sure you want to delete this item?');\">Delete</a>    
                                    </td>" ;
                            echo "</tr>";
                        }

                    ?>
                   
                </table>
              </div>  

                <!-- The btn That use To Add student it is forward You To the ADD page -->
                <a href="member.php?do=addst" class="btn btn-primary">Add New Student</a>

            </div>
<?php   }

/*==========================================================================================================================================
 
    ==============        ADD Page For Admin 
    ==============        Forward you to insert admin page
  
  ========================================================================================================================================== */


        elseif($do == 'add'){ ?>

            <h1 class="text-center">Add Member</h1>

        <div class="container">

            <form action="?do=insert" method="POST">

                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="inputname4">Name</label>
                        <input type="text" class="form-control" id="inputname4" placeholder="Name" name="name" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputPassword4">Password</label>
                        <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="password" required>
                    </div>

                </div>

                <div class="form-group">
                    <label for="inputAddress">UserName</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="Username" name="username" required>
                </div>

                <div class="form-group">
                    <label for="inputemail2">Email</label>
                    <input type="email" class="form-control" id="inputemail2" placeholder="Email" name="email" required>
                </div>

                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="inputphone">Phone</label>
                        <input type="text" class="form-control" id="inputphone" name="phone" required>
                    </div>


                    <div class="form-group col-md-6">
                        <label for="inputyear">Year</label>
                        <input type="text" class="form-control" id="inputyear" placeholder="Year" name="yearname" required>
                    </div>

                    
                    <div class="form-group col-md-6">
                        <label for="inputgroup">GroubId</label>
                        <input type="text" class="form-control" id="inputgroup" placeholder="GroupID" name="Groupid" >
                    </div>

                </div>


                <input value="Add member" type = "Submit" class="btn btn-primary">

            </form>

        </div>

<?php  } 





/*==========================================================================================================================================
 
    ==============         ADD Student Pade 
    ==============         Forward you to insert Student page
  
  ========================================================================================================================================== */
             
         elseif($do == 'addst') { ?>

          <h1 class="text-center">Add Student</h1>

        <div class="container">

            <form action="?do=insertst" method="POST">

                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="inputname4">Name</label>
                        <input type="text" class="form-control" id="inputname4" placeholder="Name" name="name" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputyear">Level</label>
                        <input type="text" class="form-control" id="inputyear" placeholder="Year" name="yearname" required>
                    </div>


                </div>

                <div class="form-group">
                    <label for="inputemail2">Email</label>
                    <input type="email" class="form-control" id="inputemail2" placeholder="Email" name="email" required>
                </div>

                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="inputphone">Phone</label>
                        <input type="text" class="form-control" id="inputphone" name="phone" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputcourse">Course Name</label>
                        <input type="text" class="form-control" id="inputcourse" placeholder="Course Name" name="coursename" required>
                    </div>

                </div>

                <div class="form-group">

                </div>

                <input value="Add Student" type = "Submit" class="btn btn-primary">

            </form>

        </div>

<?php } 



/*==========================================================================================================================================
 
    ==============         ADD Lecture Pade 
    ==============         Forward you to insert Lecture page
  
  ========================================================================================================================================== */
     
     
        elseif($do=='addlec'){ ?>

                <h1 class="text-center">Add Lecture</h1>

        <div class="container">

            <form action="?do=insertlec" method="POST">

                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="inputname4">Doctor Name</label>
                        <input type="text" class="form-control" id="inputname4" placeholder="Name" name="name" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputgroup">Group Name</label>
                        <input type="text" class="form-control" id="inputgroup" placeholder="Group Name" name="groupname" required>
                    </div>


                </div>

                <div class="form-group">
                    <label for="inputsub">Subject</label>
                    <input type="text" class="form-control" id="inputsub" placeholder="Subject" name="subject" required>
                </div>

                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="inputdur">Duration</label>
                        <input type="text" class="form-control" id="inputinputdurcourse" placeholder="Duration in the form 00:00:00" name="duration" required>
                    </div>

                </div>

            
                <input value="Add Lecture" type = "Submit" class="btn btn-primary">

            </form>

        </div>

<?php }





/*==========================================================================================================================================
 
    ==============         ADD Section Pade 
    ==============         Forward you to insert Section page
  
  ========================================================================================================================================== */


    

        elseif($do=='addsec'){ ?>

         <h1 class="text-center">Add Section</h1>

        <div class="container">

            <form action="?do=insertsec" method="POST">

                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="inputname4">Doctor Name</label>
                        <input type="text" class="form-control" id="inputname4" placeholder="Name" name="name" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="inputgroup">Group Name</label>
                        <input type="text" class="form-control" id="inputgroup" placeholder="Group Name" name="groupname" required>
                    </div>


                </div>

                <div class="form-group">
                    <label for="inputsub">Subject</label>
                    <input type="text" class="form-control" id="inputsub" placeholder="Subject" name="subject" required>
                </div>

                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="inputdur">Duration</label>
                        <input type="text" class="form-control" id="inputdur" placeholder="Duration in the form 00:00:00" name="duration" required>
                    </div>

                </div>

            
                <input value="Add Section" type = "Submit" class="btn btn-primary">

            </form>

        </div>



<?php }



/*==========================================================================================================================================
 
    ==============         ADD occasion Pade 
    ==============         Forward you to insert occasion page
  
  ========================================================================================================================================== */



        elseif($do == 'addocc'){  ?>

        <h1 class="text-center">Add Occasions</h1>

        <div class="container">

        <form action="?do=insertocc" method="POST">

            <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="inputname4">Day</label>
                    <input type="text" class="form-control" id="inputname4" placeholder="Name" name="name" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="inputdate">Date</label>
                    <input type="text" class="form-control" id="inputdate" placeholder="Date" name="date" required>
                </div>


            </div>

            <div class="form-group">
                <label for="inputpl">Place</label>
                <input type="text" class="form-control" id="inputpl" placeholder="Place" name="place" required>
            </div>

            <div class="form-row">

                <div class="form-group col-md-6">
                    <label for="inputocc">Occasion</label>
                    <input type="text" class="form-control" id="inputocc" placeholder="Occasion" name="occasion" required>
                </div>

                <div class="form-group col-md-6">
                    <label for="inputdesc">Description</label>
                    <input type="text" class="form-control" id="inputdesc" placeholder="Description" name="description" required>
                </div>

            </div>

            
            <input value="Add Occasion" type = "Submit" class="btn btn-primary">

        </form>

        </div>


<?php }



/*==========================================================================================================================================
 
    ==============         Insert Admin Pade 
    ==============         Insert The Admin info in Database
    ==============         Comming from Add Admin Page
  
  ========================================================================================================================================== */


            elseif($do == 'insert'){ 

            // check if the user come from the form (post method) or no
            
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                echo "<h1 class='text-center'>Insert Member</h1>" ;

                echo " <div class= 'container'> " ;

                // Get the variables from the form 

                $user        = $_POST['name'] ;
                $password    = $_POST['password'];
                $email       = $_POST['email'] ;
                $phone       = $_POST['phone'] ;
                $fullname    = $_POST['username'] ;
                $year        = $_POST['yearname'] ;
                $groupid     = $_POST['Groupid'] ;
                
                $hashpass = sha1($_POST['password']);

                // password trick

                $pass='';

                if(empty($_POST['password'])){

                    $pass = $_POST['oldpassword'] ;

                } else $pass = sha1( $_POST['password'] );

                // Valied the Form 

                $errors = array() ;

                // first valied on name 

                if(strlen($user) <3 || empty($user)){

                    $errors[] = 'The Name Must be More Than 3 character ';
                }

                // second the Email 

                if(empty($email)){

                    $errors[] = 'The Email must not be empty ';
                }


                // third Fullname

                if(empty($fullname)){

                    $errors[] = 'The FullName must not be empty ';
                }

            
                // fifth phone

                if(empty($phone) || strlen($phone) <= 10 ){

                    $errors[] = 'The Phone must be more than 10 character ';

                } 


                if($groupid !=1)
                {

                    $errors[] = 'The GroupID must be 1 if You want to make him admin else Don\'t write thing  ';

                } 
                

                // check The Errors array 


                if(empty($errors)){

                // Update The database member

                $stmt = $con->prepare("INSERT INTO  users(Name , Password , Fullname , GroupID , Email ,Phone   , Year )
                                        VALUES(:zname , :zpass , :zfullname , :zgroup , :zemail , :zphone  , :zyear ) ") ;
                $stmt->execute(array(

                'zname'      => $user  , 
                'zpass'      => $hashpass ,
                'zfullname'  => $fullname ,
                'zgroup'     => $groupid ,
                'zemail'     => $email ,
                'zphone'     => $phone , 
                'zyear'      => $year

                    )) ;

                echo  "<div class = 'alert alert-success'>" . $stmt->rowCount() ." Record Added "."</div>";

                    }

                    // if it have an errors 

                    else {

                        foreach($errors as $er)

                        echo "<div class = 'alert alert-danger'>" . $er ."</div>" . '<br>' ;

                    }
                }

                else{

                    echo "<div class = 'alert alert-warning'>" . 'This Page Unvaliable' ."</div>" ;
                }


                echo "</div>" ;


            }


/*==========================================================================================================================================
 
    ==============         Insert Student Pade 
    ==============         Insert The Student info in Database
    ==============         Comming from Add student Page
  
  ========================================================================================================================================== */


        elseif($do == 'insertst'){ 

            // check if the user come from the form (post method) or no

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                echo "<h1 class='text-center'> Insert Student </h1>" ;

                echo " <div class= 'container'> " ;

                // Get the variables from the form 

                $user        = $_POST['name'] ;
                $email       = $_POST['email'] ;
                $phone       = $_POST['phone'] ;
                $course      = $_POST['coursename'] ;
                $year        = $_POST['yearname'] ;
                

                // Valied the Form 

                $errors = array() ;

                // first valied on name 

                if(strlen($user) <=3 || empty($user)){

                    $errors[] = 'The Name Must be More Than 3 character ';
                }

                // second the Email 

                if(empty($email)){

                    $errors[] = 'The Email must not be empty ';
                }

                // forth course 
                if(empty($course)){

                    $errors[] = 'The Course name must not be empty ';
                }


                // fifth phone

                if(empty($phone) || strlen($phone) <= 10 ){

                    $errors[] = 'The Phone must be more than 10 character ';

                } 

            
                if(empty($year) ){

                    $errors[] = 'The Year must not be empty ';

                } 

                
                // check The Errors array 


                if(empty($errors)){

                // Update The database member

                $stmt = $con->prepare("INSERT INTO  student( STUDENTNAME  , EMAIL ,PHONE , COURSENAME  , LEVEL )
                                        VALUES(:zname , :zemail , :zphone ,:zcourse  , :zyear ) ") ;
                $stmt->execute(array(

                    'zname'      => $user  , 
                    'zemail'     => $email ,
                    'zphone'     => $phone ,
                    'zcourse'    => $course, 
                    'zyear'      => $year

                        )) ;

                echo  "<div class = 'alert alert-success'>" . $stmt->rowCount() ." Record Added "."</div>";

                    }

                    // if it have an errors 

                    else {

                        foreach($errors as $er)

                        echo "<div class = 'alert alert-danger'>" . $er ."</div>" . '<br>' ;

                    }
                }


            }


/*==========================================================================================================================================
 
    ==============         Insert Lecture Pade 
    ==============         Insert The Lecture info in Database
    ==============         Comming from Add Lecture Page
  
  ========================================================================================================================================== */
  
        elseif($do == 'insertlec'){ 

            // check if the user come from the form (post method) or no
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                echo "<h1 class='text-center'>Insert Lecture </h1>" ;

                echo " <div class= 'container'> " ;

                // Get the variables from the form 

                $user          = $_POST['name'] ;
                $group         = $_POST['groupname'] ;
                $subject       = $_POST['subject'] ;
                $duration      = $_POST['duration'] ;
                
                

                // Valied the Form 

                $errors = array() ;

                // first valied on name 

                if(strlen($user) <3 || empty($user)){

                    $errors[] = 'The Name Must be More Than 3 character ';
                }

                // second the Email 

                if(empty($group)){

                    $errors[] = 'The Group must not be empty ';
                }

                // forth course 
                if(empty($subject)){

                    $errors[] = 'The subject name must not be empty ';
                }


                // fifth phone

                if(empty($duration)){

                    $errors[] = 'The Duration must not be empty ';

                } 

                
                // check The Errors array 


                if(empty($errors)){

            // Update The database member

            $stmt = $con->prepare("INSERT INTO  lecture( DrName  , GroupName ,Subject , Duration  )
                                    VALUES(:zname , :zgroup , :zsub ,:zdu  ) ") ;
            $stmt->execute(array(
                'zname'      => $user  , 
                'zgroup'     => $group ,
                'zsub'       => $subject ,
                'zdu'        => $duration 
                
                    )) ;

            echo  "<div class = 'alert alert-success'>" . $stmt->rowCount() ." Record Added "."</div>";
            

                }

                // if it have an errors 

                else {

                    foreach($errors as $er)

                    echo "<div class = 'alert alert-danger'>" . $er ."</div>" . '<br>' ;

                }
            
            
            }
            else{

                echo "<div class = 'alert alert-warning'>" . 'This Page Unvaliable' ."</div>" ;
            }


            echo "</div>" ;



        }

/*==========================================================================================================================================
 
    ==============         Insert Section Pade 
    ==============         Insert The Section info in Database
    ==============         Comming from Add Section Page
  
  ========================================================================================================================================== */

            elseif($do == 'insertsec'){ 

                // check if the user come from the form (post method) or no
                if($_SERVER['REQUEST_METHOD'] == 'POST'){

                    echo "<h1 class='text-center'>Insert Section </h1>" ;

                    echo " <div class= 'container'> " ;

                    // Get the variables from the form 

                    $user          = $_POST['name'] ;
                    $group         = $_POST['groupname'] ;
                    $subject       = $_POST['subject'] ;
                    $duration      = $_POST['duration'] ;
                    
                    

                    // Valied the Form 

                    $errors = array() ;

                    // first valied on name 

                    if(strlen($user) <3 || empty($user)){

                        $errors[] = 'The Name Must be More Than 3 character ';
                    }

                    // second the Email 

                    if(empty($group)){

                        $errors[] = 'The Group must not be empty ';
                    }

                    // forth course 
                    if(empty($subject)){

                        $errors[] = 'The subject name must not be empty ';
                    }


                    // fifth phone

                    if(empty($duration)){

                        $errors[] = 'The Duration must not be empty ';

                    } 

                    
                    // check The Errors array 


                    if(empty($errors)){

                    // Update The database member

                    $stmt = $con->prepare("INSERT INTO  Section( DrName  , GroupName ,Subject , Duration  )
                                            VALUES(:zname , :zgroup , :zsub ,:zdu  ) ") ;
                    $stmt->execute(array(

                        'zname'      => $user  , 
                        'zgroup'     => $group ,
                        'zsub'       => $subject ,
                        'zdu'        => $duration 
                        
                            )) ;

                    echo  "<div class = 'alert alert-success'>" . $stmt->rowCount() ." Record Added "."</div>";
                    

                        }

                        // if it have an errors 

                        else {

                            foreach($errors as $er)

                            echo "<div class = 'alert alert-danger'>" . $er ."</div>" . '<br>' ;

                        }
                    
                    }
                    else{

                        echo "<div class = 'alert alert-warning'>" . 'This Page Unvaliable' ."</div>" ;
                    }


                    echo "</div>" ;



                }

/*==========================================================================================================================================
 
    ==============         Insert occasions Pade 
    ==============         Insert The occasions info in Database
    ==============         Comming from Add occasions Page
  
  ========================================================================================================================================== */


            elseif($do == 'insertocc'){ 

                // check if the user come from the form (post method) or no

                if($_SERVER['REQUEST_METHOD'] == 'POST'){

                    echo "<h1 class='text-center'>Insert Occasions </h1>" ;

                    echo " <div class= 'container'> " ;

                    // Get the variables from the form 

                    $name          = $_POST['name'] ;
                    $date         = $_POST['date'] ;
                    $place       = $_POST['place'] ;
                    $occasion      = $_POST['occasion'] ;
                    $description      = $_POST['description'] ;
                    
                    

                    // Valied the Form 

                    $errors = array() ;

                    // first valied on name 

                    if(strlen($name) <3 || empty($name)){

                        $errors[] = 'The Name Must be More Than 3 character ';
                    }

                    // second the Email 

                    if(empty($date)){

                        $errors[] = 'The Date must not be empty ';
                    }

                    // forth course 
                    if(empty($place)){

                        $errors[] = 'The place name must not be empty ';
                    }


                    // fifth phone

                    if(empty($occasion)){

                        $errors[] = 'The Occasion must not be empty ';

                    } 

                    if(empty($description)){

                        $errors[] = 'The Description must not be empty ';

                    } 

                    
                    // check The Errors array 


                    if(empty($errors)){

                    // Update The database member

                    $stmt = $con->prepare("INSERT INTO   occasion( DAY  , DATE ,PLACE , OCCASIONS,DESCRIPTION  )
                                            VALUES(:zname , :zdate , :zplace ,:zocc ,:zdu  ) ") ;
                    $stmt->execute(array(
                        'zname'      => $name  , 
                        'zdate'     => $date ,
                        'zplace'       => $place ,
                        'zocc'        => $occasion ,
                        'zdu'        => $description 
                        
                            )) ;

                    echo  "<div class = 'alert alert-success'>" . $stmt->rowCount() ." Record Added "."</div>";
                    

                        }

                        // if it have an errors 

                        else {

                            foreach($errors as $er)

                            echo "<div class = 'alert alert-danger'>" . $er ."</div>" . '<br>' ;

                        }
                    
                    
                    }
                    else{

                        echo "<div class = 'alert alert-warning'>" . 'This Page Unvaliable' ."</div>" ;
                    }


                    echo "</div>" ;

                }
/*==========================================================================================================================================
 
    ==============         Edit Admin Pade 
    ==============         Update The Admin info in Database
    ==============         Forward you to Update Page
  
  ========================================================================================================================================== */
     

                elseif($do == 'Edit'){ 

                // we make an variable $userid to save the id of the admin in it 
                // to use it to have all the information about the admin    
            
                $userid= isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0 ;
            
                // we make connect to database and search about all thing we need by ID 
                $stmt = $con->prepare(" SELECT Name , Password , Fullname , Email  
                                        FROM users 
                                        WHERE ID = ?") ;

                $stmt->execute(array($userid));
                
                // we save all the information about the user we need to edit in array called row
                $row = $stmt->fetchALL();

                // we count if we have an admin with this name or no 
                $count = $stmt->rowCount();
                
                // if we have an admin with this name and pass we make a form with the information 
                // that we have from database and want to edit 
                if($count > 0){ ?>

                        <h1 class="text-center">Edit Member</h1>

                <div class="container">

                    <form action="?do=update" method="POST">

                        <div class="form-row">

                            <input type="hidden" name="userid" value="<?php echo $userid ?>">

                            <div class="form-group col-md-6">
                                <label for="inputname4">Name</label>
                                <input type="text" class="form-control" id="inputname4" placeholder="Name" name="name" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Password</label>
                                <input type="hidden"name="oldpassword" value="<?php echo $row['Password'] ?>">
                                <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="password">
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="inputAddress">UserName</label>
                            <input type="text" class="form-control" id="inputAddress" placeholder="Username" name="username" required>
                        </div>

                        <div class="form-group">
                            <label for="inputemail2">Email</label>
                            <input type="email" class="form-control" id="inputemail2" placeholder="Email" name="email" required>
                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="inputphone">Phone</label>
                                <input type="text" class="form-control" id="inputphone" name="phone" required>
                            </div>

                        </div>

                        <div class="form-group">

                        </div>

                        <input value="Save" type = "Submit" class="btn btn-primary">

                    </form>

                </div>
                            
<?php    } } 

/*==========================================================================================================================================
 
    ==============         Edit Student Pade 
    ==============         Update The Student info in Database
    ==============         Forward you to Update Student Page
  
  ========================================================================================================================================== */
     
                elseif($do == 'Editst'){


                // we make an variable $userid to save the id of the user in it 
                // to use it to have all the information about the admin    
            
                $userid= isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0 ;
            
                // we make connect to database and search about all thing we need by ID 
                $stmt = $con->prepare(" SELECT STUDENTNAME , EMAIL , PHONE , LEVEL ,COURSENAME  
                                        FROM student 
                                        WHERE ID = ?") ;

                $stmt->execute(array($userid));
                
                // we save all the information about the user we need to edit in array called row
                $row = $stmt->fetchALL();

                // we count if we have an admin with this name or no 
                $count = $stmt->rowCount();

                // if we have an admin with this name and pass we make a form with the information 
                // that we have from database and want to edit 
                        if($count > 0){ ?>
                <h1 class="text-center">Edit Student</h1>

                <div class="container">

                    <form action="?do=updatest" method="POST">

                            <div class="form-row">

                                <input type="hidden" name="userid" value="<?php echo $userid ?>">

                                <div class="form-group col-md-6">
                                    <label for="inputname4">Student Name</label>
                                    <input type="text" class="form-control" id="inputname4" placeholder="Name" name="name" required>
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="inputlevel">Level</label>
                                    <input type="text" class="form-control" id="inputlevel" name="level" required>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="inputemail2">Email</label>
                                <input type="email" class="form-control" id="inputemail2" placeholder="Email" name="email" required>
                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="inputphone">Phone</label>
                                    <input type="text" class="form-control" id="inputphone" name="phone" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputcourse">Course Name </label>
                                    <input type="text" class="form-control" id="inputcourse" name="course" required>
                                </div>

                            </div>

                            <div class="form-group">

                            </div>

                            <input value="Save" type = "Submit" class="btn btn-primary">

                    </form>

                </div>

<?php } 

        else {

            echo 'There is no Such Id ' ;
        }


/*==========================================================================================================================================
 
    ==============         Edit Lecture Pade 
    ==============         Update The Lecture info in Database
    ==============         Forward you to Update Lecture Page
  
  ========================================================================================================================================== */        

        }
        
                    elseif($do=='editlec'){


                    // we make an variable $userid to save the id of the user in it 
                    // to use it to have all the information about the admin    
                
                    $userid= isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0 ;
                
                    // we make connect to database and search about all thing we need by ID 
                    $stmt = $con->prepare(" SELECT DrName , GroupName , Subject , Duration
                                            FROM lecture 
                                            WHERE ID = ?") ;

                    $stmt->execute(array($userid));
                    
                    // we save all the information about the user we need to edit in array called row
                    $row = $stmt->fetch();

                    // we count if we have an admin with this name or no 
                    $count = $stmt->rowCount();

                    // if we have an admin with this name and pass we make a form with the information 
                    // that we have from database and want to edit 
                    if($count > 0){ ?>


                    <h1 class="text-center">Edit Lectures</h1>

                    <div class="container">

                        <form action="?do=updatelec" method="POST">

                            <div class="form-row">

                            <input type="hidden" name="userid" value="<?php echo $userid ?>">
                                <div class="form-group col-md-6">
                                    <label for="inputname4">Lecture Name</label>
                                    <input type="text" class="form-control" id="inputname4" placeholder="Name" value="<?php  echo $row['DrName'] ?>" name="name" required>
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="inputlevel">Group Name</label>
                                    <input type="text" class="form-control" id="inputlevel" name="group" value="<?php echo $row['GroupName']?>" required>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="inputsub">Subject</label>
                                <input type="text" class="form-control" id="inputsub" placeholder="Subject" name="subject" value="<?php echo $row['Subject']?>" required>
                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="inputdu">Duration</label>
                                    <input type="text" class="form-control" id="inputdu" name="duration" value="<?php echo $row['Duration']?>" required>
                                </div>

                            </div>

                            <div class="form-group">

                            </div>

                            <input value="Save" type = "Submit" class="btn btn-primary">

                        </form>

                    </div>


<?php }} 


/*==========================================================================================================================================
 
    ==============         Edit Section Pade 
    ==============         Update The Section info in Database
    ==============         Forward you to Update Section Page
  
  ========================================================================================================================================== */        

            elseif($do=='editsec'){


            // we make an variable $userid to save the id of the user in it 
            // to use it to have all the information about the admin    

            $userid= isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0 ;

            // we make connect to database and search about all thing we need by ID 
            $stmt = $con->prepare(" SELECT DrName , GroupName , Subject , Duration
                                    FROM Section 
                                    WHERE ID = ?") ;

            $stmt->execute(array($userid));

            // we save all the information about the user we need to edit in array called row
            $row = $stmt->fetch();

            // we count if we have an admin with this name or no 
            $count = $stmt->rowCount();

            // if we have an admin with this name and pass we make a form with the information 
            // that we have from database and want to edit 
            if($count > 0){ ?>


            <h1 class="text-center">Edit Sections</h1>

            <div class="container">

                 <form action="?do=updatesec" method="POST">

                    <div class="form-row">

                    <input type="hidden" name="userid" value="<?php echo $userid ?>">
                        <div class="form-group col-md-6">
                            <label for="inputname4">Name</label>
                            <input type="text" class="form-control" id="inputname4" placeholder="Name" value="<?php  echo $row['DrName'] ?>" name="name" required>
                        </div>


                        <div class="form-group col-md-6">
                            <label for="inputlevel">Group Name</label>
                            <input type="text" class="form-control" id="inputlevel" name="group" value="<?php echo $row['GroupName']?>" required>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="inputsub">Subject</label>
                        <input type="text" class="form-control" id="inputsub" placeholder="Subject" name="subject" value="<?php echo $row['Subject']?>" required>
                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="inputdu">Duration</label>
                            <input type="text" class="form-control" id="inputdu" name="duration" value="<?php echo $row['Duration']?>" required>
                        </div>

                    </div>

                    <div class="form-group">

                    </div>

                    <input value="Save" type = "Submit" class="btn btn-primary">

                </form>

            </div>

<?php }} 

/*==========================================================================================================================================
 
    ==============         Edit occasion Pade 
    ==============         Update The occasion info in Database
    ==============         Forward you to Update occasion Page
  
  ========================================================================================================================================== */ 

            elseif($do=='editocc'){


            // we make an variable $userid to save the id of the user in it 
            // to use it to have all the information about the admin    

            $userid= isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0 ;

            // we make connect to database and search about all thing we need by ID 
            $stmt = $con->prepare(" SELECT DAY , DATE , PLACE , OCCASIONS,DESCRIPTION
                                    FROM occasion 
                                    WHERE ID = ?") ;

            $stmt->execute(array($userid));

            // we save all the information about the user we need to edit in array called row
            $row = $stmt->fetch();

            // we count if we have an admin with this name or no 
            $count = $stmt->rowCount();

            // if we have an admin with this name and pass we make a form with the information 
            // that we have from database and want to edit 
            if($count > 0){ ?>


            <h1 class="text-center">Edit occations</h1>

            <div class="container">

                <form action="?do=updateocc" method="POST">

                        <div class="form-row">

                        <input type="hidden" name="userid" value="<?php echo $userid ?>">
                            <div class="form-group col-md-6">
                                <label for="inputname4">Day</label>
                                <input type="text" class="form-control" id="inputname4" placeholder="Day" value="<?php  echo $row['DAY'] ?>" name="name" required>
                            </div>


                            <div class="form-group col-md-6">
                                <label for="inputda">Date</label>
                                <input type="date" class="form-control" id="inputda" name="date" value="<?php echo $row['DATE']?>" required>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="inputpl">Place</label>
                            <input type="text" class="form-control" id="inputpl" placeholder="Place" name="place" value="<?php echo $row['PLACE']?>" required>
                        </div>

                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="inputocc">Occasion</label>
                                <input type="text" class="form-control" id="inputocc" name="occasion" value="<?php echo $row['OCCASIONS']?>" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="inputdu">Description</label>
                                <input type="text" class="form-control" id="inputdu" name="description" value="<?php echo $row['DESCRIPTION']?>" required>
                            </div>

                        </div>

                        <div class="form-group">

                        </div>

                        <input value="Save" type = "Submit" class="btn btn-primary">

                </form>

            </div>


<?php }}


/*==========================================================================================================================================
 
    ==============         Update Admin Pade 
    ==============         Update The Admin info in Database
    ==============         Comming From Edit Admin page
  
  ========================================================================================================================================== */ 
        
        elseif($do == 'update'){

            echo "<h1 class='text-center'>Update Member</h1>" ;

            echo " <div class= 'container'> " ;

            // check if the user come from the form (post method) or no
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                // Get the variables from the form 

                $id          = $_POST['userid'] ;
                $user        = $_POST['name'] ;
                $password    = $_POST['password'] ;
                $email       = $_POST['email'] ;
                $phone       = $_POST['phone'] ;
                $fullname    = $_POST['username'] ;
                
                // password trick

                $pass='';

                if(empty($_POST['password'])){

                    $pass = $_POST['oldpassword'] ;

                } else $pass = sha1( $_POST['password'] );

                // Valied the Form 

                $errors = array() ;

                // first valied on name 

                if(strlen($user) <=3 || empty($user)){

                    $errors[] = 'The Name Must be More Than 3 character ';
                }

                // second the Email 

                if(empty($email)){

                    $errors[] = 'The Email must not be empty ';
                }


                // third Fullname

                if(empty($fullname)){

                    $errors[] = 'The FullName must not be empty ';
                }


                // fifth phone

                if(empty($phone) || strlen($phone) <= 10 ){

                    $errors[] = 'The Phone must be more than 10 character ';

                } 
                
                // check The Errors array 


                if(empty($errors)){

                // Update The database member

                $stmt = $con->prepare("UPDATE users SET Name=? , Password=? , Fullname=?  , Email=? ,Phone=?
                                        WHERE ID=?") ;
                $stmt->execute(array( $user  , $pass ,$fullname , $email , $phone , $id )) ;

                echo  "<div class = 'alert alert-success'>" . $stmt->rowCount() ."</div>";

                    }

                    // if it have an errors 

                    else {

                        foreach($errors as $er)

                        echo "<div class = 'alert alert-danger'>" . $er ."</div>" . '<br>' ;

                    }
                }

                else{

                    echo "<div class = 'alert alert-warning'>" . 'This Page Unvaliable' ."</div>" ;
                }


                echo "</div>" ;

                }

/*==========================================================================================================================================
 
    ==============         Update Student Pade 
    ==============         Update The Student info in Database
    ==============         Comming From Edit student page
  
  ========================================================================================================================================== */ 

            elseif($do == 'updatest'){

                echo "<h1 class='text-center'>Update Student</h1>" ;
            
                echo " <div class= 'container'> " ;
            
                // check if the user come from the form (post method) or no
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
                    // Get the variables from the form 
            
                    $id          = $_POST['userid'] ;
                    $user        = $_POST['name'] ;
                    $email       = $_POST['email'] ;
                    $phone       = $_POST['phone'] ;
                    $course      = $_POST['course'] ;
                    $level       = $_POST['level'];
                    
            
                    $errors = array() ;
            
                    // first valied on name 
            
                    if(strlen($user) <3 || empty($user)){
            
                        $errors[] = 'The Name Must be More Than 3 character ';
                    }
            
                    // second the Email 
            
                    if(empty($email)){
            
                        $errors[] = 'The Email must not be empty ';
                    }
            
            
                    // third Fullname
            
                    if(empty($course)){
            
                        $errors[] = 'The FullName must not be empty ';
                    }
            
            
                    // fifth phone
            
                    if(empty($phone) || strlen($phone) <= 10 ){
            
                        $errors[] = 'The Phone must be more than 10 character ';
            
                    } 
                    
                    // check The Errors array 
            
            
                    if(empty($errors)){
            
                    // Update The database member
                
                    $stmt = $con->prepare("UPDATE student SET STUDENTNAME=? , EMAIL=? , PHONE=?  , LEVEL=? ,COURSENAME=?
                                            WHERE ID=?") ;
                    $stmt->execute(array($user  , $email , $phone , $level ,$course , $id )) ;
                
                    echo  "<div class = 'alert alert-success'>" . $stmt->rowCount() ." Record Updated"."</div>";
                
                        }
                
                        // if it have an errors 
                
                        else {
                
                            foreach($errors as $er)
                
                            echo "<div class = 'alert alert-danger'>" . $er ."</div>" . '<br>' ;
                
                        }
                    }
                
                    else{
                
                        echo "<div class = 'alert alert-warning'>" . 'This Page Unvaliable' ."</div>" ;
                    }
                
                
                    echo "</div>" ;
                
                }  


/*==========================================================================================================================================
 
    ==============         Update Lecture Pade 
    ==============         Update The Lecture info in Database
    ==============         Comming From Edit Lecture page
  
  ========================================================================================================================================== */ 
            
            elseif($do == 'updatelec'){

                echo "<h1 class='text-center'>Update Lecture</h1>" ;

                echo " <div class= 'container'> " ;

                // check if the user come from the form (post method) or no
                if($_SERVER['REQUEST_METHOD'] == 'POST'){

                    // Get the variables from the form 
                    $userid          = $_POST['userid'];
                    $name            = $_POST['name'] ;
                    $group           = $_POST['group'] ;
                    $subject         = $_POST['subject'] ;
                    $duration        = $_POST['duration'] ;
                
                    

                    $errors = array() ;

                    // first valied on name 

                    if(strlen($name) < 3 || empty($user)){

                        $errors[] = 'The Name Must be More Than 3 character ';
                    }

                    // second the Email 

                    if(empty($group)){

                        $errors[] = 'The Group must not be empty ';
                    }


                    // third Fullname

                    if(empty($subject)){

                        $errors[] = 'The Subject must not be empty ';
                    }


                    // fifth phone

                    if(empty($duration)){

                        $errors[] = 'The Duration must be not empty ';

                    } 
                    
                    // check The Errors array 


                    if(empty($errors)){

                    // Update The database member

                    $stmt = $con->prepare("UPDATE lecture SET DrName=? , GroupName=? , Subject=?  , Duration=?
                                            WHERE ID=?") ;
                    $stmt->execute(array($name  , $group , $subject , $duration , $userid )) ;

                    echo  "<div class = 'alert alert-success'>" . $stmt->rowCount() ." Record Updated"."</div>";

                        }

                        // if it have an errors 

                        else {

                            foreach($errors as $er)

                            echo "<div class = 'alert alert-danger'>" . $er ."</div>" . '<br>' ;

                        }
                    }

                    else{

                        echo "<div class = 'alert alert-warning'>" . 'This Page Unvaliable' ."</div>" ;
                    }


                    echo "</div>" ;

                } 

/*==========================================================================================================================================
 
    ==============         Update occasion Pade 
    ==============         Update The occasion info in Database
    ==============         Comming From Edit occasion page
  
  ========================================================================================================================================== */ 

            elseif($do == 'updateocc'){

                echo "<h1 class='text-center'>Update Occasions</h1>" ;

                echo " <div class= 'container'> " ;

                // check if the user come from the form (post method) or no
                if($_SERVER['REQUEST_METHOD'] == 'POST'){

                    // Get the variables from the form 
                    $userid          = $_POST['userid'];
                    $name            = $_POST['name'] ;
                    $date            = $_POST['date'] ;
                    $place           = $_POST['place'] ;
                    $occasion        = $_POST['occasion'] ;
                    $description     = $_POST['description'] ;
                

                // Valied the Form 

                $errors = array() ;

                // first valied on name 

                if(strlen($name) <3 || empty($name)){

                    $errors[] = 'The Name Must be More Than 3 character ';
                }

                // second the Email 

                if(empty($date)){

                    $errors[] = 'The Date must not be empty ';
                }

                // forth course 
                if(empty($place)){

                    $errors[] = 'The place name must not be empty ';
                }


                // fifth phone

                if(empty($occasion)){

                    $errors[] = 'The Occasion must not be empty ';

                } 

                if(empty($description)){

                    $errors[] = 'The Description must not be empty ';

                } 

                    
                // check The Errors array 


                    if(empty($errors)){

                // Update The database member

                $stmt = $con->prepare("UPDATE occasion SET DAY=? , DATE=? , PLACE=?  , OCCASIONS=? , DESCRIPTION=?
                                        WHERE ID=?") ;
                $stmt->execute(array($name  , $date , $place , $occasion , $description, $userid )) ;

                echo  "<div class = 'alert alert-success'>" . $stmt->rowCount() ." Record Updated"."</div>";

                    }

                    // if it have an errors 

                    else {

                        foreach($errors as $er)

                        echo "<div class = 'alert alert-danger'>" . $er ."</div>" . '<br>' ;

                    }
                }

                else{

                    echo "<div class = 'alert alert-warning'>" . 'This Page Unvaliable' ."</div>" ;
                }


                echo "</div>" ;

            } 

/*==========================================================================================================================================
 
    ==============         Update Section Pade 
    ==============         Update The Section info in Database
    ==============         Comming From Edit Section page
  
  ========================================================================================================================================== */             

            elseif($do == 'updatesec'){

                echo "<h1 class='text-center'>Update Section</h1>" ;

                echo " <div class= 'container'> " ;

                // check if the user come from the form (post method) or no
                if($_SERVER['REQUEST_METHOD'] == 'POST'){

                    // Get the variables from the form 
                    $userid          = $_POST['userid'];
                    $name            = $_POST['name'] ;
                    $group           = $_POST['group'] ;
                    $subject         = $_POST['subject'] ;
                    $duration        = $_POST['duration'] ;
                
                    

                    $errors = array() ;

                    // first valied on name 

                    if(strlen($name) < 3 || empty($user)){

                        $errors[] = 'The Name Must be More Than 3 character ';
                    }

                    // second the Email 

                    if(empty($group)){

                        $errors[] = 'The Group must not be empty ';
                    }


                    // third Fullname

                    if(empty($subject)){

                        $errors[] = 'The Subject must not be empty ';
                    }


                    // fifth phone

                    if(empty($duration)){

                        $errors[] = 'The Duration must be not empty ';

                    } 
                    
                    // check The Errors array 


                    if(empty($errors)){

                    // Update The database member

                    $stmt = $con->prepare("UPDATE Section SET DrName=? , GroupName=? , Subject=?  , Duration=?
                                            WHERE ID=?") ;
                    $stmt->execute(array($name  , $group , $subject , $duration , $userid )) ;

                    echo  "<div class = 'alert alert-success'>" . $stmt->rowCount() ." Record Updated"."</div>";

                        }

                        // if it have an errors 

                        else {

                            foreach($errors as $er)

                            echo "<div class = 'alert alert-danger'>" . $er ."</div>" . '<br>' ;

                        }
                    }

                    else{

                        echo "<div class = 'alert alert-warning'>" . 'This Page Unvaliable' ."</div>" ;
                    }


                    echo "</div>" ;

                }

                
/*==========================================================================================================================================
 
    ==============         Delete Admin Pade 
    ==============         Delete The Admin info from Database
  
  ========================================================================================================================================== */  

            elseif($do == 'deletest'){


                echo "<h1 class='text-center'>Delete Student</h1>" ;
                
                echo " <div class= 'container'> " ;
                // we make an variable $userid to save the id of the user in it 
                    // to use it to have all the information about the student    
                
                    $userid= isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0 ;
                
                    // we make connect to database and search about all thing we need by ID 
                    $stmt = $con->prepare(" SELECT STUDENTNAME , EMAIL , PHONE , LEVEL ,COURSENAME  
                                            FROM student 
                                            WHERE ID = ?") ;

                    $stmt->execute(array($userid));
                    
                
                    // we count if we have an admin with this name or no 
                    $count = $stmt->rowCount();

                    // if we have an admin with this name and pass we make a form with the information 
                    // that we have from database and want to edit 
                    if($count > 0){ 

                    $stmt = $con->prepare("DELETE FROM student WHERE ID = ?") ;

                    $stmt->execute(array($userid)) ;

                    echo '<div class="alert alert-success">' ." One Record Deleted "."</div>";
                    header( "Refresh:1; url=member.php?do=manage", true, 303);

                    }
                    else{

                        echo '<div class="alert alert-danger">' ."The User Not founded"."</div>";

                    }
                    echo "</div>" ;
                


            }

/*==========================================================================================================================================
 
    ==============         Delete lecture Pade 
    ==============         Delete The lecture info from Database
  
  ========================================================================================================================================== */                 
                

            elseif($do == 'deletelec'){
            
                echo "<h1 class='text-center'>Delete Lecture</h1>" ;
                
                echo " <div class= 'container'> " ;
                // we make an variable $userid to save the id of the user in it 
                // to use it to have all the information about the student   

                $userid= isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0 ;

                $stmt = $con->prepare(" SELECT DrName , GroupName , Subject , Duration
                                            FROM lecture 
                                            WHERE ID = ?") ;

                    $stmt->execute(array($userid));

                // we count if we have an admin with this name or no 
                $count = $stmt->rowCount();

                // if we have an admin with this name and pass we make a form with the information 
                // that we have from database and want to edit 
                if($count > 0){ 

                    $stmt = $con->prepare("DELETE FROM lecture WHERE ID = ?") ;

                    $stmt->execute(array($userid)) ;

                    echo '<div class="alert alert-success">' ." One Record Deleted "."</div>";
                

                }

                else{

                    echo '<div class="alert alert-danger">' ."The User Not founded"."</div>";

                }
                
                echo "</div>" ;
                

                
            }

/*==========================================================================================================================================
 
    ==============         Delete section Pade 
    ==============         Delete The section info from Database
  
  ========================================================================================================================================== */ 
            
            elseif($do == 'deletesec'){
            
                echo "<h1 class='text-center'>Delete Section</h1>" ;
                
                echo " <div class= 'container'> " ;
                // we make an variable $userid to save the id of the user in it 
                // to use it to have all the information about the student   

                $userid= isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0 ;

                $stmt = $con->prepare(" SELECT DrName , GroupName , Subject , Duration
                                            FROM Section 
                                            WHERE ID = ?") ;

                    $stmt->execute(array($userid));

                // we count if we have an admin with this name or no 
                $count = $stmt->rowCount();

                // if we have an admin with this name and pass we make a form with the information 
                // that we have from database and want to edit 
                if($count > 0){ 

                    $stmt = $con->prepare("DELETE FROM Section WHERE ID = ?") ;

                    $stmt->execute(array($userid)) ;

                    echo '<div class="alert alert-success">' ." One Record Deleted "."</div>";
                

                }

                else{

                    echo '<div class="alert alert-danger">' ."The User Not founded"."</div>";

                }
                
                echo "</div>" ;
                

                
            }



/*==========================================================================================================================================
 
    ==============         Delete occasion Pade 
    ==============         Delete The occasion info from Database
  
  ========================================================================================================================================== */ 

            elseif($do == 'deleteocc'){
            
                echo "<h1 class='text-center'>Delete Occasion</h1>" ;
                
                echo " <div class= 'container'> " ;
                // we make an variable $userid to save the id of the user in it 
                // to use it to have all the information about the student   

                $userid= isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0 ;

                $stmt = $con->prepare(" SELECT DAY , PLACE , OCCASIONS , DESCRIPTION
                                            FROM occasion 
                                            WHERE ID = ?") ;

                    $stmt->execute(array($userid));

                // we count if we have an admin with this name or no 
                $count = $stmt->rowCount();

                // if we have an admin with this name and pass we make a form with the information 
                // that we have from database and want to edit 
                if($count > 0){ 

                    $stmt = $con->prepare("DELETE FROM occasion WHERE ID = ?") ;

                    $stmt->execute(array($userid)) ;

                    echo '<div class="alert alert-success">' ." One Record Deleted "."</div>";
                

                }

                else{

                    echo '<div class="alert alert-danger">' ."The User Not founded"."</div>";

                }
                
                echo "</div>" ;
                

                
            }


/*==========================================================================================================================================
 
    ==============         Lecture Pade 
    ==============         Show The lecture table from Database
  
  ========================================================================================================================================== */ 

            elseif($do == 'lecture'){


            $stmt = $con->prepare("SELECT * FROM lecture") ;

            $stmt->execute();

            $row = $stmt->fetchALL();

            // $count = $stmt->rowCount();
            // if we don't have an admin or session we forwared him 
            // to the index form again 

            ?>


            <title>Lectures</title>


                    <h1 class="text-center"> Lecture Member </h1>
                    <div class="container">
                        <div class="table-responsive">
                            <table class="main-table text-center table table-bordered">
                                <tr>
                                    <td> Doctor Name </td>
                                    <td> Group Name </td>
                                    <td> Subject </td>
                                    <td> Duration </td>
                                    <td> Control </td>
                                </tr>
                                <?php

                                foreach($row as $data){

                                    echo "<tr>" ;
                                    echo "<td>" . $data['DrName'] ."</td>" ;
                                    echo "<td>" . $data['GroupName'] ."</td>" ;
                                    echo "<td>" . $data['Subject'] ."</td>" ;
                                    echo "<td>" . $data['Duration'] ."</td>" ;
                                    echo "<td> 
                                            <a href='member.php?do=editlec&userid=" . $data['ID']. " 'class='btn btn-success'>Edit</a>
                                            <a href='member.php?do=deletelec&userid=" . $data['ID']. " 'class='btn btn-danger' onclick=\" return confirm('Are you sure you want to delete this item?');\">Delete</a>    
                                            </td>" ;
                                    echo "</tr>";
                                
                                }

                                ?>

                            </table>
                            
                            </div>

                                <a href="member.php?do=addlec" class="btn btn-primary">Add New Lecture</a>
                    </div>

<?php     } 


/*==========================================================================================================================================
 
    ==============         Section Pade 
    ==============         Show The Section table from Database
  
  ========================================================================================================================================== */ 

            elseif($do == 'section'){


            $stmt = $con->prepare("SELECT * FROM Section") ;

            $stmt->execute();

            $row = $stmt->fetchALL();

            // $count = $stmt->rowCount();
            // if we don't have an admin or session we forwared him 
            // to the index form again 

            ?>


            <title>Sections</title>


                    <h1 class="text-center"> Section Member </h1>
                    <div class="container">
                        <div class="table-responsive">
                                <table class="main-table text-center table table-bordered">
                                    <tr>
                                        <td> Doctor Name </td>
                                        <td> Group Name </td>
                                        <td> Subject </td>
                                        <td> Duration </td>
                                        <td> Control </td>
                                    </tr>
                                    <?php
                                    foreach($row as $data){

                                        echo "<tr>" ;
                                        echo "<td>" . $data['DrName'] ."</td>" ;
                                        echo "<td>" . $data['GroupName'] ."</td>" ;
                                        echo "<td>" . $data['Subject'] ."</td>" ;
                                        echo "<td>" . $data['Duration'] ."</td>" ;
                                        echo "<td> 
                                                <a href='member.php?do=editsec&userid=" . $data['ID']. " 'class='btn btn-success'>Edit</a>
                                                <a href='member.php?do=deletesec&userid=" . $data['ID']. " 'class='btn btn-danger' onclick=\" return confirm('Are you sure you want to delete this item?');\">Delete</a>    
                                                </td>" ;
                                        echo "</tr>";
                                    
                                    }
                                    ?>

                                </table>
                                
                        </div>
                                <a href="member.php?do=addsec" class="btn btn-primary">Add New Section</a>
                    </div>

<?php     } 


/*==========================================================================================================================================
 
    ==============         Holiday and party Pade 
    ==============         Show The Holiday and party table from Database
  
  ========================================================================================================================================== */ 

        elseif($do == 'holiday'){


            $stmt = $con->prepare("SELECT * FROM occasion") ;
            
            $stmt->execute();
            
            $row = $stmt->fetchALL();
            
            // $count = $stmt->rowCount();
            // if we don't have an admin or session we forwared him 
            // to the index form again 
            
            ?>
            
            
            <title>Occasions</title>
            
            
                    <h1 class="text-center">Occasions</h1>
                    <div class="container">
                    <div class="table-responsive">
                        <table class="main-table text-center table table-bordered">
                            <tr>
                                <td> Day </td>
                                <td> Date </td>
                                <td> Place </td>
                                <td> Occasions </td>
                                <td> Description </td>
                                <td> Control </td>
                            </tr>
                            <?php
                            foreach($row as $data){
                
                                echo "<tr>" ;
                                echo "<td>" . $data['DAY'] ."</td>" ;
                                echo "<td>" . $data['DATE'] ."</td>" ;
                                echo "<td>" . $data['PLACE'] ."</td>" ;
                                echo "<td>" . $data['OCCASIONS'] ."</td>" ;
                                echo "<td>" . $data['DESCRIPTION'] ."</td>" ;
                                echo "<td> 
                                        <a href='member.php?do=editocc&userid=" . $data['ID']. " 'class='btn btn-success'>Edit</a>
                                        <a href='member.php?do=deleteocc&userid=" . $data['ID']. " 'class='btn btn-danger' onclick=\" return confirm('Are you sure you want to delete this item?');\">Delete</a>    
                                        </td>" ;
                                echo "</tr>";
                            
                            }
                            ?>
            
                        </table>
                        
                    </div>
                            <a href="dashboard_public.php" class="btn btn-primary">Add New Occasions</a>
                </div>
<?php } ?>


<style>

    body{

        background-color:white;
    }

</style>

<?php   include $tpl . 'footer.php'; ?>