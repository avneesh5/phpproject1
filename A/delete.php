<?php
$con=mysqli_connect('localhost','root','','a');
if(isset($_REQUEST['did']))
$id=$_REQUEST['did'];

$data=mysqli_query($con,"delete from register where id=$id");
if(mysqli_affected_rows($con)==1)
{
    echo "record deleted successfully";
    header('location:view.php');
}
else
{
    echo "unable to delete record";
}
?>