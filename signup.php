<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="form.css">
    <title>Document</title>
</head>

<body>
    <div class="frame">
        <form method="POST" enctype="multipart/form-data">
            <h1>Sign up</h1>
            <table>

                <td> <label>First Name : </label></td>
                <td> <input type="text" name="firstname" required></td>
                </tr>
                <!-- <br> -->
                <tr>
                    <td><label>Last Name : </label></td>
                    <td><input type="text" name="lname" required></td>
                </tr>
                <!-- <br> -->
                <tr>
                    <td> <label>Email : </label></td>
                    <td><input type="text" name="email" required></td>
                </tr>
                <!-- <br> -->
                <tr>
                    <td><label>Password : </label></td>
                    <td><input type="password" name="pass" required></td>
                </tr>
                <!-- <br> -->

                <tr>
                    <td></td>
                    <td> <input type="submit" id="submit" name="sub"> <a href="index.php">go to login page</a></td>
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
    if (isset($_POST['sub'])) {
        $fname = $_POST['firstname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        if (!empty($fname && $lname && $email && $pass)) {
            if (preg_match("/^[a-zA-Z-' ]*$/", $fname)) {
                if (preg_match("/^[a-zA-Z-' ]*$/", $lname)) {
                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                        $query1 = "insert into signup(First_name,Last_Name,Email,Password)values('$fname','$lname','$email','$pass')";
                        $run = mysqli_query($conn, $query1);
                        if ($run) {
                            echo "<h2> sign up successfully </h2>";
                        } else {
                            echo "<h2>You are already registered uer.</h2>";
                        }
                    } else {
                        echo "<h2> invalid E-mail</h2> ";
                    }
                } else {
                    echo "<h2> Only letters and white space allowed </h2> ";
                }
            } else {
                echo "<h2> Only letters and white space allowed </h2> ";
            }
        } else {
            echo "<h2> All information are required</h2> ";
        }
    }

    ?>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</body>

</html>