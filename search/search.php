<body>

<form action="" method="post">

  <input name="search" type="search" autofocus><input type="submit" name="button">

</form>

<table>
  <tr><td><b>First Name</td><td></td><td><b>Last Name</td></tr>

<?php

include('config.php');


if(isset($_POST['button'])){    //trigger button click

    $search=$_POST['search'];

    $sql= "select * from church_members where names like '%{$search}%' || id like '%{$search}%' ";
    $query = mysqli_query($conn, $sql);

if (mysqli_num_rows($query) > 0) {
    while ($row = mysqli_fetch_array($query)) {
        echo "<tr><td>".$row['names']."</td><td></td><td>".$row['id']."</td></tr>";
  }
}else{
        echo "No members Found<br><br>";
  }

}else{                          //while not in use of search  returns all the values
    $selectmemmbers = "select * from church_members";
    $query=mysqli_query($conn, $selectmemmbers);

    while ($row = mysqli_fetch_array($query)) {
        echo "<tr>
                    <td>".$row['names']."</td>
                    <td>".$row['id']."</td>
             </tr>";
  }
}

    mysqli_close($conn);
?>