<html>
  <head>
    <title>Welcome Admin</title>
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
            text-align: center;
        }
        .container {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 1000px;
            overflow-x: auto;
        }
        h2 {
            margin-bottom: 30px;
            font-size: 28px;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }
        th, td {
            padding: 14px 20px;
            border: 1px solid #e0e0e0;
            text-align: left;
            font-size: 16px;
        }
        th {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
            text-transform: uppercase;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #d6f5d6;
            cursor: pointer;
        }
        td a {
            color: #4CAF50;
            text-decoration: none;
            font-weight: bold;
        }
        td a:hover {
            text-decoration: underline;
        }
        .no-records {
            color: #ff0000;
            font-size: 18px;
        }
        .pagination {
            margin-top: 30px;
            display: flex;
            justify-content: center;
        }
        .pagination a {
            color: #4CAF50;
            text-decoration: none;
            padding: 10px 16px;
            margin: 0 6px;
            border: 1px solid #ddd;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }
        .pagination a:hover {
            background-color: #4CAF50;
            color: white;
        }
        .pagination a.active {
            background-color: #4CAF50;
            color: white;
            border: 1px solid #4CAF50;
        }
    </style>
  </head>
  <body>
    <?php
    session_start();
    echo "<h2>Welcome : " . $_SESSION['username'] . "</h2>";

    if (isset($_SESSION['username'])) {
        $conn = mysqli_connect("localhost", "root", "", "studentdb");

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Pagination variables
        $limit = 4;  // Number of entries to show in a page
        $page = isset($_GET['page']) ? $_GET['page'] : 1;  // Current page number
        $offset = ($page - 1) * $limit;  // Calculate offset

        // Fetch the total number of rows
        $total_result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM tblregistration WHERE type='Student' AND status=1");
        $total_row = mysqli_fetch_assoc($total_result)['total'];
        $total_pages = ceil($total_row / $limit);  // Calculate total pages

        // Fetch data with limit and offset
        $sql = "SELECT * FROM tblregistration WHERE type='Student' AND status=1 LIMIT $offset, $limit";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<table border=1>
              <tr>
                  <th>Name</th>
                  <th>Gender</th>
                  <th>Type</th>
                  <th>Email-ID</th>
                  <th>Status</th>
                  
               </tr>";
            // Output data of each row  <th>Operation</th> <td><a href='update.php?id=" . $rows['id'] . "'>Update</a></td></tr>";
            
            while ($rows = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $rows['name'] . "</td>
                <td>" . $rows['gender'] . "</td>
                <td>" . $rows['type'] . "</td>
                <td>" . $rows['emailid'] . "</td>
                <td>" . $rows['status'] . "</td>
                </tr>";     
             }
            echo "</table>";
        } else {
            echo "<p class='no-records'>No records found.</p>";
        }

        // Pagination links
        echo "<div class='pagination'>";
        if ($page > 1) {
            echo "<a href='?page=" . ($page - 1) . "'>Previous</a>";
        }
        for ($i = 1; $i <= $total_pages; $i++) {
            echo "<a href='?page=$i'>$i</a>";
        }
        if ($page < $total_pages) {
            echo "<a href='?page=" . ($page + 1) . "'>Next</a>";
        }
        echo "</div>";
    }
    ?>
  </body>
</html>
