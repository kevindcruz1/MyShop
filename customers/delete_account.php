<form action="" method="post">
    
    <table align="center" width="1000" style="padding-top:5px;border-spacing: 20px;">
        
        <tr align="center">        
        <td colspan="2"><h2>Do you really want to delete your account?</h2></td>
    </tr>
    
    <tr align="center">
        <td ><input type="submit" name="yes" value="Delete My Account"/>
        
            <input type="submit" name="no" value="Continue to Shopping"/>
        
        </td>
    </tr>
        
        
    </table>
</form>


<?php

include('includes/dp.php');

$c=$_SESSION['customer_email'];

if(isset($_POST['yes']))
{
    $delete="delete from customers where customer_email='$c'";
    $run_delete= mysqli_query($conn, $delete);
    
    if($run_delete)
    {
        session_destroy();
        echo "<script>alert('Your account has been deleted')</script>";
        echo "<script>window.open('../index.php','_self')</script>";
    }
}


 if(isset($_POST['no']))
    {
        echo "<script>window.open('my_account.php','_self')</script>";
    }



?>