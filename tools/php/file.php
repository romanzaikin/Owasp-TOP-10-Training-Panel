<?php
   if(isset($_FILES['file_upload_name']))
   {
      $errors = array();

      $file_name =     $_FILES['file_upload_name']['name'];
      $file_size = $_FILES['file_upload_name']['size'];
      $file_tmp  = $_FILES['file_upload_name']['tmp_name'];
      $file_type = $_FILES['file_upload_name']['type'];
     
      $file_ext  = strtolower(end(explode('.',$file_name)));

      if(in_array($file_ext,array("jpeg","jpg","png")) === false)
      {
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152)
      {
         $errors[]='File size must be less than 2 MB';
      }
      
      if(empty($errors) == true)
      {
         move_uploaded_file($file_tmp,"uploads/".$file_name);
         echo "Success";
      }
      else
      {
         die($errors);
      }
   }
?>
