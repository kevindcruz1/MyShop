<?php

include("includes/dp.php");

include('functions/functions.php');




//Getting customer id

if(isset($_GET['c_id']))
{
    $customer_id=$_GET['c_id'];
}


//Getting product price & number of items


    $ip_add= getRealIpAddr();
    $total=0;
    
    $sel_price="select * from cart where ip_add='$ip_add'";
    
    $run_sel_price= mysqli_query($db, $sel_price);
    
    $status="Pending";
    $invoice_no= mt_rand(1,1000);
    
    $count_pro= mysqli_num_rows($run_sel_price);           
    
    while($record= mysqli_fetch_array($run_sel_price)){
        $pro_id=$record['product_id'];
        
        $get_pro_id="select * from products where product_id='$pro_id'";
        $run_pro_id= mysqli_query($db, $get_pro_id);
        
        while($pro_price= mysqli_fetch_array($run_pro_id)){
            $product_price=array($pro_price['product_price']);
            
            $values= array_sum($product_price);
            
            $total+=$values;
    }}
    
    
            //Getting qty
            
            $get_qty="select * from cart";
            
            $run_qty= mysqli_query($conn, $get_qty);
            
            $check_qty= mysqli_fetch_array($run_qty);
            
            $qty=$check_qty['qty'];
            
            if($qty==0)
            {
                $qty=1;
                $subtotal=$total;
            }
            else
            {
                $qty=$qty;
                $subtotal=$total*$qty;
            }
            
            
            $insert_to_customer_order="insert into customer_orders (customer_id,due_amount,invoice_no,total_products,order_date,order_status)
                    values('$customer_id','$values','$invoice_no','$qty',NOW(),'$status')";
            
            $run_order= mysqli_query($conn, $insert_to_customer_order);
            var_dump($insert_to_customer_order);
            
            if($run_order)
            {
                echo "<script>alert('Order Submitted Sucessfully')</script>";
                
                echo"<script>window.open('customers/my_account.php','_self')</script>";
            }
            
            $empty_cart="delete from cart where ip_add='$ip_add'";
            
            $run_empty= mysqli_query($conn, $empty_cart);
            
            
            
            $insert_to_pending_order="insert into pending_orders (customer_id,invoice_no,product_id,qty,order_status)
                    values ('$customer_id','$invoice_no','$pro_id','$qty','$status')";
            
           $run_pending_order=mysqli_query($conn,$insert_to_pending_order);
            
?> 