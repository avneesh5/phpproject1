<?php 
if(isset($_REQUEST['nid']))
{
	include("connect.php");
	$id=$_REQUEST['nid'];
	$res=mysqli_query($con,"select *from students where id=$id");
    mysqli_error($con);
	if(mysqli_num_rows($res)==1)
	{
		$row=mysqli_fetch_assoc($res);
		//print_r($row);
	?>
	<html>
	<head>
		<title>Edit Student Record</title>
			<!--2nd step-->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >

		<style></style>  
	</head>
	     <body>
             
	
	                	<h1>Edit Student Record</h1>
		             
		                     <ul>
		                	<li><a href="add_student.php">Add Student</a></li>
			                <li><a href="view_student.php">View Student</a></li>
		                     </ul>

		                     <?php 
		
		                     if(isset($_POST['submit']))
		                     {
			                 $name=(isset($_POST['name']))?$_POST['name']:"";
			                 $mail=(isset($_POST['email']))?$_POST['email']:"";
			                 $mob=(isset($_POST['mobile']))?$_POST['mobile']:"";
			                 
			                 mysqli_query($con,"update students set name='$name',
			                 email='$mail',
			                 mobile='$mob'
			                 where id=$id");
			                 echo mysqli_error($con);
			                 if(mysqli_affected_rows($con)==1)
			                 {
				             setcookie("success","Student Record UPdated successfully",time()+2);
				             header("Location:edit_student.php?nid=$id");
			                 }
			                 else
			                 {
				
				             echo "<p>Sorry Unable to update the Records, try again</p>";
			                 }
		                     }
	                         ?>

			 
		<form enctype="multipart/form-data" method="POST" action="" onsubmit="return formValidate()">
		<tr>
            <td>Name</td>
                <td><input type="text" name="name" id="uname"></td>
            </tr>
            
            <tr>
            <td>Email</td>
                <td><input type="text" name="email" id="email"></td>
            </tr>
            
            <tr>
            <td>Mobile</td>
                <td><input type="text" name="mobile" id="mobile"></td>
            </tr>
            
            <tr>
            <td></td>
                <td><input type="submit" name="submit"  value="Register"></td>
            </tr>
            		
			</table>
		</form>

		
	<?php
	}
	else
	{
		echo "<p>UNabe to find the record</p>";
	}
}
else
{
	echo "<p>Sorry!,Unable to process</p>";
}
?>

