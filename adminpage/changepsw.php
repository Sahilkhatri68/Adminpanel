<?php
include '../include/header1.php';
$conn=mysqli_connect("localhost","root","","admindb");

$sql="SELECT * FROM adlogin";
$result=mysqli_query($conn,$sql);
$data=mysqli_fetch_assoc($result);

if(isset($_POST['submit'])){
    $oldpassword=$_POST['oldpassword'];
    $newpassword=$_POST['newpassword'];
    $confirnmpassword=$_POST['confirmpassword'];

    if($oldpassword==$data['password']){
        if($newpassword==$confirnmpassword){
            $update="UPDATE adlogin SET password='$confirnmpassword' ";
            $check=mysqli_query($conn,$update);
            if($check){
            echo"<br><h4><b>Successfully Change Password !</h4><b> ";
            }

        }else{
            echo"<br><h4><b>Confirm password not match</h4><b>";
        }
    }
    else{
        echo"<br><h4><b>Old password does not match</h4><b>";
    }
}



?>

  <div class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="http://projects.test/adminpanel/backend/index.php"><b>Admin</b>LTE</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>

      <form  method="post">
      <div class="input-group mb-3">
          <input type=" password" class="form-control" name="oldpassword" placeholder="oldPassword">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>  
      <div class="input-group mb-3">
          <input type="password" class="form-control"  name="newpassword" placeholder="newPassword">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit"  name="submit" class="btn btn-primary btn-block">Change password</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="mt-3 mb-1">
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
</div>


<?php
include('../include/footer1.php');
?>