<?php

@session_start();

include("customers/includes/dp.php");


?>

<div>
    
    <form action="checkout.php" method="post">
        <table width="980px" bgcolor="gray" style="border-spacing:10px">
            <tr align="center">
                <td colspan="4"><h2>Login Or Register<hr></h2><br></td>
                </tr>
            <tr>
                <td align="right"><b>Your Email:&nbsp;</b></td>
                <td align="left"><input type="text" name="c_email"/></td>
                
            </tr>     
                
            <tr>
                <td align="right"><b>Your Password:&nbsp;</b></td>
                <td align="left"><input type="password" name="c_pass"/><br></td>
            </tr>
            
            <tr align="center">
            <td colspan="4"> <input type="submit" name="c_login" value="Login"/></td>
            </tr>
    
            <tr align="center"><td colspan="4"><a href="forgot_password.php">Forgot Password</a></td></tr>
    
    
    </table>
        <br>
        <a href="customer_register.php" style="text-decoration: none"><h2 style="color:black; padding: 2px; text-align: right; margin-right: 40px; ">New? Register Here</h2></a>
    
    </form>
    
    
    
    
    
</div>

<?php

if(isset($_POST['c_login']))
{
    $customer_email=$_POST['c_email'];
    $customer_pass=$_POST['c_pass'];
    
    $sel_customer="select * from customers where customer_email='$customer_email'AND customer_pass='$customer_pass'";
    $run_customer= mysqli_query($conn, $sel_customer);
    
    $check_customer= mysqli_num_rows($run_customer);
    
    $get_ip= getRealIpAddr();
    
    $sel_cart="select * from cart where ip_add='$get_ip'";
    
    $run_cart= mysqli_query($conn, $sel_cart);
    $check_cart= mysqli_num_rows($run_cart);
    
    
    if($check_customer==0)
    {
        echo "<script>alert('Email & Password is wrong,try again')</script>";
        exit();
    }
    
    if($check_customer==1 AND $check_cart==0)
        
    {
        $_SESSION['customer_email']=$customer_email;
        echo "<script>window.open('customers/my_account.php','_self')</script>";
        
    }
    
    else
    {
         $_SESSION['customer_email']=$customer_email;
        echo "<script>window.open('payment_option.php','_self')</script>";
    }
    
    
    
    
}



?>
