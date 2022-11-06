<?php

function subirImagen( $fileToUpload) {
    $target_dir = "assets/imgs/uploads/";
    $target_file = $target_dir . basename($fileToUpload["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($fileToUpload["tmp_name"]); 
      if($check !== false) {
        $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        $uploadOk = 0;
      }
    }
    
    // Check if file already exists
    if (file_exists($target_file)) {
      $uploadOk = 0;
    }
    
    // Check file size
    if ($fileToUpload["size"] > 500000) {
      $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" && $imageFileType != "jfif" ) {
      $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($fileToUpload["tmp_name"], $target_file)) {
        htmlspecialchars( basename( $fileToUpload["name"])). " has been uploaded.";
      } else {
      }
    }
    return $target_file;
}