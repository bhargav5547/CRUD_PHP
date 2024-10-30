<html>
<head>
    <title>User Registration Form</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #eef2f7;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            box-sizing: border-box;
        }

        h1 {
            margin-bottom: 20px;
            font-size: 26px;
            color: #333;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: center;
            padding-bottom: 15px;
            font-size: 22px;
            color: #444;
        }

        td {
            padding: 10px 0;
            text-align: left;
            vertical-align: middle;
        }

        input[type="text"], input[type="radio"], select {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #45a049;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            margin-top: 20px;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #155a8a;
        }

        input[type="radio"] {
            width: auto;
            margin-right: 10px;
        }

        a {
            text-decoration: none;
            color: #1d72b8;
            font-weight: bold;
            display: block;
            text-align: center;
            margin-top: 20px;
        }

        a:hover {
            color: #155a8a;
        }
    </style>
</head>
<body>
    <?php
    $name = "";
    $gender = "";
    $type = "";
    $email = "";
    $pass = "";
    $rpass = "";

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "studentdb";

    if (isset($_POST['btnRegister'])) {
        $name = $_POST['txtName'];
        $gender = $_POST['rdoGender'];
        $type = $_POST['cboType'];
        $email = $_POST['txtEmail'];
        $pass = $_POST['txtPass'];
        $rpass = $_POST['txtRPass'];

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection Failed: " . $conn->connect_error);
        }

        $query = "INSERT INTO tblregistration(name,gender,type,emailid,pass,status) VALUES
        ('" . $name . "','" . $gender . "','" . $type . "','" . $email . "','" . $pass . "','1')";

        if (mysqli_query($conn, $query)) {
            echo"
            <script>
                alert('your details iserted successfully...');
                window.location.href='registration.php';
            </script>
        "; 
        } else {
            echo "<br>Error: " . $query . "<br>" . mysqli_error($conn);
        }

        $conn->close();
    }
    ?>

    <div class="container">
        <form method="post">
            <table>
                <tr><th colspan="2">Register Here</th></tr>
                <tr>
                    <td>Enter Name:</td>
                    <td><input type="text" name="txtName" value="<?php echo $name; ?>"></td>
                </tr>
                <tr>
                    <td>Gender:</td>
                    <td>
                        <input type="radio" name="rdoGender"  required value="Male" <?php if ($gender == 'Male') echo 'checked'; ?>> Male
                        <input type="radio" name="rdoGender" required value="Female" <?php if ($gender == 'Female') echo 'checked'; ?>> Female
                    </td>
                </tr>
                <tr>
                    <td>User Type:</td>
                    <td>
                        <select name="cboType">
                            <option value="Admin" <?php if ($type == 'Admin') echo 'selected'; ?>>Admin</option>
                            <option value="Student" <?php if ($type == 'Student') echo 'selected'; ?>>Student</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Username/EmailID:</td>
                    <td><input type="email" required name="txtEmail" value="<?php echo $email; ?>"></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="text" required name="txtPass" value="<?php echo $pass; ?>"></td>
                </tr>
                <tr>
                    <td>Retype-Password:</td>
                    <td><input type="text" name="txtRPass" required value="<?php echo $rpass; ?>"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="btnRegister" value="Register"></td>
                </tr>
                
            </table>
        </form>
    </div>
</body>
</html>
