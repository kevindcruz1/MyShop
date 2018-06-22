<?php
session_start();
include("includes/dp.php");

include('functions/functions.php');




?>

<!DOCTYPE html>

<html>
    
    <head><title>My Shop-Online Shopping Store</title>
    
        <meta http-equiv="content-type" content="text/html" charset="utf-8">
        
        <link rel="stylesheet" href="styles/style.css" media="all"/>
    
    </head>
    
    <body>
        
        <!-- Main Container Starts-->
        <div class="main_wrapper">
            
            <!--Header Starts-->
            <div class="header_wrapper">
                
                <a href="index.php"><img src="images/shop_logo.png" style="height:100px;width: 300px; "/></a>
                <img src="images/banner1.png" style="height: 100px;width: 500px;"/>
                <img src="images/buy.gif" style="height: 100px;width: 280px;"/>
                    
                
                
            </div>
            <!--Header Ends-->
            
            
            <!--Navigation Starts-->
            
            <div class="navi_wrapper">
                
                
                <ul id="main">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="all_products.php">All Products</a></li>
                    <li><a href="my_account.php">My Account</a></li>
                    <li><a href="user_register.php">Sign Up</a></li>
                    <li><a href="cart.php">Shopping Cart</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                </ul>    
                    
                    
                
                <div id="form">
                    
                    <form method="get" action="results.php" enctype="multipart/form-data" autocomplete="off">
                        
                        <input type="text" name="user_query" placeholder="Search a Product"/>
                        <input type="submit" name="search" value="Search"/>
                        
                        
                        
                      </form>
                </div>            
            </div>        
            
            <!--Navigation Ends-->                         
                       
            
            
            <!--Main Content Starts-->
            
            <div class="main_content">
                
                
                <div id="left_sidebar">
                    
                    <div id="sidebar_title">Categories</div>
                    <ul id="cats">
                       
                        <?php getCategory(); ?>
                          
                         </ul> 
                        
                   <div id="sidebar_title">Brands</div>
                   <ul id="cats">
                       
                        <?php getBrands(); ?>
                       
                       
                       
                       
                   </ul>
                   </div>     
         <div id="right_content">
                    
                    <div id="headline">
                        
                        <div id="headline_content">
                            
                            <?php
                            
                                                                               
                            if(!isset($_SESSION['customer_email']))
                            {
                                echo "<b>Welcome Guest!</b>&nbsp;<b><span style='color:yellow'>Shopping Cart</span></b>";
                            }
                            else
                            {
                                
                                echo"<b>Welcome:&nbsp;"."<span style=color:red;font-style:italic;>".$_SESSION['customer_email']."</span>". "&nbsp;</b><b><span style=color:yellow>Your Shopping Cart</span></b>";
                            }                           
                            
                            ?>
                            <span> - Total Items: <?php total_items(); ?> Total Price: <?php total_price();?> - <a href="index.php" style="color:yellow">Back to Shopping</a></span>                     
                                                      
                        </div>
                        
                        
                    </div>
                    
                    
                    <div id="product_box">
                        
                        <form action="cart.php" method="post" enctype="multipart/form-data">
                            
                            <table border="1" width="800px" align="center" bgcolor="blue">
                                
                                <tr>
                                    <td><b>Remove</b></td>
                                    <td><b>Product(s)</b></td>
                                    <td><b>Qty</b></td>
                                    <td><b>Price</b></td>
                                    
                                <br>
                                
                                    
                                    
                                </tr>
                                
                                
                                <?php         
                                                          
                                                                
   $total=0;
    $ip_add= getRealIpAddr();
    
    $sel_price="select * from cart where ip_add='$ip_add'";
    
    $run_sel_price= mysqli_query($db, $sel_price);
    
    while($record= mysqli_fetch_array($run_sel_price)){
        $pro_id=$record['product_id'];
        
        $get_pro_id="select * from products where product_id='$pro_id'";
        $run_pro_id= mysqli_query($db, $get_pro_id);
        
        while($pro_price= mysqli_fetch_array($run_pro_id)){
            $product_price=array($pro_price['product_price']);
            $product_title=$pro_price['product_title'];
            $image=$pro_price['product_img1'];
            $only_price=$pro_price['product_price'];
         
            
            
            $values= array_sum($product_price);
            
            
            $total+=$values;
        
       
                                
                                ?>                      
                                                        
                
                                <tr>
                                    
                <td><input type="checkbox" name="remove[]"value="<?php echo $pro_id;?>"/></td>
                <td><?php echo $product_title ?><br><img src="admin_area/product_image/<?php echo $image;?>" height="60" width="60"></td>
                <td><input type="text" value="1" name="qty" size="4px"/></td>
                
                <?php
                
                if(isset($_POST['update']))
                {
                    $qty=$_POST['qty'];
                    $insert_qty="update cart set qty='$qty' where ip_add='$ip_add'";
                    $run_qty= mysqli_query($conn,$insert_qty);
                    
                    $total=$total* $qty;    
                }
                
                ?>
                
                
                
                <td><?php echo "Rs.".$only_price?></td>
                
            </tr>
            
                    
           <?php }} ?>
            
            
            <tr>
            
                <td colspan="3"><b>Sub Total</b></td>
                <td><b><?php echo "Rs.".$total; ?></b></td>
                

                
            </tr>
            
            <tr>
                
                <td><input type="submit" name="update" value="Update Cart"/></td>
                <td><input type="submit" name="continue" value="Continue Shopping"/></td>
                <td><button><a href="checkout.php" style="text-decoration:none;color:black;">Checkout</a></button></td>
                
                
            </tr>
                                 
                             
                                
                            </table>
                             
                            
                            
                            
                        </form>
                        
                        
                        
                        
                       <?php
                       
                       function updatecart(){
                       
                        global $conn;   
                       
                       if(isset($_POST['update']))
                       {
                           foreach($_POST['remove'] as $remove_id)
                           {
                            
                               $delete_product="delete from cart where product_id='$remove_id'";
                               $run_delete_product= mysqli_query($conn, $delete_product);
                               
                               if($run_delete_product)
                               {
                                   echo "<script>window.open('cart.php','_Self')</script>";
                               }
                               
                           }
                       }
                       
                       
                       if(isset($_POST['continue']))
                       {
                           echo "<script>window.open('index.php','_self')</script>";
                       }
                       
                       }
                       
                       echo @$update_cart= updatecart();
                               
                       
                       
                       ?> 
                                
                                
                             
                                
                                
                                
                                
                                
                         
                        
                    </div>    
                        
                        
                        
                        
                    
                    
                    
                    
                    
                    
                    
                </div>
             </div>                  
            
             <!--Main Content Ends-->    
            
                
                        
            
            
           
            
            <!--footer starts-->
            
            <div class="footer">
                
                <h1 style="color: white;text-align: center;padding:10px;">&copy; 2018 Developed By KDC Soft Sollution</h1>
                
                
            </div>
            
            <!--footer ends-->
            
            
            
            
            
            
            
            
            
        </div>
        <!-- Main Container End-->
        
        
        
        
        
        
        
    </body>
    
    
    
</html>