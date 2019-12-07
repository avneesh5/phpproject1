<!doctype html>
<html>
	<head>
		<title>Add Student Record</title>
		<!--2nd step-->
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >

		<style></style>
	</head>
	<body>
		<h1>Add Student Record</h1>
		
		<ul>
			<li><a href="add_student.php">Add Student</a></li>
			<li><a href="view_student.php">View Student</a></li>
		</ul>
        <?php
        if(isset($_COOKIE['success']))
		{
			echo "<p>".$_COOKIE['success']."</p>";
		} 

		 if(isset($_POST['submit']))
         {
             //collect the form data
             $name=(isset($_POST['name']))?$_POST['name']:"";
			$mail=(isset($_POST['email']))?$_POST['email']:"";
			$mob=(isset($_POST['mobile']))?$_POST['mobile']:"";
			
		//connect to db
             
             include('connect.php');
                 $res=mysqli_query($con,"insert into students value('','$name','$mail','$mob','$gender','$filename','$pass','$course','$sem','$dob','$state',now())");
             mysqli_error($con);
             
        
             if(mysqli_affected_rows($con)==1)
			{
				setcookie("success","Student record added successfully",time()+2);
				header("Location:add_student.php");
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

       
	</body>
</html>