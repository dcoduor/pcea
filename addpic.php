<?php
include('dbcontroller.php');
$size_error="";
$file_exist="";
$not_image="";
$format_error="";
$success="";
$sorry="";
$upload_error="";
$profile_exists="";
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $not_image= "File is not an image.";
        $uploadOk = 0;
        include('profilepic.php');
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    $file_exist="Sorry, file already exists.";
    $uploadOk = 0;
    include('profilepic.php');
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    $size_error="Sorry, your file is too large.";
    $uploadOk = 0;
    include('profilepic.php');
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    $format_error="Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
    include('profilepic.php');
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    $sorry="Sorry, your file was not uploaded.";
    
// if everything is ok, try to upload file
} else {

    $image = $_FILES["fileToUpload"]["name"];
    $uname=$_POST['uname'];

    $sql = "select * from profile_org where user = '".$uname."'";
    $rs = mysqli_query($conn,$sql);
    $numRows = mysqli_num_rows($rs);

    if($numRows != 0){
      $profile_exists="Please remove the existing profile picture before uploading a new one :)";
      include('profilepic.php');
    }else{

        $sql = "INSERT INTO profile_org (image, user) VALUES ('$image', '$uname')";
         mysqli_query($conn, $sql);

        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $success="Your picture has been uploaded.";
            include('profilepic.php');
        } else {
            $upload_error="Sorry, there was an error uploading your file.";
            include('profilepic.php');
        }
    }
}
?>