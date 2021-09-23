<?php
 include("../include/header1.php");

$conn=mysqli_connect("localhost","root","","admindb");
$query="SELECT * FROM category ORDER BY id asc ";
$result=mysqli_query($conn,$query);

?>
<!DOCTYPE HTML>

<div class="content-wrapper" style="min-height: 1602px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>View category</h1>
          </div>
          </div>
          <!-- /.card -->
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Files</h3>

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
                  <th>Id</th>
                  <th>Cat-Title</th>
                    <th>Description</th>
                    <th>Image</th>
                  </tr>
                </thead>
                <tbody>

                <?php
                while($row=mysqli_fetch_assoc($result))
                {
                ?>

                  <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['cattitle'];?></td>
                    <td><?php echo $row['description'];?></td>
                    <td><img src="<?php echo $row['image'] ;?> " width="100px" height="100px";>
                    <td class="text-right py-1 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href= "http://projects.test/adminpanel/backend/category/catedit.php?id=<?php echo $row['id'];?>"  class="btn btn-info"><i class="fas fa-edit"></i></a>
                        <a href="http://projects.test/adminpanel/backend/category/deletecat.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure you want to delete this data !?')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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