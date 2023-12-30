<!-- <?php
$today = date("F Y");

$date  =  date("Y-m-d");
?> -->


<?php
//session_start();
include_once("../connection.php");
?>




<?php

if(isset($_POST['submit']))

{

    // print_r($_POST);die();

    $file_name = $_FILES['image']['name'];
    $file_size =$_FILES['image']['size'];
    $file_tmp =$_FILES['image']['tmp_name'];
    $file_type=$_FILES['image']['type'];

    $array = explode('.', $_FILES['image']['name']);
    $file_ext=strtolower(end($array));



    $expensions= array("jpeg","jpg","png","gif");

    if(in_array($file_ext,$expensions)=== false){
        $errors="extension not allowed, please choose a JPEG or PNG or JPG.";
    }

    if($file_size > 12097152){
        $errors='File size must be excately 11 MB';
    }
   $newfilename= str_replace(" ", "", basename($_FILES["image"]["name"]));

    if(empty($errors)==true) {

        move_uploaded_file($file_tmp, "../images/" . $newfilename);

    }



    $name = $_POST['name'];
    $author = $_POST['author'];
    $s_description = $_POST['s_description'];
    $description=$_POST['description'];
   
    

  $sql = mysqli_query($conn, "INSERT INTO blog (name,author,image,s_description,description) VALUES ('$name','$author','$newfilename','$s_description','$description') ");

    if($sql){
        $msg="Blog Added Successfully...";
    }
    else{
        $msg1="Blog  Do not Added...Try Again.";
    }



}



?>



<?php include('links/header.php');?>
<?php include('links/navbar.php');?>

<div>
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Add Blog</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <!-- <li class="breadcrumb-item"><a href="all_category.php">Product Listing</a></li> -->
              <li class="breadcrumb-item active">Add Blog</li>
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
                <h3 class="card-title">Add Blog <a href="all_blog.php" class="btn btn-success pull-right"><i class="fa fa-chevron-circle-right fa-1x"></i> All Blog</a></h3>
                <p style="color: green;"><?php echo $msg; ?></p>
                <p style="color: red;"><?php echo $msg1; ?></p>
              </div>


      <div class="card-body">
      <div class="Data_modal_conts">


<?php
$id=$_GET['id'];
    $sqlqry= mysqli_query($conn,"select * from blog where id='$id' ");
    $tota=mysqli_fetch_assoc($sqlqry);
?>

   
   
                  <form class="col-md-12" action="" method="post" enctype="multipart/form-data">


                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6" >
                                            <div class="form-group col-sm-12">
                                                <label> Enter Heading </label>
                                                <input type="Text" class="form-control" placeholder=""  name="name" >
                                            </div>
                                        </div>

                                        <div class="col-md-6" >
                                            <div class="form-group col-sm-12">
                                                <label> Enter Date </label>
                                                <input type="Text" class="form-control" placeholder=""  name="author" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6" >
                                            <div class="form-group col-sm-12">
                                                <label> Choose Blog Image </label>
                                                <input type="file" class="form-control" placeholder=""  name="image" >
                                            </div>
                                        </div>

                                        <div class="col-md-12" >
                                            <div class="form-group col-sm-12">
                                                <label> Enter Short description </label>
                                                <input type="text" class="form-control" placeholder=""  name="s_description" >
                                            </div>
                                        </div>
                                    </div>
                                </div><br>



           <label><b>Enter  Description </b></label><br>
           <small>Upload Your Content Without Semicolon and apostrophe s</small>              
              <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
        
                <textarea name="description"> </textarea>
                <script>
                        CKEDITOR.replace( 'description' );
                </script>


              <button class="btn btn-success w-100" name="submit">Submit</button>

</form>

               </div>
              </div>

            </div>
          </div>
        </div>
       </div>
      </section>
</div>

<script>
    CKEDITOR.replace( 'editor' );
</script>

<script>
    CKEDITOR.replace( 'editor1' );
</script>


<?php include('links/footer.php');?>
