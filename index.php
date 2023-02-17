<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="form.css">
</head>
<?php
session_start();
?>
<body>
    <div class="frame">
    <form method="POST" enctype="multipart/form-data">
    <h1>Login</h1>
        <table>
        
            <tr>
                <td><label>Username : </label></td>
                <td> <input type="text" name="email" placeholder="username" required></td>
            </tr>
            <tr>
                <td> <label>Password : </label></td>
                <td><input type="password" name="pass" placeholder="password" required></td>
            </tr>
            <tr>
                <td><input type="hidden" name="time" value="<?php echo date("l d-m-Y h:i:s A"); ?>"></td>
                <td><input type="submit" id="submit" name="submit"><a href="signup.php">go to sign up page</a></td>
            </tr>
        </table>
    </form>
    </div>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "form");
    // if($conn)
    // {
    //     echo "connected";
    // }
    // else
    // {
    //     echo "not connected";
    // }
    // $date= date("l d-m-Y h:i:s A");
    if (isset($_POST['submit'])) {
        $username = $_POST['email'];
        $pass = $_POST['pass'];
        $date = $_POST['time'];

        $query = "select * from signup where Email='$username' and Password='$pass'";
        $run = mysqli_query($conn, $query);
        $row = mysqli_fetch_row($run);
        if ($row) {
            $query1 = "insert into login(Username,Password,time)values('$username','$pass','$date')";
            $run1 = mysqli_query($conn, $query1);
            if($run1)
            {
            $_SESSION['username']=$username;
            header("location:dashboard.php");
            }
            else
            {
                header("location:index.php");
            }
        } else {
            echo "username and password are incorrect";
        }
    }

    ?>
<script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</body>

</html>