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
                ?>
                <div class="row">
                  <div class="col-lg-12 d-flex flex-column">
                    <div class="card">
                            <div class="card-body">
                              <h4 class="card-title">All User Information</h4>
                              <p class="card-description">
                                User Info <code>.table-hover</code>
                              </p>
                              <div class="table-responsive">
                                <table class="table table-hover">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Photo</th>
                                      <th>Name</th>
                                      <th>Email</th>
                                      <th>Phone</th>
                                      <th>Address</th>
                                      <th>Biodata</th>
                                      <th>Gender</th>
                                      <th>User Role</th>
                                      <th>Status</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php

                                    $user_query   = "SELECT * FROM users";
                                    $user_result  = mysqli_query($db,$user_query);
                                    $count = 0;
                                    while($row    = mysqli_fetch_assoc($user_result)){

                                      $u_id       = $row['u_id'];
                                      $u_name     = $row['u_name'];
                                      $u_email    = $row['u_email'];
                                      $u_phone    = $row['u_phone'];
                                      $u_address  = $row['u_address'];
                                      $u_biodata  = $row['u_biodata'];
                                      $u_gender   = $row['u_gender'];
                                      $u_role     = $row['u_role'];
                                      $u_status   = $row['u_status'];
                                      $u_image    = $row['u_image'];

                                      $count++;

                                      ?>

                                      <tr>
                                      <td><?php echo $count;?></td>
                                      <td><img src="images/users_image/<?php echo $u_image; ?>"></td>
                                      <td><?php echo $u_name ; ?></td>
                                      <td><?php echo $u_email; ?></td>
                                      <td><?php echo $u_phone; ?></td>
                                      <td><?php echo $u_address; ?></td>
                                      <td><?php echo substr($u_biodata, 1, 50) ?></td>
                                      <td><?php echo $u_gender; ?></td>
                                      <td><?php 

                                          if($u_role == 0){
                                            echo '<span class="btn bg-success" style="color:#ffffff">Subscriber</span>';
                                          }elseif($u_role == 1){
                                            echo '<span class="btn bg-primary" style="color:#ffffff">Editor</span>';
                                          }else{
                                            echo '<span class="btn bg-danger" style="color:#ffffff">Admin</span>';
                                          }

                                          ?>
                                      </td>
                                      <td>
                                        <?php
                                        if($u_status == 0){
                                          echo '<span class="badge badge-success">Active</span>';
                                        }else{
                                          echo '<span class="badge badge-danger">Inactive</span>';
                                        }
                                        ?>
                                         
                                      </td>
                                      <td>

                                       <a type="button" class="btn " href="user.php?mainVar=Edit&edit_id=<?php echo $u_id; ?>"> <i class="mdi mdi-border-color text-success" style="margin-right: 3px;"></i></a>

                                       <a type="button" class="btn " href=""> <i class="mdi mdi-account text-primary" style="margin-right: 3px;"></i></a>

                                        <a type="button" class="btn " data-bs-toggle="modal" data-bs-target="#delete_id<?php echo $u_id; ?>"><i class="mdi mdi-delete text-danger" style="margin-left: 3px;"></i></a>

                                        <!-- Modal -->
                                            <div class="modal fade" id="delete_id<?php echo $u_id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog">
                                                <div class="modal-content">
                                                  <div class="modal-body text-center">
                                                    <h2 class="mb-4">Are You Sure ?</h2>
                                                    <a href="user.php?mainVar=Delete&delete_id=<?php echo $u_id; ?>" type="button" class="btn btn-danger">Yes</a>

                                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">No</button>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                      </td>
                                    </tr>

                                      <?php

                                    }

                                    ?>


                                    


                                  </tbody>
                                </table>
                              </div>
                            </div>
                  </div>
                  </div>
                </div>
                <?php
               }
               elseif ($mainVar == 'Add') {
                 // add a new users
                ?>

                <div class="row">
                  <div class="offset-1 col-lg-10 col-md-12 d-flex flex-column">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Add A New User</h4>
                        <p class="card-description">
                          Horizontal form layout
                        </p>


                        <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
                          <div class="form-group row">
                            <label for="username" class="col-sm-3 col-form-label">UserName</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="username" placeholder="UserName" name="UserName">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="user-email" class="col-sm-3 col-form-label">User Email</label>
                            <div class="col-sm-9">
                              <input type="email" class="form-control" id="user-email" placeholder="User Email" name="UserEmail">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="user-password" class="col-sm-3 col-form-label">User Password</label>
                            <div class="col-sm-9">
                              <input type="password" class="form-control" id="user-password" placeholder="Password" name="UserPassword">
                              <small style="color:#807979;">Password Should Contains At Least 8 Character.</small>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="user-number" class="col-sm-3 col-form-label">User Number</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="user-number" placeholder="Phone" name="UserNumber">
                            </div>
                          </div>

                            <div class="form-group row">
                            <label for="address" class="col-sm-3 col-form-label">User Address</label>
                            <div class="col-sm-9">
                              <textarea type="text" name="UserAddress" rows="4" class="custom-area" id="address" placeholder="Address"></textarea>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">User Gender</label>
                            <div class="col-sm-9">
                              <select class="form-control" name="UserGender">
                                <option>Please Select Your Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Others">Others</option>
                              </select>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="biodata" class="col-sm-3 col-form-label">User Biodata</label>
                            <div class="col-sm-9">
                              <textarea type="text" rows="6" class="custom-area" id="biodata" placeholder="Biodata" name="UserBiodata"></textarea>
                            </div>
                          </div>

                           <div class="form-group row">
                            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">User Type</label>
                            <div class="col-sm-9">
                              <select class="form-control" name="UserType">
                                <option>Please Select Your User Role</option>
                                <option value="0">Subscriber</option>
                                <option value="1">Editor</option>
                                <option value="2">Admin</option>
                              </select>
                            </div>
                          </div>

                           <div class="form-group row">
                            <label for="user-photo" class="col-sm-3 col-form-label">User Photo</label>
                            <div class="col-sm-9">
                              <input type="file" class="" id="user-photo" name="UserFile">
                              <p class="mt-2"><small style="color:#807979;">Please Insert A PNG/JPG/JPEG Format Photo Only.</small></p>
                            </div>
                          </div>

                          <button type="submit" class="btn btn-primary me-2 text-light" name="AddUser">Submit</button>
                          <button class="btn btn-light">Cancel</button>
                        </form>



                        <!-- add user php code -->

                        <?php

                        if(isset($_POST['AddUser'])){

                          $UserName       = $_POST['UserName'];
                          $UserEmail      = $_POST['UserEmail'];
                          $UserPassword   = $_POST['UserPassword'];
                          $UserNumber     = $_POST['UserNumber'];
                          $UserAddress    = $_POST['UserAddress'];
                          $UserGender     = $_POST['UserGender'];
                          $UserBiodata    = mysqli_real_escape_string($db,$_POST['UserBiodata']);
                          $UserType       = $_POST['UserType'];
                          $UserFile       = $_FILES['UserFile']['name'];
                          $TempName       = $_FILES['UserFile']['tmp_name'];



                          $formate_dev    = explode('.', $UserFile);
                          $exten          = end($formate_dev);
                          $exten          = strtolower($exten);
                          $acceptFormate  = array('png', 'jpg', 'jpeg');

                          if(in_array($exten, $acceptFormate) === true){

                            $random       = rand();
                            $updated_name = $random.'_random_number_'.$UserFile;

                            move_uploaded_file($TempName, 'images/users_image/'.$updated_name);

                            $hash_password = sha1($UserPassword);

                            // 3 step

                            $add_query = "INSERT INTO users (u_name,u_email,u_pass,u_address,u_phone,u_biodata,u_gender,u_role,u_status,u_image) VALUES ('$UserName', '$UserEmail','$UserPassword', '$UserAddress','$UserNumber','$UserBiodata','$UserGender','$UserType','0','$updated_name')";
                            $add_query_result = mysqli_query($db, $add_query);
                            if($add_query_result){
                              header('Location: user.php');
                            }else{
                              die('User Information Add Error'.mysql_error($db));
                            }

                          }else{
                            echo '<span class="alert alert-danger">Please Upload An Image (jpg, jpeg, png)</span>';
                          }






                          // check field code

                          //  if(!empty($UserName) && !empty($UserEmail) && !empty($UserPassword) && !empty($UserNumber) && !empty($UserAddress) && !empty($UserGender) && !empty($UserBiodata) && !empty($UserType)){

                          // }else{
                          //   echo'<span class="alert alert-danger">Please Full Fill The Information</span>';
                          // }


                          }

                        ?>

                      </div>
                    </div>
                  </div>
                </div>

                <?php
               }
                elseif ($mainVar == 'Edit') {
                 // edit users
                  if(isset($_GET['edit_id'])){

                    $edit_id = $_GET['edit_id'];
                    // read all the information first
                         $user_query   = "SELECT * FROM users WHERE u_id='$edit_id'";
                                    $user_result  = mysqli_query($db,$user_query);
                                    
                                    while($row    = mysqli_fetch_assoc($user_result)){

                                      $u_id       = $row['u_id'];
                                      $u_name     = $row['u_name'];
                                      $u_email    = $row['u_email'];
                                      $u_phone    = $row['u_phone'];
                                      $u_address  = $row['u_address'];
                                      $u_biodata  = $row['u_biodata'];
                                      $u_gender   = $row['u_gender'];
                                      $u_role     = $row['u_role'];
                                      $u_status   = $row['u_status'];
                                      $u_image    = $row['u_image'];

                                    

                                    }

                                    // display all the information now
                                    ?>

        <div class="row">
                  <div class="offset-1 col-lg-10 col-md-12 d-flex flex-column">
                    <div class="card">
                      <div class="card-body">
                        <h4 class="card-title">Edit User Information</h4>
                        <p class="card-description">
                          Horizontal form layout
                        </p>


                        <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
                          <div class="form-group row">
                            <label for="username" class="col-sm-3 col-form-label">UserName</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="username" placeholder="UserName" name="UserName" value="<?php echo $u_name;?>">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="user-email" class="col-sm-3 col-form-label">User Email</label>
                            <div class="col-sm-9">
                              <input type="email" class="form-control" id="user-email" placeholder="User Email" name="UserEmail" value="<?php echo $u_email;?>">
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="user-password" class="col-sm-3 col-form-label">User Password</label>
                            <div class="col-sm-9">
                              <input type="password" class="form-control" id="user-password" placeholder="Password" name="UserPassword">
                              <small style="color:#807979;">Password Should Contains At Least 8 Character.</small>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="user-number" class="col-sm-3 col-form-label">User Number</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="user-number" placeholder="Phone" name="UserNumber" value="<?php echo $u_phone;?>">
                            </div>
                          </div>

                            <div class="form-group row">
                            <label for="address" class="col-sm-3 col-form-label">User Address</label>
                            <div class="col-sm-9">
                              <textarea type="text" name="UserAddress" rows="4" class="custom-area" id="address" placeholder="Address" value="<?php echo $u_address;?>"><?php echo $u_address;?></textarea>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">User Gender</label>
                            <div class="col-sm-9">
                              <select class="form-control" name="UserGender">
                                <option>Please Select Your Gender</option>
                                <option value="Male" <?php if($u_gender == 'Male')echo 'selected'?>>Male</option>
                                <option value="Female" <?php if($u_gender == 'Female')echo 'selected'?>>Female</option>
                                <option value="Others" <?php if($u_gender == 'Others')echo 'selected'?>>Others</option>
                              </select>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="biodata" class="col-sm-3 col-form-label">User Biodata</label>
                            <div class="col-sm-9">
                              <textarea type="text" rows="6" class="custom-area" id="biodata" placeholder="Biodata" name="UserBiodata"><?php echo $u_address;?></textarea>
                            </div>
                          </div>

                           <div class="form-group row">
                            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">User Status</label>
                            <div class="col-sm-9">
                              <select class="form-control" name="UserStatus">
                                <option>Please Select Your User Role</option>
                                <option value="0" <?php if($u_status == 0)echo 'selected'?>>Active</option>
                                <option value="1" <?php if($u_status == 1)echo 'selected'?>>Inactive</option>
                              </select>
                            </div>
                          </div>

                           <div class="form-group row">
                            <label for="user-photo" class="col-sm-3 col-form-label">User Photo</label>
                            <!-- <img src="images/users_image/<?php echo $u_image;?>" style="height: 200px;width: 200px;"> -->
                            <div class="col-sm-9">
                              <input type="file" class="" id="user-photo" name="UserFile">
                              <p class="mt-2"><small style="color:#807979;">Please Insert A PNG/JPG/JPEG Format Photo Only.</small></p>
                            </div>
                          </div>
                           <div class="form-group row">
                            <label class="col-sm-3"></label>
                            <img src="images/users_image/<?php echo $u_image;?>" style="height: 200px;width: 200px;">
                            <div class="col-sm-9">
                            </div>
                          </div>

                          <button type="submit" class="btn btn-primary me-2 text-light" name="Update_user">Update</button>
                          <button class="btn btn-light">Cancel</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>


                                    <?php



                  }
               }
                elseif ($mainVar == 'Update') {
                 // update users
               }
                elseif ($mainVar == 'Delete') {
                 // delete an users
                  if(isset($_GET['delete_id'])){

                    $delete_id    = $_GET['delete_id'];


                    // delete user image first 

                       $table_name         = 'users'; 
                       $primary_key        = 'u_id';
                       $redirect_location  = 'user.php';

                    delete_files($delete_id,$table_name,$primary_key);


                    // $select_query = "SELECT u_image FROM users WHERE u_id = '$delete_id'";
                    // $result_query = mysqli_query($db,$select_query);
                    // while($row = mysqli_fetch_assoc($result_query)){
                    //       $u_image = $row['u_image'];
                    //     }
                    //     $unlinkvar = unlink('images/users_image/'.$u_image);
                    //     if($unlinkvar){
                          
                    //     }else{
                    //     die('image delete error'.mysqli_error($db));
                    //    }

                      
                      // delete user all data
                    
                       delete_function($delete_id,$table_name,$primary_key,$redirect_location);


                       // $delete_query = "DELETE FROM users WHERE u_id = '$delete_id'";
                       // $delete_result = mysqli_query($db,$delete_query);
                       // if($delete_result){
                       //  header('Location: user.php');
                       // }else{
                       //  die('user delete error'.mysqli_error($db));
                       // }



                  }
                  
               }

               ?>

              </div>
            </div>
          </div>
        </div>
      <!-- </div> -->






 <?php include "includes/footer.php"; ?>