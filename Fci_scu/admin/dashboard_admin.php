<?php 

    // starting the session 
    session_start();

    // i but it because in the navbar page i make an condition 
    // if U find this variable don't include the navbar
    $nonavbar = '';

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
     }

?>

<!-- This is an css page that we make in it a some edit about this page only -->
<link rel="stylesheet" href="<?php echo $css;?>dashboard_admin.css">
     

<div class="d-flex" id="wrapper">

    <!-- Sidebar -->

    <div class="bg-light border-right left_bar" id="sidebar-wrapper">

        <div class="sidebar-heading">Computer and Information </div>

            <div class="list-group list-group-flush">

                <a href="#" class="list-group-item list-group-item-action bg-light">Home</a>

                <a href="#" class="list-group-item list-group-item-action bg-light">Student</a>

                <a href="#" class="list-group-item list-group-item-action bg-light">Courses</a>

                <a href="member.php?do=lecture" class="list-group-item list-group-item-action bg-light">Lectures</a>

                <a href="member.php?do=section" class="list-group-item list-group-item-action bg-light">Sections</a>

                <a href="member.php?do=holiday" class="list-group-item list-group-item-action bg-light">Party</a>

                <a href="member.php?do=holiday" class="list-group-item list-group-item-action bg-light">Holidays</a>

                 <!-- We make to forward us to the member page with the action do is edit and the session id that we have it from the info about the user -->
                 <a href="member.php?do=Edit&userid=<?php echo $_SESSION['ID']  ?>" class="list-group-item list-group-item-action bg-light">Edit Admin</a>

                <!-- We make to forward us to the member page with the action do is Add and the session id that we have it from the info about the user -->
                <a href="member.php?do=add" class="list-group-item list-group-item-action bg-light">Add Admin</a>

                  <!-- We make to forward us to the member page with the action do is manage and the session id that we have it from the info about the user -->
                <a href="member.php?do=manage" class="list-group-item list-group-item-action bg-light">Manage member</a>

            
                <a class="list-group-item list-group-item-action bg-light" href="logout.php">Logout</a>
        

            </div>
    </div>

<!-- /#sidebar-wrapper -->

<!-- Page Content -->

 <div id="page-content-wrapper">

  <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">

    <button class="btn btn-primary" id="menu-toggle">Menu</button>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav ml-auto mt-2 mt-lg-0">

        <li class="nav-item active">
          <a class="nav-link" href="member.php?do=manage">Manage member <span class="sr-only">(current)</span></a>
        </li>

        <li class="nav-item">
        <a class="nav-link" href="#">Student</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#">Courses</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="member.php?do=lecture">Lectures</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="member.php?do=section">Sections</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Party</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#">Holidays</a>
      </li>
      <li class="nav-item dropdown">

<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  Admin
</a>
<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
  <a class="dropdown-item" href="member.php?do=Edit&userid=<?php echo $_SESSION['ID'] ?>">Edit Admin</a>
  <a class="dropdown-item" href="member.php?do=add">Add Admin</a>
  <div class="dropdown-divider"></div>
</div>

</li>
      <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>

     

      </ul>

    </div>
    
  </nav>

    <div class="container-fluid">
        
    <header class="header1">   <div class="header__text-box">

<h1 class="heading-primary">
    <span class="heading-primary--main">OUTDOOR</span>
    <span class="heading-primary--sub">ISWHERELIFEHAPPENS</span>

</h1>
<a href="#" class="btn2 btn--white btn--animated" >Discover Our tour</a> 
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