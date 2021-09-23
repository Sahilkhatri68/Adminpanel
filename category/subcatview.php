<?php
 include("../include/header1.php");

 $conn=mysqli_connect("localhost","root","","admindb");
 $query="SELECT * FROM subcat ORDER BY id asc ";
 $result=mysqli_query($conn,$query);
?>


<div class="content-wrapper" style="min-height: 1602px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View Sub-category</h1>
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
              <table class="table">
                <thead>
                  <tr>
                  <th>Cat-title</th>
                  <!-- <th>Cat-Title</th> -->
                  <th>Sub-title</th>
                    <th>Sub-Description</th>
                    <th>Image</th>
                  </tr>
                </thead>
                <tbody>

                <?php
                $select="SELECT c.id as cat,c.catitle as catitle,s.* FROM category as c JOIN subcat as s on c.id=s.catitle";
                $chekc=mysqli_query($conn,$select);
                while($row=mysqli_fetch_assoc($result))
                {
                ?>

                  <tr>
                    <td><?php echo $row['cattitle']; ?></td>
                    
                      <td><?php echo $row['subtitle'];?></td>
                    <td><?php echo $row['subdescription'];?></td>
                    <td><img src="<?php echo $row['image'] ;?> " width="100px" height="100px";>
                    <td class="text-right py-1 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href= "http://projects.test/adminpanel/backend/category/subcatedit.php?id=<?php echo $row['id'];?>"  class="btn btn-info"><i class="fas fa-edit"></i></a>
                        <a href="http://projects.test/adminpanel/backend/category/subcatdelete.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure you want to delete this data !?')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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