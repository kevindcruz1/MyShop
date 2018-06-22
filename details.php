<?php
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
                            
                            <b>Welcome Guest!</b>
                            <b style="color: yellow">Shopping Cart:</b>
                            <span> - Items:- Total Price:</span>                     
                                                      
                        </div>
                        
                        
                    </div>
                    
                    
                    <div id="product_box">
                        
                        <?php 
                        
                        if(isset($_GET['pro_id'])){
                            
                            $product_details=$_GET['pro_id'];
                        
                        $get_products="select * from products where product_id=$product_details";
                        
                        $run_products= mysqli_query($db, $get_products);
                        
                        while($row_products= mysqli_fetch_array($run_products))
                        {
                            $pro_id=$row_products['product_id'];
                            $pro_title=$row_products['product_title'];
                            $pro_cat=$row_products['cat_id'];
                            $pro_brand=$row_products['brand_id'];
                            $pro_desc=$row_products['product_des'];
                            $pro_price=$row_products['product_price'];
                            $pro_image1=$row_products['product_img1'];
                            $pro_image2=$row_products['product_img2'];
                            $pro_image3=$row_products['product_img3'];
                            
                            
                            echo "<div id='single_product'>
                                <a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a><br                               

                            
                                    <h3>$pro_title</h3>
                                    <img src='admin_area/product_image/$pro_image1'height='150' width='150'/>
                                    <img src='admin_area/product_image/$pro_image2'height='150' width='150'float='left'/>
                                    <img src='admin_area/product_image/$pro_image3'height='150' width='150'float='left'/>
                                        
                                    <p><b>Rs.$pro_price/-</b></p>
                                        
                                     <h4>Description</h4>
                                     <p>$pro_desc</p>

                                    
                                    <a href='index.php?add_cart=$pro_id'><button>Add to Cart</button></a>
                                    

                                     
                                     </div>";
                        }
                        
                        }
                        
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
                        
                        
                        
                        
                        
                        
                        
                  
                    
                    
                    
                    
                    
                 
                
                
               