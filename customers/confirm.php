<?php

session_start();

include ('includes/dp.php');


if(isset($_GET['order_id']))
{
    $order_id=$_GET['order_id'];
}

?>

<html>
<body bgcolor="black">

<form action="confirm.php?update_id=<?php echo $order_id;?>" method="post" color="white">
    
    <table align="center" width="500" border="2" bgcolor="grey">
       
        <tr align="center">
            
            <td colspan="5"><h2>Please Confirm Your Payment</h2></td>
                
        </tr>
        
        <tr align="right">
            
            <td>Invoice No:</td>
            <td align="left"><input type="text" name="invoice"/></td>     
                       
        </tr>
        
        <tr align="right">
            
             <td>Amount Paid:</td>
            <td align="left"><input type="text" name="amount"/></td>  
            
            
        </tr>
        
                
        <tr align="right">
            
            <td>Select Payment Mode:</td>
            <td align="left">
            <select name="payment" align="left">         
        <option>Select Payment</option>
        <option>Bank Transfer</option>
        <option>Easypasia/UBL Omni</option>
        <option>Western union</option>
        <option>Paypal</option>
             </select>
                 
             </td>  
            
            
        </tr>
        
        
        <tr align="right">
            
             <td>Transection/Reference ID:</td>
            <td align="left"><input type="text" name="ref_no"/></td>  
            
            
        </tr>
        
        <tr align="right">
            
             <td>Easypaisa/UBL Omni Code:</td>
            <td align="left"><input type="text" name="code"/></td>  
            
            
        </tr>
        
        <tr align="right">
            
             <td>Payment Date:</td>
            <td align="left"><input type="text" name="date"/></td>  
            
            
        </tr>
        
        <tr align="center">
            
             
            <td colspan="5"><input type="submit" name="confirm" value="Confirm Payment"/></td>  
            
            
        </tr>
        
        
    </table>
    
    
    <?php
    
    
    if(isset($_POST['confirm']))
    {
        $invoice=$_POST['invoice'];
        $update_id=$_GET['update_id'];
        $amount=$_POST['amount'];
        $payment=$_POST['payment'];
        $ref_no=$_POST['ref_no'];
        $code=$_POST['code'];
        $date=$_POST['date'];
        $complete='Completed';
        
        $insert_payment="insert into payment (invoice_no,amount,payment_mode,ref_no,code,date)
          values ('$invoice','$amount','$payment','$ref_no','$code','$date')";
        
        $run_payment= mysqli_query($conn, $insert_payment);
        
        
        $update_order="UPDATE customer_orders SET order_status='$complete' WHERE order_id='$update_id'";
        $run_order= mysqli_query($conn, $update_order);
        
        if($run_payment)
        {
            echo "<h2 style='text-align:center;color:white;'>Payment Recevied,Your order will be completed within 24 hours</h2>";
        }
        
        
        
                
    }
    
    
    
    ?>
    
    
    
    
    
</form>
</body>
</html>