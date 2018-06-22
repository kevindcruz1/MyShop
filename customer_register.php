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
        <script type= "text/javascript" src = "js/countries.js"></script>
       
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
                            <span> - Total Items: <?php total_items(); ?> Total Price: <?php total_price();?> - <a href="cart.php" style="color:yellow">Go to Cart</a>
                            
                            <?php
                                
                                if(!isset($_SESSION['customer_email'])){
                                echo "<a href='checkout.php' style='color: orange'>Login</a></span>";
                                }
                                else{
                                    echo "<a href='logout.php' style='color: orange'>Logout</a></span>";
                                }
                                
                                
                                        ?>
                                            
                            </span>                     
                                                      
                        </div>
                        
                        
                    </div>
                    
                    
                    <div id="product_box">
                        
                        
                        
                        
                        
                    </div>    
                        
                        
             <form action="customer_register.php" method="post">
                 <table width="1000px" bgcolor="gray" style="padding-top: 5px;border-spacing:20px">
            
            <tr align='center'>
                
                <td colspan="7"><h2>Create an Account</h2><hr></td>
            
            </tr>
            
            
            <tr>
                <td align='right'><b>Customer Name:</b></td>
                <td><input type="text" name="c_name" required="" placeholder="Enter Name" /></td>
            </tr>
            
            <tr>
                <td align='right'><b>Customer Email:</b></td>
                <td><input type="text" name="c_email" required="" placeholder="Enter Email"/></td>
            </tr>
            
            <tr>
                <td align='right'><b>Customer Password:</b></td>
                <td><input type="password" name="c_pass" required="" placeholder="Enter Password"/></td>
            </tr>
            
            <tr>
                <td align='right'><b>Customer Country:</b></td>
                <td><select id="country" name ="c_country"></select></td>
            </tr>
            
            <tr>
                <td align='right'><b>Customer City:</b></td>
                <td><select name ="c_state" id ="state"></select></td>
            </tr>
            
            <tr>
                <td align='right'><b>Customer Contact:</b></td>
                <td><input type="text" name="c_contact" required="" placeholder="Enter Mobile Number"/></td>
            </tr>
            
            <tr>
                <td align='right'><b>Customer Address:</b></td>
                <td><textarea cols="40" rows="10" name="c_address" placeholder="Enter address..."></textarea></td>
            </tr>
            
             <tr align='center'>
                
                 <td colspan="5"><input type="submit" name="register" value="Register" /></td>
            </tr>
            
            
            
            
            
        </table>
            
      </form>
             
             <script language="javascript">
	populateCountries("country", "state"); // first parameter is id of country drop-down and second parameter is id of state drop-down
	populateCountries("country2");
	
</script>
             
                        
                        
                    
                    
                    
                    
                    
                    
                    
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
                        
 
<!--Customer Registration form validations-->

<?php

if(isset($_POST['register']))
{
    $c_name=$_POST['c_name'];
    $c_email=$_POST['c_email'];
    $c_pass=$_POST['c_pass'];
    $c_country=$_POST['c_country'];
    $c_state=$_POST['c_state'];
    $c_contact=$_POST['c_contact'];
    $c_address=$_POST['c_address'];
    $c_ip= getRealIpAddr();
    
    
    $insert_customer="insert into customers (customer_name,customer_email,customer_pass,customer_country,customer_state,customer_contact,customer_address,customer_ip)
          values ('$c_name','$c_email','$c_pass','$c_country','$c_state','$c_contact','$c_address','$c_ip')";
    
    $run_customer= mysqli_query($conn, $insert_customer);   
    
    
    $sel_cart="select * from cart where ip_add='$c_ip'";    
    $run_cart=mysqli_query($conn,$sel_cart);
    
    $check_cart= mysqli_num_rows($check_cart);
    
    
    if($check_cart>0)
    {
        $_SESSION['customer_email']=$c_email;
        echo "<script>alert('Account Created Sucessfully')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";
        
    }
    else
    {
        $_SESSION['customer_email']=$c_email;
        echo"<script>alert('Account Created Sucessfully')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
    
    
    
    
}




?>
                        
                        
                        
                        
                        
                  
                    
                    
                    
                    
                    
                 
                
                
               