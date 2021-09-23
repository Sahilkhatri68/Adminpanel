<?php
 include("../include/header1.php");
$id=$_GET['id'];
$conn=mysqli_connect("localhost","root","","admindb");
$query="SELECT * FROM subcat WHERE id='$id'";
$check=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($check);






?>

<!DOCTYPE html>
<head>

<style>
    .main{
        width: 100%;
    }
    </style>
</head>		

			
			<!-- Main content -->
            <div class="main">
 <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col" >
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Update Sub-category </h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
			<div class="card-body">
				<div class="tab-content">
					<div  id="settings">
						<form class="form-horizontal" method="POST" enctype="multipart/form-data"id="myform">
								<div class="form-group row">
									<label for="inputName" class="col-sm-2 col-form-label"> Title </label>
									<div class="col-sm-10">
									  <input type="text"  class="form-control" name="cattitle" value="<?php echo $row['cattitle']; ?>" id="inputName">
									</div>
								</div>
							  
								<div class="form-group row">
									<label for="inputName" class="col-sm-2 col-form-label" style="width:100px"> Sub-Description </label>
									<div class="col-sm-10">
									  <input type="text"  class="form-control" name="subdescription"  value="<?php echo $row['subdescription']; ?>"id="inputName">
									</div>
								</div>
								  
								<div class="form-group row">
									<label for="inputName" class="col-sm-2 col-form-label"> Image </label>
									<div class="col-sm-10">
                                <img src="<?php echo $row['image']; ?>"><br><br><br>
                                <input type="file" name="image" value="<?php echo $row['image']; ?>">
									</div>
								  </div>
								 </br>
								<div class="form-group row">
									<div class="offset-sm-2 col-sm-10">
									  <button type="submit" name="update" class="btn btn-primary"> Update</button>
									</div>
								</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	</section>
</div>		
			
		
 
 <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

 <script>
 var validator = $( "#catform" ).validate({
rules: {
subtittle: "required",
subdescription: "required",
subimage: "required"
},
 });
//validator.form();
 </script>



<?php
if(isset($_POST['update'])){
    $cattitle=$_POST['cattitle'];
    $subdescription=$_POST['subdescription'];
    if(!empty($_FILES['image']['name'])){;
        $image=$_FILES['image']['name'];
        $tmp_img=$_FILES['image']['tmp_name'];             
        $path="../photos/".$image;   
        move_uploaded_file($tmp_img,$path);
    
    }      
    else{
        $path=$row['image'];
    }   
    $update="UPDATE subcat SET cattitle='$cattitle', subdescription='$subdescription', image='$path' WHERE id='$id'";
    
    $updated=mysqli_query($conn,$update);
    if($updated){
        ?>
<script>
    window.location.href="http://projects.test/adminpanel/backend/category/subcatview.php";
    </script>    
    <?php
}
    else{
        echo"Error in updating";
    }
}

include("../include/footer1.php");

?>





















