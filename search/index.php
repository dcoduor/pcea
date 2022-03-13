<body>

<form action="" method="post">

  <input name="search" type="search" autofocus><input type="submit" name="button">

</form>

<table>
  <tr><td><b>First Name</td><td></td><td><b>Last Name</td></tr>

<?php

$con=mysql_connect('localhost', 'root', '');
$db=mysql_select_db('church_org');


if(isset($_POST['button'])){    //trigger button click

  $search=$_POST['search'];

  $query=mysql_query("select * from church_members where names like '%{$search}%' || id like '%{$search}%' ");

if (mysql_num_rows($query) > 0) {
  while ($row = mysql_fetch_array($query)) {
    echo "<tr><td>".$row['names']."</td><td></td><td>".$row['id']."</td></tr>";
  }
}else{
    echo "No members Found<br><br>";
  }

}else{                          //while not in use of search  returns all the values
  $query=mysql_query("select * from church_members");

  while ($row = mysql_fetch_array($query)) {
    echo "<tr><td>".$row['names']."</td><td></td><td>".$row['id']."</td></tr>";
  }
}

mysql_close();
?>