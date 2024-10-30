<?php
session_start();
?>

<?php
$name = "";
$gender = "";

if (!isset($_POST['btnUpdate'])) {
    $conn = mysqli_connect("localhost", "root", "", "studentdb");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT * FROM tblregistration WHERE emailid='" . $_SESSION['username'] . "' AND status = 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $gender = $row['gender'];
    } else {
        echo "0 record found.";
    }
} else {
    $name = $_POST['txtName'];
    $gender = $_POST['rdoGender'];
    $conn = mysqli_connect("localhost", "root", "", "studentdb");

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "UPDATE tblregistration SET name='" . $name . "', gender='" . $gender . "' WHERE emailid='" . $_SESSION['username'] . "'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Record updated successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    $conn->close();
}
?>

<html>
<head>
    <title>Update Form</title>
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
            max-width: 600px;
            box-sizing: border-box;
        }

        h1 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e0f7fa;
        }

        input[type="text"], input[type="radio"] {
            margin: 5px 0;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            display: block;
            width: 100%;
            margin-top: 10px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        a {
            text-decoration: none;
            color: #4CAF50;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <form method="post">
            <table>
                <tr><th colspan="2">Update Here</th></tr>
                <tr>
                    <td>Enter Name:</td>
                    <td><input type="text" name="txtName" value="<?php echo $name; ?>"></td>
                </tr>
                <tr>
                    <td>Gender:</td>
                    <td>
                        <input type="radio" name="rdoGender" value="Male" <?php if ($gender == 'Male') echo 'checked'; ?>> Male
                        <input type="radio" name="rdoGender" value="Female" <?php if ($gender == 'Female') echo 'checked'; ?>> Female
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="btnUpdate" value="Update">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <a href="userwelcome.php">Go to Dashboard</a>
                    </td>   
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
