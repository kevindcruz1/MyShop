<form action="" method="post">
    
    <table width="1000" align="center" style="padding-top: 5px;border-spacing:20px">
        
        <tr align="center">
            <td colspan="5"><h2>Change Your Password</h2></td>
        </tr>
        
        <tr>
            <td align="right"><b>Enter Current Password:</b></td>
            <td align="left"><input type="password" name="old_pass" required=""></td>
        </tr>
        
        <tr>
            <td align="right"><b>Enter New Password:</b></td>
            <td align="left"><input type="password" name="new_pass" required=""></td>
        </tr>
        
        <tr>
            <td align="right"><b>Confirm New Password:</b></td>
            <td align="left"><input type="password" name="confirm_pass" required=""></td>
        </tr>
        
        <tr align="center">
            <td colspan="5"><input type="submit" name="change_pass" Value="Change Password"</td>
        </tr>
        
        
        
    </table>
    
    
    
</form>


<?php

include("includes/dp.php");

$c=$_SESSION['customer_email'];

if(isset($_POST['change_pass']))
{
    $old_pass=$_POST['old_pass'];
    $new_pass=$_POST['new_pass'];
    $new_pass_again=$_POST['confirm_pass'];
    
    $get_real_pass="select * from customers where customer_pass='$old_pass'";
    
    $run_pass= mysqli_query($conn, $get_real_pass);
    
    if(mysqli_num_rows($run_pass)==0)
    {
        echo "<script>alert('Your Current Password is not valid,try again')</script>";
        exit();
    }
    
    if($new_pass!=$new_pass_again)
    {
        echo "<script>alert('New Password did not match,try again)</script>";
        exit();
    }
 else 
        
 {
     
    $update_pass="update customers set customer_pass='$new_pass' where customer_email='$c'";
     
    $run_pass= mysqli_query($conn, $update_pass);
     
     
    echo "<script>alert('Your Password has been sucessfully changed')</script>";
    echo "<script>window.open('my_account.php','_self')</script>";
 }
    
}



?>