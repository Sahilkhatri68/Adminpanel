<?php
 include '../include/header1.php';

$conn = mysqli_connect("localhost","root","","admindb");



$select="select * from dbprofile";
$query=mysqli_query($conn,$select);
$data=mysqli_fetch_assoc($query); 


?>

<style>
 .error {color: red;}
 
 
 </style>
 
<div class="content-wrapper">
<h1><i>Profile</i></h1>  
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="<?php echo $data['image']; ?>"  alt="User profile picture">
                </div>

                <h3 class="profile-username text-center"><b><?php echo $data['name']; ?></b></h3>
                <hr >
                <h3 class="profile-username text-center"><b><?php echo $data['designation']; ?></b></h3>

            </div>
            </div>
        
            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              
              <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted"><?php echo $data['education']; ?></p>
<hr>
                 <sapn> <b><h7>Location</h7></b></span>   
                <p class="text-muted"><?php echo $data['location']; ?></p>

                <hr>


                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted"><?php echo $data['skills']; ?>
                  <span class="tag tag-danger"></span>
                  
                </p>

                <hr>
                <sapn> <b><h7>Experience</h7></b></span>   
                <p class="text-muted"><?php echo $data['experience']; ?></p>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link" >Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
        
        
              <div class="card-body">
                <div class="tab-content">
                  <div  id="settings">
          
          
						<form class="form-horizontal" method="post" enctype="multipart/form-data"id="myform">
							<div class="form-group row">
								<label for="inputName" class="col-sm-2 col-form-label">Name</label>
								<div class="col-sm-10">
								  <input type="text"  class="form-control" name="name" value="<?php echo $data['name']; ?>"  id="inputName">
								</div>
							</div>
              
              <div class="form-group row">
								<label for="inputName" class="col-sm-2 col-form-label">Designation</label>
								<div class="col-sm-10">
								  <input type="text"  class="form-control"value="<?php echo $data['designation']; ?>" name="designation" id="inputName">
								</div>
							</div>

                              
							<div class="form-group row">
								<label for="inputName" class="col-sm-2 col-form-label">Image</label>
								<div class="col-sm-10">
								  <input type="file" class="form-control" name="image" value="<?php echo $data['image']; ?>" id="inputName">
								</div>
							</div>
							 
							<div class="form-group row">
								<label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
								<div class="col-sm-10">
								  <input type="email" class="form-control"value="<?php echo $data['email']; ?>" name="email" id="inputEmail">
								</div>
							</div>
							
              <div class="form-group row">
								<label for="inputName" class="col-sm-2 col-form-label">Location</label>
								<div class="col-sm-10">
								  <input type="text"  class="form-control"value="<?php echo $data['location']; ?>" name="location" id="inputName">
								</div>
							</div>

            

							<div class="form-group row">
								<label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
								<div class="col-sm-10">
								  <input type="text" class="form-control"value="<?php echo $data['skills']; ?>" name="skills" id="inputSkills">
								</div>
							</div>
							
							<div class="form-group row">
								<label for="inputName" class="col-sm-2 col-form-label">Education</label>
								<div class="col-sm-10">
								  <input type="text" class="form-control" value="<?php echo $data['education']; ?>" name="education" id="inputName" >
								</div>
							  </div>

                <div class="form-group row">
								<label for="inputName" class="col-sm-2 col-form-label">Experience</label>
								<div class="col-sm-10">
								  <input type="text"  class="form-control"value="<?php echo $data['experience']; ?>" name="experience" id="inputName">
	  							</div>
							</div>
						
							<div class="form-group row">
								<div class="offset-sm-2 col-sm-10">
								  <button type="submit" name="update" class="btn btn-danger">update</button>
								</div>
							</div>
						</form>
			</div>
		</div>
	</div>
			 </div>
			 </div>
			</div>
		</div>
	</section>
</div>
<?php
if(isset($_POST['update'])){

  //name   
$name=$_POST['name'];

//designatioin
$designation=$_POST['designation'];

//image
if(!empty($_FILES['image']['name']))
{
  $image=$_FILES['image']['name'];
  $temp_name=$_FILES['image']['tmp_name'];
  $path="../photos/".$image;
  move_uploaded_file($temp_name,$path);
}
    else{
    $path = $data['image'];
    }

   

    //email
    $email=$_POST['email'];

//location
$location=$_POST['location'];

//skills
$skills=$_POST['skills'];

//educatioin
$education=$_POST['education'];

//experince
$experience=$_POST['experience'];

//update query
$update="UPDATE dbprofile SET name='$name', email='$email'  , skills='$skills', education='$education',designation='$designation',experience='$experience', image='$path' ";

$query=mysqli_query($conn,$update);
if($query){
?>
<script>
  window.location.href="http://projects.test/adminpanel/backend/adminpage/profile.php";
  </script>
<?php
}

}

?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
  
 <script>
 var validator = $( "#myform" ).validate({
   rules: {
     title: "required",
     description: "required",
     image: "required"
   },
 });
//validator.form();
 </script>

<?php
include '../include/footer1.php';
?>