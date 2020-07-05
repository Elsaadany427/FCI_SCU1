<?php
 // Starting The session
 session_start();
        
 // i check if we have an session as if we have an admin 
 // has registered if we found an admin and session we include 
 // the page init.php that have the header and paths

 

 include 'init.php';

 

 // if we don't have an admin or session we forwared him 
 // to the index form again 


?>

    <title>Lectures</title>


    <div id="app" style="margin:150px auto">

        <main class="py-4">
            <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">jQuery Bootstable: Editable Bootstrap 4 Table Demo</div>

                <div class="card-body">

        <button class="btn btn-primary" id="submit_data">Submit</button>
        <table class="table table-responsive-md table-sm table-bordered" id="makeEditable">
     <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Default</td>
        <td>Defaultson</td>
        <td>def@somemail.com</td>
      </tr>
      <tr class="success">
        <td>Success</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      <tr class="danger">
        <td>Danger</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr class="info">
        <td>Info</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>
      <tr class="warning">
        <td>Warning</td>
        <td>Refs</td>
        <td>bo@example.com</td>
      </tr>
      <tr class="active">
        <td>Active</td>
        <td>Activeson</td>
        <td>act@example.com</td>
      </tr>
    </tbody>
  </table>
  
  <?php
if(isset($_SESSION['username'])){
  include $tpl . 'table.php';
  echo "<script src='layout/js/lecturetable.js'></script>"; 
}

  ?>