<?php
function upload(){
    $target_dir = "uploads/";
    $randomchar = md5(random_int(111,999999));

    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $imgname = $target_dir . $randomchar . "-" . basename($_FILES["image"]["name"]);

// Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            // echo "1";
            return false;
            $uploadOk = 0;
        }
    }

    if (file_exists($target_file)) {
        // echo "2";
        return false;
        $uploadOk = 0;
    }

// Check file size
    if ($_FILES["image"]["size"] > 500000) {
        // echo "3";
        return false;
        $uploadOk = 0;
    }

// Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" && $imageFileType != "" ) {
        // echo "4<br>";
        echo $imageFileType . "<br>";
        return false;
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        return false;
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $imgname)) {
            // echo "5";
            // echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
            return $imgname;
  } else {
            // echo "6";
            return false;
        }
    }
}