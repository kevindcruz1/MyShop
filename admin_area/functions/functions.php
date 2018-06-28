<?php
//Establshing connection
$db= mysqli_connect("localhost", "root", "", "myshop");


//Get the user real ip
function getRealIpAddr()
{
    if(!empty($_SERVER['HTTP_CLIENT_IP']))//check ip from share internet
    {
        $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    
    elseif(!empty ($_SERVER['HTTP_X_FORWARDED_FOR']))//to check ip is pass from proxy 
    {
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
        $ip=$_SERVER['REMOTE_ADDR'];
    }
    
    return $ip;
}


 
//creating script for cart

function cart()
{
    if(isset($_GET['add_cart']))
    {
        global $db;
        $ip_add= getRealIpAddr();
        
        $pro_id=$_GET['add_cart'];
        
        $select_cart="select * from cart where product_id='$pro_id' AND ip_add='$ip_add'";
        
        $check_cart= mysqli_query($db, $select_cart);
        
        
        if(mysqli_num_rows($check_cart)>0)
        {
            echo "";
        }
        
        else
        {
            $run_insert_cart="insert into cart (product_id,ip_add) values ('$pro_id','$ip_add')";
            
            $run_cart= mysqli_query($db, $run_insert_cart);
            
            echo "<script>window.open('index.php','_self')</script>";
            
            
        }
    }
}


//getting total items from the cart

function total_items(){
    
    
    if(isset($_GET['add_cart']))
    {
        global $db;
        
        $ip_add= getRealIpAddr();
        $total_items="select * from cart where ip_add='$ip_add'";
        
        $run_items= mysqli_query($db, $total_items);
        
        $count_items= mysqli_num_rows($run_items);
        
    }
    else
    {
        global $db;
        $ip_add= getRealIpAddr();
        $total_items="select * from cart where ip_add='$ip_add'";
        
        $run_items= mysqli_query($db, $total_items);
        
        $count_items= mysqli_num_rows($run_items);
    }
    
    echo $count_items;
    
}




//Getting the product price from the cart

function total_price()


{
    global $db;
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
            
            $values= array_sum($product_price);
            
            $total+=$values;
        }
        
    }
    
    echo "Rs.".$total;
            
            
    
    
}




?>

<?php

//Getting the product

function getProducts(){
    
    global $db;


if(!isset($_GET['cat'])){
    
    if(!isset($_GET['brand'])){


    $get_products="select * from products LIMIT 0,5";
                        
                        $run_products= mysqli_query($db, $get_products);
                        
                        while($row_products= mysqli_fetch_array($run_products))
                        {
                            $pro_id=$row_products['product_id'];
                            $pro_title=$row_products['product_title'];
                            $pro_cat=$row_products['cat_id'];
                            $pro_brand=$row_products['brand_id'];
                            $pro_desc=$row_products['product_des'];
                            $pro_price=$row_products['product_price'];
                            $pro_image=$row_products['product_img1'];
                            
                            
                            echo "<div id='single_product'>
                                <a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a><br>
                            
                                    <h3>$pro_title</h3>
                                    <img src='admin_area/product_image/$pro_image'height='150' width='150'/>
                                        
                                    <p><b>Rs.$pro_price/-</b></p>
                                    
                                    <a href='index.php?add_cart=$pro_id'><button>Add to Cart</button></a>
                                    

                                     
                                     </div>";
                        }
                        }
}
}


//getting the category product
function getCatProducts(){
    
    global $db;


if(isset($_GET['cat'])){
    $cat_id=$_GET['cat'];
    


    $get_cat_products="select * from products where cat_id='$cat_id'";
                        
                        $run_cat_products=mysqli_query($db, $get_cat_products);
                        
                        $count= mysqli_num_rows($run_cat_products);
                        
                        if($count==0)
                        {
                            echo "<h2>No Products Available!</h2>";
                        }
                        
                        
                        
                        
                        while($row_cat_products=mysqli_fetch_array($run_cat_products))
                        {
                            $pro_id=$row_cat_products['product_id'];
                            $pro_title=$row_cat_products['product_title'];
                            $pro_cat=$row_cat_products['cat_id'];
                            $pro_brand=$row_cat_products['brand_id'];
                            $pro_desc=$row_cat_products['product_des'];
                            $pro_price=$row_cat_products['product_price'];
                            $pro_image=$row_cat_products['product_img1'];
                            
                            
                            echo "<div id='single_product'>
                                <a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a><br>
                            
                                    <h3>$pro_title</h3>
                                    <img src='admin_area/product_image/$pro_image' height='150' width='150'/>
                                        
                                    <p><b>Rs.$pro_price/-</b></p>
                                    
                                    <a href='index.php?add_cart=$pro_id'><button>Add to Cart</button></a>
                                    

                                     
                                     </div>";
                        }                        
}
}

                        
                        
                        
                        
                        
//getting the Category
function getCategory(){
     
    global $db;    
                        $get_cats="select * from categories";
                        
                        $run_cats= mysqli_query($db, $get_cats);
                        
                        while ($row_cats=mysqli_fetch_array($run_cats))
                        {
                            $cat_id=$row_cats['cat_id'];
                            $cat_title=$row_cats['cat_title'];
                            
                            echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
                        }
                        
                        
               
                
                        
                     
} 


//getting the Brands
function getBrands(){
    
    global $db;         
                        $get_brand="select * from brands";
                        
                        $run_brand= mysqli_query($db, $get_brand);
                        
                        while ($row_brand= mysqli_fetch_array($run_brand))
                                
                        {
                            $brand_id=$row_brand['brand_id'];
                            $brand_title=$row_brand['brand_title'];
                        
                        
                        echo "<li><a href='index.php?brand=$brand_id'>$brand_title</a></li>";
                        }
                      
                        
                     
}


//getting the Brands Products
function getBrandProducts(){
    
    global $db;


if(isset($_GET['brand'])){
    $brand_id=$_GET['brand'];
    


    $get_brand_products="select * from products where brand_id='$brand_id'";
                        
                        $run_brand_products=mysqli_query($db, $get_brand_products);
                        
                        $count= mysqli_num_rows($run_brand_products);
                        
                        if($count==0)
                        {
                            echo "<h2>No Products Available!</h2>";
                        }
                        
                        
                        
                        
                        while($row_brand_products=mysqli_fetch_array($run_brand_products))
                        {
                            $pro_id=$row_brand_products['product_id'];
                            $pro_title=$row_brand_products['product_title'];
                            $pro_cat=$row_brand_products['cat_id'];
                            $pro_brand=$row_brand_products['brand_id'];
                            $pro_desc=$row_brand_products['product_des'];
                            $pro_price=$row_brand_products['product_price'];
                            $pro_image=$row_brand_products['product_img1'];
                            
                            
                            echo "<div id='single_product'>
                                <a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a><br>
                            
                                    <h3>$pro_title</h3>
                                    <img src='admin_area/product_image/$pro_image' height='150' width='150'/>
                                        
                                    <p><b>Rs.$pro_price/-</b></p>
                                    
                                    <a href='index.php?add_cart=$pro_id'><button>Add to Cart</button></a>
                                    

                                     
                                     </div>";
                        }                        
}
}
                        
                        
                        
                        
                        
    
    
    




























?>