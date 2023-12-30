<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Importent</title>
</head>
<body>



<?php echo substr($result1['content'],0,100); ?>




					<!--select -->
					<div class="form-group col-md-3 col-sm-6">
                            <label>Best Seller</label>
                          <select class="form-control" name="best" required>
                         <option novalue />Choose option
    
                                  <option value="yes" <?php if($total['best']=='yes'){ echo"selected"; }?>/>Yes 
                                  <option value="no" <?php if($total['best']=='no'){ echo"selected"; }?>/>No
                           </select>
                        </div>	

<!-- htacsses
# RewriteEngine On

# RewriteBase /

# RewriteRule ^()$ index.php [NC,L]

# Rewritecond %{REQUEST_URI} !(^/?.\..$) [NC]

# # RewriteRule (.*)$ $1.php [NC]

# RewriteEngine On
# RewriteCond %{REQUEST_FILENAME} !-f
# RewriteRule ^([^/]+)/$ $1.php
# RewriteRule ^([^/]+)/([^/]+)/$ /$1/$2.php


# Options +MultiViews
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^([^\.]+)$ $1.php [NC,L]  -->




<!-- Product -->
<?php 
$pid="PRODUCT".rand(0000,9999);
    $name=$_POST['name'];
    $cat=$_POST['cat'];
    $sub_cat=$_POST['sub_cat'];
    
    $price=$_POST['price'];
    $s_price=$_POST['s_price'];
    $description=$_POST['description'];
    $a_description=$_POST['a_description'];
    
    $stock=implode(',', $_POST['stock']);
    $size=implode(',', $_POST['size']);
    $coating=implode(',', $_POST['coating']);
    $quantity=implode(',', $_POST['quantity']);
?>





<!-- loop -->

	<option value="<?=$cat['id']?>"
          <?php if($cat['id']==$total['cat_id']){ echo"selected"; }?>><?=$cat['category_name']?> 
    </option>


		

<!-- session -->

		<?php
		    if(empty($_SESSION['admin'])){
		    
		    
		    ?>
		            <script>
		                window.location.href='index.php';
		            </script>
		    <?php
		    
		}
		?>




 
<!-- ajax from submit -->

 <script>
    function sub() {
  var member= document.getElementById("member").value;
  var name= document.getElementById("name").value;
  var mobile= document.getElementById("mobile").value;
  var email= document.getElementById("email").value;
  var checkin= document.getElementById("checkin").value;
  var checkout= document.getElementById("checkout").value;
  var adults= document.getElementById("adults").value;
  var kids= document.getElementById("kids").value;
  
  
  
  $.ajax({
                    type:'POST',
                    url:'book.php',

                    data:{memberid:member,name:name,mobile:mobile,email:email,checkin:checkin,checkout:checkout,adults:adults,kids:kids},
                    success:function(data){

                    //  alert(data);
                       

                    swal("Form Submitted", "", "success");
                    // $('#thisdiv').load(document.URL + ' #thisdiv');
                    },
                    error:function(res)
                    {
                        alert("error");
                    }

                });
  
  
  
}
</script>
<?php include('connection.php'); ?>

<?php 
  $memberid = $_POST['memberid'];
  $name = $_POST['name'];
  $mobile = $_POST['mobile'];
  $email = $_POST['email'];
  $checkin = $_POST['checkin'];
  $checkout = $_POST['checkout'];
  $numper = $_POST['adults'];
  $numkid = $_POST['kids'];
  
//   $sql="INSERT INTO book (memberid,name,mobile,email,checkin,checkout,numper,numkid) VALUES ('$memberid','$name','$mobile','$email','$checkin','$checkout','$numper','$numkid') ";
  
//   print_r($sql);die();
  
  
   $sql = mysqli_query($conn, "INSERT INTO book (memberid,name,mobile,email,checkin,checkout,numper,numkid) VALUES ('$memberid','$name','$mobile','$email','$checkin','$checkout','$numper','$numkid') ");


?>






<!-- Login -->
<?php

// session_start();

if(isset($_POST['login']))
{

    $email=$_POST['email'];

    $password=$_POST['password'];

    $find_query = mysqli_query($conn,"SELECT * FROM customer WHERE email = '".$email."' && password = '$password'  ");

    // $sql="SELECT * FROM admin WHERE email = '".$email."' && password = '$password'  ";

    // print_r($sql);die();

    $find_query_data = mysqli_fetch_assoc($find_query);

  // print_r( $find_query_data );die();


    if($find_query_data){ 

            $_SESSION['userdata'] = $find_query_data;

        echo '<script>window.location.assign("index.php");</script>';

    }
    else{
            echo '<script>alert("Invalid Email/password")</script>';
        

    }

}
?>

</body>
</html>