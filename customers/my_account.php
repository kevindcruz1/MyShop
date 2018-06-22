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
                
                <a href="../index.php"><img src="../images/shop_logo.png" style="height:100px;width: 300px; "/></a>
                <img src="../images/banner1.png" style="height: 100px;width: 500px;"/>
                <img src="../images/buy.gif" style="height: 100px;width: 280px;"/>
                    
                
                
            </div>
            <!--Header Ends-->
            
            
            <!--Navigation Starts-->
            
            <div class="navi_wrapper">
                
              
                <ul id="main">
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="../all_products.php">All Products</a></li>
                    <li><a href="my_account.php">My Account</a></li>
                    
                    <?php
                    if(isset($_SESSION['customer_email']))
                    {
                        echo "<span style=display:none;><li><a href='../user_register.php'>Sign Up</a></li></span>";
                    }
                    else
                   echo "<li><a href='../user_register.php'>Sign Up</a></li>";
                            ?>
                    <li><a href="../cart.php">Shopping Cart</a></li>
                    <li><a href="../contact.php">Contact Us</a></li>
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
                    
                    <div id="sidebar_title">Manage Account!</div>
                    <ul id="cats">
                       
                        <li><a href="my_account.php?my_orders">My Orders</a></li>
                        <li><a href="my_account.php?edit_account">Edit Account</a></li>
                        <li><a href="my_account.php?change_pass">Change Password</a></li>
                        <li><a href="my_account.php?delete_account">Delete Account</a></li>
                        <li><a href="logout.php">Logout</a></li>
                         </ul> 
                        
                   
                   </div>     
         <div id="right_content">
                    
                    <div id="headline">
                        
                        <div id="headline_content">
                            
                           <?php
                           if(isset($_SESSION['customer_email']))
                           {
                               echo "<b>Welcome!:&nbsp;"."<b style='color:yellow;'>".$_SESSION['customer_email']."</b>"."</b>";
                           }
                           
                           ?> 
                                                                               
                           
                                <?php
                                
                                if(!isset($_SESSION['customer_email'])){
                                echo "<a href='checkout.php' style='color: orange'>Login</a></span>";
                                }
                                else{
                                    echo "<a href='logout.php' style='color: orange'>Logout</a></span>";
                                }
                                
                                
                                        ?>
                                                      
                        </div >
                        
                        
                    </div>
             
            
   
                  
                 
                 
                    
                    
                    <div>
                        
                        
                        <h2 style="background: pink; color: black;text-align: center;padding: 20px;border-top: 2px solid red;">Manage Your Account</h2>
                        
                       
                       <?php
                        getDefault();?>
                        
                        <?php
                        
                        if(isset($_GET['my_orders']))
                        {
                            
                            include('my_orders.php');
                            
                        }
                        
                       if(isset($_GET['edit_account']))
                       {
                           include('edit_account.php');
                       }
                       
                       if(isset($_GET['change_pass']))
                       {
                           include('change_pass.php');
                       }
                       
                       if(isset($_GET['delete_account']))
                       {
                           include('delete_account.php');
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
                        
                        
                        
                        
                        
                        
                        
                  
                    
                    
                    
                    
                    
                 
                
                
               