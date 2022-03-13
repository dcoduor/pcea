<?php
include('dbcontroller.php');
$exit_success='';
$exit_error='';

$sql = "DELETE FROM dependants_org WHERE id='".$_GET['id']."'";

if (mysqli_query($conn, $sql)) {
    $exit_success="you have exited the group";
    include('dependants.php');
} else {
    $exit_error= "Error deleting record: " . mysqli_error($conn);
    include('dependants.php');
}

mysqli_close($conn);
?>