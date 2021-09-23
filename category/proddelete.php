<?php
$conn=mysqli_connect("localhost","root","","admindb");

$id=$_GET['id'];
$query="DELETE  FROM product WHERE id='$id' ";
$check=mysqli_query($conn,$query);
if($check)
{
    header('location: http://projects.test/adminpanel/backend/category/prodview.php');
}
else{
    echo"problem in deletion ";
}
?>