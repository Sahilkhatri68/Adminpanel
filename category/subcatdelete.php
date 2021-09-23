<?php
$conn=mysqli_connect("localhost","root","","admindb");

$id=$_GET['id'];
$query="DELETE  FROM subcat WHERE id='$id' ";
$check=mysqli_query($conn,$query);
if($check)
{
    header('location: subcatview.php');
}
else{
    echo"problem in deletion ";
}
?>