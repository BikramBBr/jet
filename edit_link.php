<?php include_once("../connection.php"); ?>

<?php
    if(isset($_POST['submit'])){
     
       $id=$_POST['id'];
       $content= $_POST['data'];
    
       $sql = mysqli_query($conn, "UPDATE  information SET data='$content' WHERE id='$id' ");
       
        if($sql){
            $msg="Update successfully ";
        }
        else{
            $msg1="Not Updated... Plese Try Again";
        }
    }
?>

<!-- ,title1='$title1',content1='$content1',content3='$content3',title2='$title2',title3='$title3',content4='$content4' -->


<?php include('links/header.php');?>
<?php include('links/navbar.php');?>


<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit Content</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <!-- <li class="breadcrumb-item"><a href="all_category.php">Product Listing</a></li> -->
              <li class="breadcrumb-item active">Edit Content</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


     <section class="content">
           <div class="container-fluid">
           <div class="row">
           <div class="col-12">
           <div class="card">
           <div class="card-header">
            <h3 class="card-title">Edit Content </h3>

            <p style="color: green;"><?php echo $msg; ?></p>
            <p style="color: red;"><?php echo $msg1; ?></p>
            
              </div>
   
             <div class="card-body">
             <div class="Data_modal_conts">

            <form class="form-row" action="" method="post" enctype="multipart/form-data" >

                <?php
                             $id=$_GET['id'];
                $sqlqry= mysqli_query($conn,"select * from information where id='$id' ");
                $tota=mysqli_fetch_assoc($sqlqry);
            ?>

                            
        <input type="hidden" name="id" value="<?php echo $tota['id'] ?>">

                                     
                            <div class="form-group col-md-12 col-sm-12">

                            <h4 style="margin:0px 20px"><?php echo $tota['name']?></h6>

                                <br>

                                <input type="text" class="form-control" name="data" value="<?php echo $tota['data']; ?>">

                            <button class="btn btn-success w-100" name="submit">Update</button>


                            </form>
               </div>
              </div>

            </div>
          </div>
        </div>
       </div>
    </section>


        <!-- /.content -->
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>


    


   <?php include('links/footer.php');?>


