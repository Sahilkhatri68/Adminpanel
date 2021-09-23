<?php
 include("../include/header1.php");

$conn=mysqli_connect("localhost","root","","admindb");


if(isset($_POST['submit'])){
	$cattitle=$_POST['cattitle'];
$subtitle=$_POST['subtitle'];
$subdescription=$_POST['subdescription'];
$image=$_FILES['image']['name'];
$tmp_name=$_FILES['image']['tmp_name'];
$path="../photos".$image;

move_uploaded_file($tmp_name,$path);

$insert="INSERT INTO subcat(cattitle,subtitle,subdescription,image) values('$cattitle','$subtitle','$subdescription','$path')";
$check=mysqli_query($conn,$insert);

if($check){
	?>
	<script>
		window.location.href="http://projects.test/adminpanel/backend/category/subcatview.php"; 
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
              <h3 class="card-title"> Add  Sub-category </h3>

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
									<label for="icattitle" class="col-sm-2 col-form-label">Cat Title </label>
									<div class="col-sm-10">
									<select name="cattitle" >
										
								<option>Select Cat Title</option>
								
								
								
								
								
							<?php
									$qry="SELECT * FROM category";

									$var=mysqli_query($conn,$qry);
									
									while($fetch=mysqli_fetch_assoc($var))
									
								{
								?>
								<option value="<?php echo $fetch['cattitle'] ; ?>"> <?php echo $fetch['cattitle'] ;  ?></option> 
								<?php
								
									
							} 
								?>	
								</select>
									
								</div>
								</div>		
						<div class="form-group row">
									<label for="inputName" class="col-sm-2 col-form-label">Sub-Cat Title </label>
									<div class="col-sm-10">
									  <input type="text"  class="form-control" name="subtitle" id="inputName">
									</div>
								</div>
							  
								<div class="form-group row">
									<label for="inputName" class="col-sm-2 col-form-label" style="width:100px">Sub-Cat Description </label>
									<div class="col-sm-10">
									  <input type="text"  class="form-control" name="subdescription" id="inputName">
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