<?php include "includes/header.php"; ?>



       <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
              

               <?php 

               if(isset($_GET['mainVar'])){
                $mainVar = $_GET['mainVar'];
               }else{
                $mainVar = 'Manage';
               }

               // $mainVar = ($_GET['mainVar']) ? $_GET['mainVar'] : 'Manage';

               if ($mainVar == 'Manage') {
                 // read all users
                echo 'view';
               }
               elseif ($mainVar == 'Add') {
                 // add a new users
                echo 'add';
               }
                elseif ($mainVar == 'Edit') {
                 // edit users
               }
                elseif ($mainVar == 'Update') {
                 // update users
               }
                elseif ($mainVar == 'Delete') {
                 // delete an users
               }

               ?>

              </div>
            </div>
          </div>
        </div>
      <!-- </div> -->






 <?php include "includes/footer.php"; ?>