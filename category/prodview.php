<?php
 include("../include/header1.php");

 $conn=mysqli_connect("localhost","root","","admindb");
 //$query="SELECT FROM product ORDER BY id asc ";
//  $result=mysqli_query($conn,$query);
?>


<div class="content-wrapper" style="min-height: 1602px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View Product</h1>
          </div>
          </div>
          <!-- /.card -->
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Information:-</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body p-0">
              <table class="table" >
                <thead>
                  <tr>
                  <th>P.ID</th>
                  <th>Cat-title</th>
                  <th>Sub-title</th>
                    <th>prodescription</th>
                    <th>Actual Price</th>
                    <th>Discount</th>
                    <th>Sell Price</th>                    
                    <th>Image</th>
                    </tr>
                </thead>
                <tbody>

                <?php
$select="SELECT category.id as catid,category.cattitle as cattitle,subcat.id as subcatid,subcat.cattitle as subtitle,product.* from product join category on category.id=product.cattitle join subcat on subcat.id=product.subtitle
";
                $chekc=mysqli_query($conn,$select);
                while($row=mysqli_fetch_assoc($chekc))
                {
                ?>

                  <tr>
                    
                  <td><?php echo $row['id'];?></td>

                    <td><?php echo $row['cattitle']; ?></td>
                    <td><?php echo $row['subtitle'];?></td>
                    <td><?php echo $row['prodescription'];?></td>
                    <td><?php echo $row['actualprice']; ?></td>
                    <td><?php echo $row['discount']; ?></td>
                    <td><?php echo $row['sellprice']; ?></td>

                    <td><img src="<?php echo $row['proimage'] ;?> " width="100px" height="100px";>
                    <td class="text-right py-1 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href= "http://projects.test/adminpanel/backend/category/prodedit.php?id=<?php echo $row['id'];?>"  class="btn btn-info"><i class="fas fa-edit"></i></a>
                        <a href="http://projects.test/adminpanel/backend/category/proddelete.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure you want to delete this data !?')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                      </div>
                    </td>
                  </tr>
                  <?php
                }
                ?>
                </tr>
     
            </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      
    </section>
    <!-- /.content -->
  </div>
<?php
 include("../include/footer1.php");

?>