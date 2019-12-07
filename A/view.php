<html>
<head>
    <title>View Record</title>
    </head>
    <body>
    <h1>View Records</h1>

<?php
$con=mysqli_connect('localhost','root','','a');
$result=mysqli_query($con,"select * from register");
if(mysqli_num_rows($result)>0)
{
  ?>
 <table border="1">
        <tr>
        <th>Id</th>
            <th>Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Action</th>
        </tr>
   
<?php
    while($row=mysqli_fetch_assoc($result))
    {
        ?>
     
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['mobile']; ?></td>
            <td>
                <a href="edit.php?eid='<?php echo $row['id']; ?>'">Edit</a>
                <a href="delete.php?did=<?php echo $row['id']; ?>">Delete</a>
            </td>
        </tr>
    
     
     <?php
    }
}
    ?>
</table>
     
    </body>
        </html>