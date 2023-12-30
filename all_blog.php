
<?php include_once("../connection.php"); ?>

<?php
if(isset($_GET['deleteid']))
{
  $id=$_GET['deleteid']; 
    $sql="DELETE FROM blog WHERE id=$id";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
     header('location:all_blog.php');
    }
    else{
      die(mysqli_error($conn));
    }
}
?>

<?php include('links/header.php');?>
<?php include('links/navbar.php');?>

  <!-- DataTables -->
  <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">



    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">All Blogs</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">All Blogs</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->



    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All Blog <a href="add_blog.php"  class="btn btn-success pull-right"><i class="fa fa-plus-circle"></i> Add</a></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover">
                  <thead class="custom_header">
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Author</th>
                    <th>Date</th>
                    <th>Image</th>
                    <!--<th> Description</th>-->
                    
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                     $sql= mysqli_query($conn,"select * from  blog");

                     while($total=mysqli_fetch_assoc($sql))
                                    {

                                        ?>
                  <tr>
                    <td><?php echo $total['id'];?></td>
                    <td><?php echo $total['name'];?></td>
                    <td><?php echo $total['author'];?></td>
                    <td><?php echo $total['publish'];?></td>
                    <td><img src="../images/<?php echo $total['image'];?>"
                                height="100" width="175"></td>

                    <!--<td><?php echo $total['description'];?></td>-->
                  


                    
                    <td class="text-center">


                    <a href="edit_blog.php?id=<?php echo $total['id'];?>" class="btn btn-warning del-btn"><i class="fa fa-solid fa-pen fa-1x">&nbsp;Edit</i></a>

                    <a href="all_blog.php?deleteid=<?php echo $total['id'];?>" class="btn btn-danger del-btn mt-2"><i class="fa fa-trash fa-1x">&nbsp;Remove</i></a>

                    </td>
                  </tr>
                  
              <?php }?>

                
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- The Add Product Modal -->
    <!-- <div class="modal" id="AddModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Add Product</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
             <div class="Data_modal_conts">
                 <form>
                     <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" class="form-control" name="">
                     </div>
                     <div class="form-group">
                        <label>Product Quantity</label>
                        <input type="text" class="form-control" name="">
                     </div>
                     <div class="form-group">
                        <label>Product Price</label>
                        <input type="text" class="form-control" name="">
                     </div>
                     <button class="btn btn-success w-100">Submit</button>
                 </form>
             </div>
          </div>
        </div>
      </div>
    </div>
 -->
    <!-- The Edit Product Modal -->
  <!--   <div class="modal" id="EditModal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit Product</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
             <div class="Data_modal_conts">
                 <form>
                     <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" class="form-control" name="">
                     </div>
                     <div class="form-group">
                        <label>Product Quantity</label>
                        <input type="text" class="form-control" name="">
                     </div>
                     <div class="form-group">
                        <label>Product Price</label>
                        <input type="text" class="form-control" name="">
                     </div>
                     <button class="btn btn-primary w-100">Submit</button>
                 </form>
             </div>
          </div>
        </div>
      </div>
    </div> -->


<?php include('links/footer.php');?>

<!-- DataTables  & Plugins -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="assets/plugins/jszip/jszip.min.js"></script>
<script src="assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>