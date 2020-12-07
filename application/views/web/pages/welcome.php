<?php require ('framework/menu/sidebar.php'); ?>
    <section class="content-welcome">
        
        <section class="heading-table img" style="background-image: url(assets/images/bg_7.jpg);">
            <div class="container">
                <div class="row justify-content-center mb-3 pb-3">
              <div class="col-md-12 text-center heading-section ftco-animate">
                <h2>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h2>
                 <p>
                    <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
                    <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
                </p>
              </div>
            </div>
            </div>
        </section>
        
    
        <?php $product = 0; $success = "";
        
            ini_set('display_errors',1);
            
            if($type=='product') { ?>
            
            <?php $addedit = 0; $success = "";
            
            ini_set('display_errors',1);
            
            if($id && $type=='del')
            {
                $err = 0;
                $query = "SELECT images FROM products WHERE id = $id";
                if($result = mysqli_query($link, $query))
                {
                    while ($row = mysqli_fetch_row($result))
                    {
                        $images = $row[0];
                        
                        if($images){ if(!unlink('assets/products/'.$images)){ $err = 1; } }
                    }
                    mysqli_free_result($result);
                }
                
                if(!$err)
                {
                    $query = "DELETE FROM products WHERE id = $id";
                    if (mysqli_query($link, $query)) {
                        $success = "<div style='color: green;'>Product deleted successfully</div>";
                    }
                    else
                    {
                        $success = "<div style='color: red;'>Error deleting product</div>";
                    }
                    // mysqli_free_result($link);
                }
                else
                {
                    $success = "<div style='color: red;'>Error deleting product</div>";
                }
            }
            
            else if($type=='add' || $type=='edit')
            {
                if($_POST)
                {
                    $heading = $_POST['heading'];
                    $price = $_POST['price'];
                    $description = $_POST['description'];
                    $images = '';
                    
                    if($id)
                    {   
                        // print_r($_FILES);
                        // uploading file
                        $target_file = './assets/images/test/'.basename($_FILES["images"]["name"]);
                        $uploaded = move_uploaded_file($_FILES["images"]["tmp_name"], $target_file);
                        if ($uploaded){
                            // echo 'image uploaded';
                            $images = $_FILES["images"]["name"];
                        }else{
                            // echo 'not uploaded';
                        }
                      // exit;
                        // updating table record
                        $query = "UPDATE products SET heading='$heading', price='$price', description='$description', images='$images' WHERE id = $id";
                        if (mysqli_query($link, $query)) {
                            $success = "<div style='color: green;'>Product changed successfully</div>";
                        } else {
                            $addedit = 1;
                            $success = "<div style='color: red;'>Error changing product</div>";
                        }
                    }
                    else
                    {
                        $query = "INSERT INTO products (heading, price, description, images) VALUES ('$heading', '$price', '$description', '$images')";
                        if (mysqli_query($link, $query)) {
                            $success = "<div style='color: green;'>Product added successfully</div>";
                        } else {
                            $addedit = 1;
                            $success = "<div style='color: red;'>Error adding product</div>";
                        }
                    }
                    // mysqli_free_result($link);
                }
                else
                {
                    $addedit = 1;
                    
                    if($id)
                    {
                        $query = "SELECT heading, price, description, images FROM products WHERE id = $id";
                        if($result = mysqli_query($link, $query))
                        {
                            while ($row = mysqli_fetch_row($result))
                            {
                                $heading = $row[0];
                                $price = $row[1];
                                $description = $row[2];
                                $images = $row[3];
                            }
                            mysqli_free_result($result);
                        }
                    }
                }
                
                if($addedit){ ?> 
                
                    <?php if($success) echo "<div style=' width: 100%; text-align: center;'>$success</div>"; ?>
                    
                    <form action="welcome.php?id=<?=$id?>&type=<?=$type?>" method="post" enctype="multipart/form-data">
                        <center><table style="width: 500px;margin: 5%;">
                            <tr><td>HEADING</td><td><input type="text" class="save-field" name="heading" value="<?=$heading?>" /></td></tr>
                            <tr><td>PRICE</td><td><input type="text" class="save-field" name="price" value="<?=$price?>" /></td></tr>
                            <tr><td valign='top'>DESCRIPTION</td><td><textarea name="description" class="save-field" cols="25" rows="5"><?=$description?></textarea></td></tr>
                            <tr><td>IMAGE</td><td><input type="file" name="images" /></td></tr>
                            <tr><td>&nbsp;</td><td><input type="submit" class="save-btn" name="submit" value="SAVE" /></td></tr>
                        </table></center>
                    </form>
                    <?php
                }
            }
            
            if(!$addedit){ ?>
            
                <script type="text/javascript">
                    function confirmProduct(title, prod)
                    {
                        var agree=confirm("Are you sure you want to delete " + title + "?");
                        if (agree){
                            window.location.replace('welcome.php?id=' + prod + '&type=del');
                        }else{
                    	   return false ;
                        }
                    }
                </script>
                
                <?php if($success) echo "<div style='width: 100%; text-align: center;'>$success</div>"; ?>
                
                <section style="text-align: center; margin: 0 auto">
                    <a class="edit-btn" href="welcome.php?type=add">ADD PRODUCT</a>
                </section>
                
                <center><h1 class="prod-header">PRODUCT LIST</h1><table style="width: 80%">
                    <?php
                        $query = "SELECT id, heading, price, description, images FROM products";
                        if($result = mysqli_query($link, $query))
                        {
                            while ($row = mysqli_fetch_row($result))
                            {
                                $id = $row[0];
                                $heading = $row[1];
                                $price = $row[2];
                                $description = $row[3];
                                $images = $row[4];
                           
                                echo '<tr class="product-details welcome"><td class="prod-left"><img src="./assets/images/test/'.$images.'" width="80%"></td>
                                <td style="text-align: left; padding: 3% 0;">
                                <h3>'.$heading.'<br /></h3>
                                <p class="price"><span>'.$price.'<br /></span></p>
                                <p>'.$description.'<br /></p>
                                <a class="edit-btn" href="welcome.php?id='.$id.'&type=edit">EDIT</a> |   <span style="cursor: pointer;" onclick="return confirmProduct(\''.$heading.'\', \''.$id.'\');">DELETE</span>
                                </td></tr>';
                                
                                $id = $heading = $price = $description = $images = "";
                            }
                            mysqli_free_result($result);
                        }
                    ?>
                
                </table></center>
                
                
            <?php } ?>
        <?php } ?>
        
        
    
        <?php $voucher = 0; $success = "";
        
            ini_set('display_errors',1);
            
            if($type=='voucher') { ?>
            
                
            <center><h1 class="voucher-header">VOUCHER LIST</h1><table style="width: 80%">
                <?php
                    $query = "SELECT id, client, value, number, email, num FROM voucher";
                    if($result = mysqli_query($link, $query))
                    {
                        while ($row = mysqli_fetch_row($result))
                        {
                            $id = $row[0];
                            $client = $row[1];
                            $value = $row[2];
                            $number = $row[3];
                            $email = $row[4];
                            $num = $row[5];
                            
                            echo '<tr class="voucher-details voucher-welcome">
                                <td style="text-align: center; padding: 2% 0;">
                                    <h3>ID</h3>
                                </td>
                                <td style="text-align: center; padding: 2% 0;">
                                    <h3>CLIENT NAME</h3>
                                </td>
                                <td style="text-align: center; padding: 2% 0;">
                                    <h3>VOUCHER VALUE</h3>
                                </td>
                                <td style="text-align: center; padding: 2% 0;">
                                    <h3>CLIENT NUMBER</h3>
                                </td>
                                <td style="text-align: center; padding: 2% 0;">
                                    <h3>BUYER EMAIL</h3>
                                </td>
                                <td style="text-align: center; padding: 2% 0;">
                                    <h3>BUYER NUMBER</h3>
                                </td>
                                
                            </tr>';
                            echo '<tr class="voucher-details voucher-welcome">
                                <td style="text-align: center; padding: 2% 0;">
                                    <p>'.$id.'</p>
                                </td>
                                <td style="text-align: center; padding: 2% 0;">
                                    <p>'.$client.'</p>
                                </td>
                                <td style="text-align: center; padding: 2% 0;">
                                    <p>'.$value.'</p>
                                </td>
                                <td style="text-align: center; padding: 2% 0;">
                                    <p>'.$number.'</p>
                                </td>
                                <td style="text-align: center; padding: 2% 0;">
                                    <p>'.$email.'</p>
                                </td>
                                <td style="text-align: center; padding: 2% 0;">
                                    <p>'.$num.'</p>
                                </td>
                                
                            </tr>';
                            
                            $id = $client = $value = $number = $email = $dnum = "";
                        }
                        mysqli_free_result($result);
                    }
                ?>
                
            </table></center>
            
            
            
        <?php } ?>
        
    
    <footer class="db-footer">
        <p>
          Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Designed and Developed by <a href="#" target="_blank">JNZ GROUP PTY LTD</a>
        </p>
    </footer>
    
    </section>
   
      



      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/jquery-migrate-3.0.1.min.js"></script>
      <script src="assets/js/popper.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
      <script src="assets/js/jquery.easing.1.3.js"></script>
      <script src="assets/js/jquery.waypoints.min.js"></script>
      <script src="assets/js/jquery.stellar.min.js"></script>
      <script src="assets/js/owl.carousel.min.js"></script>
      <script src="assets/js/jquery.magnific-popup.min.js"></script>
      <script src="assets/js/aos.js"></script>
      <script src="assets/js/jquery.animateNumber.min.js"></script>
      <script src="assets/js/scrollax.min.js"></script>
      <script src="assets/js/main.js"></script>
         <script>
       $(document).ready(function () {
        
        $("#close-sidebar").click(function() {
          $(".page-wrapper").removeClass("toggled");
        });
        $("#show-sidebar").click(function() {
          $(".page-wrapper").addClass("toggled");
        });
       });
      </script>
    
</body>
</html>