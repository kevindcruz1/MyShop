<!DOCTYPE html>
<html>
    
    <head>
        <title>View Products</title>
        
        <style type="text/css">
            
            th,tr{border:2px solid black; text-align: center;}
            
            tr:hover{color:white;}
            
            
            
        </style>
               
    </head>
    
    <body>
        
        <table width="750" align="center" bgcolor="orange" >
            
            
            <tr align="center">
                <td colspan="8" ><h2>View All Products</h2></td>
            </tr>
            
            <tr>
                <th>Product No</th>
                <th>Title</th>
                <th>Image</th>
                <th>Price</th>
                <th>Total Sold</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            
            
            
            <?php
            
            include("includes/dp.php");
            
            $get_pro="select * from products";
            
            $run_pro= mysqli_query($conn, $get_pro);
            
            $i=0;
            while($row_pro= mysqli_fetch_array($run_pro))
            {
                $pro_id=$row_pro['product_id']; 
                $pro_title=$row_pro['product_title'];
                $pro_img=$row_pro['product_img1'];
                $pro_price=$row_pro['product_price'];
                $i++;
            ?>
            
            
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $pro_title; ?></td>
                <td><img src="product_image/<?php echo $pro_img;?>" width='50px' height='50px'></td>
                <td><?php echo $pro_price;?></td>
                <td></td>
                <td></td>
                <td><a href='#'>Link</a></td>
                <td><a href='#'>Delete</a></td>
            </tr>
            
            <?php } ?>
            
            
        </table>
        
        
    </body>
    
    
</html>