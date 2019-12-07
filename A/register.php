<?php
if(isset($_POST['submit']))
{
    $name=$_POST['name'];
    $mail=$_POST['email'];
    $mob=$_POST['mobile'];
   // echo $name,$mail,$mob;
    $con=mysqli_connect('localhost','root','','a');
    $data=mysqli_query($con,"insert into register values('','$name','$mail','$mob')");
    echo mysqli_error($con);
    if(mysqli_affected_rows($con)>0)
    {
        echo "data inserted successfully";
    }
    else
    {
        echo "unable to insert data";
    }
}
?>
<html>
<head>
    <title>Register Page</title>
    </head>
    <body>
    <h1>Register Here</h1>
        <form action="" method="POST" onsubmit="return formvalidate()">
        <table>
            <tr>
            <td>Name</td>
                <td><input type="text" name="name" id="name"></td>
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
                <td><input type="submit" name="submit" id="submit"></td>
            </tr>
            </table>
        </form>
        <script>
        function formvalidate()
            {
                if(document.getElementById('name').value=="")
                    {
                        alert('Enter Name');
                        return false;
                    }
                if(document.getElementById('email').value=="")
                    {
                        alert('Enter Name');
                        return false;
                    }
            }
        </script>
    </body>
</html>