<?php
include("functions/functions.php");
include ("includes/dp.php");
?>

<!DOCTYPE html>

<html>
    
    <head><title>Insert Products</title>
        
    <meta http-equiv="content-type" content="text/html" charset="utf-8">
    
     
</head>
    
    </head>
    
    
    <body bgcolor="gray">
        
        <form method="post" action="insert_product.php" enctype="multipart/form-data">
            
            <table width="750" align="center" border="1" bgcolor="skyblue" style="border-spacing: 8px;" >
                
                <tr>                    
                    <td colspan="2" align="center">
                        <h2>Insert New Product:</h2>    
                    </td>
                </tr>
                
                
                <tr>
                    <td align="right" size="40"><b>Product Name:</b></td>
                    <td align="left"><input type="text" name="product_title" placeholder="Product Name"/></td>                       
                    
                </tr>
                
                
                <tr>
                    <td align="right"><b>Product Category:</b></td>
                            <td><select name="product_cat">
                                    <option>Select a Category</option>
                                   <?php
                        $get_cats="select * from categories";
                        
                        $run_cats= mysqli_query($conn, $get_cats);
                        while ($row_cats=mysqli_fetch_array($run_cats))
                        {
                            $cat_id=$row_cats['cat_id'];
                            $cat_title=$row_cats['cat_title'];
                            
                            echo "<option value=$cat_id>$cat_title</option>";
                        }
                                                
                     ?>    
                    </select></td>                      
                     </tr>           
                                    
                              
                                    
                                              
                    
                
                
                <tr>
                    <td align="right"><b>Product Brand:</b></td>
                            <td><select name="product_brand">
                                    
                            <option>Select a Brand</option>        
                        
                            <?php
                        
                       $get_brand="select * from brands";
                        
                        $run_brand= mysqli_query($conn, $get_brand);
                        
                        while ($row_brand= mysqli_fetch_array($run_brand))
                                
                        {
                            $brand_id=$row_brand['brand_id'];
                            $brand_title=$row_brand['brand_title'];
                        
                        
                        echo "<option value=$brand_id>$brand_title</option>";
                        }                     
                      
                        
                     ?>  
                                    
                                    
                                    
                        </select></td>                       
                    
                </tr>
                
                <tr>
                    <td align="right"><b>Product Image 1:</b></td>
                    <td><input type="file" name="product_img1"/></td>                       
                    
                </tr>
                
                <tr>
                    <td align="right"><b>Product Image 2:</b></td>
                    <td><input type="file" name="product_img2"/></td>                       
                    
                </tr>
                
                <tr>
                    <td align="right"><b>Product Image 3:</b></td>
                    <td><input type="file" name="product_img3"/></td>                       
                    
                </tr>
                
                <tr>
                    <td align="right"><b>Product Price:</b></td>
                    <td><input type="text" name="product_price" placeholder="Enter Price"/></td>                       
                    
                </tr>
                
                <tr>
                    <td align="right"><b>Product Description:</b></td>
                    <td><textarea name="product_desc" cols="50" rows="8" placeholder="Write Description.."></textarea></td>                       
                    
                </tr>
                
                <tr>
                    <td align="right"><b>Product Keywords:</b></td>
                    <td><input type="text" name="product_keyword" placeholder="Product Keyword"/></td>                       
                    
                </tr>
                
                <tr>
                    <td colspan="2" align="center"><input type="submit" name="insert_product" value="Add Product"</td>
                
                
            </table>
            
            </form> 
        
    </body>
    </html>

 
    <?php 

if(isset($_POST['insert_product']))
{
    
    //Local Variable declaration
    $product_title=$_POST['product_title'];
    $catId =$_POST['product_cat'];
    $brandId=$_POST['product_brand'];
    $product_price=$_POST['product_price'];
    $product_desc=$_POST['product_desc'];
    $status='on';
    $product_keyword=$_POST['product_keyword'];
    
    
    //local variable image declaration
    
    $product_img1=$_FILES['product_img1']['name'];
    $product_img2=$_FILES['product_img2']['name'];
    $product_img3=$_FILES['product_img3']['name'];
    
    //temp image declaration
    
    $tmp_name1=$_FILES['product_img1']['tmp_name'];
    $tmp_name2=$_FILES['product_img2']['tmp_name'];
    $tmp_name3=$_FILES['product_img3']['tmp_name'];
    
    
    if($brand_title=="" OR $catId=="" OR $brandId=="" OR $product_price=="" OR $product_desc=="" OR $product_keyword=="" OR
            $product_img1=="")
                              
            
    {
        echo "<script>alert('Please fill all the fields!')</script>";
        exit();
    }
    
    else
        
    {
        //uploading image its to folder
        move_uploaded_file($tmp_name1,"product_image/$product_img1");
        move_uploaded_file($tmp_name2,"product_image/$product_img2");
        move_uploaded_file($tmp_name3,"product_image/$product_img3");
        
        
        $insert_product="insert into products (cat_id,brand_id,date,product_title,product_img1,product_img2,product_img3,product_price,product_des,product_keywords,status)
            values('$catId','$brandId',NOW(),'$product_title','$product_img1','$product_img2','$product_img3','$product_price','$product_desc','$product_keyword','$status')";
        
        
        $run_products= mysqli_query($conn,$insert_product);
        
        
        
         if($run_products)
        {
            echo "<script>alert('Product Inserted Sucessfully')</script>";
            exit();
        }
        
        mysqli_close($conn);
              
    }
    
    
    
    
    
}





?>
            
            
            
            
            
            
       
                     
                
                
         
        
        
        
   

