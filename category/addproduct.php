<?php
	include '../include/header1.php';

?>
<?php

$conn = mysqli_connect('localhost','root','','admindb');
// include '../includes/header.php';
/// its for category///////////////////

$sel="select * from category";
$que=mysqli_query($conn,$sel);
/////// its for sub cat//////////////////////////


$select="SELECT * from subcat";
$query=mysqli_query($conn,$select);
/////////////////insert data ////////////////////////


if(isset($_POST['submit'])){ 
   $cattitle=$_POST['cattitle'];
    $subtitle=$_POST['subtitle'];
	$protitle=$_POST['protitle'];
    $prodescription=$_POST['prodescription'];
	$actualprice=$_POST['actualprice'];
	$discount=$_POST['discount'];
	$sellprice=$_POST['sellprice'];
	
	$proimage=$_FILES['proimage']['name'];
	$temp_name=$_FILES['proimage']['tmp_name'];
    $path="../photos/".$proimage;
	move_uploaded_file($temp_name,$path);
	
	
	$insert="INSERT  INTO  product(cattitle,subtitle,protitle,prodescription,actualprice,discount,sellprice,proimage)values('$cattitle','$subtitle','$protitle','$prodescription', '$actualprice','$discount','$sellprice','$path')";
  
	$query1=mysqli_query($conn,$insert);
	
	if ($query1){
		?>
		<script>
		 window.location= 'http://projects.test/adminpanel/backend/category/prodview.php';	
		
		</script>
		<?php 
     echo "data inserted";

	}
	else{
		echo "your data is not inserted ";
 }
 	} 
?>



 <!-- Google Font: Source Sans Pro -->
 
 <style>
 .error {color: red;}
  
 </style>

<!-- Main content -->
 <div class="content-wrapper">
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary" >
            <div class="card-header">
              <h3 class="card-title" >Add product </h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
			
            <div class="card-body"> 
			<form method="post" enctype="multipart/form-data" id="proform" style="width:100%;">
			
			<div class="form-group">
                <label for="inputStatus">cat-Title</label>
                <select id="inputStatus" name="cattitle" id="category" class="form-control custom-select">
                  <option>Select category</option>
				  
				  
				  
				 <?php while($fet=mysqli_fetch_assoc($que)){
					
					 ?>
                   
   				  <option value="<?php echo $fet['id']; ?>"><?php echo $fet['cattitle']; ?></option>
				 
				 <?php }?>
                  
                </select>
              </div>
			  
			
			
			<div class="form-group">
                <label for="inputStatus">Sub Category Title</label>
                <select id="inputStatus" name="subtitle"  class="form-control custom-select">
                  <option>Select Sub category</option>
		
				 <?php while($fetch=mysqli_fetch_assoc($query)){
					
					 ?>
                   
   				  <option value="<?php echo $fetch['id']; ?>"><?php echo $fetch['subtitle']; ?></option>
				 
				 <?php }?>
                  
                </select>
              </div>
			 
              <div class="form-group">
                <label for="inputName">Product Title</label>
                <input type="text" id="inputName" name="protitle" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputDescription">Product description</label>
                <textarea id="inputDescription"name="prodescription" class="form-control" rows="2"></textarea>
              </div>
			 <div class="form-group">
                <label for="inputName">Actual price</label>
                <input type="number" id="price" name="actualprice" class="form-control">
              </div>
			  
			   <div class="form-group">
                <label for="inputName">Descount</label>
                <input type="number" id="discount" name="discount" class="form-control" onkeyup="getPrice()">
              </div>
			  
			   <div class="form-group">
                <label for="inputName">Sell price</label>
                <input readonly id="total" name="sellprice" class="form-control">
              </div>
			 <script>
        getPrice = function() {
            var numVal1 = Number(document.getElementById("price").value);
            var numVal2 = Number(document.getElementById("discount").value) 
            var discount= (numVal1*numVal2)/100;

            var totalValue = numVal1-discount;
            document.getElementById("total").value = totalValue.toFixed(2);
        }
    </script>
             
              <div class="form-group">
                <label for="inputProjectLeader">Project Image</label>
                <input type="file" id="inputProjectLeader"name="proimage" class="form-control">
              </div>
			  <div class="card-footer">
			<button type="submit" class="btn btn-primary" name="submit">submit</button>
			</div></form>
				</div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
 </section>
 </div>
 
 
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>-->

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
<script>
$("#category").change(function()
{
	var id = $("#category").val();
        $.ajax({
            url:"subcatdropdown.php",    
            type: "POST",    
            data: {catid:id},
            success:function(data){
                $("#subcat").replaceWith(data);
            },
        });
    });
</script>

 <script>
  var validator=$ ("#proform").validate({
	rules:{
  protitle:"required",
  prodescription:"required",
   proimage:"required",
  actualprice:"required",
   discount:"required",
	},
  });
 </script>
 
 <?php
include '../include/footer1.php';
?>