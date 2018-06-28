<!DOCTYPE html>
<html>
    
    <head>
        <title>Welcome to admin area</title>
        
        <link rel="stylesheet" href="styles/style.css" media="all"/>
        
    </head>
    
    <body>
        
        
        <div class="wrapper">
            
            <div class="header"></div>
            <div class="left_sidebar">
                
                  
                <?php
                                                
                if(isset($_GET['insert_product']))
                {
                    include("insert_product.php");
                }
                
                if(isset($_GET['view_product']))
                {
                    include("view_products.php");
                }
                
                ?>

                
                
            </div>
            <div class="right_sidebar">
                
                
                <h2 style="text-align:center; margin-top: 5px; font-size: 28px;">Manage Content</h2>
                
                <a href="index.php?insert_product">Insert New Product</a>
                <a href="index.php?view_product">View All Product</a>
                <a href="index.php?insert_category">Insert New Category</a>
                <a href="index.php?view_category">View All Category</a>
                <a href="index.php?insert_brand">Insert  New Brand</a>
                <a href="index.php?view_brand">View All Brand</a>
                <a href="index.php?view_customer">View Customers</a>
                <a href="index.php?view_orders">View Orders</a>
                <a href="index.php?view_payment">View Payments</a>
                <a href="logout.php">Admin Logout</a>        
            </div>      
        </div>
        
        
    </body>
    
    
</html>