
<?php include_once("../connection.php"); ?>

<?php 

if(isset($_POST['submit'])){


    $file_name = $_FILES['data']['name'];
    $file_size =$_FILES['data']['size'];
    $file_tmp =$_FILES['data']['tmp_name'];
    $file_type=$_FILES['data']['type'];


    $array = explode('.', $_FILES['data']['name']);
    $file_ext=strtolower(end($array));


    $expensions= array("jpeg","jpg","png","gif","pdf");

    if(in_array($file_ext,$expensions)=== false){
        $errors="extension not allowed, please choose a JPEG or PNG or JPG.";
    }

    if($file_size > 12097152){
        $errors='File size must be excately 11 MB';
    }
    if(empty($errors)==true) {

        move_uploaded_file($file_tmp, "../images/" . $file_name);



    }
//$name=$_POST['name'];
    $sql = mysqli_query($conn, "UPDATE  information SET data='$file_name' WHERE id='".$_GET['id']."' ");


    if($sql){
       $msg="Logo Update successfully ";
    }
    else{
        $msg1="Logo Not Updated... Plese Try Again";
    }

}



?>



<?php include('links/header.php');?>
<?php include('links/navbar.php');?>

<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Image</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <!-- <li class="breadcrumb-item"><a href="all_category.php">Product Listing</a></li> -->
              <li class="breadcrumb-item active">Add Image</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

      <!-- Main content -->
           <section class="content">
           <div class="container-fluid">
           <div class="row">
           <div class="col-12">
           <div class="card">
           <div class="card-header">
            <h3 class="card-title">Add Image </h3>
              </div>



            <div class="card-body">
             <div class="Data_modal_conts">

            <form class="form-row" action="" method="post" enctype="multipart/form-data" >
                                <?php
                                $sqlqry= mysqli_query($conn,"select * from  information where id='".$_GET['id']."' ");
                                $tota=mysqli_fetch_assoc($sqlqry);
                                ?>


                            <div class="form-group col-md-12 col-sm-12">

                                 <!-- <label>Edit Logo</label> -->
                           
                             <img src="../images/<?php echo $tota['data']; ?>" style="height:150px;color:black;background-color: gray;">

                             
                            <input type="file" class="form-control" name="data">
                            </div>
                        
                            <button class="btn btn-success w-100" name="submit">Submit</button>


                            </form>

               </div>
              </div>

            </div>
          </div>
        </div>
       </div>
    </section>



<?php include('links/footer.php');?>


