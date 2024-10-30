<?php
 session_start();
?>
<html>
  <head><title>Welcome User</title>
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
            text-align: center;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 1000px;
            overflow-x: auto;
        }
        h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
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
    </style>
  </head>
  <body>
    <?php
        echo"<h2>Wel-Come :".$_SESSION['username'];
        echo "<br>";
        $result ="";
        $rows="";

        if(isset($_SESSION['username'])){
          $conn = mysqli_connect("localhost","root","","studentdb");

          //check connection
        
          if(!$conn){
            die("connection failed ...".mysqli_connect_error());
          }
          $sql = "select * from tblregistration where emailid='".$_SESSION['username']."'and status = 1";
          $result = mysqli_query($conn,$sql);
          if($result->num_rows > 0){
            echo "<table border=1><tr>
                  <th>Name</th>
                  <th>Gender</th>
                  <th>Type</th>
                  <th>Email-ID</th>
                  <th>Status</th>
                  <th>Opration</th>
               </tr>";
               //output data of each row
               while($rows = mysqli_fetch_assoc($result)){
                echo "<tr><td>".$rows['name']."</td>
                <td>".$rows['gender']."</td>
                <td>".$rows['type']."</td>
                <td>".$rows['emailid']."</td>
                <td>".$rows['status']."</td>
                <td> <a href='update.php'>update</a></td>
                </tr>";
               }
               echo "</table>";


          }
          else{
            echo "0 reacord found ....";
          }
        }
        
    ?>
  </body>
</html>