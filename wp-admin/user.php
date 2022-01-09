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
                                      <!-- <th>Biodata</th> -->
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
                                      $u_address  = $row['u_address'];
                                      $u_phone    = $row['u_phone'];
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
                                      <!-- <td><?php echo substr($u_biodata, 1, 40) ?></td> -->
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
                                       <a type="button" class="btn " href=""> <i class="mdi mdi-border-color text-success" style="margin-right: 3px;"></i></a>

                                       <a type="button" class="btn " href=""> <i class="mdi mdi-account text-primary" style="margin-right: 3px;"></i></a>

                                        <a type="button" class="btn " data-bs-toggle="modal" data-bs-target="#B-modal<?php echo $cat_id;?>"><i class="mdi mdi-delete text-danger" style="margin-left: 3px;"></i></a>

                                        <!-- Modal -->
                                            <div class="modal fade" id="B-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog">
                                                <div class="modal-content">
                                                  <div class="modal-body text-center">
                                                    <h2 class="mb-4">Are You Sure ?</h2>
                                                    <a href="" type="button" class="btn btn-danger">Yes</a>

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
                        <h4 class="card-title">Horizontal Form</h4>
                        <p class="card-description">
                          Horizontal form layout
                        </p>
                        <form class="forms-sample">
                          <div class="form-group row">
                            <label for="username" class="col-sm-3 col-form-label">UserName</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="username" placeholder="UserName">
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
                              <textarea type="text" rows="4" class="custom-area" id="address" placeholder="Address"></textarea>
                            </div>
                          </div>

                          <div class="form-group row">
                            <label for="exampleInputPassword2" class="col-sm-3 col-form-label">User Gender</label>
                            <div class="col-sm-9">
                              <select class="form-control" name="Gender">
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
                              <textarea type="text" rows="6" class="custom-area" id="biodata" placeholder="Biodata"></textarea>
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
                              <input type="file" class="" id="user-photo" name="UserPhoto">
                              <p class="mt-2"><small style="color:#807979;">Please Insert A PNG/JPG/JPEG Format Photo Only.</small></p>
                            </div>
                          </div>

                          <button type="submit" class="btn btn-primary me-2 text-light">Submit</button>
                          <button class="btn btn-light">Cancel</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

                <?php
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