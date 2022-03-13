<?php
    include('dbcontroller.php');

    $groupOne = $_POST["first_group"];
    $groupTwo = $_POST["second_group"];
    $groupThree = $_POST["third_group"]; 
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $tokken = $_POST["mykey"]; 
    $id = $_POST["ID"];

    $sql = "INSERT INTO church_group_org (user, group_one, group_two, group_three)
    VALUES ('".$id."', '".$groupOne."', '".$groupTwo."', '".$groupThree."');";
    $sql .= "INSERT INTO credited_org (x_id, email, phone_number, tokken)
    VALUES ('".$id."', '".$email."', '".$phone."', '".$tokken."');";
    
    if ($conn->multi_query($sql) === TRUE) {
        echo "New records created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
?>