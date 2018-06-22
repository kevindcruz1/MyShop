
<!DOCTYPE html>
<html>

    <head><title>Payment Option</title></head>

    <body>
        
        <?php
        
        include("includes/dp.php");   
        
        
        
        ?>

<div>
    
    <?php
    
    $ip_add= getRealIpAddr();
    
    $get_customer="select * from customers where customer_ip='$ip_add'";
    $run_customers= mysqli_query($conn, $get_customer);
    $customers= mysqli_fetch_array($run_customers);
    
    $customer_id=$customers['customer_id'];
    
    
            ?>
    
    <h1>Payment option for you</h1><br>
    
    <b>Pay with &nbsp;</b><img src="images/paypal-logo.png" height="150" width="500"><b>&nbsp;Or <a href="order.php?c_id=<?php echo $customer_id?>">Pay Offline</a></b>
    
    
    
</div> 
    
    </body>
    </html>