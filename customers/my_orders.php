<?php

include("includes/dp.php");

if(isset($_SESSION['customer_email'])){
    
    $cus=$_SESSION['customer_email'];
    
    $get_cus="select * from customers where customer_email='$cus'";
    $run_cus=mysqli_query($db,$get_cus);
    $row_cus= mysqli_fetch_array($run_cus);
    
    $get_customer_id=$row_cus['customer_id'];
    
    
}
?>
<center><h3 style="color: white">All Order Details:</h3></center>
        <table width="800" align="center" bgcolor="lightgreen">
        
        <tr>
        
        <th>Order no</th>
        <th>Due Amount</th>
        <th>Invoice No</th>
        <th>Total Products</th>
        <th>Order Date</th>
        <th>Paid/Unpaid</th>
        <th>Status</th>


        </tr>
<?php


$get_orders="select * from customer_orders where customer_id='$get_customer_id'";
$run_order= mysqli_query($conn, $get_orders);
$i=0;
while($row_orders= mysqli_fetch_array($run_order))
{

    
    $order_id=$row_orders['order_id'];
    $due_amount=$row_orders['due_amount'];
    $invoice_no=$row_orders['invoice_no'];
    $total_pro=$row_orders['total_products'];
    $order_date=$row_orders['order_date'];
    $order_status=$row_orders['order_status'];
    $i++;
    
    if($order_status=='Pending')
    {
        
        $order_status="Unpaid";
    }
    else
    {
        $order_status="Paid";
    }
    
    echo "<tr align='center'>
    
        <td>$i</td>
        <td>$due_amount</td>
        <td>$invoice_no</td>
        <td>$total_pro</td>
        <td>$order_date</td>
        <td>$order_status</td>
        <td><a href='confirm.php?order_id=$order_id' target='_blank'>Confirm if Paid</a></td>
            
            
            
            </tr>";

}

?>

        
        
        </table>