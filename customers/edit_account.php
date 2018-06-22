<?php


include("includes/dp.php");


if($_SESSION['customer_email'])
{
    $cus=$_SESSION['customer_email'];
    
    $get_cus="select * from customers where customer_email='$cus'";
    
    $run_cus= mysqli_query($db, $get_cus);
    
    $row_cus= mysqli_fetch_array($run_cus);
    
    $id=$row_cus['customer_id'];
    $name=$row_cus['customer_name'];
    $email=$row_cus['customer_email'];
    $pass=$row_cus['customer_pass'];
    $country=$row_cus['customer_country'];
    $state=$row_cus['customer_state'];
    $contact=$row_cus['customer_contact'];
    $address=$row_cus['customer_address'];   
}
?>
<html>
    <head>
       <script type= "text/javascript" src ="/customers/js/countries.js"></script>
        
      <script language="javascript">
	populateCountries("country", "state"); // first parameter is id of country drop-down and second parameter is id of state drop-down
	populateCountries("country2");
	
      </script>
    </head>
<form action="" method="post">
    
    <table align="center" width="1100" style="padding-top: 5px;border-spacing:15px;">
        
        <tr>
            
            <td colspan="8" align="center"><h2>Update Your Account</h2></td>
            
        </tr>
        
        <tr>
            <td align="right"><b>Customer Name:</b></td>
            <td><input type="text" name="c_name" value="<?php echo $name; ?>" </td>
        </tr>
        
        <tr>
            <td align="right"><b>Customer Email:</b></td>
            <td><input type="text" name="c_email" value="<?php echo $email;?>"</td>
        </tr>
        
        <tr>
            <td align="right"><b>Customer Password:</b></td>
            <td><input type="password" name="c_pass" value="<?php echo $pass ?>"</td>
        </tr>
        
        
        <tr>
            <td align="right"><b>Customer Country:</b></td>
            
            <td><select id="country" name ="c_country" disabled="">
                
                <option value="<?php echo $country; ?>"><?php echo $country ?></option> 
                    
                </select></td>
            </tr>
        
        
        <tr>
            <td align="right"><b>Customer State:</b></td>
            
            <td><select name ="c_state" id ="state" disabled="">
                <option value="<?php echo $state?>"><?php echo $state ?></option>        
            </select></td>      
              
        </tr>
        
        
        <tr>
            <td align="right"><b>Customer Contact:</b></td>
            <td><input type="text" name="c_contact" value="<?php echo $contact ?>"></td>
        </tr>
        
        <tr>
            <td align="right"><b>Customer Address:</b></td>
            <td><textarea cols="40" rows="10" name="c_address"><?php echo $address ?></textarea></td>
        </tr>
        
        <tr>
            
            <td colspan="8" align="center"><input type="submit" name="update" value="Update Now"></td>
            
        </tr>
        
        
    </table>
</form>



</html>
<?php

if(isset($_POST['update']))
{
    $update_id=$id;
        
    $name=$_POST['c_name'];
    $email=$_POST['c_email'];
    $pass=$_POST['c_pass'];
    $country=$_POST['c_country'];
    $state=$_POST['c_state'];
    $contact=$_POST['c_contact'];
    $address=$_POST['c_address'];
    
    $update_c="update customers set customer_name='$name',customer_email='$email',customer_pass='$pass',customer_country='$country',
    customer_state='$state',customer_contact='$contact',customer_address='$address' where customer_id='$update_id'";
    $run_c= mysqli_query($conn, $update_c);
    
        
    if($run_c)
    {
       echo "<script>alert('Your account has been updated')</script>";
       echo "<script>window.open('my_account.php','_self')</script>";
    }
    
    
}



?>