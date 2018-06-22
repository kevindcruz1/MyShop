<?php

@session_start();

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
                
                <a href="../index.php"><img src="../images/shop_logo.png" style="height:100px;width: 300px; "/></a>
                <img src="../images/banner1.png" style="height: 100px;width: 500px;"/>
                <img src="../images/buy.gif" style="height: 100px;width: 280px;"/>
                    
                
                
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
                            <span> - Total Items: <?php total_items(); ?> Total Price: <?php total_price();?> - <a href="cart.php" style="color:yellow">Go to Cart</a>
                            
                            <?php
                                
                                if(!isset($_SESSION['customer_email']))
                                {
                                echo "<a href='checkout.php' style='color: orange'>Login</a></span>";
                                }
                                else
                                {
                                    echo "<a href='logout.php' style='color: orange'>Logout</a></span>";
                                }
                                
                                
                                        ?>
                                            
                            </span>                     
                                                      
                        </div>
                        
                        
                    </div>
                    
                    
                    <div id="product_box">
                        
                        <?php
                        
                        if(!isset($_SESSION['customer_email']))
                        {
                            include("customer.login.php");
                        }
                        
                        else
                        {
                            include("payment_option.php");
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
                        
                        
                        
                        
                        
                        
                        
                  
                    
                    
                    
                    
                    
                 
                
                
               