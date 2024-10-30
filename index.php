<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Practical 01 Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }
        h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
        }
        th {
            padding: 10px;
            text-align: center;
            font-size: 18px;
            background-color: #4CAF50;
            color: white;
        }
        td {
            padding: 10px;
            text-align: left;
        }
        input[type="text"], input[type="password"], select {
            width: calc(100% - 22px);
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        a {
            color: #4CAF50;
            text-decoration: none;
            font-size: 16px;
        }
        a:hover {
            text-decoration: underline;
        }
        .error {
            color: red;
            margin-top: 10px;
        }
        .date-info {
            font-size: 14px;
            margin-bottom: 20px;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login Here</h1>
        <?php
        $email = "";
        $pass = "";
        $type ="";
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "studentdb";

        if (isset($_POST['btnLogin'])) {
            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection Failed: " . $conn->connect_error);
            }

            $email = $_POST['txtEmail'];
            $pass = $_POST['txtPass'];
            $type = $_POST['cboType'];
            $sql = "SELECT * FROM tblregistration WHERE emailid='" . $email . "' AND pass= '" . $pass . "' AND type ='" . $type . "'";

            $rs = mysqli_query($conn, $sql);

            if (mysqli_num_rows($rs) > 0) {
                $_SESSION["username"] = $email;
                if ($type === 'Admin') {
                    header("Location: adminindex.php");
                    exit();
                } else {
                    header("Location: userwelcome.php");
                    exit();
                }
            } else {
                echo "<div class='error'>Invalid credentials. Please try again.</div>";
            }
            $conn->close();
        }
        ?>
        <div class="date-info">
            <?php
            date_default_timezone_set("Asia/Calcutta");
            echo "Today is " . date("d-m-Y") . "<br>";
            echo "Today is " . date("l") . "<br>";
            echo "The Time is " . date("h:i:sa");
            ?>
        </div>
        <form method="post">
            <table>
                <tr>
                    <td>Username/EmailID:</td>
                    <td><input type="text" required name="txtEmail" value="<?php echo htmlspecialchars($email); ?>"></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" required name="txtPass" value="<?php echo htmlspecialchars($pass); ?>"></td>
                </tr>
                <tr>
                    <td>User Type:</td>
                    <td>
                        <select name="cboType">
                            <option value="Admin" <?php echo $type === 'Admin' ? 'selected' : ''; ?>>Admin</option>
                            <option value="Student" <?php echo $type === 'Student' ? 'selected' : ''; ?>>Student</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="btnLogin" value="Login">
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><a href="registration.php">New Registration</a></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
