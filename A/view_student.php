<?php include("connect.php")?>
<html>
	<head>
		</head>
	<body>
		<h1>View Student Records</h1>
		
		<ul>
			<li><a href="add_student.php">Add Student</a></li>
			<li><a href="view_student.php">View Student</a></li>
		</ul>
		
		
		<?php 
	
		
		
		
		$result=mysqli_query($con,"select *from students");
		if(mysqli_num_rows($result)>0)
		{
			?>
			<table border=1 >
			<tr style="text-align:center">
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Mobile</th>
				
				

                <th>Action</th>
			</tr>
			<?php 
			while($row=mysqli_fetch_assoc($result))
			{
				?>
			<tr style="text-align:center">
				<td><?php echo $row['id'];?></td>
				<td><?php echo $row['name'];?></td>
				
				<td><?php echo $row['email'];?></td>
                <td><?php echo $row['mobile'];?></td>
                
                <td>
					<a href='edit_student.php?nid=<?php echo $row['id'];?>'>Edit</a>
					<a href='delete_student.php?did=<?php echo $row['id'];?>'>Delete</a>
				</td>

			</tr>
				<?php
			}
			?>
		</table>
	
			<?php
		}
		else
		{
			echo "<p>Sorry! No records FOund</p>";
		}
		?>
		
		</body>
</html>