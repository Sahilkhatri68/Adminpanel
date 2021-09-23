<?php
$conn=mysqli_connect("localhost","root","","admindb");

$id=$_GET['id'];
$query="DELETE  FROM category WHERE id='$id' ";
$check=mysqli_query($conn,$query);
if($check)
{
    header('location: viewcat.php');
}
else{
    echo"problem in deletion ";
}
?>