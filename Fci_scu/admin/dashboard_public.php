<?php
        session_start();

        $nonavbar = '';
        $publicnavbar = '';

        if(isset($_SESSION['username_public'])){
            include 'init.php';
            
        
        }

        else {
            header('Location: index.php');
        }

        ?>

       

        <!-- This is an css page that we make in it a some edit about this page only -->
        <link rel="stylesheet" href="<?php echo $css;?>dashboard_admin.css">

        <div class="d-flex" id="wrapper">

            <!-- Sidebar -->

            <div class="bg-light border-right left_bar" id="sidebar-wrapper">

                <div class="sidebar-heading">Computer and Information </div>

                    <div class="list-group list-group-flush">

                        <a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>


                        <a href="#" class="list-group-item list-group-item-action bg-light">Courses</a>

                        <a href="publicmember.php?do=lecture" class="list-group-item list-group-item-action bg-light">Lectures</a>

                        <a href="publicmember.php?do=section" class="list-group-item list-group-item-action bg-light">Sections</a>

                        <a href="publicmember.php?do=holiday" class="list-group-item list-group-item-action bg-light">Party</a>

                        <a href="publicmember.php?do=holiday" class="list-group-item list-group-item-action bg-light">Holidays</a>

                        

                    </div>
                    
            </div>

                <!-- /#sidebar-wrapper -->

                <!-- Page Content -->

                <div id="page-content-wrapper">

                
                    <div class="container-fluid">
                            
            <header class="header1">   <div class="header__text-box">

                <h1 class="heading-primary">
                    <span class="heading-primary--main">OUTDOOR</span>
                    <span class="heading-primary--sub">ISWHERELIFEHAPPENS</span>

                </h1>
                <a href="#" class=" btn btn2 btn--white btn--animated" >Discover Our tour</a> 
                </div>

            </header>
                            </div>

                </div>
                
                <!-- /#page-content-wrapper -->

        </div>

        <!-- /#wrapper -->

        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>

        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Menu Toggle Script -->

        <script>

        $("#menu-toggle").click(function(e) {

        e.preventDefault();

        $("#wrapper").toggleClass("toggled");

        });

        </script>


        <?php 
        
            include $tpl . 'footer.php'; 
        ?>

