<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>query1</title>
</head>
<body>
<button><a href="index.html#all_query">Back</button></a>  
</body>
</html>
<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "dbms";

// Create connection
$conn = new mysqli("localhost:3306", "root", "", "dbms");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// sql to create table
$sql = "select * from passenger;";
echo "select passenger";


if ($res = mysqli_query($conn, $sql)) { 
    if (mysqli_num_rows($res) > 0) { 
        echo "<table>"; 
        echo "<tr>"; 
        echo "<th>Passenger_id</th>"; 
        echo "<th>Passenger_name</th>"; 
        echo "<th>Passenger_Gender</th>";
		echo "<th>Passenger_City</th>";		
		
        echo "</tr>"; 

        while ($row = mysqli_fetch_array($res)) { 
         echo "<tr>"; 
         echo "<td>".$row['p_id']."</td>"; 
         echo "<td>".$row['p_name']."</td>"; 
         echo "<td>".$row['p_gender']."</td>";
		 echo "<td>".$row['p_city']."</td>";			
			//echo "<td>".$row['epost']."</td>";
            echo "</tr>";
        } 
        echo "</table>"; 
        
        echo "(1.)complete details of all flights to New Delhi";
       // mysqli_free_res($res); 
	  
    } 
    else { 
        echo "No matching records are found."; 
    } 
} 
else { 
    echo "ERROR: Could not able to execute $sql. "
                                .mysqli_error($conn); 
} 



$sql1 = "select * from flight where Destination='new dehli';";
if ($res = mysqli_query($conn, $sql1)) { 
    if (mysqli_num_rows($res) > 0) { 
        echo "<table>"; 
        echo "<tr>"; 
        echo "<th>flight_id</th>"; 
        echo "<th>flight_date</th>"; 
        echo "<th>flight_time</th>";
		echo "<th>flight_source</th>";	
        echo "<th>flight_destination</th>";			
		
        echo "</tr>"; 
	

        while ($row = mysqli_fetch_array($res)) { 
            echo "<tr>"; 
            echo "<td>".$row['f_id']."</td>"; 
            echo "<td>".$row['f_date']."</td>"; 
           echo "<td>".$row['f_time']."</td>";
			echo "<td>".$row['Source']."</td>";	
            echo "<td>".$row['Destination']."</td>";			
			//echo "<td>".$row['epost']."</td>";
            echo "</tr>";
        } 
        echo "</table>"; 
       // mysqli_free_res($res); 
	  
    } 
    else { 
        echo "No matching records are found."; 
    } 
} 
else { 
    echo "ERROR: Could not able to execute $sql. "
                                .mysqli_error($conn); 
} 




mysqli_close($conn); 
?> 
</body>
</html>











