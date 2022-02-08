<?php 
	include "connection.php";

	// delete files function start from here

	function delete_files($delete_id,$table_name,$primary_key){

		global $db;

	  $select_query = "SELECT u_image FROM users WHERE u_id = '$delete_id'";
      $result_query = mysqli_query($db,$select_query);
      while($row = mysqli_fetch_assoc($result_query)){
            $u_image = $row['u_image'];
          }
          $unlinkvar = unlink('images/users_image/'.$u_image);
          if($unlinkvar){
                          
          }else{
          die('image delete error'.mysqli_error($db));
         }

       }

	// delete files function end from here

	// delete functions start from here

	function delete_function($delete_id,$table_name,$primary_key,$redirect_location){

		global $db;

		   $delete_query = "DELETE FROM $table_name WHERE $primary_key ='$delete_id'";
           $delete_query = mysqli_query($db,$delete_query);

            if($delete_query){
               header('location: '.$redirect_location);
              }else{
                   die('Category Delete Error'.mysql_error($db));
                   }
	}

// delete function end from here


?>