<?php include "includes/header.php"; ?>



       <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-sm-12">
              <div class="home-tab">
                <div class="row">
                  <div class="col-lg-4 d-flex flex-column">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="card-title">Add New Category</h4>
                            <p class="card-description">
                              Horizontal form layout
                            </p>


                            <?php 
                            if (isset($_POST['add_cat'])) {
                              $cat_name = $_POST['cat_name'];
                              $cat_description = $_POST['cat_description'];

                              // 3 step

                              $add_query = "INSERT INTO category (c_name,c_description,c_status) VALUES('$cat_name','$cat_description',0)";
                              $add_result = mysqli_query($db,$add_query);

                              if($add_result){
                                header('location: category.php');
                              }else{
                                die('Category Insert Error'.mysql_error($db));
                              }


                            }
                            ?>


                            <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
                              <div class="form-group row">
                                <label for="cat_name" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                  <input type="text" class="form-control" id="cat_name" placeholder="Name"/ required="required" name="cat_name">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                  <textarea class="custom-area" rows="6" name="cat_description" placeholder="Description"></textarea>
                                </div>
                              </div>
                              <button type="submit" class="btn btn-success text-light me-2 " name="add_cat">Add New</button>
                              <button class="btn btn-light ">Cancel</button>
                            </form>
                          </div>
                        </div>

                        <!-- Edit Form Start -->

                        <?php 

                        if (isset($_GET['edit_id'])) {
                            $edit_id = $_GET['edit_id'];

                            $edit_query = "SELECT * FROM category WHERE cat_id = $edit_id";
                                      $result = mysqli_query($db,$edit_query);
                                      while ($query_result = mysqli_fetch_assoc($result)) {
                                        $cat_id  = $query_result['cat_id'];
                                        $c_name = $query_result['c_name'];
                                        $c_description = $query_result['c_description'];
                                        $c_status = $query_result['c_status'];
                            }


                            // update category php code




                          ?>
                            <div class="card mt-4">
                                <div class="card-body">
                                  <h4 class="card-title">Edit Category</h4>
                                  <p class="card-description">
                                    Horizontal form layout
                                  </p>
                                  <form class="forms-sample" method="POST" action="" enctype="multipart/form-data">
                                    <div class="form-group row">
                                      <label for="cat_name" class="col-sm-3 col-form-label">Name</label>
                                      <div class="col-sm-9">
                                        <input type="text" class="form-control" id="cat_name" placeholder="Name"/ required="required" name="cate_name" value="<?php echo $c_name?>">
                                      </div>
                                    </div>
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Description</label>
                                      <div class="col-sm-9">
                                        <textarea class="custom-area" rows="6" name="cate_description" placeholder="Description"><?php echo $c_description?></textarea>
                                      </div>
                                    </div>

                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Status</label>
                                      <div class="col-sm-9">
                                        <select class="form-control" name="cate_status">
                                          <option value="0" <?php 
                                          if($c_status == 0){
                                            echo 'selected';
                                          } ?>>Active</option>
                                          <option value="1" <?php 
                                          if($c_status == 1){
                                            echo 'selected';
                                          }?>>Inactive</option>
                                        </select>
                                      </div>
                                    </div>

                                    <button type="submit" class="btn btn-success text-light me-2 " name="update_cat">Update Category</button>
                                    <button class="btn btn-light ">Cancel</button>
                                  </form>
                                </div>
                            </div>
                          <?php


                          if(isset($_POST['update_cat'])){
                            $cate_name        = $_POST['cate_name'];
                            $cate_description = $_POST['cate_description'];
                            $cate_status      = $_POST['cate_status'];

                            $update_query     = "UPDATE category SET c_name ='$cate_name', c_description ='$cate_description', c_status ='$cate_status' WHERE cat_id = '$edit_id'";
                             $update_result = mysqli_query($db,$update_query);

                             if($update_result){
                              header('Location: category.php');
                             }else{
                              die('category update error'.mysql_error($db));
                             }

                          }


                        }

                        ?>

                        <!-- Edit Form End -->

                   </div>
                   <div class="col-lg-8 d-flex flex-column">
                        <div class="row flex-grow">
                          <div class="card">
                            <div class="card-body">
                              <h4 class="card-title">All Categorys</h4>
                              <p class="card-description">
                                Add class <code>.table-hover</code>
                              </p>
                              <div class="table-responsive">
                                <table class="table table-hover">
                                  <thead>
                                    <tr>
                                      <th>Category Name</th>
                                      <th>Description</th>
                                      <th>Category Status</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>

                                    <!-- read data from database -->

                                    <?php 

                                    // 3 step
                                    // query
                                    // query > database
                                    // database feadback

                                    // show only parent category add this code from after '$query = "SELECT * FROM category'
                                    // WHERE parent_id = 0

                                    $query = "SELECT * FROM category";
                                      $result = mysqli_query($db,$query);
                                      while ($query_result = mysqli_fetch_assoc($result)) {
                                        $cat_id  = $query_result['cat_id'];
                                        $c_name = $query_result['c_name'];
                                        $c_description = $query_result['c_description'];
                                        $c_status = $query_result['c_status'];
                                        $is_parent = $query_result['is_parent'];
                                        $parent_id = $query_result['parent_id'];

                                      ?>

                                    <tr>
                                      <!-- 0 for main category 1 for sub category -->
                                      <td>
                                        <?php

                                         if($is_parent == 0){
                                          echo $c_name;
                                         }else{
                                          echo '- '.$c_name;
                                         }

                                         ?>
                                          
                                       </td>
                                      <td><?php echo $c_description;?></td>
                                      <td>
                                        <?php 

                                        if ($c_status == 0) {
                                          echo '<label class="badge badge-success">Active</label>';
                                        }else{
                                          echo '<label class="badge badge-danger">Inactive</label>';
                                        }

                                        ?>
                                      </td>
                                      <td>
                                       <a type="button" class="btn " href="category.php?edit_id=<?php echo $cat_id;?>"> <i class="mdi mdi-border-color text-success" style="margin-right: 3px;"></i></a>

                                        <a type="button" class="btn " data-bs-toggle="modal" data-bs-target="#B-modal<?php echo $cat_id;?>"><i class="mdi mdi-delete text-danger" style="margin-left: 3px;"></i></a>

                                        <!-- Modal -->
                                            <div class="modal fade" id="B-modal<?php echo $cat_id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                              <div class="modal-dialog">
                                                <div class="modal-content">
                                                  <div class="modal-body text-center">
                                                    <h2 class="mb-4">Are You Sure ?</h2>

                                                    <!-- delete operation -->

                                                    <?php 
                                                    if(isset($_GET['B-modal'])){
                                                      $delete_id = $_GET['B-modal'];
                                                      $table_name         = 'category'; 
                                                      $primary_key        = 'c_id';
                                                      $redirect_location  = 'category.php';

                                                   delete_function($delete_id,$table_name,$primary_key,$redirect_location);

                                                   // delete_function($delete_id,'category','c_id','category.php');

                                                    }
                                                    ?>

                                                    <a href="category.php?B-modal=<?php echo $cat_id;?>" type="button" class="btn btn-danger">Yes</a>

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
                 </div>
              </div>
            </div>
          </div>
        </div>






 <?php include "includes/footer.php"; ?>