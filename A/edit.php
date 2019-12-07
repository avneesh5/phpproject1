<?php

if(isset($_REQUEST['eid']))
{
    $id=$_REQUEST['eid'];
 $con=mysqli_connect('localhost','root','','a');
    $result=mysqli_query($con,"select * from register where id=$id");
    mysqli_error($con);
    if(mysqli_num_rows($result)==1)
    {
        $row=mysqli_fetch_assoc($result);
        //echo "<pre>";
        //print_r ($row);
    }

}


?>
<html>
<head>
    <title>Edit Record</title>
    </head>
    <body>
    <h1>Edit Records</h1>
        <?php
        if(isset($_POST['submit']))
        {
            $name=$_POST['name'];
            $mail=$_POST['email'];
            $mob=$_POST['mobile'];
            //echo $name;
            mysqli_query($con,"update register set name='$name',
            email='$mail', mobile='$mob' where id=$id");
             echo mysqli_error($con);
			                 if(mysqli_affected_rows($con)==1)
			                 {
				            echo " Record UPdated successfully";
				             header("Location:edit.php");
			                 }
			                 else
			                 {
				
				             echo "<p>Sorry Unable to update the Records, try again</p>";
			                 }
        }
        
        ?>
        <form action="" method="POST" onsubmit="return formvalidate()">
        <table>
            <tr>
            <td>Name</td>
                <td><input type="text" name="name" id="name" value="<?php echo $row['name']; ?>"></td>
            </tr>
            <tr>
            <td>Email</td>
                <td><input type="text" name="email" id="email" value="<?php echo $row['email']; ?>"></td>
            </tr>
            <tr>
            <td>Mobile</td>
                <td><input type="text" name="mobile" id="mobile" value="<?php echo $row['mobile']; ?>"></td>
            </tr>
            <tr>
            <td></td>
                <td><input type="submit" name="submit" id="submit"></td>
            </tr>
            
            </table>
        </form>
  <script>
		function formValidate()
		{
			if(document.getElementById("name").value=="")
			{
				alert("Enter Name");
				return false;
			}
			if(document.getElementById("email").value=="")
			{
				alert("Please eneter  Email");
				return false;
			}
		}
		</script>



    </body>
</html>