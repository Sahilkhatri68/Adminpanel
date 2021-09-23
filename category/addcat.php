<?php
include("../include/header1.php");

$conn=mysqli_connect("localhost","root","","admindb");
if(isset($_POST['submit'])){
$cattitle=$_POST['cattitle'];
$description=$_POST['description'];
$image=$_FILES['image']['name'];
$tmp_name=$_FILES['image']['tmp_name'];
$path="../photos/".$image;
move_uploaded_file($tmp_name,$path);

$insert="INSERT INTO category(cattitle,description,image) values('$cattitle','$description','$path')";
$check=mysqli_query($conn,$insert);
if($check){?>
<script>
    window.location.href="http://projects.test/adminpanel/backend/category/viewcat.php";
    </script>
    <?php
}
else{
    echo"error,error,error,error,error,error,error,error,error,error,error,error";
}
}


?>
<!DOCTYPE html>
<head>
 <!-- Google Font: Source Sans Pro -->
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo assets ;?>plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo assets ;?>dist/css/adminlte.min.css">
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
              <h3 class="card-title"> Add category </h3>

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
									  <input type="text"  class="form-control" name="cattitle" id="inputName">
									</div>
								</div>
							  
								<div class="form-group row">
									<label for="inputName" class="col-sm-2 col-form-label" style="width:100px"> Description </label>
									<div class="col-sm-10">
									  <input type="text"  class="form-control" name="description" id="inputName">
									</div>
								</div>
								  
								<div class="form-group row">
									<label for="inputName" class="col-sm-2 col-form-label"> Image </label>
									<div class="col-sm-10">
									  <input type="file" class="form-control"name="image" id="inputName">
									</div>
								  </div>
								 </br>
								<div class="form-group row">
									<div class="offset-sm-2 col-sm-10">
									  <button type="submit" name="submit" class="btn btn-primary"> submit</button>
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
include("../include/footer1.php");
?>