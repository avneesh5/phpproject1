<?php
if(isset($_REQUEST['did']))
{
	include("connect.php");
	$id=$_REQUEST['did'];
	
		mysqli_query($con,"delete from students where id=$id");
		if(mysqli_affected_rows($con)==1)
		{
			echo"Record Deleted successfully";
            header("Location:view_student.php");
		}
		
else
{
	echo "<p>Sorry!Unable to process</p>";
}
}
?>