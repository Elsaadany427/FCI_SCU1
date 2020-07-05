<!-- Include The Header -->
<?php

    // Start The Session 
    session_start();

    // This variable we but it because we but in the init.php page if
    // this variable founded don't but the navbar in this page 
    $nonavbar = '';

    // we check if there is a session we forward him to the main page
    // dependent on his session 

    if(isset( $_SESSION['username'])){

        header('Location:dashboard_admin.php');
    }

    // we check if there is a session we forward him to the main page
    // dependent on his session 

    if(isset( $_SESSION['username_public'])){

        header('Location:dashboard_public.php');
    }

    // include the page that have the header and the paths init.php
    include 'init.php';
    

    // check if the user come from the form or no 
    if($_SERVER['REQUEST_METHOD']=='POST') {

        // we filter the name from any tags to make more secrity 
        $user =filter_var($_POST['username'] , FILTER_SANITIZE_STRING);

        // we hash the password 
        $pass = $_POST['password'];
        $hashpass = sha1($pass);

       
        //check if the user in database this for admin 
        // i search about the admin  
        $stmt = $con->prepare("SELECT ID, Name, Password 
                                FROM users WHERE Name = ? 
                                AND Password = ?
                                AND GroupID=1") ;
        $stmt->execute(array($user , $hashpass)); 

        // we make an array row and but all the data about admin in it 
        $row = $stmt->fetch();

        // we count if we have an admin with this name or no 
        $count = $stmt->rowCount();


    // if we have an admin with this name and pass
    if($count > 0){

            // we make an session and save the user name in this session 
             $_SESSION['username'] = $user ;

            // we add the id of the admin in this session to make an operation in it 
             $_SESSION['ID'] = $row['ID'] ;

             // we forward him to the dashboard_admin 
             header('Location:dashboard_admin.php');
            
    } 

    // if this user wasn't an admin we check if this is a student or no 
    else{

            $stmt2 = $con->prepare("SELECT ID, Name, Password 
                                    FROM users WHERE Name = ? 
                                    AND Password = ?
                                    AND GroupID=0") ;
            $stmt2->execute(array($user , $hashpass)); 
            $count2 = $stmt2->rowCount();

            // if this user is a student we forward him to the dashboard_public
            if($count2 > 0){

                // we make an session and save the user name in this session 
                $_SESSION['username_public'] = $user ;

                // we add the id of the admin in this session to make an operation in it 
                $_SESSION['ID'] = $row['ID'] ;
                
                  // we forward him to the dashboard_public
                header('Location:dashboard_public.php');
                
            }

            // if this user not student or admin 
            else{

                echo "<div class='alert alert-danger'>" ."The User Not Founded"."</div>" ;
            }
        }          
    }
?>





<!-- Form -->
<div class="container container1">

    <!-- The heading of container -->

    <h2 class="h2InContainer text-center"><span>Ꮭ</span>ogin Form</h2>
    <div class="row">

    <div class="col-sm-6"></div>

        <div class="col-sm-6 ">

            <!-- Sending The information of the user to the up of the page to check it -->
        
            <form class="login" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

                <div class="im"><img src="layout/img/avatar-380-456332.webp" alt=""></div>
                
                <div class="userName form-group">

                    <label for="exampleInputname"><span>User</span>Name</label>

                    <input type="text" class="user form-control form-control-lg" id="exampleInputname" aria-describedby="nameHelp"  placeholder="Please Enter Your Username" name= "username">

                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.5 10.995V14.5a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5V11c0-.25-.25-.5-.5-.5H7c-.25 0-.5.25-.5.495z"/>
                    <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                    </svg>

                    <small id="nameHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>

                </div>

                <div class="password form-group">

                    <label for="exampleInputPassword1"><span>Pas</span>sword</label>

                    <input type="password" class="pass form-control form-control-lg" id="exampleInputPassword1"  placeholder="Please Enter Your Password" name= "password">

                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-shield-lock-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M5.187 1.025C6.23.749 7.337.5 8 .5c.662 0 1.77.249 2.813.525a61.09 61.09 0 0 1 2.772.815c.528.168.926.623 1.003 1.184.573 4.197-.756 7.307-2.367 9.365a11.191 11.191 0 0 1-2.418 2.3 6.942 6.942 0 0 1-1.007.586c-.27.124-.558.225-.796.225s-.526-.101-.796-.225a6.908 6.908 0 0 1-1.007-.586 11.192 11.192 0 0 1-2.417-2.3C2.167 10.331.839 7.221 1.412 3.024A1.454 1.454 0 0 1 2.415 1.84a61.11 61.11 0 0 1 2.772-.815zm3.328 6.884a1.5 1.5 0 1 0-1.06-.011.5.5 0 0 0-.044.136l-.333 2a.5.5 0 0 0 .493.582h.835a.5.5 0 0 0 .493-.585l-.347-2a.5.5 0 0 0-.037-.122z"/>
                    </svg>

                </div>

                <div class="form-group form-check">

                    <input type="checkbox" class="form-check-input" id="exampleCheck1">

                    <label class="form-check-label" for="exampleCheck1">Check me out</label>

                </div>

                <input type="submit" value="Login" class="btn btn-success btn-block">

            </form>

        </div>

    </div>

</div>

<!-- End Form -->


<!-- Include The Footer -->

